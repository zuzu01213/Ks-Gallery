{{-- <html>
<body>

<form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <button type="submit">Upload</button>
</form>

<div>
    @foreach ($images as $image)
        <img src="{{ asset('uploads/' . $image->nama_file) }}" alt="Uploaded Image">
    @endforeach
</div>

</body>
</html> --}}
@extends('dashboard.layouts.main')

@section('container')
<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome, {{auth()->user()->name}}</h1>

    <div class="align-items-center">

        @if(auth()->user()->is_admin)
            <span class="badge bg-danger text-dark me-2 p-2" style="font-size: 16px;border: 2px solid coral;">Admin Member</span>
        @elseif(auth()->user()->is_premium)
            <span class="badge bg-warning text-dark me-2 p-2" style="font-size: 16px;border: 2px solid coral;">Premium Member</span>
        @elseif( auth()->user()->posts_limit <= 1)
            <span class="badge bg- text-dark me-2 p-2" style="font-size: 16px;border: 2px solid coral;">Basic Member</span>
            <span class="badge bg- text-dark me-2 p-2" style="font-size: 16px; background-color: transparent;border: 2px solid coral;">Limited only 10 post</span>
        @else
            <span class="badge bg- text-dark me-2 p-2" style="font-size: 16px; background-color: transparent;border: 2px solid coral;">Basic Member</span>
        @endif

    </div>
</div>
<div class="premium-ad-container">
    <div class="premium-ad-content">
        <span class="close-button" onclick="closePremiumAd()">X</span>
        <div class="ad-text-content">
            <p class="title">
                <strong>
                    <span class="percent_test hide_text_mobile banner_h1_text">Think big, create bigger</span>
                </strong>
            </p>
            <p class="text_test hide_text_mobile banner_h2_text" style="color: #808080; font-size: 14px;">Rule your creativity with 35%OFF</p>
            <p class="text_test country_text_margin banner_h3_text" style="color: #808080; font-size: 14px;">The discount is applicable in your country only</p>
            <a href="#" class="premium-button">Go Premium</a>
        </div>
        <!-- Premium ad content -->
        <img class="premium-ad-image" src="https://freepik.cdnpk.net/img/banner/microfunnel-flaticon.png" alt="Freepik Microfunnel">
    </div>
</div>


<style>
  .premium-ad-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #22244E;
    padding: 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    color: white;
    z-index: 1000;
    max-width: 300px;
    border-radius: 8px;
}

.premium-ad-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.ad-text-content {
    text-align: left;
}

.premium-ad-image {
    max-width: 100%;
    height: 100%;
    object-fit: cover; /* Agar gambar di-crop dan tetap sesuai ukuran */
    object-position: right; /* Agar gambar ditempatkan di sebelah kanan */
    border-radius: 8px;
}

.premium-button {
    background-color: #ffcc00;
    padding: 10px 20px;
    border: none;
    color: #000;
    font-weight: bold;
    text-decoration: none;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease-in-out;
}

.premium-button:hover {
    background-color: #ffc200;
}

</style>
<script>
    function closePremiumAd() {
        document.querySelector('.premium-ad-container').style.display = 'none';
    }
</script>
@endsection



