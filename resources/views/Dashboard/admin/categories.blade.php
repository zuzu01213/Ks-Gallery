@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Categories </h1>
</div>

@if (session()->has('success'))
<div class="alert alert-dark" role="alert">
    {{session('success')}}
</div>
@endif

<div class="table-responsive small col-lg-12  ">
    <a href="#" class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#createCategoryModal">Create new category</a>
    <table class="table custom-table-style">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>

                <th scope="col" style="padding-left: 88px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>

                <td class="between">
                    <a href="/dashboard/categories/{{ $category->slug }}/edit" class="action-link" style="background-color: #2C3E50;">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <form action="/dashboard/categories/{{ $category->slug }}" method="POST" style="display: inline;">
                        @method('delete')
                        @csrf
                        <button type="submit" class="action-btn" onclick="return confirm('Are you sure')">
                            <i class="bi bi-x-circle"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createCategoryModalLabel">Create New Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Form to create a new category -->
          <form id="createCategoryForm" action="{{ route('dashboard.categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="categoryName" class="form-label">Category Name</label>
              <input type="text" class="form-control" id="categoryName" name="categoryName">
            </div>
            <!-- Add more fields as needed for category creation -->
            <button type="submit" class="btn btn-secondary">Create Category</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include Bootstrap JavaScript (if not already included) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        // Submit form when modal form is submitted
        $('#createCategoryForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission
            var formData = $(this).serialize(); // Serialize form data
            // Example AJAX request to submit form data
            $.ajax({
                url: $(this).attr('action'), // Form action URL
                method: $(this).attr('method'), // Form method (POST)
                data: formData, // Serialized form data
                success: function(response) {
                    // Handle success response (e.g., close modal, show success message, etc.)
                    $('#createCategoryModal').modal('hide'); // Hide modal
                    // Optionally, you can show a success message or reload the page
                    alert('Category created successfully!');
                    // Example: Reload the page after category creation
                    // location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error response (e.g., show error message)
                    alert('Error creating category: ' + xhr.responseText);
                }
            });
        });
    });
</script>
@endsection
<style>
    .custom-table-style {
        background-color: #000000;
    }

    .action-link {
        color: white;
        margin-right: 10px;
        padding: 5px;
        border-radius: 5px;
        text-decoration: none;
        background-color: #116D6E;
    }

    .action-link:hover {
        opacity: 0.7;
    }

    .action-btn {
        color: #FAF6F0;
        border-radius: 5px;
        background-color: #CD1818;
        margin-right: 10px;
        padding: 5px;
        cursor: pointer;
        border: none;
    }

    .action-btn:hover {
        background-color: #E74C3C; /* Adjust as needed */
    }
</style>
