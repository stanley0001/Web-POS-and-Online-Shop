@extends('layouts.app')

@section('title')
Admin Update
@endsection


@section('content')<div class="container">
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
                <h2>Edit Profile</h2>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <form name="update" action="/updateprofile" method="post">
                @csrf
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Company (disabled)</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" name="company" value="Brains Tech Inc.">
                      </div>
                    </div>
                    <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="username" value="{{ $user->name }}">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                      <label>Phone No.</label>
                        <input type="number" class="form-control" name="phone" placeholder="phone" value="{{ $user->phone}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="{{ $user->fastname }}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="{{ $user->lastname }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Email address (disabled)</label>
                        <input type="email" class="form-control" disabled="" placeholder="Email" name="email" value="{{ $user->email }}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        
                      </div>
                    </div>
                  </div>
                  
                  <p style="color:red">This section to be filled only if u want to change the password</p>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>New password</label>
                        <input type="text" class="form-control" name="newpassword" placeholder="New password" value="">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="text" class="form-control" name="confirmpassword" placeholder="Confirm new password" value="">
                      </div>
                    </div>
                  </div>
                 
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About Me</label>
                        <textarea rows="4" cols="80" class="form-control" name="aboutme" placeholder="Here can be your description" value="{{ $user->name }}">{{ $user->aboutme }}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                       <input class="btn btn-primary btn-block" type="submit" value="Update">
                      </div>
                    </div>
                  </div> 
                </form>
              </div>
            </div>
          </div>
          </div>
          </div>
          
   
@endsection


@section('scripts')

@endsection