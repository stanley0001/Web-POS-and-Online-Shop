@extends('layouts.adminmaster')

@section('title')
Admin Dashbord
@endsection


@section('content')
<div class="stan">
            <p><b>username</b> {{ Auth::User()->name}}</p><br>
            <p><b>Fastname</b> {{ Auth::User()->fastname}}</p><br>
            <p><b>Lastname</b> {{ Auth::User()->lastname}}</p><br>
            <p><b>Email</b>    {{ Auth::User()->email}}</p><br>
            <p><b>Phone</b>    {{ Auth::User()->phone}}</p>
            <a href="./updateuser{{ Auth::user()->id }}">Edit Profile</a>
            </div>  
@endsection


@section('scripts')

@endsection