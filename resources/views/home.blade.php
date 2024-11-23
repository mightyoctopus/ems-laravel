@extends('layouts.layout')

@section('content')
    <div class="page-title-container">
        <h1>Round Up Your Troopers!</h1>
    </div>

    <div class="add-employee-container">
        <span class="btn-description">Want to add new ninja employees? Just hit the button below!</span>
        <br>
        <br>
        <button class="add-employee-btn"><a href="{{ route('employees.create')}}">Add Employee</a></button>
    </div>

    <!-- Blade templating referred by https://www.youtube.com/watch?v=dzFRzYNtr3c&t=3s -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->created_at }}</td>
                    <td>{{ $employee->updated_at }}</td>
                    <td>
                        <button class="actions-btn btn-details"><a href="{{ route('employee_overview.show', $employee->id)}}">Overview</a></button>
                        <!-- NOTE for myself: 
                        Mistake made -- didn't put the id parameter $employee->id in the button attribute -->
                        <button class="actions-btn btn-edit"><a href="{{ route('employees.edit', $employee->id)}}">Edit</a></button>
                        <form action="{{ route('employees.delete', $employee->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="actions-btn btn-delete">Delete</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- 
        ref: 
        https://laravel.com/docs/11.x/pagination 
        https://bagisto.com/en/how-to-use-pagination-in-laravel/
        https://stackoverflow.com/questions/64002774/laravel-pagination-is-showing-weird-arrows
         -->
        <div class="pagination">
            {!! $employees->links('pagination::bootstrap-4') !!}
        </div>

    </div>
    
@endsection