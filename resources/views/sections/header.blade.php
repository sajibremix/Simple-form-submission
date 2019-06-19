<!DOCTYPE html>
<html>
<head>
	<title>{{ env('APP_NAME') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!------ Include the above in your HEAD tag ---------->
</head>
<body>
    <!-- Navbar Area Starts -->
    @include('sections/navbar')
    <!-- Navbar Area End -->

    
	<div class="container">

      <div class="jumbotron">
        <h1>Simple form submission</h1> 
        <p>Demo project done by <b>Jakir Hossen</b></p> 
        <p>Email: jshossen01@gmail.com</p>
      </div>

      <!-- Navbar Area Starts -->
      @include('sections/messages')
      <!-- Navbar Area End -->