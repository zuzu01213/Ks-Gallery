@extends('layouts.main')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <title>K's Gallery | Premium</title>
    <link rel="stylesheet" href="{{ asset('css/pricing.css') }}">

</head>
<body>
    <div class="hero-section">
        <div class="text-container" style="margin-top: 50px;">
            <h1 style="text-align: left; font-size: 49px;">Upgrade to Premium<svg class="O8Tgj" width="40" height="40" viewBox="0 0 24 24" version="1.1" aria-labelledby="+" aria-hidden="false"><desc lang="en-US">Plus sign for Unsplash+</desc><title id="+">+</title>
                    <path d="M11.281 8.3H8.156V3.125L11.281 1v7.3Zm.316 4.05H4.955V7.868L1.5 10.636v4.55h6.656V22h4.713l3.552-2.84h-4.824v-6.81Zm4.24 0v2.835h4.587l2.911-2.834h-7.497Z"></path>
                </svg> and start creating with exclusive, royalty-free images.
            </h1>
            <ul class="unsplash-list" style="margin-left: 0px; margin-top: 40px; margin-bottom: 50px">
                <li>Members-only content added monthly</li>
                <li>Unlimited royalty-free downloads</li>
                <li>Enhanced legal protections</li>
            </ul>
            <div>
                <label><input type="radio" name="subscription" value="yearly"></label>Yearly <span style="border: 1px solid #767676; border-radius: 16px; padding: 8px; color: #767676;">66% off</span>
                <label><input type="radio" name="subscription" value="monthly" style="margin-left: 9px;">Monthly</label>
            </div>
            <div style="font-size:30px; margin-top: 10px">
                <span style="text-decoration: line-through; color: grey">$12</span> <span style="color: #fff;">$4 USD per Month*</span>
            </div>
            <div>
                <button style="background-color: #111; color: #ffffff; border: none; padding: 10px 100px; border-radius: 5px; margin-top: 20px;">Get <span style="font-weight:bold">Premium+</span></button>

            </div>
            <p style="color: #767676; max-width:260px; margin-top: 5px; font-size:14px">* When paid annually, billed upfront $48 USD. Renews automatically. Cancel anytime.</p>
        </div>

        <div class="image-container">
            <img src="https://unsplash-assets.imgix.net/unsplashplus/car-wheel-header.jpg?h=875&amp;w=625&amp;q=80&amp;auto=format&amp;fit=crop" class="image active" style="--index: 0;">
            <img src="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-004.jpg?h=875&amp;w=625&amp;q=80&amp;auto=format&amp;fit=crop" class="image" style="--index: 1;">
            <img src="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-018.jpg?h=875&amp;w=625&amp;q=80&amp;auto=format&amp;fit=crop" class="image" style="--index: 2;">
            <img src="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-008.jpg?h=875&amp;w=625&amp;q=80&amp;auto=format&amp;fit=crop" class="image" style="--index: 3;">
        </div>
    </div>
    <h2 class="yzWOU B8k5U">Why go Unsplash+</h2>
</body>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        const images = document.querySelectorAll('.image');

        let currentIndex = 0;
        setInterval(() => {
            images[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % images.length;
            images[currentIndex].classList.add('active');
        }, 5000); // Change images every 5 seconds (5000 milliseconds)
    });
</script>
</html>
