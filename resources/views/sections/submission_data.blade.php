@extends('layout')
{{header('Content-Type: text/html; charset=utf-8')}}

@section('content')



<div style="margin-bottom: 20px; width: 300px; float: right;">
  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-filter"></i></span><input class="form-control" type="text" name="daterange" value="" /></div>
</div>


<div class="table-responsive" id="submission_data" style="width: 100%">
  <!-- Navbar Area Starts -->
  @include('sections/data')
  <!-- Navbar Area End -->
</div>

@endsection
