@extends('layouts.layout')

@section('content')

    <div class="page-title-container">
        <h1>Employee Details</h1>
    </div>

    <div class="basic-info-container">
        <div class="basic-info-heading">
            <h2>Basic Info</h2>
        </div>    
        
        <div class="basic-info-content">
            <p>First Name:</p>
            <p>Last Name:</p>
            <p>Phone:</p>
            <p>Email:</p>
        </div>
        
    </div>

    <div class="details-info-container">
        <div class="details-info-heading">
            <h2>Details</h2>
        </div>    
        
        <div class="details-info-content">
            <p>Employee ID:</p>
            <p>Height:</p>
            <p>Weight:</p>
            <p>Age:</p>
            <p>Blood Type:</p>
        </div>
    </div>

@endsection