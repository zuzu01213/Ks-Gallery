@extends('layouts.main')
<!doctype html>

<html lang="en" data-bs-theme="auto">
  <head>
    <title>K's Gallery | Welcome to my gallery</title>
    <link rel="stylesheet" href="css/home.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
  <body>

<main>
 <div class="body-play">
    <section class="py-5 text-center container">
        <div class="row py-lg-5" style="padding-top: 4rem !important; padding-bottom: 2rem !important;">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h1 class="fw-light">K's Gallery</h1>
                <p class="lead">High-quality photos, videos, vectors, PSD, icons... to go from ideas to outstanding designs</p>

                <div class="input-group justify-content-center mb-3">
                    <input type="text" class="form-control custom-input-height" style="width: 500px;" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary custom-btn" style="background-color: brown; color: white; border: brown; transition: background-color 0.3s ease-in-out;" onmouseover="this.style.backgroundColor='rgb(72, 31, 72)'" onmouseout="this.style.backgroundColor='brown'" type="submit">Search</button>
                </div>
            </div>
                    <div class="container">
                        <ul class="menu d-flex justify-content-center">
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-img-container">
                                        <img src="{{ asset('images/vec.jpg') }}" alt="Vector Image" class="menu-img">
                                    </div>
                                </a>
                                <a href="#"><span class="menu-span">Vectors</span></a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-img-container">
                                        <img src="https://images.hdqwalls.com/wallpapers/gigi-hadid-vogue-4k-f0.jpg" alt="Photo Image" class="menu-img">
                                    </div>
                                </a>
                                <a href="#"><span class="menu-span">Photos</span></a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-img-container">
                                        <video id="hoverVideo" src="{{ asset('videos/video1.mp4') }}" alt="Video" class="menu-img" autoplay muted playsinline></video>
                                    </div>
                                </a>
                                <a href="#"><span class="menu-span">Videos</span></a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-img-container">
                                        <img src="{{ asset('images/psd1.jpg') }}" alt="PSD Image" class="menu-img">
                                    </div>
                                </a>
                                <a href="#"><span class="menu-span">PSD</span></a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-img-container">
                                        <img src="{{ asset('images/temp.jpg') }}" alt="Template Image" class="menu-img">
                                    </div>
                                </a>
                                <a href="#"><span class="menu-span">Templates</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container-premium" style="display: inline-block; width: 100%;">
        <img class="image-banner" src="https://fps.cdnpk.net/autopromos/gam/banner-middle-new.svg" alt="Image banner" loading="lazy" decoding="async" data-nimg="1">
        <div class="premium-content">
            <p>Hundreds of ideas need hundreds of downloads, don’t they?</p>
            <a href="/pricing/" class="premium-button">Go Premium</a>
        </div>
    </div>

<section class="designer-grid">
    <h2 style="font-weight: bold">Designers’ faves</h2>
    <p style="margin-bottom: 50px">Check out what’s getting the most olés on K's Gallery right now</p>
    <div class="gallery">
        <figure class="gallery__item gallery__item--1">
            <img src="images/city.jpg" alt="Gallery image 1" class="gallery__img">
            <div class="figcaption-container">
                <figcaption>Dark Academia</figcaption>
            </div>
        </figure>
        <figure class="gallery__item gallery__item--2">
            <img src="images/sea.jpg" alt="Gallery image 2" class="gallery__img">
            <div class="figcaption-container">
                <figcaption>Sea Wallpaper</figcaption>
            </div>
        </figure>
        <figure class="gallery__item gallery__item--3">
            <video controls loop muted preload="auto" playsinline autoplay>
              <source src="videos/jade.mp4" type="video/mp4">
            </video>
            <div class="banner">
                <i class="fas fa-play"></i>
              </div>
            <div class="figcaption-container">
              <figcaption style="font-size: 20px">Live Wallpaper</figcaption>
            </div>
        </figure>
        <figure class="gallery__item gallery__item--4">
            <img src="images/art2.jpg" alt="Gallery image 4" class="gallery__img">
            <div class="figcaption-container">
                <figcaption>Fantasy Art</figcaption>
            </div>
        </figure>
        <figure class="gallery__item gallery__item--5">
            <img src="images/phone.jpg" alt="Gallery image 5" class="gallery__img">
            <div class="figcaption-container">
                <figcaption>Phone Wallpaper</figcaption>
            </div>
        </figure>
        <figure class="gallery__item gallery__item--6">
            <img src="images/cars.jpg" alt="Gallery image 6" class="gallery__img">
            <div class="figcaption-container">
                <figcaption>Aesthetic Photos</figcaption>
            </div>
        </figure>
    </div>
