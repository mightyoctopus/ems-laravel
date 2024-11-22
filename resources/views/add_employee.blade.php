@extends('layouts.layout')

@section('content')
<div class="page-title-container">
    <h1 class="page-title">Add Employees</h1>
</div>

<!-- NOTE for myself:
- csrf token tag inside the form must be included as how Laravel handles form submissions
along with its built-in csrf token protection 

- Error messages are run by the latest blade error directive
Ref source: https://laravel-news.com/blade-error-directive 

- {{ old('name_attribute')}} to keep the previously typed input value
-->



<div class="add-basic-profile-container">
    <div>
        <h2>Basic Profile</h2>
    </div>
    <form id="basic-profile-form" action="{{ route('basic_profile.store') }}" method="POST">
        @csrf 
        <label for="first_name">First Name</label>
        <input type="text" id="fname" name="first_name" value="{{ old('first_name') }}" required>
        <br>
        @error('first_name')
            <span style="color:red; font-weight:bold">{{ $message }}</span>
        @enderror
        <br>
        <label for="last_name">Last Name</label>
        <input type="text" id="lname" name="last_name" value="{{ old('last_name') }}" required>
        <br>
        @error('last_name')
            <span style="color:red; font-weight:bold">{{ $message }}</span>
        @enderror
        <br>
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
        <br>
        @error('phone')
            <span style="color:red; font-weight:bold">{{ $message }}</span>
        @enderror
        <br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        <br>
        @error('email')
            <span style="color:red; font-weight:bold">{{ $message }}</span>
        @enderror

        <button type="button" id="profile-submitBtn">Add</button>
    </form>

    

    <!-- 
    Show-Success message referred by the following resource: 
    https://www.fundaofwebit.com/laravel-8/how-to-show-success-message-in-laravel-8 
    -->
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <!-- NOTE for myself: 
    Next time, make sure to learn how to implement the error message using try/catch and exception in Laravel -->
</div>


<script>
    document.getElementById('profile-submitBtn').addEventListener('click', () => {
        const form = document.getElementById('basic-profile-form');
        if (form) {
            form.submit();
        } else {
            console.error("Basic profile form not found!");
        }
    });

    document.getElementById('details-submitBtn').addEventListener('click', () => {
        const form = document.getElementById('details-form');
        if (form) {
            form.submit();
        } else {
            console.error("Details fomr not found!");
        }
    })
</script>

@endsection

