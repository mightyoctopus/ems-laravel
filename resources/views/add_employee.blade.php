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



<div class="add-form-container">
    <form id="formId" action="{{ route('employees.store') }}" method="POST">
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
    </form>

    <button type="button" id="submitBtn">Add</button>

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
    document.getElementById('submitBtn').addEventListener('click', () => {
        const form = document.getElementById('formId');
        console.log(form);
        form.submit();
    });
</script>

@endsection

