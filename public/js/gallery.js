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

    // Function to toggle "Delete All" button visibility
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

    // Event listener for select options change
    const selectOptions = document.getElementById('selectOptions');
    selectOptions.addEventListener('change', function () {
        const selectedValue = this.value;
        if (selectedValue === 'default') {
            location.reload(); // Reload the page to reset pagination to default
        } else {
            // Update the pagination based on selected value
            const url = new URL(window.location.href);
            url.searchParams.set('perPage', selectedValue);
            window.location.href = url.toString();
        }
    });

    // Get total pages from the pagination links
    const paginationLinks = document.querySelectorAll('.pagination .page-item');
    const totalPages = paginationLinks.length - 2; // Exclude "Previous" and "Next" links

    // Function to toggle pagination visibility
    function togglePaginationVisibility(totalPages) {
        const paginationItems = document.querySelectorAll('.pagination .page-item');
        paginationItems.forEach(function (item, index) {
            if (index < totalPages) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Get the initial selected value
    const initialSelectedValue = selectOptions.value;
    const initialPerPage = parseInt(initialSelectedValue);

    // Hide or show pagination based on initial perPage value
    if (initialPerPage === 'all') {
        togglePaginationVisibility(totalPages);
    }

    // Event listener for pagination links click
    paginationLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            const selectedValue = selectOptions.value;
            const perPage = parseInt(selectedValue);

            // Hide or show pagination based on the selected perPage value
            if (perPage === 'all') {
                togglePaginationVisibility(totalPages);
            }
        });
    });
});
function toggleCheckbox() {
    var checkboxContainer = document.getElementById("checkboxContainer");
    checkboxContainer.style.display = "block";
}
var grid = document.querySelector('.grid');
var masonry = new Masonry(grid, {
    itemSelector: '.grid-item',
    columnWidth: '.grid-sizer',
    gutter: 20 // Adjust this value as needed
});
$(document).ready(function() {
    // Select all image containers
    var $imageContainers = $('.image-container');

    // Loop through each image container
    $imageContainers.each(function(index) {
        // Generate random height for each image container
        var minHeight = 200; // Minimum height for image container
        var maxHeight = 400; // Maximum height for image container
        var randomHeight = Math.floor(Math.random() * (maxHeight - minHeight + 1)) + minHeight;

        // Set height for current image container
        $(this).css('height', randomHeight + 'px');
    });
});
