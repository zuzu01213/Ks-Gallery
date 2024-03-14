@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Categories </h1>
</div>

@if (session()->has('success'))
<div id="alert" class="alert alert-dark alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                    <button type="button" class="action-link" data-id="{{ $category->id }}" data-name="{{ $category->name }}" style="border: none">
                        <i class="bi bi-pencil-square"></i> Edit
                    </button>

                    <button type="button" class="action-btn delete-btn" data-id="{{ $category->id }}">
                        <i class="bi bi-x-circle"></i> Delete
                    </button>
                    <form id="deleteForm{{ $category->id }}" action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST" style="display: none;">

                        @method('delete')
                        @csrf
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
            <form action="{{ route('categories.store') }}" method="POST" style="margin-top: 20px;">
                @csrf
                <div style="margin-bottom: 10px;">
                    <label for="name" style="display: block; font-weight: bold;">Category Name:</label>
                    <input type="text" id="name" name="name" style="width: 100%; padding: 8px; border-radius:6px; margin-top:10px">
                </div>
                <button type="submit" style="background-color: brown; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 5px;">Create Category</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCategoryForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="edit-category-name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="edit-category-name" name="name">
                    </div>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include Bootstrap JavaScript (if not already included) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>

<!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
   $(document).ready(function() {
    // Delete button click event
    $('.delete-btn').click(function() {
        var categoryId = $(this).data('id');
        // Show SweetAlert confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            // If user confirms deletion
            if (result.isConfirmed) {
                // Submit the form for deletion
                $('#deleteForm' + categoryId).submit();
            }
        });
    });
    // Edit button click event
    $('.edit-btn').click(function() {
        var categoryId = $(this).data('id');
        var categoryName = $(this).data('name');

        // Fill form fields with category data
        $('#edit-category-name').val(categoryName);

        // Set the action attribute of the form to the correct URL
        $('#editCategoryForm').attr('action', '/dashboard/categories/' + categoryId);

        // Show the modal
        $('#editCategoryModal').modal('show');
    });

    // Close the alert after 2 seconds
    setTimeout(function() {
        $('#alert').fadeOut('slow');
    }, 2000);
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
