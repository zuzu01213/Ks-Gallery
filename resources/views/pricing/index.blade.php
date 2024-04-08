@extends('layouts.main')
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>K's Gallery</title>




    <link rel="stylesheet" href="{{ asset('css/pricing.css') }}">



  </head>
  <h1 class="text-center">Pick the best plan for you</h1>

<div class="pricing-box-container">
	<div class="pricing-box text-center">
		<h5>Free</h5>
		<p class="price"><sup>$</sup>0<sub>/mo</sub></p>
		<ul class="features-list">
			<li><strong>1</strong> Project</li>
			<li><strong>5</strong> Team Members</li>
			<li><strong>50</strong> Personal Projects</li>
			<li><strong>5,000</strong> Messages</li>
		</ul>
		<button class="btn-primary">Get Started</button>
	</div>

	<div class="pricing-box pricing-box-bg-image text-center">
		<h5>Premium</h5>
		<p class="price"><sup>$</sup>39<sub>/mo</sub></p>
		<ul class="features-list">
			<li><strong>5</strong> Project</li>
			<li><strong>20</strong> Team Members</li>
			<li><strong>100</strong> Personal Projects</li>
			<li><strong>15,000</strong> Messages</li>
		</ul>
		<button class="btn-primary">Get Started</button>
	</div>

	<div class="pricing-box text-center">
		<h5>Platinum</h5>
		<p class="price"><sup>$</sup>89<sub>/mo</sub></p>
		<ul class="features-list">
			<li><strong>25</strong> Project</li>
			<li><strong>50</strong> Team Members</li>
			<li><strong>500</strong> Personal Projects</li>
			<li><strong>50,000</strong> Messages</li>
		</ul>
		<button class="btn-primary">Get Started</button>
	</div>
</div>
{{-- <div class="row row-cols-5 mt-4">
    @foreach($images as $image)
        <div class="col mb-3">
            <!-- Display image -->
            <div class="card position-relative">
                <img src="{{ asset('storage/' . $image->url) }}" alt="{{ $image->title }}" class="card-img-top" style="cursor: pointer">
                <div class="card-body">
                    <!-- Add checkbox for image selection -->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input image-checkbox" id="imageCheck{{ $image->id }}" data-image-id="{{ $image->id }}" style="transform: scale(1.5);">
                        <label class="form-check-label truncated-title" for="imageCheck{{ $image->id }}">{{ $image->title }}</label>
                    </div>

                    <!-- Display status label -->
                    <div class="status-label">
                        <span class="badge" style="background-color: #116D6E">{{ ucfirst($image->status) }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="btn-group">
                            <!-- Buttons for view, edit, and delete -->
                            <button type="button" id="viewBtn" class="btn btn-md btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewImageModal{{ $image->id }}">
                                <!-- View Icon SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M7.998 2c3.313 0 6 2.687 6 6s-2.687 6-6 6-6-2.687-6-6 2.687-6 6-6zM8 1C4.14 1 1 4.14 1 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm0 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                </svg>
                                View
                            </button>

                            <button type="button"  id="editBtn"  class="btn btn-md btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editImageModal{{ $image->id }}">
                                <!-- Edit Icon SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M12.354 1.146a1.5 1.5 0 0 1 2.122 2.122l-10 10a1.5 1.5 0 0 1-2.122-2.122l10-10zM11 4.732l1.768 1.768-8.414 8.414-1.768-1.768L11 4.732zM13.5 3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h.5a.5.5 0 0 0 .5-.5v-10a.5.5 0 0 0-.5-.5z"/>
                                </svg>
                                Edit
                            </button>

                            <button type="button"  id="deleteBtn"  class="btn btn-md btn-outline-danger delete-btn" data-image-id="{{ $image->id }}">
                                <!-- Delete Icon SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M3.5 5.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5V6h-9v-.5zm9-1V3H4v1.5a.5.5 0 0 1-1 0V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v1.5a.5.5 0 0 1-1 0zM5 9a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5V7a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0-.5.5v2zm6.5 1a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5V10z"/>
                                </svg>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div> --}}
