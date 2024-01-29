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
            <span class="badge bg- text-dark me-2 p-2" style="font-size: 16px; background-color: transparent;border: 2px solid coral;">Limited only 1 post</span>
        @else
            <span class="badge bg- text-dark me-2 p-2" style="font-size: 16px; background-color: transparent;border: 2px solid coral;">Basic Member</span>
        @endif

    </div>
</div>
<style>

</style>
@endsection



