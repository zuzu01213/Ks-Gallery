
@extends('dashboard.layouts.main')

@section('container')
<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome, {{auth()->user()->name}}</h1>

    <div class="align-items-center">
        @if(auth()->user()->isAdmin())
        <span class="badge bg-danger text-dark me-2 p-2" style="font-size: 16px;border: 2px solid coral;">Admin Member</span>
    @elseif(auth()->user()->isOperator())
        <span class="badge bg-primary text-dark me-2 p-2" style="font-size: 16px;border: none;">Operator</span>
    @elseif(auth()->user()->isPremiumMember())
        <span class="badge bg-warning text-dark me-2 p-2" style="font-size: 16px;border: 2px solid coral;">Premium Member</span>
    @else
        <span class="badge bg- text-dark me-2 p-2" style="font-size: 16px; background-color: transparent;border: 2px solid coral;">Basic Member</span>
        @if(auth()->user()->posts_limit <= 10)
            <span class="badge bg- text-dark me-2 p-2" style="font-size: 16px; background-color: transparent;border: 2px solid coral;">Limited only 10 posts</span>
        @endif
    @endif
    </div>
</div>



@endsection



