@extends('layouts.adminmaster')

@section('title')
Admin Customers
@endsection


@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <div class="card card-upgrade">
              <div class="card-header text-center">
                <h4 class="card-title">Customers</h3>
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
                <div class="table-responsive table-upgrade">
                  <table class="table">
                    <thead>
                      <th class="text-center">Phone No.</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Item</th>
                      <th class="text-center">Description</th>
                      <th class="text-center">price</th>
                      <th></th>
                     
                    </thead>
                    <tbody>
                      <tr>
                        <form action="/addcustomer" method="post">
                        @csrf
                        <td class="text-center"><input type="text" class="form-control" name="phone" placeholder="Phone" value="" required></td>
                        <td class="text-center"><input type="text" class="form-control" name="name" placeholder="Name" value="" required></td>
                        <td class="text-center"><input type="text" class="form-control" name="item" placeholder="Item" value="" required></td>
                        <td class="text-center"><input type="text" class="form-control" name="description" placeholder="Description" value="" required></td>
                        <td class="text-center"><input type="text" class="form-control" name="price" placeholder="Price" value="" required></td>
                      
                        <td class="text-center">
                          <input type="submit" class="btn btn-round btn-primary" value="Add">
                        </td>
</form>
                      </tr>        
                    </tbody>
                  </table>
                  @if(isset($customers))
                  <table>
                  <thead>
                  <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th></th>
                  
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($customers as $customer)
                  <tr>
                  <td class="text-center" style="color:green">{{ $customer->user }}</td>
                  <td class="text-center">{{ $customer->phone }}</td>
                  <td class="text-center">@if($customer->status == 1)
                  <i class="now-ui-icons ui-1_check text-success">
                            @else
                            <i class="now-ui-icons ui-1_simple-remove text-danger">
                            @endif
                          </td>
                  <td class="text-center"><a href="/jobs{{ $customer->phone }}">View jobs</a></td>
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