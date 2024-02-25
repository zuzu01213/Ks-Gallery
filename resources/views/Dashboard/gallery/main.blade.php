@extends('dashboard.layouts.main')
@section('container')
<style>

    .btn-gold {
        background-color: gold;
        color: black;
        transition: background-color 0.3s ease, color 0.3s ease;

    }

    .btn-gold:hover {
        background-color: darkorange;
        color: black;
    }

    .btn-gold svg {
        margin-right: 5px;
        transition: transform 0.3s ease;
    }

    .btn-gold:hover svg {
    transform: translateY(-5px);
}

.btn-gold .text {
    margin-right: 8px;
}
.like-container {
        cursor: pointer;
        margin: 4px;
        transition: color 0.3s ease;
    }


    .like-container.loved {
        color: red;
    }
    .modal-body {
        max-height: 60vh;
        overflow-y: auto;
    }
    .modal-header .button-close {
        border: none;
    outline: none; /* Menghilangkan garis tepi (outline) saat tombol mendapatkan fokus */
    box-shadow: none; /* Menghilangkan box-shadow yang memberikan kesan border */
}
</style>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
    <h1 class="h2">All of your gallery, {{ auth()->user()->name }}</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <button type="button" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#chooseImageModal" style="cursor: pointer; background-color: #116D6E; border: 1px solid black;">
            All (Images)
        </button>
        <button type="button" class="btn btn-warning mb-3" style="cursor: text; background-color: #CD1818;">Upload Available: 10</button>
        <!-- Button to trigger modal -->
        <button type="button" class="btn btn-gold mb-3" data-bs-toggle="modal" data-bs-target="#chooseImageModal">
            <span class="text">Upload Files</span>
            <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                    <path d="M8.794 1.354a.5.5 0 0 1 .5.5V12a.5.5 0 1 1-1 0V1.854a.5.5 0 0 1 1 0V12a1.5 1.5 0 0 0 3 0V2.5a.5.5 0 0 1 1 0V12a2.5 2.5 0 0 1-5 0V1.854a.5.5 0 0 1 .5-.5zM0 14a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </span>
        </button>
    </div>

    <div class="col-md-6 ms-auto">
        <div class="input-group mb-3 justify-content-end">
            <div class="col-3" style="margin-right: 5px;">
                <select class="form-select custom-input" name="category" aria-label="Select Category" style="width: 130px; margin-right: 20px;">
                    <option value="">Select Categories</option>
                    <!-- Add your categories options here -->
                </select>
            </div>
            <div class="col-5">
                <input type="text" class="form-control custom-input" placeholder="My cars image.." name="search" value="{{ request('search') }}" style="border: 1px solid black">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-secondary custom-btn" style="background-color: black; color: white;" type="submit">Search</button>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-between mb-0">
    <div class="col-md-6">
        <form   class="d-flex">
            {{-- @csrf
            @method('delete') --}}
        <button type="button" class="btn btn-warning mb-3" style="cursor: text; background-color: navy; border:none; color: white;">
            Publish
        </button>
        <button type="button" class="btn btn-warning mb-3" style="cursor: text; background-color: navy; color: white; margin-left:3px; border:none">
            Revert to draft
        </button>
        <button type="button" class="btn btn-danger mb-3" id="toggleSelection" style="background-color: navy; color: white; margin-left:3px; border:none">
            Select Post
        </button>
        <button type="button" class="btn btn-danger mb-3" id="deleteSelected" style="color: white; display: none; margin-left:3px; border:none">
            Delete Selected
        </button>
        </form>
    </div>
    <span style="font-size: 18px; font-weight: bold;" > </span>
    <div>
        <select>

            <option >
                All
            </option>
        </select>
    </div>
</div>
@include('dashboard.gallery.chooseimagemodal')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="successAlert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif



<div class="row mt-4">
    @foreach($images as $image)
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="{{ asset('storage/' . $image->url) }}" alt="{{ $image->title }}">
                <div class="card-body">
                    <h5 style="font-size: 20px, margin: 9px">{{ $image->title }}</h4>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-md btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewImageModal{{ $image->id }}">
                                View
                            </button>
                            <button type="button" class="btn btn-md btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editImageModal{{ $image->id }}">
                                Edit
                            </button>
                            <form action="{{ route('dashboard.destroy', ['id' => $image->id]) }}" method="post" id="deleteForm{{ $image->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-md btn-outline-danger" onclick="confirmDelete(event, '{{ $image->id }}')" type="button" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endforeach
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
   function uploadFiles() {
    if (!validateForm()) {
        return; // Exit if form validation fails
    }

    var form = document.getElementById('uploadForm');
    var formData = new FormData(form);

    $.ajax({
        url: form.action,
        method: form.method,
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            // Optionally, close the modal or show a success message
            $('#chooseImageModal').modal('hide');

            // Show a success message
            showMessage('success', 'Files uploaded successfully!');

            // Use SweetAlert's onClose event to handle removing the backdrop
            Swal.fire({
                title: 'Success',
                text: 'Files uploaded successfully!',
                icon: 'success',
                onClose: function () {
                    // Remove modal backdrop manually
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                }
            });
        },
        error: function (error) {
            console.error('Error:', error);
            var errorMessage = 'Failed to upload files.';

            if (error.status === 422) {
                // If there are validation errors on the server side
                var errors = error.responseJSON.errors;
                errorMessage += '<ul>';
                for (var key in errors) {
                    errorMessage += '<li>' + errors[key][0] + '</li>';
                }
                errorMessage += '</ul>';
            }

            Swal.fire('Error', errorMessage, 'error');
        }
    });
}

function confirmDelete(event, imageId) {
    event.preventDefault(); // Prevent default form submission

    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // If the user chooses 'Yes', submit the deletion form
            document.getElementById('deleteForm' + imageId).submit();
        }
    });
}


function validateForm() {
    // Perform form validation here
    var titleInput = document.getElementById('titleInput').value;
    var imageInput = document.getElementById('image').value;

    if (titleInput.trim() === '' || imageInput.trim() === '') {
        alert('Please fill in all required fields.');
        return false;
    }

    return true;
}

function previewImage() {
    var input = document.getElementById('image');
    var preview = document.getElementById('imagePreview');
    var file = input.files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
        preview.style.display = 'block';
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
}

// Call previewImage() when the page is loaded to match the initial status
document.addEventListener('DOMContentLoaded', function () {
    previewImage();
});

// Assuming you have an event listener for form submission
document.getElementById('uploadForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent default form submission
    uploadFiles(); // Call your upload function
});

// Assuming you have an event listener for delete button click
document.getElementById('deleteButton').addEventListener('click', function () {
    var title = 'Title'; // Provide the title dynamically if needed
    var imageId = '123'; // Provide the image ID dynamically if needed
    confirmDelete(title, imageId); // Call your delete confirmation function
});

function uploadFiles() {
    var form = document.getElementById('uploadForm');
    var formData = new FormData(form);

    $.ajax({
        url: form.action,
        method: form.method,
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);

            // Reload the page after successful upload
            location.reload();

            // Show a success message
            Swal.fire('Success', 'Files uploaded successfully!', 'success');
        },
        error: function (error) {
            console.error(error);

            // Show an error message
            Swal.fire('Error', 'Failed to upload files', 'error');
        }
    });
}

function showImage(imageUrl) {
        var imgElement = document.getElementById('viewImage');
        imgElement.src = imageUrl;
    }
</script>



@endsection
