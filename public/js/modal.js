
    // Fungsi untuk pratinjau gambar
    function previewImage(input) {
        var file = input.files[0];
        var reader = new FileReader();
        var preview = document.getElementById('imagePreview');

        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = file ? 'block' : 'none'; // Tampilkan pratinjau jika ada file, jika tidak, sembunyikan
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    // Function to validate form
    function validateForm() {
        var titleInput = document.getElementById('titleInput').value.trim();
        var imageInput = document.getElementById('imageInput').files[0];
        var categoryInput = document.getElementById('categoryInput').value.trim();

        if (!titleInput || !imageInput || !categoryInput) {
            displayModalError('Please fill in all required fields.');
            return false;
        }

        return true;
    }

    // Function to display error message in modal
    function displayModalError(errorMessage) {
        document.getElementById('categoryError').innerHTML = errorMessage;
        document.getElementById('categoryError').style.display = 'block';
    }

    // Function to hide error message in modal
    function hideModalError() {
        document.getElementById('categoryError').innerHTML = '';
        document.getElementById('categoryError').style.display = 'none';
    }

    // Event listener untuk menutup modal
    $('#chooseImageModal').on('hide.bs.modal', function () {
        hideModalError(); // Sembunyikan pesan kesalahan saat modal ditutup
    });

  document.addEventListener('DOMContentLoaded', function () {
    // Function to upload files
    function uploadFiles() {
        if (!validateForm()) {
            return;
        }

        var form = document.getElementById('uploadForm');
        var formData = new FormData(form);

        $.ajax({
            url: form.action,
            method: form.method,
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token header
            },
            success: function (response) {
                console.log('Upload success:', response);
                $('#chooseImageModal').modal('hide');
                showMessage('success', 'Files uploaded successfully!');
                location.reload(); // Refresh the page
            },
            error: function (xhr, status, error) {
                console.error('Upload error:', error);
                var errorMessage = 'Failed to upload files.';
                if (xhr.status === 422) {
                    errorMessage += '<ul>';
                    $.each(xhr.responseJSON.errors, function (key, value) {
                        errorMessage += '<li>' + value[0] + '</li>';
                    });
                    errorMessage += '</ul>';
                } else {
                    errorMessage += ' An error occurred while processing your request. Please try again later.';
                }
                showMessage('error', errorMessage);
            }
        });
    }




        // Event listener for form submission
        if (document.getElementById('uploadForm')) {
            document.getElementById('uploadForm').addEventListener('submit', function (event) {
                event.preventDefault();
                uploadFiles();
            });
        }



        // Function to show a message using SweetAlert
        function showMessage(type, message) {
            Swal.fire({
                title: type.charAt(0).toUpperCase() + type.slice(1),
                text: message,
                icon: type,
                onClose: function () {
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                }
            });
        }

        // Hide alert message after 2 seconds
        setTimeout(function () {
            $('#alert').fadeOut('slow');
        }, 2000);
    });
    function previewEditImage(input, imageId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#editImagePreview' + imageId).attr('src', e.target.result);
                $('#editImagePreview' + imageId).show();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function submitEditForm(imageId) {
        var formId = '#editForm' + imageId;
        $(formId).submit();
    }


