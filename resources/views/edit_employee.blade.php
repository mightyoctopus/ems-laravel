@extends('layouts.layout')

@section('content')
<div class="page-title-container">
    <h1 class="page-title">Edit Employees</h1>
</div>


<div class="add-form-container">
    <form id="formId" action="{{ route('employees.update', [$employee->id]) }}" method="POST">
        @csrf 
        <!-- Helped by ChatGPT to troubleshoot the error aligned with hidden PUT method 
        >>>>>>>>>>>>>>    @method('PUT')    <<<<<<<<<<<<<<<<
        -->
        @method('PUT')

        <label for="fname">First Name</label>
        <input type="text" id="fname" name="first_name" value="{{ $employee->first_name }}" required>
        <br>
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="last_name" value="{{ $employee->last_name }}" required>
        <br>
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" value="{{ $employee->phone }}" required>
        <br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value={{ $employee->email }} required>
    </form>

    <button type="button" id="submitBtn">Save Changes</button>

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

</div>

<script>
    document.getElementById('submitBtn').addEventListener('click', () => {
        const form = document.getElementById('formId');
        console.log(form);
        form.submit();
    });
</script>

@endsection

