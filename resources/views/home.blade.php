@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form>
              <div class="input-group no-border">
                <input type="search" id="livesearch" value="" class="form-control" style="background:#000; border-color:green"placeholder="Search..." oninput="return search()" autofocus>
                <div class="input-group-append">
                  <div class="input-group-text" style="border-color:green">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                    </div>
                    </div>
                
              </div>
            </form><br><br><br>
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                   <p style="color:green"> Welcome to Brainstech {{ Auth::User()->name}}</p>
                    <ul>
            <li><b>Fastname</b> {{ Auth::User()->fastname}}</li>
            <li><b>Lastname</b> {{ Auth::User()->lastname}}</li>
            <li><b>Email</b>    {{ Auth::User()->email}}</li>
            <li><b>Phone</b>    {{ Auth::User()->phone}}</li>
           
            </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
