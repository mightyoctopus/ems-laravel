@extends('layouts.layout')

@section('content')

    <div class="page-title-container">
        <h1>Employee Overview</h1>
    </div>

    <div class="basic-info-container">
        <div class="basic-info-heading">
            <h2>Basic Info</h2>
        </div>    
        
        <div class="basic-info-content">
            <p>First Name: {{ $employee->first_name }}</p>
            <p>Last Name: {{ $employee->last_name }}</p>
            <p>Phone: {{ $employee->phone }}</p>
            <p>Email: {{ $employee->email }}</p>
        </div>
        
    </div>

    <div class="details-info-container">
        <div class="details-info-heading">
            <h2>Details</h2>
        </div>    
        
        <div class="details-info-content">
            <p>Height: {{ $employee->details->height ?? 'N/A' }}</p>
            <p>Weight: {{ $employee->details->weight ?? 'N/A' }}</p>
            <p>Age: {{ $employee->details->age ?? 'N/A' }}</p>
            <p>Blood Type: {{ $employee->details->blood_type ?? 'N/A' }}</p>
        </div>
    </div>
 

@endsection