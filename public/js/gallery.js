document.addEventListener('DOMContentLoaded', function () {
    // Function to confirm image deletion
    function confirmDelete(event, imageId) {
        event.preventDefault();

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
                deleteImage(imageId);
            }
        });
    }

    // Event listener for image click to toggle checkbox
    document.querySelectorAll('.card-img-top').forEach(function (image) {
        image.addEventListener('click', function (event) {
            toggleCheckbox(event);
        });
    });

    // Function to toggle checkbox
    function toggleCheckbox(event) {
        const card = event.target.closest('.card');
        const checkbox = card.querySelector('.image-checkbox');
        checkbox.checked = !checkbox.checked;

        toggleDeleteAllButton();
    }

    // Event listener for select options change
    const selectOptions = document.getElementById('selectOptions');
    const images = document.querySelectorAll('.col.mb-3');

    selectOptions.addEventListener('change', function () {
        const selectedValue = this.value;
        images.forEach(function (image) {
            if (selectedValue === 'all') {
                image.style.display = 'block';
            } else {
                const index = parseInt(selectedValue);
                const imageIndex = Array.from(images).indexOf(image) + 1;
                image.style.display = imageIndex <= index ? 'block' : 'none';
            }
        });
    });

    // Function to toggle "Delete All" button visibility and handle deletion
    function toggleDeleteAllButton() {
        const deleteAllBtn = document.getElementById('deleteAllBtn');
        const checkboxes = document.querySelectorAll('.image-checkbox');
        const isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
        deleteAllBtn.style.display = isChecked ? 'inline-block' : 'none';
    }

    // Event listener for delete button click
    document.querySelectorAll('.delete-btn').forEach(function (button) {
        button.addEventListener('click', function (event) {
            var imageId = this.getAttribute('data-image-id');
            confirmDelete(event, imageId);
        });
    });

    // Event listener for "Delete All" button click
    const deleteAllBtn = document.getElementById('deleteAllBtn');
    deleteAllBtn.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent form submission
        deleteAllSelected();
    });

    // Function to delete a single image
    function deleteImage(imageId) {
        fetch('/dashboard/destroy/' + imageId, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
            .then(response => {
                if (response.ok) {
                    Swal.fire('Deleted!', 'Image has been deleted.', 'success').then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire('Error!', 'Failed to delete image.', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire('Error!', 'An error occurred while deleting image.', 'error');
            });
    }

    // Function to delete all selected images
    function deleteAllSelected() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete all!'
        }).then((result) => {
            if (result.isConfirmed) {
                const selectedImageIds = [];
                document.querySelectorAll('.image-checkbox:checked').forEach(function (checkbox) {
                    selectedImageIds.push(checkbox.getAttribute('data-image-id'));
                });

                fetch('/dashboard/destroy-selected', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ selected_images: selectedImageIds }),
                })
                    .then(response => {
                        if (response.ok) {
                            // Reload the page directly
                            location.reload();
                        } else {
                            // Handle the case where the deletion was not successful
                            location.reload();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        });
    }
});
