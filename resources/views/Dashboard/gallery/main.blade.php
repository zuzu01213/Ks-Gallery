<!-- resources/views/dashboard/index.blade.php -->

@extends('dashboard.layouts.main')

@section('container')
<style>

    .btn-gold {
        background-color: gold;
        color: black; /* Warna teks saat latar belakang adalah gold */
        transition: background-color 0.3s ease, color 0.3s ease; /* Animasi transisi saat hover */
        display: flex;
        align-items: center;
        margin-top: 15px;
    }

    .btn-gold:hover {
        background-color: darkorange; /* Warna latar belakang saat dihover */
        color: black; /* Warna teks saat dihover */
    }

    .btn-gold svg {
        margin-right: 5px; /* Ruang antara ikon dan teks */
        transition: transform 0.3s ease; /* Animasi transformasi saat hover */
    }

    .btn-gold:hover svg {
    transform: translateY(-5px); /* Move the SVG up by 5 pixels */
}

.btn-gold .text {
    margin-right: 8px; /* Adjust the margin as needed */
}
.like-container {
        cursor: pointer;
        margin: 4px;
        transition: color 0.3s ease; /* Add color transition for smooth effect */
    }

    /* Style for loved button */
    .like-container.loved {
        color: red; /* Change to your desired color */
    }
    .modal-body {
        max-height: 60vh; /* Set the maximum height for the comment modal body */
        overflow-y: auto; /* Enable vertical scrolling if content exceeds the height */
    }
</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
    <h1 class="h2">All your gallery, {{ auth()->user()->name }}</h1>
</div>
<form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="image" class="form-label">Upload Image:</label>
        <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(this)">
    </div>
    <img id="image-preview" src="#" alt="Image Preview" style="max-width: 200px; display: none; border-radius: 10px;">
    <button type="submit" class="btn btn-gold">
        <span class="text">Upload Files</span>
        <span class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                <path d="M8.794 1.354a.5.5 0 0 1 .5.5V12a.5.5 0 1 1-1 0V1.854a.5.5 0 0 1 1 0V12a1.5 1.5 0 0 0 3 0V2.5a.5.5 0 0 1 1 0V12a2.5 2.5 0 0 1-5 0V1.854a.5.5 0 0 1 .5-.5zM0 14a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </span>
    </button>
</form>
@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

<div class="row mt-4">
    @foreach($images as $image)
    <div class="col-md-4 mb-3">
        <div class="card">
            <img src="{{ asset('storage/' . $image->url) }}" class="card-img-top" alt="Image">
            <div class="card-body">
                <div class="like-container" data-image-id="{{ $image->id }}" data-like-count="{{ $image->likes_count }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="bi bi-heart" style="vertical-align: text-top; margin-right: 8px;">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C15.09 3.81 16.76 3 18.5 3 21.58 3 24 5.42 24 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                    <span class="like-count">{{ $image->likes_count }}</span>
                </div>

                <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#commentModal{{ $image->id }}">
                    Comment
                </button>
            </div>
        </div>
    </div>

        <!-- Comment Modal -->
        <div class="modal fade" id="commentModal{{ $image->id }}" tabindex="-1" aria-labelledby="commentModalLabel{{ $image->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="commentModalLabel{{ $image->id }}">Comments</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Comment Form -->
                        <form action="{{ route('comment', ['image' => $image->id]) }}" method="post">

                            @csrf
                            <div class="mb-3">
                                <label for="comment_text" class="form-label">Write your comment:</label>
                                <textarea name="comment_text" id="comment_text" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Post Comment</button>
                        </form>

                        <!-- Display existing comments -->
                        <ul class="list-group mt-3">
                            @foreach($image->comments as $comment)
                                <li class="list-group-item">
                                    <strong>{{ $comment->user_name }}</strong>: {{ $comment->comment_text }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.like-container').forEach(function (container) {
            const likeCountElement = container.querySelector('.like-count');

            let currentCount = parseInt(container.dataset.likeCount) || 0;
            likeCountElement.innerText = currentCount;

            container.addEventListener('click', function () {
                const imageId = container.dataset.imageId;

                // Simulate AJAX logic to update the like count
                const isLiked = container.classList.toggle('loved');
                currentCount = isLiked ? currentCount + 1 : currentCount - 1;
                likeCountElement.innerText = currentCount;

                // TODO: Perform an actual AJAX request to update the like count on the server
                // You can use the imageId and isLiked variables to send the necessary data to the server
                // Example: sendLikeRequest(imageId, isLiked);
            });
        });
    });
    function previewImage(input) {
        var preview = document.getElementById('image-preview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        if (file) {
            // Check if the file size is within the allowed limit (10 MB)
            if (file.size > 1024 * 1024 * 10) {
                alert('File size exceeds the allowed limit (10 MB). Please choose a smaller file.');
                input.value = ''; // Clear the selected file
                preview.src = '#';
                preview.style.display = 'none';
            } else {
                reader.readAsDataURL(file);
            }
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>


<!-- ... (remaining HTML code) ... -->


@endsection
