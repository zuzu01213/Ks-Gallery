<head>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/medium-zoom@latest/dist/medium-zoom.min.js"></script>
    <script src="{{ asset('js/photo.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/photo.css') }}">
    <script>
        $(document).ready(function() {
            var zoomed = false;

            // Inisialisasi Magnific Popup pada gambar
            $('.zoomable').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-img-mobile',
                image: {
                    verticalFit: true
                },
                callbacks: {
                    open: function() {
                        // Sembunyikan tombol close default pada popup
                        $('.mfp-close').css('display', 'none');
                        // Set status zoomed menjadi true saat gambar diperbesar
                        zoomed = true;
                    },
                    close: function() {
                        // Set status zoomed menjadi false saat popup ditutup
                        zoomed = false;
                    }
                }
            });

            // Deteksi klik pada gambar
            $('.zoomable').on('click', function() {
                // Periksa apakah gambar sudah diperbesar
                if (zoomed) {
                    // Jika sudah diperbesar, tutup popup
                    $.magnificPopup.close();
                }
            });
        });
    </script>
</head>

@foreach($images as $image)
<div class="modal fade" id="photoModal{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="photoModalLabel{{$image->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1250px;">
        <div class="modal-content">
            <div class="modal-header" style="margin-bottom: 20px">
                <!-- User Profile -->
                <div class="user-profile position-absolute top-0 start-0 m-2 d-flex align-items-center">
                    <img src="https://source.unsplash.com/50x50/?profile" alt="User Profile" width="40px" height="40px" style="border-radius: 20px; object-fit: cover; image-rendering: auto;">
                    <span style="color: black; font-size: 18px; margin-left: 10px;">{{ $image->user->name }}</span>
                </div>
                <!-- Actions -->
                <div class="modal-actions position-absolute top-0 end-0 m-2 d-flex align-items-center">
                    <!-- Love button -->
                    <button class="btn btn-light action-button me-2">
                        <img src="{{ asset('images/like.png') }}" alt="Love" width="20px" height="20px">
                    </button>
                    <!-- Add button -->
                    <button class="btn btn-light action-button me-2">
                        <img src="{{ asset('images/plus.png') }}" alt="Add" width="20px" height="20px">
                    </button>
                    <!-- Download button with dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="downloadDropdown{{$image->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Download
                        </button>
                        <div class="dropdown-menu" aria-labelledby="downloadDropdown{{$image->id}}">
                            <a class="dropdown-item" href="#">Small</a>
                            <a class="dropdown-item" href="#">Medium</a>
                            <a class="dropdown-item" href="#">Large</a>
                            <!-- Add more options as needed -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body d-flex justify-content-center" style="min-height: 600px;">
                <img src="{{ asset('storage/' . $image->url) }}" class="img-fluid mx-auto zoomable" style="object-fit: cover; max-height: 1200px; max-width: 1000px; cursor: zoom-in;" data-action="click">
            </div>
            <div class="modal-footer">
                <div class="float-left mb-2">
                    <span class="font-weight-bold">Views:</span>
                    @if($image->views == 0)
                        <span>------</span>
                    @else
                        <span>{{ $image->views }}</span>
                    @endif
                </div>
                <div class="float-left mb-2">
                    <span class="font-weight-bold">Download:</span>
                    @if($image->download == 0)
                        <span>------</span>
                    @else
                        <span>{{ $image->download }}</span>
                    @endif
                </div>
                <div class="float-left">
                    <span class="font-weight-bold">Featured in:</span>
                    <span style="font-weight: bold">{{ $image->category->name }}</span>
                </div>
                <div class="float-right mt-2">
                    <button class="btn btn-light me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M11.354 2.646a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-9 9a.5.5 0 0 1-.364.156H3.5a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .156-.364l9-9zM12 4.793L11.207 4l-1.5 1.5L10.793 7l1.5-1.5L12 4.793z"/>
                        </svg>
                        Edit
                    </button>
                    <button class="btn btn-light me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share-fill" viewBox="0 0 16 16">
                            <path d="M7.5 1a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h4.5V2H2v12h5v-1.5a.5.5 0 0 1 1 0v3a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 .5-.5h6z"/>
                        </svg>
                        Share
                    </button>
                    <button class="btn btn-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                            <path d="M8 1.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13zm0 8a.5.5 0 0 1-.5-.5V7a.5.5 0 0 1 1 0v2.5a.5.5 0 0 1-.5.5zm0-5a.5.5 0 0 1-.5-.5v-.002a.5.5 0 1 1 1 0V5a.5.5 0 0 1-.5.5z"/>
                        </svg>
                        Info
                    </button>
                </div>
            </div>
            <div class="d-flex align-items-center me-auto" style="margin-left: 14px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-clock me-1" viewBox="0 0 16 16">
                    <path fill="grey" d="M8 1.5a6.5 6.5 0 0 1 6.5 6.5 6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 6.5-6.5zM9 4a.5.5 0 0 0-1 0v4.5a.5.5 0 0 0 .252.438l3 1.5a.5.5 0 0 0 .496-.868L9 8.707V4z"/>
                </svg>
                <span class="font-weight-bold me-3" style="color: grey; font-size: 16px;">Published {{ $image->created_at }}</span>
            </div>
            <!-- Move License section below -->
            <div class="d-flex align-items-center me-auto" style="margin-left: 14px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-shield-check-fill me-1" viewBox="0 0 16 16">
                    <path fill="grey" d="M5.396 11.912l-3.103 1.344a.5.5 0 0 1-.593-.804L4.958 8 2.7 5.548a.5.5 0 0 1 .297-.832l3.556-.517L7.83 1.52a.5.5 0 0 1 .34-.27l2.775-.693a.5.5 0 0 1 .564.802l-1.74 2.17 3.53.967a.5.5 0 0 1 .29.823l-3.064 3.1a.5.5 0 0 1-.386.132l-2.573-.643-1.705 2.122a.5.5 0 0 1-.802-.562l.78-.978z"/>
                </svg>
                <span class="font-weight-bold me-3" style="color: grey; font-size: 16px;">Free to use under the K's Gallery License</span>
            </div>
            <p style="font-size: 28px; font-weight: bold; margin-left: 14px; margin-top:50px">Related Images </p>
            <div>

            </div>
            <p style="font-size: 28px; font-weight: bold; margin-left: 14px; margin-top:50px">Related collections </p>
            <div>

            </div>
        </div>
    </div>
    <div class="position-fixed top-50 start-0 translate-middle-y" style="margin-left: 40px;">
        <!-- Left arrow -->
        <button class="btn btn-light me-2" onclick="previousImage()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M3.854 8.646a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708.708L4.707 8l2.855 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708z"/>
                <path fill-rule="evenodd" d="M13.5 8a.5.5 0 0 1-.5.5H5a.5.5 0 0 1 0-1h8a.5.5 0 0 1 .5.5z"/>
            </svg>
        </button>
    </div>

    <div class="position-fixed top-50 end-0 translate-middle-y" style="margin-right: 55px;">
        <!-- Right arrow -->
        <button class="btn btn-light me-2" onclick="nextImage()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12.146 8.646a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L11.293 8l-2.855 2.646a.5.5 0 1 0 .708.708l3-3a.5.5 0 0 0 0-.708z"/>
                <path fill-rule="evenodd" d="M2.5 8a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 0-1H3a.5.5 0 0 0-.5.5z"/>
            </svg>
        </button>
    </div>
</div>


@endforeach



