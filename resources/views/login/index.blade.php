@extends('layouts.main')

@section('container')

<body class="img js-fullheight" style="background-image: url(https://images.hdqwalls.com/wallpapers/gigi-hadid-vogue-4k-f0.jpg);">
  <div class="signup__container">
    <div class="container__child signup__thumbnail">
      <div class="thumbnail__logo">

        <h1 class="logo__text">Escapism</h1>
      </div>
      <div class="thumbnail__content text-center">
        <h1 class="heading heading--primary">Welcome to Escapism,</h1>
        <div class="james-bond-image">

        </div>
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
        <form action="/login" method="post">
            @csrf
            <div class="form-group @error('email') mb-0 @enderror">
                <label for="email">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" placeholder="james.bond" value="{{ old('email') }}" required />
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group @error('password') mb-0 @enderror">
                <label for="password">Password</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="********" required />
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <small class="d-block text-center mt-3" >Haven't Registered? <a href="/register" class="register-link">Sign Up</a></small>
            <input class="btn btn--form" type="submit" value="Login" />
        </form>
    </div>
  </div>
  @if (session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

  <script>
    function closeAlert() {
        document.getElementById('successAlert').style.display = 'none';
        document.getElementById('loginErrorAlert').style.display = 'none';
    }
    function closeAlert(alertId) {
        document.getElementById(alertId).style.display = 'none';
    }
  </script>
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
    width: 50rem; /* Use remy(800px) if needed */
    height: 30rem; /* Use remy(480px) if needed */
    border-radius: 3px; /* Use remy(3px) if needed */
    box-shadow: 0 3px 7px rgba(0, 0, 0, 0.25);
  }

  .signup__overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #132f38
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
    color: rgb(52, 26, 52);
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
  div.form-group>input {
      color: white;
      background-color: black;
      border:none;
      border-bottom: 1px solid white;
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
    background-color: brown;
    border:none;
    border-radius: 0.25rem;
    transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
    border: none;
    outline: none;
  }

  input.btn.btn--form:hover {
    background-color: rgb(52, 26, 52);
    color: black;

    border: none;
    outline: none;

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
    body {
    font-family: 'Playfair Display', serif;
    background-color: brown !important;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
.alert-container {

    margin-right: auto;
    margin-left: auto;
    transform: translateY(-50%);
    width: 50%;
    z-index: 9999;
  }
  .form-group{
    margin-top: 80px;
  }
</style>
