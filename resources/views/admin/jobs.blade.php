@extends('layouts.adminmaster')

@section('title')
Admin jobs
@endsection


@section('content')
<div class="content">
        <div >
          <div >
            <div class="card card-upgrade">
              <div class="card-header text-center">
                <h4 class="card-title">Jobs</h3>
                <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
                  
        </div>
              <div class="card-body">
              @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  @if(isset($jobs))
                  <table style="border:solid #000 2px">
                  <thead>
                  <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Item</th>
                  <th>Description</th>
                  <th style="color:blue">Status</th>
                  <th style="color:green">Price</th>
                  <th>Checkin date</th>
                  <th>Checkout date</th>
                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($jobs as $jobs)
                  <tr style="border:solid #000 2px">
                  <td class="text-center" style="color:green">{{ $jobs->user }}</td>
                  <td class="text-center">{{ $jobs->phone }}</td>
                  <td class="text-center" style="color:blue">{{ $jobs->item }}</td>
                  <td class="text-center">{{ $jobs->description }}</td>
                  <td class="text-center">@if($jobs->status == 1)
                  <i class="now-ui-icons ui-1_check text-success">
                            @else
                            <i class="now-ui-icons ui-1_simple-remove text-danger">
                            @endif
                          </td>
                          <td class="text-center">{{ $jobs->price }}</td>
                          <td class="text-center" style="color:green">{{ $jobs->created_at }}</td>
                  <td class="text-center">{{ $jobs->updated_at }}</td>
                  <td class="text-center"><a href="/checkout{{ $jobs->id }}">Check Out</a></td>
                  </tr>
                  @endforeach
                  </tbody>
                  </table>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
@endsection


@section('scripts')

@endsection