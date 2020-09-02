@extends('layouts.adminmaster')

@section('title')
Admin Full Record 
@endsection


@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <div class="card card-upgrade">
              <div class="card-header text-center">
                <h4 class="card-title">Full Sales Record</h3>
        </div>

              <div class="card-body">
                <div class="table-responsive table-upgrade">
                <p style="color:green">{{ Auth::user()->name }}</p>
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
            <form id="modified_search" name="modifiedsearch" action="/modifiedsearch" method="post">
            @csrf
            <table>
            <thead>
            @if(isset($users))
                      <th>From</th>
                      <th class="text-center">To</th>
                      <th class="text-center">User</th>
                      <th class="text-center"> <a href="/allsales">Detailed record</a><br><a href="/allsaleschart-view" style="color:green">Chart View</a></th>
                      
                    </thead>
                    <tbody> 
            <tr>
            <td class="text-center"><input type="date" name="from" value="" required prevent default()></td>
            <td class="text-center"><input type="date" name="to" value="" required preventdefault></td>
            <td class="text-center"><select name="name" required>
            <option>All</option>
            @foreach($users as $users)
            <option>{{$users->name}}</option>
            @endforeach
            </select></td>
            <td class="text-center"><input type="submit" class="btn btn-round btn-primary" value="search"></td>
            @endif
            </tr>
            </table>
            </form>
            <table class="table" id="table">
                    <thead>
                    @if(isset($sales))
                      <th>Item</th>
                      <th class="text-center">Description</th>
                      <th class="text-center">Quantity</th>
                      <th class="text-center">Price</th>
                      <th class="text-center">User</th>
                      
                    </thead>
                    <tbody>
                    
                    @foreach($sales as $sales)
                    <tr>
                      <td class="text-center">{{ $sales->item }}</td>
                      <td class="text-center">{{ $sales->description }}</td>
                      <td class="text-center">{{ $sales->quantity }}</td>
                      <td class="text-center">{{ $sales->price }}</td>
                      <td class="text-center">{{ $sales->By }}</td>
                      
                      </tr>
                      
                      @endforeach
                      
                      
</tbody>
<tfoot>
<tr>
                      <td class="text-center"></td>
                      <td class="text-center" colspan="2" style="color:blue">Total =</td>
                      <td class="text-center" id="total" colspan="2" style="color:green"></td>
                      
                      </tr>
                                      
</tfoot>
</table>
<span id="Val"></span>
                     <script>
                     var table = document.getElementById('table'), sumVal = 0;
                     for(var i=1; i<table.rows.length; i++)
                      {
                        var y=parseInt(table.rows[i].cells[3].innerHTML);
                        sumVal=sumVal+y;
                        document.getElementById('total').innerHTML='Ksh'+sumVal;
                      }
                       
                     </script>
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