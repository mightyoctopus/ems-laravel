@extends('layouts.layout')

@section('content')
<div class="page-title-container">
    <h1 class="page-title">Edit Employees</h1>
</div>

<!-- Basic Profile Form -->
<div class="add-employee-container">
    
    <form id="employee-submit-form" action="{{ route('employee.update', [$employee->id]) }}" method="POST">
        @csrf 
        <!-- Helped by ChatGPT to troubleshoot the error aligned with hidden PUT method 
        >>>>>>>>>>>>>>    @method('PUT')    <<<<<<<<<<<<<<<<
        -->
        @method('PUT')
        <div class="basic-profile-container">
            <h2>Basic Profile</h2>
            
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" value="{{ $employee->first_name }}" required>
            <br>
            @error('first_name')
                <span style="color:red; font-weight:bold">{{ $message }}</span>
            @enderror
            <br>

            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="{{ $employee->last_name }}" required>
            <br>
            @error('last_name')
                <span style="color:red; font-weight:bold">{{ $message }}</span>
            @enderror
            <br>

            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="{{ $employee->phone }}" required>
            <br>
            @error('phone')
                <span style="color:red; font-weight:bold">{{ $message }}</span>
            @enderror
            <br>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $employee->email }}" required>
            <br>
            @error('email')
                <span style="color:red; font-weight:bold">{{ $message }}</span>
            @enderror

        </div>

        <div class="details-container">
            <h2>Details</h2>

            <label for="height">Height</label>
            <input type="text" id="height" name="height" value="{{ old('height', optional($employee->details)->height) }}">
            <br>
            @error('height')
                <span style="color:red; font-weight:bold">{{ $message }}</span>
            @enderror
            <br>

            <label for="weight">Weight</label>
            <input type="text" id="weight" name="weight" value="{{ old('weight', optional($employee->details)->weight) }}">
            <br>
            @error('weight')
                <span style="color:red; font-weight:bold">{{ $message }}</span>
            @enderror
            <br>

            <label for="age">Age</label>
            <input type="text" id="age" name="age" value="{{ old('age', optional($employee->details)->age) }}">
            <br>
            @error('age')
                <span style="color:red; font-weight:bold">{{ $message }}</span>
            @enderror
            <br>

            <label for="blood_type">Blood Type</label>
            <input type="text" id="blood_type" name="blood_type" value="{{ old('blood_type', optional($employee->details)->blood_type) }}">
            <br>
            @error('blood_type')
                <span style="color:red; font-weight:bold">{{ $message }}</span>
            @enderror

        </div>
        
        <br>
        <button type="button" id="employee-info-submit-btn">Save Changes</button>
    </form>

    

    <!-- Currently Invalid code as a successful form submission triggers a redirection to the homepage
    (No chance to display the success message on the edit page) -->
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

</div>

<script>
    document.getElementById('employee-info-submit-btn').addEventListener('click', () => {
        const form = document.getElementById('employee-submit-form');
        console.log(form);
        if (form) {
            form.submit();
        } else {
            console.error("invalid form type!");
        }
        
    });
</script>

@endsection

