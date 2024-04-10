@extends('layouts.main')
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
@section('container')
    <body class="img js-fullheight" style="background-image: url(https://wallpaperaccess.com/full/5505623.jpg);">
  <div class="signup__container">
    <div class="container__child signup__thumbnail">
      <div class="thumbnail__logo">
        <h1 class="logo__text">K's</h1>
      </div>
      <div class="thumbnail__content text-center">
        <h1 class="heading heading--primary">Welcome to K's,</h1>
        <div class="james-bond-image"></div>
        <h2 class="heading heading--secondary">Are you ready to join the elite?</h2>
      </div>
      <div class="thumbnail__links mt-4">
        <ul class="list-inline m-b-0 text-center">
          <li><a href="http://alexdevero.com/" target="_blank"><i class="fa fa-globe"></i></a></li>
          <li><a href="https://www.behance.net/alexdevero" target="_blank"><i class="fa fa-behance"></i></a></li>
          <li><a href="https://github.com/alexdevero" target="_blank"><i class="fa fa-github"></i></a></li>
          <li><a href="https://twitter.com/alexdevero" target="_blank"><i class="fa fa-twitter"></i></a></li>
        </ul>
      </div>
      <div class="signup__overlay"></div>
    </div>
    <div class="container__child signup__form">
        <form action="/register" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" placeholder="james.bond@example.com" value="{{ old('email') }}" required autocomplete="email" />
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Password (min. 5 characters)" required autocomplete="new-password" />
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <small class="d-block text-center mt-3" >Already a Member? <a href="/login" class="register-link">Login</a></small>
            <input class="btn btn--form" type="submit" value="Register" />
        </form>
    </div>
@endsection


<style>
  body {
    font-family: 'Playfair Display', serif;
    background-color: brown !important;
  }

  .signup__container {
    position: absolute;
    top: 50%;
    right: 0;
    left: 0;
    margin-right: auto;
    margin-left: auto;
    transform: translateY(-50%);
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50rem;
    height: 30rem;
    border-radius: 3px;
    box-shadow: 0 3px 7px rgba(0, 0, 0, 0.25);
  }

  .signup__overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #071a21
  }

  .container__child {
    width: 50%;
    height: 100%;
    color: #fff;
    background-color: black !important;
  }

  .signup__thumbnail {
    position: relative;
    padding: 2rem;
    display: flex;
    flex-wrap: wrap;
    align-items: center;

  }

  .thumbnail__logo,
  .thumbnail__content,
  .thumbnail__links {
    position: relative;
    z-index: 2;
  }

  .thumbnail__logo {
    align-self: flex-start;
  }

  .logo__shape {
    fill: #fff;
  }

  .logo__text {
    display: inline-block;
    font-size: 1.8rem;
    font-weight: bold;
    vertical-align: bottom;
    color: rgb(13, 0, 13);
  }

  .thumbnail__content {
    align-self: center;
  }

  .heading {
    font-weight: 300;
    color: rgba(255, 255, 255, 1);
  }

  .heading--primary {
    font-size: 2rem;
  }

  .heading--secondary {
    font-size: 1.414rem;
  }

  .thumbnail__links {
    align-self: flex-end;
    width: 100%;
  }

  .thumbnail__links a {
    font-size: 1rem;
    color: #fff;
  }

  .thumbnail__links .fa-globe,
  .thumbnail__links .fa-behance,
  .thumbnail__links .fa-github,
  .thumbnail__links .fa-twitter {
    margin: 0 1rem;
  }

  .signup__form {
    padding: 2rem;
    background-color: #fff;
  }

  .form-group {
    margin-bottom: 1.5rem;
  }

  label {
    font-size: 1rem;
    font-weight: 400;
  }


  input.btn.btn--form {
    display: inline-block;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    width: 50%;
    font-weight: 600;
    margin-left: 80px;
    margin-top: 20px;
    line-height: 1;
    color: black;
    border: none;
    background-color: rgb(72, 31, 72);

    border-radius: 0.25rem;
    transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
  }

  input.btn.btn--form:hover {
    background-color: rgb(52, 26, 52);
    color: white;
    border: none

  }

  .m-t-lg {
    margin-top: 2.5rem;
  }

  .list-inline {
    padding-left: 0;
    list-style: none;
    margin-bottom: 0;
  }

  .list-inline > li {
    display: inline-block;
    padding-right: 5px;
    padding-left: 5px;
  }

  .register-link {
    color: brown;
    text-decoration: none;
    margin-left: 8px;
    margin-right: 8px;
    font-size: 17px;
  }
  div.form-group>input {
    color: white;
    background-color: black;
    border:none;
    border-bottom: 1px solid white;
}
body {
    font-family: 'Playfair Display', serif;
    background-color: brown !important;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
.invalid-feedback {
    color: #dc3545;
    font-size: 80%;
    margin-top: 0.25rem;
    margin-bottom: 0;
  }
  .form-group{
    margin-top: 80px;
  }
</style>
