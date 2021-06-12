@extends('layouts.admin.app', ['title' => "Dashboard"])

@section('content')
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{$applications}}</h3>

        <p>Total applications</p>
      </div>
      <div class="icon">
        <i class="fas fa-shopping-cart"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{number_format($active, 2)}}
          <sup style="font-size: 20px">%</sup>
        </h3>

        <p>Active</p>
      </div>
      <div class="icon">
        <i class="fas fa-chart-bar"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{number_format($inactive, 2)}}
          <sup style="font-size: 20px">%</sup>
        </h3>

        <p>Inactive</p>
      </div>
      <div class="icon">
        <i class="fas fa-heart-broken"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>${{$amount}}</h3>

        <p>Total amount</p>
      </div>
      <div class="icon">
        <i class="fas fa-chart-pie"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
</div>
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Application Stats</h3>
      </div>
      <div class="card-body">
        <canvas id="applications-stat" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Payment Stats</h3>
      </div>
      <div class="card-body">
        <canvas id="payments-stat" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('assets/admin/plugins/chart.js/Chart.bundle.min.js') }}"></script>
<script>
  // Get context with jQuery - using jQuery's .get() method.
  var applicationsChart = $('#applications-stat').get(0).getContext('2d');

  var appChartData = {
    labels: @json(collect($apps)->pluck('month')->toArray()),
    datasets: [{
      label: 'Applications',
      backgroundColor: 'rgba(60,141,188,0.9)',
      borderColor: 'rgba(60,141,188,0.8)',
      pointRadius: false,
      pointColor: '#3b8bba',
      pointStrokeColor: 'rgba(60,141,188,1)',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data: @json(collect($apps)->pluck('count')->toArray())
    }]
  }

  var appChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false
        }
      }],
      yAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  new Chart(applicationsChart, {
    type: 'line',
    data: appChartData,
    options: appChartOptions
  })


  var barChartCanvas = $('#payments-stat').get(0).getContext('2d')
  var barChartData = {
    labels: @json(collect($payments)->pluck('month')->toArray()),
    datasets: [{
      label: 'Payments',
      backgroundColor: 'rgba(60,141,188,0.9)',
      borderColor: 'rgba(60,141,188,0.8)',
      pointRadius: false,
      pointColor: '#3b8bba',
      pointStrokeColor: 'rgba(60,141,188,1)',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data: @json(collect($payments)->pluck('amount')->toArray())
    }]
  }


  var barChartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    datasetFill: false
  }

  new Chart(barChartCanvas, {
    type: 'bar',
    data: barChartData,
    options: barChartOptions
  })
</script>

@endpush