{{-- Upload Modal --}}
<div class="modal fade" id="chooseImageModal" tabindex="-1" aria-labelledby="chooseImageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chooseImageModalLabel">Choose Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.upload') }}" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" id="uploadForm">
                    @csrf
                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Title:</label>
                        <input type="text" class="form-control" id="titleInput" name="title">
                    </div>


                    <div class="mb-3">
                        <label for="imageInput" class="form-label">Choose Image File:</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage()" maxlength="8388608">
                        <img id="imagePreview" alt="Image Preview" style="max-width: 100%; margin-top: 10px; display: block; overflow: hidden;">
                    </div>

                    <div class="mb-3">
                        <label for="categoryInput" class="form-label">Choose Category:</label>
                        <select class="form-select" id="categoryInput" name="category">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" onclick="uploadFiles()">Upload Files</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@foreach($images as $image)
    <!-- View Modal -->
    <div class="modal fade" id="viewImageModal{{ $image->id }}" tabindex="-1" aria-labelledby="viewImageModalLabel{{ $image->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewImageModalLabel{{ $image->id }}">View Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 >{{ $image->title }}</h5>
                    <img id="viewImage" class="img-fluid" src="{{ asset('storage/' . $image->url) }}"  style="border-radius: 4px, margin: 6px">
                </div>
            </div>
        </div>
    </div>

@endforeach


@foreach($images as $image)
<!-- Edit modal -->
<div class="modal fade" id="editImageModal{{ $image->id }}" tabindex="-1" aria-labelledby="editImageModalLabel{{ $image->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editImageModalLabel{{ $image->id }}">Edit Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.update', ['id' => $image->id]) }}" method="POST" enctype="multipart/form-data" id="editForm{{ $image->id }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="editTitleInput{{ $image->id }}" class="form-label">Title:</label>
                        <input type="text" class="form-control" id="editTitleInput{{ $image->id }}" name="title" value="{{ $image->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="editImageInput{{ $image->id }}" class="form-label">Choose New Image:</label>
                        <input type="file" class="form-control" id="editImageInput{{ $image->id }}" name="image" accept="image/*">
                        <img id="editImagePreview{{ $image->id }}" class="img-fluid" src="{{ asset('storage/' . $image->url) }}" style="max-width: 100%; margin-top: 16px; display: block; overflow: hidden; border-radius: 5px">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="submitForm({{ $image->id }})">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    // Function to update the preview image when a new image is selected
    function updatePreview(input, previewId) {
        var preview = document.getElementById(previewId);
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        };

        if (file) {
            // If a new file is selected, update the preview image
            reader.readAsDataURL(file);
        }
    }

    // Function to submit the form when Save Changes button is clicked
    function submitForm(imageId) {
        var form = document.getElementById('editForm' + imageId);
        form.submit();
    }

    // Attach onchange event listener to each file input
    document.querySelectorAll('input[type="file"]').forEach(function(input) {
        input.addEventListener('change', function() {
            var previewId = 'editImagePreview' + this.id.substring(14);
            updatePreview(this, previewId);
        });
    });
</script>


{{-- <div class="like-container" data-image-id="{{ $image->id }}" data-like-count="{{ $image->likes_count }}">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="bi bi-heart" style="vertical-align: text-top; margin-right: 8px;">
        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C15.09 3.81 16.76 3 18.5 3 21.58 3 24 5.42 24 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
    </svg>
    <span class="like-count">{{ $image->likes_count }}</span>
</div> --}}