</section>
</main>
@auth
<div class="premium-ad-container" id="premiumAdContainer">
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
@endauth
<div style="display: flex; justify-content: flex-start; align-items: flex-start; margin: 100px;">
    <div style="text-align: left;">
        <header>
            <h2 style="font-size: 1em; margin-bottom: 10px; color: brown;">COLLECTIONS</h2>
            <h3 style="font-size: 3em; font-weight: bold; margin-bottom: 15px;">Extraordinary, in a nutshell</h3>
            <div style="display: flex; align-items: center;">
                <p style="font-size: 1.2em; margin-right: 200px;">
                    Get the inspiration you need with our curated collections and boost your creativity
                </p>
                <button class="btn btn-dark custom-btn" style="margin-left: 100px">
                    Explore Collections
                    <span class="ml-2" style="font-size: 1.2em;">&rarr;</span>
                </button>
            </div>
        </header>
    </div>
</div>
{{-- <div class="collection-container">
    <div>
        <img src="images/sea.jpg" alt="">
        <img src="images/sea.jpg" alt="">
        <img src="images/sea.jpg" alt="">
        <span>Curator's Choice Photos</span>
        <span>80 resources</span>
    </div>
    <div>
        <img src="images/sea.jpg" alt="">
        <img src="images/sea.jpg" alt="">
        <img src="images/sea.jpg" alt="">
        <span>Curator's Choice Photos</span>
        <span>80 resources</span>
    </div>
    <div>
        <img src="images/sea.jpg" alt="">
        <img src="images/sea.jpg" alt="">
        <img src="images/sea.jpg" alt="">
        <span>Curator's Choice Photos</span>
        <span>80 resources</span>
    </div>
    <div>
        <img src="images/sea.jpg" alt="">
        <img src="images/sea.jpg" alt="">
        <img src="images/sea.jpg" alt="">
        <span>Curator's Choice Photos</span>
        <span>80 resources</span>
    </div>
</div> --}}
<div class="benefits-section">
    <div class="benefits-content">
        <h4 style="font-size: 1.5em; color: brown;">BENEFITS</h4>
        <h2 style="font-weight: bold; font-size: 3em; margin-bottom:10px;">Let’s make your ideas break through</h2>
        <p style="font-size: 1em;">Find the most up-to-date vocabulary of images, videos, signs, symbols, and fonts</p>
    </div>

    <div style="display: flex; margin-top:18px; justify-content:space-around">
        <div class="benefit-item">
            <div class="benefit-icon">
                <video src="https://fps.cdnpk.net/home/benefits/benefit-quality.mp4" width="70" height="70" autoplay="" loop="" muted="" playsinline="" disableremoteplayback=""></video>
            </div>
            <h5>Best quality or nothing</h5>
            <p>Download scroll-stopping images of the highest quality to make professional designs.</p>
        </div>

        <div class="benefit-item">
            <div class="benefit-icon">
                <video src="https://fps.cdnpk.net/home/benefits/benefit-ready.mp4" width="70" height="70" autoplay="" loop="" muted="" playsinline="" disableremoteplayback=""></video>
            </div>
            <h5>Ready-to-use everything</h5>
            <p>From thousands of ready-to-publish images to our online editor, we work to get your project ready double-quick.</p>
        </div>

        <div class="benefit-item">
            <div class="benefit-icon">
                <video src="https://fps.cdnpk.net/home/benefits/benefit-content.mp4" width="70" height="70" autoplay="" loop="" muted="" playsinline="" disableremoteplayback=""></video>
            </div>
            <h5>Fresh content every day</h5>
            <p>Our library is updated on a daily basis so you can find the newest and trendiest photos and designs.</p>
        </div>

        <div class="benefit-item">
            <div class="benefit-icon">
                <video src="https://fps.cdnpk.net/home/benefits/benefit-think.mp4" width="70" height="70" autoplay="" loop="" muted="" playsinline="" disableremoteplayback=""></video>
            </div>
            <h5>If you can think of it, you can find it</h5>
            <p>Guaranteed search results: there’s an image and style for every project you might think of.</p>
        </div>
    </div>
</div>
<div class="first-img-line" style="margin: 40px;">
    <div class="mov-img-container">
        <img src="https://source.unsplash.com/800x600/?unsplash+nature&t=<?= time() ?>" alt="Random Image 1">
        <img src="https://source.unsplash.com/800x600/?unsplash+landscape&t=<?= time() + 1 ?>" alt="Random Image 2">
        <img src="https://source.unsplash.com/800x600/?unsplash+beach&t=<?= time() + 2 ?>" alt="Random Image 3">
        <img src="https://source.unsplash.com/800x600/?unsplash+mountain&t=<?= time() + 3 ?>" alt="Random Image 4">
        <img src="https://source.unsplash.com/800x600/?unsplash+forest&t=<?= time() + 4 ?>" alt="Random Image 5">
        <img src="https://source.unsplash.com/800x600/?unsplash+waterfall&t=<?= time() + 5 ?>" alt="Random Image 6">
        <img src="https://source.unsplash.com/800x600/?unsplash+sunset&t=<?= time() + 6 ?>" alt="Random Image 7">
        <img src="https://source.unsplash.com/800x600/?unsplash+ocean&t=<?= time() + 7 ?>" alt="Random Image 8">
        <img src="https://source.unsplash.com/800x600/?unsplash+animals&t=<?= time() + 8 ?>" alt="Random Image 9">
        <img src="https://source.unsplash.com/800x600/?unsplash+birds&t=<?= time() + 9 ?>" alt="Random Image 10">
    </div>
