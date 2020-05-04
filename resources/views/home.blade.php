@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if(Auth::User()->usertype=='admin')
            <div class="card-header"><a href="/admin">Admin Dashboard</a></div>
            @else
                <div class="card-header">Dashboard</div>
              @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to Brainstech {{ Auth::User()->name}}
                    <ul>
            <li><b>Fastname</b> {{ Auth::User()->fastname}}</li>
            <li><b>Lastname</b> {{ Auth::User()->lastname}}</li>
            <li><b>Email</b>    {{ Auth::User()->email}}</li>
            <li><b>Phone</b>    {{ Auth::User()->phone}}</li>
            <li><a href="./updateprofile{{ Auth::user()->id }}">Edit Profile</a></li>
            </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
