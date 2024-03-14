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
