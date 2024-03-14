{{-- Upload Modal --}}
<head>
    <script src="{{ asset('js/modal.js') }}"></script>

</head>
<!-- Modal 1: Default Upload Modal -->
<div class="modal fade" id="chooseImageModal" tabindex="-1" aria-labelledby="chooseImageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chooseImageModalLabel">Choose Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.upload') }}" method="post" enctype="multipart/form-data" id="uploadForm" onsubmit="return validateForm()">
                    @csrf
                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Title:</label>
                        <input type="text" class="form-control" id="titleInput" name="title">
                        <span class="text-danger" id="titleError"></span>
                    </div>

                    <div class="mb-3">
                        <label for="imageInput" class="form-label">Choose Image File:</label>
                        <input type="file" class="form-control" id="imageInput" name="image" accept="image/*" onchange="previewImage(this)">
                        <span class="text-danger" id="imageError"></span>
                        <img id="imagePreview" alt="Image Preview" style="max-width: 100%; margin-top: 10px; display: none;">
                    </div>
                    <div class="mb-3">
                        <label for="categoryInput" class="form-label">Category:</label>
                        <select class="form-select" id="categoryInput" name="category_id">
                            <option value="">Select Category</option>
                            {{-- Loop through categories to populate options --}}
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="categoryError"></span>
                    </div>
                    <div class="modal-footer">
                        @if (auth()->check())
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Upload Files</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2: Upgrade Modal -->
<div class="modal fade" id="upgradeModal" tabindex="-1" aria-labelledby="upgradeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="upgradeModalLabel">Upgrade to Premium</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                </div>
                <p class="text-center text-danger">
                    You have exceeded the upload limit as a Basic Member. Please upgrade to Premium to continue uploading.
                </p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="{{ route('pricing.index') }}" class="btn btn-danger" style="background-color: gold; border: none; color:black">Upgrade Now</a>
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
                    <h5>{{ $image->title }}</h5>
                    <img id="viewImage" class="img-fluid" src="{{ asset('storage/' . ($image->draft_image ? $image->draft_image : $image->url)) }}" style="border-radius: 4px; margin: 6px">
                    <p><strong>Category:</strong> {{ $image->category->name }}</p> <!-- Menampilkan kategori -->
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
                            <input type="file" class="form-control" id="editImageInput{{ $image->id }}" name="image" accept="image/*" onchange="previewEditImage(this, {{ $image->id }})">
                            <img id="editImagePreview{{ $image->id }}" class="img-fluid" src="{{ asset('storage/' . ($image->draft_image ? $image->draft_image : $image->url)) }}" style="max-width: 100%; margin-top: 16px; border-radius: 5px;">
                        </div>
                        <div class="mb-3">
                            <label for="editCategoryInput{{ $image->id }}" class="form-label">Choose Category:</label>
                            <select class="form-select" id="editCategoryInput{{ $image->id }}" name="category_id">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $image->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" onclick="submitEditForm({{ $image->id }})">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