</div>
<div class="sec-img-line" style="margin: 40px;">
    <div class="mov-img-container">
        <img src="https://source.unsplash.com/800x600/?unsplash+nature&t=<?= time() + 10 ?>" alt="Random Image 11">
        <img src="https://source.unsplash.com/800x600/?unsplash+landscape&t=<?= time() + 11 ?>" alt="Random Image 12">
        <img src="https://source.unsplash.com/800x600/?unsplash+beach&t=<?= time() + 12 ?>" alt="Random Image 13">
        <img src="https://source.unsplash.com/800x600/?unsplash+mountain&t=<?= time() + 13 ?>" alt="Random Image 14">
        <img src="https://source.unsplash.com/800x600/?unsplash+forest&t=<?= time() + 14 ?>" alt="Random Image 15">
        <img src="https://source.unsplash.com/800x600/?unsplash+waterfall&t=<?= time() + 15 ?>" alt="Random Image 16">
        <img src="https://source.unsplash.com/800x600/?unsplash+sunset&t=<?= time() + 16 ?>" alt="Random Image 17">
        <img src="https://source.unsplash.com/800x600/?unsplash+ocean&t=<?= time() + 17 ?>" alt="Random Image 18">
        <img src="https://source.unsplash.com/800x600/?unsplash+animals&t=<?= time() + 18 ?>" alt="Random Image 19">
        <img src="https://source.unsplash.com/800x600/?unsplash+birds&t=<?= time() + 19 ?>" alt="Random Image 20">
    </div>
</div>




<footer style="background-color: #132f38; color: white; text-align: center; text-lg-start;">

    <div class="container p-4">

      <div class="row">
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase">Footer text</h5>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
            molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
            voluptatem veniam, est atque cumque eum delectus sint!
          </p>
        </div>
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase">Footer text</h5>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
            molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
            voluptatem veniam, est atque cumque eum delectus sint!
          </p>
        </div>
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: black;">
      © 2020 Copyright:
      <a style="color: brown" >K's Gallery</a>
    </div>
    <!-- Copyright -->
  </footer>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    var menuItems = document.querySelectorAll('.menu-item');
    var bodyPlay = document.querySelector('.body-play');

    // Set default background on page load
    bodyPlay.style.background = 'url("https://images.hdqwalls.com/wallpapers/gigi-hadid-vogue-4k-f0.jpg")';
    bodyPlay.style.backgroundSize = 'cover';
    bodyPlay.style.filter = 'none'; // You can adjust the default filter if needed

    menuItems.forEach(function (menuItem) {
        var menuImg = menuItem.querySelector('.menu-img');
        var hoverVideo = menuItem.querySelector('.menu-video');

        menuItem.addEventListener('mouseover', function () {
            bodyPlay.style.background = 'url(' + (menuImg ? menuImg.getAttribute('src') : hoverVideo.getAttribute('src')) + ')';
            bodyPlay.style.backgroundSize = 'cover';
            bodyPlay.style.filter = 'brightness(80%) grayscale(20%) contrast(120%)'; // Adjust parameters as needed
        });

        menuItem.addEventListener('mouseout', function () {
            bodyPlay.style.background = 'url("https://images.hdqwalls.com/wallpapers/gigi-hadid-vogue-4k-f0.jpg")'; // Set back to default image
            bodyPlay.style.backgroundSize = 'cover';
            bodyPlay.style.filter = 'none';
        });

        menuItem.addEventListener('click', function () {
            bodyPlay.style.background = 'url(' + (menuImg ? menuImg.getAttribute('src') : hoverVideo.getAttribute('src')) + ')';
            bodyPlay.style.backgroundSize = 'cover';
            bodyPlay.style.filter = 'brightness(80%) grayscale(20%) contrast(120%)'; // Adjust parameters as needed
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    var video = document.querySelector('.gallery__item--3 video');
    video.controls = false; // Remove controls
    video.play();
  });
  function closePremiumAd() {
    document.querySelector('.premium-ad-container').style.display = 'none';
}
setTimeout(function() {
    var premiumAdContainer = document.getElementById('premiumAdContainer');
    if (premiumAdContainer) {
        premiumAdContainer.classList.add('show');
    }
}, 10000); // 10 seconds

</script>

</html>

