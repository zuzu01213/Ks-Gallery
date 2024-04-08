@extends('dashboard.layouts.main')

@section('container')
@yield('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/medium-zoom/dist/medium-zoom.min.js"></script>
    <script src="{{ asset('js/gallery.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
    <h1 class="h2">All of your gallery, {{ auth()->user()->name }}</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <!-- Buttons for uploading images -->
        <button id="userImagesButton" type="button" class="btn btn-warning mb-3" style="cursor: pointer; background-color: #116D6E; border: 1px solid #116D6E; ">
            All Images ({{ $images->total() }} )
        </button>
        <!-- Available upload count -->
        @php
            $userImagesCount = auth()->user()->images()->count();
            $remainingUploads = max(0, 20 - $userImagesCount);
            $pagination = ceil($remainingUploads / 20); // Assuming each page has 20 uploads
        @endphp

        <button type="button" class="btn btn-warning mb-3" style="cursor: text; background-color: #CD1818; border:1px solid #CD1818">Upload Available: {{ $remainingUploads }}</button>

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
        <button type="button" class="btn btn-secondary mb-3" style="border: none; background-color: #116D6E;" onclick="toggleCheckbox()">
            Select
        </button>
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
@include('dashboard.gallery.photo')
<!-- Display success message if available -->
@if(session('success'))
<div id="alert" class="alert alert-dark alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif




@if ($images->count() > 0)
<div class="row mt-4">
    @foreach($images as $image)
    <div class="col-md-4 mb-2 position-relative">
        <!-- Display image -->
        <div class="position-relative" style="margin-bottom: 10px;">
            <a href="#" data-toggle="modal" data-target="#photoModal{{$image->id}}">
                <img class="custom-image" id="image{{$image->id}}" src="{{ asset('storage/' . $image->url) }}" alt="{{ $image->title }}" class="img-fluid rounded-start rounded-3" style="cursor: zoom-in; max-width: 100%; max-height: 100%; border-radius: 10px;">
            </a>

            <!-- User profile -->
            <div class="user-profile position-absolute bottom-0 start-0 m-2" style="border-radius: 25px;">
                <img src="https://source.unsplash.com/50x50/?profile" alt="User Profile" width="40px" height="40px" style="border-radius: 20px; object-fit: cover; image-rendering: auto;">
                <span style="color: white; font-size: 18px;">{{ $image->user->name }}</span>
            </div>

            <!-- Love and Add buttons -->
            <div  class="button-container position-absolute top-0 start-0 m-2">
                <!-- Love button -->
                <div class="love-button" style="margin-bottom: 10px; background-color: #F4F4F4; padding: 5px; border-radius: 5px; width: 30px; height: 30px; display: flex; justify-content: center; align-items: center;">
                    <img src="{{ asset('images/like.png') }}" alt="Love" width="14px" height="14px" style="border-radius: 5px; object-fit: cover; image-rendering: auto;">
                </div>
                <!-- Add button -->
                <div class="add-button" style="background-color: #F4F4F4; padding: 5px; border-radius: 5px; width: 30px; height: 30px; display: flex; justify-content: center; align-items: center;">
                    <img src="{{ asset('images/plus.png') }}" alt="Add" width="14px" height="14px" style="border-radius: 5px; object-fit: cover; image-rendering: auto;">
                </div>
            </div>


            <!-- Download button -->
            <div class="download-button position-absolute bottom-0 end-0 m-2" style="background-color: #F4F4F4; padding: 5px; border-radius: 5px;">
                <img src="{{ asset('images/download.png') }}" alt="Download" width="24px" height="24px" style="border-radius: 50%; object-fit: cover; image-rendering: auto;">
            </div>


            <!-- Display status label -->
            <div class="status-label" style="border-radius: 25px;">
                <span class="badge" style="background-color: black;">{{ ucfirst($image->status) }}</span>
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
                <a class="page-link" href="{{ $images->previousPageUrl() . '&perPage=' . $images->perPage() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
        @endif

        @for ($i = 1; $i <= $images->lastPage(); $i++)
            <li class="page-item {{ $i == $images->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $images->url($i) . '&perPage=' . $images->perPage() }}">{{ $i }}</a>
            </li>
        @endfor

        @if ($images->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $images->nextPageUrl() . '&perPage=' . $images->perPage() }}" aria-label="Next">
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
 {{-- <!-- Add checkbox for image selection -->
            <div class="checkbox-container position-absolute top-0 start-0 m-2" style="border-radius: 25px;">
                <input type="checkbox" class="form-check-input image-checkbox" id="imageCheck{{ $image->id }}" data-image-id="{{ $image->id }}" style="transform: scale(1.5);">
            </div> --}}
