@extends('layouts.main')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <title>Escapism  | Premium</title>
    <link rel="stylesheet" href="{{ asset('css/pricing.css') }}">
    <link rel="icon" href="/images/internet.png" type="image/png">
</head>
<body>
    <div class="hero-section">
        <div class="text-container" style="margin-top: 50px;">
            <h1 style="text-align: left; font-size: 49px;">Upgrade to Escapism<svg class="O8Tgj" width="40" height="40" viewBox="0 0 24 24" version="1.1" aria-labelledby="+" aria-hidden="false"><desc lang="en-US"></desc><title id="+">+</title>
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
                <button style="background-color: #111; color: #ffffff; border: none; padding: 10px 100px; border-radius: 5px; margin-top: 20px;">Get <span style="font-weight:bold">Escapism+</span></button>

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
    <h2 class=" mb-5" style="text-align:center; font-weight:bold; font-size:40px; line-height: 1.2; margin-top: 100px">Why go Escapism<svg class="O8Tgj" width="36" height="36" viewBox="0 0 24 24" version="1.1" aria-labelledby="+" aria-hidden="false"><desc lang="en-US"></desc><title id="+">+</title>
        <path d="M11.281 8.3H8.156V3.125L11.281 1v7.3Zm.316 4.05H4.955V7.868L1.5 10.636v4.55h6.656V22h4.713l3.552-2.84h-4.824v-6.81Zm4.24 0v2.835h4.587l2.911-2.834h-7.497Z"></path>
    </svg> </h2>
    <div class="triple-container" style=" justify-content: center;  align-items: center;">
        <div class="long-container" style="width: 1300px; height: 580px; margin: 0 auto;">
            <header style="padding: 80px; padding-top:220px; display:inline-block">
                <h3 style="font-weight:bold; color: white;">Additional images</h3>
                <p style="color: #d1d1d1; font-size: 20px; max-width:350px">Create with images only Escapism+ members have access to. New images added every month.</p>
            </header>
            <div class="img-long-container" style="padding-left: 61px">
                <div class="first-line">
                    <img srcset="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-018.jpg?dpr=1&amp;h=353&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60 1x, https://unsplash-assets.imgix.net/unsplashplus/asset-plus-018.jpg?dpr=2&amp;h=353&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60 2x" src="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-018.jpg?h=353&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60" class="nHvG1 vkrMA" style="aspect-ratio: 236 / 353;">
                    <img srcset="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-017.jpg?dpr=1&amp;h=168&amp;w=236&amp;crop=focalpoint&amp;fp-y=0.4&amp;auto=format&amp;fit=crop&amp;q=60 1x, https://unsplash-assets.imgix.net/unsplashplus/asset-plus-017.jpg?dpr=2&amp;h=168&amp;w=236&amp;crop=focalpoint&amp;fp-y=0.4&amp;auto=format&amp;fit=crop&amp;q=60 2x" src="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-017.jpg?h=168&amp;w=236&amp;crop=focalpoint&amp;fp-y=0.4&amp;auto=format&amp;fit=crop&amp;q=60" class="nHvG1 vkrMA" style="aspect-ratio: 236 / 168;">
                    <img srcset="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-016.jpg?dpr=1&amp;h=353&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60 1x, https://unsplash-assets.imgix.net/unsplashplus/asset-plus-016.jpg?dpr=2&amp;h=353&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60 2x" src="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-016.jpg?h=353&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60" class="nHvG1 vkrMA" style="aspect-ratio: 236 / 353;">
                </div>
                <div class="second-line">
                    <img srcset="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-006.jpg?dpr=1&amp;h=168&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60 1x, https://unsplash-assets.imgix.net/unsplashplus/asset-plus-006.jpg?dpr=2&amp;h=168&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60 2x" src="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-006.jpg?h=168&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60" class="nHvG1 vkrMA" style="aspect-ratio: 236 / 168;">
                    <img srcset="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-007.jpg?dpr=1&amp;h=353&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60 1x, https://unsplash-assets.imgix.net/unsplashplus/asset-plus-007.jpg?dpr=2&amp;h=353&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60 2x" src="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-007.jpg?h=353&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60" class="nHvG1 vkrMA" style="aspect-ratio: 236 / 353;">
                    <img srcset="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-008.jpg?dpr=1&amp;h=168&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60 1x, https://unsplash-assets.imgix.net/unsplashplus/asset-plus-008.jpg?dpr=2&amp;h=168&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60 2x" src="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-008.jpg?h=168&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60" class="nHvG1 vkrMA" style="aspect-ratio: 236 / 168;">
                </div>
                <div class="third-line">
                    <img srcset="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-009.jpg?dpr=1&amp;h=353&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60 1x, https://unsplash-assets.imgix.net/unsplashplus/asset-plus-009.jpg?dpr=2&amp;h=353&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60 2x" src="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-009.jpg?h=353&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60" class="nHvG1 vkrMA" style="aspect-ratio: 236 / 353;border-top-right-radius: 16px;">
                    <img srcset="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-022.jpg?dpr=1&amp;h=353&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60 1x, https://unsplash-assets.imgix.net/unsplashplus/asset-plus-010.jpg?dpr=2&amp;h=353&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60 2x" src="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-010.jpg?h=353&amp;w=236&amp;auto=format&amp;fit=crop&amp;q=60" class="nHvG1 vkrMA" style="aspect-ratio: 236 / 353; ">
                </div>
            </div>
        </div>

        <div class="short-container">
            <div class="short-container-1" style="border-bottom-left-radius: 16px;">
                <header style="padding: 80px; padding-top:100px; display:inline-block">
                    <h3 style="font-weight:bold; color: white;">Unlimited royalty-free downloads</h3>
                    <p style="color: #d1d1d1; font-size: 20px; max-width:390px">No download limits. Use as many images as many times as you want.</p>
                </header>
                <div class="image-grid">
                    <div class="image-item-1">
                        <img src="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-011.jpg?h=446&amp;w=276&amp;auto=format&amp;fit=crop&amp;q=60" class="nHvG1 vkrMA" style="aspect-ratio:276 / 446">
                    </div>
                    <div class="image-item-2">
                        <img src="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-012.jpg?h=180&amp;w=250&amp;auto=format&amp;fit=crop&amp;q=60" class="nHvG1 vkrMA" style="aspect-ratio:250 / 180">
                        <img src="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-013.jpg?h=180&amp;w=250&amp;auto=format&amp;fit=crop&amp;q=60" class="nHvG1 vkrMA" style="aspect-ratio:250 / 180;  margin-top: 10px;">
                    </div>
                    <div class="image-item-3">
                        <img src="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-014.jpg?h=446&amp;w=276&amp;auto=format&amp;fit=crop&amp;q=60" class="nHvG1 vkrMA" style="aspect-ratio:276 / 446">
                    </div>
                </div>
            </div>

            <div class="short-container-1" style="  margin-left: 26px; height:657px;border-bottom-right-radius: 16px;">
                <header style="padding: 80px; padding-top:100px; display:inline-block; padding-bottom:30px">
                    <h3 style="font-weight:bold; color: white;">Enhanced legal protections</h3>
                    <p style="color: #d1d1d1; font-size: 20px; max-width:390px">All Escapism+ images are model and property released for use in any commercial project and are backed by Escapism+ Protection.</p>
                </header>
                <div >
                    <div class="image-item-4">
                        <img srcset="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-015.jpg?dpr=1&amp;w=476&amp;crop=focalpoint&amp;fp-y=0.39&amp;h=304&amp;auto=format&amp;fit=crop&amp;q=60 1x, https://unsplash-assets.imgix.net/unsplashplus/asset-plus-015.jpg?dpr=2&amp;w=476&amp;crop=focalpoint&amp;fp-y=0.39&amp;h=304&amp;auto=format&amp;fit=crop&amp;q=60 2x" src="https://unsplash-assets.imgix.net/unsplashplus/asset-plus-015.jpg?fit=max&amp;w=476&amp;crop=focalpoint&amp;fp-y=0.39&amp;h=304&amp;auto=format&amp;q=60" class="l5zog">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <header>
            <h2 style="text-align:center; font-weight:700; font-size:40px; line-height: 1.2;">
                No bundles. No add-ons.
            </h2>
            <h2 style="text-align:center; font-weight:700; font-size:40px; line-height: 1.2;">
                One simple plan unlocks everything.
            </h2>
            <br>
            <div style="flex-shrink:0;--spacer-h-xxs:32px;--spacer-h-sm:48px" class="x2Dxg"></div>
        </header>
    </div>
    <div style="text-align: center;">
        <div>
            <div class="switch-wrapper">
                <input id="monthly" type="radio" name="switch" checked>
                <input id="yearly" type="radio" name="switch">
                <label for="monthly">Yearly (66% off)</label>
                <label for="yearly">Monthly</label>
                <span class="highlighter"></span>
            </div>
            <div style="text-align: center;">
                <div class="card-wrapper mb-4" style="margin: auto; text-align: left;">
                    <div class="green-text">
                        Limited Launch Special<a href="#footnote-1" style=" color: #2e9157;"><sup>1</sup></a>
                    </div>
                    <div style="display: flex; align-items: baseline;font-weight:bold; font-size: 26px; ">
                        <span class="dollar-cross">$12</span>
                        <span class="dollar" style="margin-right: 5px">$4 </span>
                        USD / Month

                    </div>
                    <div class="mt-2 mb-3">
                        <span style="color: #d1d1d1;" >$144</span> <span style="font-weight:bold">$48 Billed yearly</span>
                    </div>
                    <div>
                        <ul class="unsplash-list" style="margin-left: 0px;  margin-bottom: 40px">
                            <li>Members-only content added monthly</li>
                            <li>Unlimited royalty-free downloads</li>
                            <li>Enhanced legal protections</li>
                            <li>Ad-free experience</li>
                            <li>Priority support</li>
                        </ul>
                    </div>
                    <div >
                        <a href="" style="display: inline-block; text-align: center; text-decoration: none; ">
                            <button style="font-weight:600;background-color: black; color: white; width: 320%;font-size: 15px;height: 44px;line-height: 42px; border:1px solid black;border-radius: 6px;">
                                Get Escapism<span style="font-size: 15px; ">＋</span>
                            </button>
                        </a>
                    </div>
                    <footer class="footer-card mt-2 " style="margin-left:50px; ">
                        <div style="display: flex; align-items: center;">
                            <div class="checkmark" style="display: flex; align-items: center;">
                                <svg style="margin-right: 5px; " width="16" height="16" viewBox="0 0 24 24" version="1.1" aria-hidden="false"><desc lang="en-US">A checkmark</desc><path d="m10 17.4-5-5L6.4 11l3.6 3.6L17.6 7 19 8.4l-9 9Z"></path></svg>
                                <p style="font-size: 13px; margin-right: 24px; margin-top: 10px;">Renews automatically</p>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <svg style="margin-right: 5px; " width="19" height="19" viewBox="0 0 24 24" version="1.1" aria-hidden="false"><desc lang="en-US">A checkmark</desc><path d="m10 17.4-5-5L6.4 11l3.6 3.6L17.6 7 19 8.4l-9 9Z"></path></svg>
                                <p style="font-size: 13px; margin-top: 10px;">Cancel anytime</p>
                            </div>
                        </div>
                    </footer>

                </div>
            </div>
        </div>

        <div>
            <div style="margin-top: 140px">

                <h2 style="margin-bottom: 16px;font-size: 40px;font-weight: 700;line-height: 1.2;">More with Escapism<svg class="O8Tgj" width="40" height="40" viewBox="0 0 24 24" version="1.1" aria-labelledby="+" aria-hidden="false"><desc lang="en-US"></desc><title id="+">+</title>
                    <path d="M11.281 8.3H8.156V3.125L11.281 1v7.3Zm.316 4.05H4.955V7.868L1.5 10.636v4.55h6.656V22h4.713l3.552-2.84h-4.824v-6.81Zm4.24 0v2.835h4.587l2.911-2.834h-7.497Z"></path>
                </svg></h2>
                <p  style="font-size: 21px;line-height: 1.5;margin-bottom:30px">Get access to member-only content to use how and when you want.</p>
            </div>
            <div class="toggle-buttons mt-4" style="border: 3px solid brown; border-radius: 16px;">
                <button class="toggle-button active" data-category="sports">Sports</button>
                <button class="toggle-button" data-category="people">People</button>
                <button class="toggle-button" data-category="food">Food</button>
                <button class="toggle-button" data-category="nature">Nature</button>
                <button class="toggle-button" data-category="urban">Urban</button>
                <button class="toggle-button" data-category="renders">Renders</button>
                <button class="toggle-button" data-category="business">Business</button>
            </div>
            @include('pricing.image-generate')
            <div class="faq-container" style="display: grid; grid-template-columns: 1fr 750px;">
                <section>
                    <header class="faq-header">
                        <h3 style="font-weight: bold; font-size:42px">Frequently asked questions</h3>
                        <p class="mb-0" style="font-size:20px">Haven’t found what you’re looking for?</p>
                        <p style="font-size:20px">Try our Help Center — we’re here to help.</p>
                    </header>
                </section>

                <section style="float: right;margin-right:100px">

                    <details id="faq-details" style="border-bottom: 1px solid black;">
                        <summary onclick="toggleRotation(event)" style="display: flex; justify-content: space-between; align-items: center;">What is Escapism+?
                            <svg class="wbX6M ETXji" width="24" height="24" viewBox="0 0 24 24" version="1.1" aria-hidden="false" id="chevron-down">
                                <desc lang="en-US">Chevron down</desc>
                                <path d="M7.41 8.59 12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41Z"></path>
                            </svg>
                        </summary>
                        <p>
                            Escapism+ is a subscription-based content provider that gives you access to additional beautiful images, with no download cap. Plus members get access to unique images, royalty-free usage, and expanded legal protections.
                        </p>
                    </details>

                    <details id="faq-details" style="border-bottom: 1px solid black;">
                        <summary onclick="toggleRotation(event)" style="display: flex; justify-content: space-between; align-items: center;">How do I sign up for a Escapism+ subscription?
                            <svg class="wbX6M ETXji" width="24" height="24" viewBox="0 0 24 24" version="1.1" aria-hidden="false" id="chevron-down">
                                <desc lang="en-US">Chevron down</desc>
                                <path d="M7.41 8.59 12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41Z"></path>
                            </svg>
                        </summary>
                        <p>
                            Signing up for a subscription is simple. Click on the 'Get Escapism+' button on this page!
                        </p>
                    </details>

                    <details id="faq-details" style="border-bottom: 1px solid black;">
                        <summary onclick="toggleRotation(event)" style="display: flex; justify-content: space-between; align-items: center;">Can I pause, deactivate or reactivate my subscription?
                            <svg class="wbX6M ETXji" width="24" height="24" viewBox="0 0 24 24" version="1.1" aria-hidden="false" id="chevron-down">
                                <desc lang="en-US">Chevron down</desc>
                                <path d="M7.41 8.59 12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41Z"></path>
                            </svg>
                        </summary>
                        <p>
                            You have the freedom to change your plan or cancel your next subscription renewal online at any time. This can be done by going to your Account Settings and clicking 'Manage my subscription'.
                        </p>
                    </details>

                    <details id="faq-details" style="border-bottom: 1px solid black;">
                        <summary onclick="toggleRotation(event)" style="display: flex; justify-content: space-between; align-items: center;">How can I use the images? Are there any restrictions?
                            <svg class="wbX6M ETXji" width="24" height="24" viewBox="0 0 24 24" version="1.1" aria-hidden="false" id="chevron-down" style="margin-left: auto;">
                                <desc lang="en-US">Chevron down</desc>
                                <path d="M7.41 8.59 12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41Z"></path>
                            </svg>
                        </summary>
                        <p>
                            All Escapism+ images are model and property released and are backed by Escapism+ Protection.
                        </p>
                    </details>

                    <details id="faq-details" style="border-bottom: 1px solid black;">
                        <summary onclick="toggleRotation(event)" style="display: flex; justify-content: space-between; align-items: center;">Will I be charged in my local currency?
                            <svg class="wbX6M ETXji" width="24" height="24" viewBox="0 0 24 24" version="1.1" aria-hidden="false" id="chevron-down">
                                <desc lang="en-US">Chevron down</desc>
                                <path d="M7.41 8.59 12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41Z"></path>
                            </svg>
                        </summary>
                        <p>
                            If you’re based in the United States, Canada, the United Kingdom or the European Union, yes. For all other regions, you will be charged in either euros or US dollars.
                        </p>
                    </details>

                    <details id="faq-details" style="border-bottom: 1px solid black;">
                        <summary onclick="toggleRotation(event)" style="display: flex; justify-content: space-between; align-items: center;">Can I share my subscription with someone else?
                            <svg class="wbX6M ETXji" width="24" height="24" viewBox="0 0 24 24" version="1.1" aria-hidden="false" id="chevron-down">
                                <desc lang="en-US">Chevron down</desc>
                                <path d="M7.41 8.59 12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41Z"></path>
                            </svg>
                        </summary>
                        <p>
                            No, the subscription is for a single-user license only. Only the owner of the account has the right to use the image. A company can have an account, but it is still a single seat-license, meaning only 1 person can download and select content/use the content at a time, and it cannot be stored on a DAM for broad sharing rights.
                        </p>
                    </details>
                </section>
            </div>

        </div>
    </div>
    <footer style="background-color: #132f38; color: white; text-align: center; text-lg-start;">


        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: black;">
          © 2024 Copyright:
          <a style="color: brown" >Escapism</a>
        </div>
        <!-- Copyright -->
    </footer>
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
    document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.toggle-button');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const category = button.dataset.category;
            buttons.forEach(btn => {
                if (btn.dataset.category !== category) {
                    btn.classList.remove('active');
                } else {
                    btn.classList.add('active');
                }
            });
        });
    });
});
function toggleRotation(event) {
        var icon = event.target.querySelector('.ETXji');
        icon.classList.toggle('rotate');
    }
</script>
</html>
