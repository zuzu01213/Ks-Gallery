@extends('dashboard.layouts.main')

@section('container')
@yield('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="{{ asset('js/gallery.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
    <h1 class="h2">All of your gallery, {{ auth()->user()->name }}</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <!-- Buttons for uploading images -->
        <button id="userImagesButton" type="button" class="btn btn-warning mb-3" style="cursor: pointer; background-color: #116D6E; border: 1px solid black; ">
            All Images ({{ $images->total() }} )
        </button>
        <!-- Available upload count -->
        @php
            $userImagesCount = auth()->user()->images()->count();
            $remainingUploads = max(0, 20 - $userImagesCount);
            $pagination = ceil($remainingUploads / 20); // Assuming each page has 20 uploads
        @endphp

        <button type="button" class="btn btn-warning mb-3" style="cursor: text; background-color: #CD1818; ">Upload Available: {{ $remainingUploads }}</button>

        <!-- Button to trigger upload file modal -->
        <button type="button" class="btn btn-gold mb-3" data-bs-toggle="modal" data-bs-target="{{ auth()->check() && auth()->user()->isBasicMember() && auth()->user()->images()->count() >= 20 ? '#upgradeModal' : '#chooseImageModal' }}">
            <span class="text">Upload Files</span>
            <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                    <path d="M8.794 1.354a.5.5 0 0 1 .5.5V12a.5.5 0 1 1-1 0V1.854a.5.5 0 0 1 .5-0zM0 14a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </span>

        </button>
    </div>

    <div class="col-md-6">
        <!-- Form for searching images -->
        <form method="GET" class="input-group mb-3 justify-content-end">
            <div class="col-3">
                <!-- Category selection -->
                <select class="form-select custom-input" name="category_id" aria-label="Select Category" style="width: 130px;">
                    <option value="">Select Categories</option>
                    <!-- Categories options -->
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-5">
                <!-- Search input -->
                <input type="text" id="searchInput" class="form-control custom-input" placeholder="Search for images..." name="search">
            </div>


            <div class="col-1.5">
                <!-- Search button -->
                <button type="submit" class="btn btn-secondary">Search</button>
            </div>
        </form>
    </div>
</div>

<!-- Buttons for actions -->
<div class="d-flex justify-content-between mb-0">
    <div class="col-md-6">
        <!-- Form to revert to draft -->
        <form class="d-inline-block ml-2" >
            @csrf
            <button type="submit" class="btn btn-secondary mb-3" style="border: none; color: white;">
                Revert to Draft
            </button>
        </form>
        <!-- Form to publish with glowing dot -->
        <form class="d-inline-block" >
            @csrf
            <button type="submit" class="btn btn-warning mb-3" style="background-color: navy; border: none; color: white; position: relative;">
                Publish
                <span class="glowing-dot"></span>
            </button>
        </form>
            <form action="{{ route('dashboard.destroySelected') }}" method="POST" class="d-inline-block" id="deleteAllForm">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mb-3" id="deleteAllBtn" style="border: none; color: white; display: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M3.5 5.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5V6h-9v-.5zm9-1V3H4v1.5a.5.5 0 0 1-1 0V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v1.5a.5.5 0 0 1-1 0zM5 9a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5V7a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0-.5.5v2zm6.5 1a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5V10z"/>
                    </svg>
                    Delete All
                </button>
            </form>
    </div>

    <div>
        <!-- Select options for filtering images -->
        <select id="selectOptions">
            <option value="default">default</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="25">25</option>
            <option value="all">All</option>
        </select>
    </div>
</div>

<!-- Include the modal for choosing images -->
@include('dashboard.gallery.chooseimagemodal')

<!-- Display success message if available -->
@if(session('success'))
<div id="alert" class="alert alert-dark alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Display images -->
@if ($images->count() > 0)
    <div class="row row-cols-5 mt-4">
        @foreach($images as $image)
            <div class="col mb-3">
                <!-- Display image -->
                <div class="card position-relative">
                    <img src="{{ asset('storage/' . $image->url) }}" alt="{{ $image->title }}" class="card-img-top" style="cursor: pointer">
                    <div class="card-body">
                        <!-- Add checkbox for image selection -->
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input image-checkbox" id="imageCheck{{ $image->id }}" data-image-id="{{ $image->id }}" style="transform: scale(1.5);">
                            <label class="form-check-label truncated-title" for="imageCheck{{ $image->id }}">{{ $image->title }}</label>
                        </div>

                        <!-- Display status label -->
                        <div class="status-label">
                            <span class="badge" style="background-color: #116D6E">{{ ucfirst($image->status) }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="btn-group">
                                <!-- Buttons for view, edit, and delete -->
                                <button type="button" id="viewBtn" class="btn btn-md btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewImageModal{{ $image->id }}">
                                    <!-- View Icon SVG -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M7.998 2c3.313 0 6 2.687 6 6s-2.687 6-6 6-6-2.687-6-6 2.687-6 6-6zM8 1C4.14 1 1 4.14 1 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm0 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                    </svg>
                                    View
                                </button>

                                <button type="button"  id="editBtn"  class="btn btn-md btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editImageModal{{ $image->id }}">
                                    <!-- Edit Icon SVG -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M12.354 1.146a1.5 1.5 0 0 1 2.122 2.122l-10 10a1.5 1.5 0 0 1-2.122-2.122l10-10zM11 4.732l1.768 1.768-8.414 8.414-1.768-1.768L11 4.732zM13.5 3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h.5a.5.5 0 0 0 .5-.5v-10a.5.5 0 0 0-.5-.5z"/>
                                    </svg>
                                    Edit
                                </button>

                                <button type="button"  id="deleteBtn"  class="btn btn-md btn-outline-danger delete-btn" data-image-id="{{ $image->id }}">
                                    <!-- Delete Icon SVG -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M3.5 5.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5V6h-9v-.5zm9-1V3H4v1.5a.5.5 0 0 1-1 0V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v1.5a.5.5 0 0 1-1 0zM5 9a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5V7a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0-.5.5v2zm6.5 1a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5V10z"/>
                                    </svg>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Custom Pagination Links -->
    <div class="mt-3">
        <ul id="paginationLinks" class="pagination justify-content">
            @if ($images->currentPage() > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $images->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            @endif

            @for ($i = 1; $i <= $images->lastPage(); $i++)
                <li class="page-item {{ $i == $images->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $images->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($images->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $images->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
@else
    <p class="text-center" style="font-size: 1.5rem;">No images found.</p>
@endif

@endsection
