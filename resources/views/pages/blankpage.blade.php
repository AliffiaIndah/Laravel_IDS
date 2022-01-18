@extends('layouts.mainlayout')
@section('tittle','Dashboard')
@section('custom_css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset ('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset ('assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset ('assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('css_global')
@endsection           

@section('content')
<!-- <section class="section">
  <div class="section-header">
  </div>

  <div class="section-body ">
    <h2 class="section-title">Informasi Login</h2>
    <p class="section-lead">Informasi Login User</p>
    <div class="card">
      <div class="card-header">
        <div class="card-body bg-gradient-info">
          {{ Auth::user()->provider_id }}
          <br>
          {{ Auth::user()->name }}
          <br>
          <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">
          <br>
          {{ Auth::user()->email }}
          <br>
        </div>
      </div>
    </div>
  </div>
</section> -->



<!-- solid sales graph -->
<div class="card bg-gradient-info">
  <div class="card-header border-0">
    <h3 class="card-title">
      <i class="fas fa-th mr-1"></i>
      Informasi Login
    </h3>
  </div>
  
  <div class="card-body">
    <!-- <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
    <div class="">
      <p class="section-lead"></p>
      {{ Auth::user()->provider_id }}
      <br>
      {{ Auth::user()->name }}
      <br>
      <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">
      <br>
      {{ Auth::user()->email }}
      <br>      
    </div>
    
  </div>
  
  <!-- /.card-body -->
  <div class="card-footer bg-transparent">

  </div>

</div>

@endsection      