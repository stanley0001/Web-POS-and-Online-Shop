@extends('layouts.adminmaster')

@section('title')
Admin Full Record 
@endsection

  <!-- Latest CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
 
 @section('content')
<div class="content">
  <div class="chart-container">
    <div class="pie-chart-container">
    <form id="modified_search" name="modifiedsearch" action="/modifiedsearch" method="post">
            @csrf
            <table>
            <thead>
            @if(isset($users))
                      <th>From</th>
                      <th class="text-center">To</th>
                      <th class="text-center">User</th>
                      <th class="text-center"></th>
                      
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
            <a href="/allsales">Detailed record</a><a href="/allsaleschart-view" style="color:green">Chart View</a>
      <canvas id="pie-chart"></canvas>
      
    </div>
  </div>
 
  <!-- javascript -->
 
   <script>
  $(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      var ctx = $("#pie-chart");
 
      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Users Count",
            data: cData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Last six days -  Day Wise Count",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
      });
 
  });
</script>
</div>
@endsection
