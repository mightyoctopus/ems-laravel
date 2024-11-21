<?php
// Code made with a reference from 
// https://www.digitalocean.com/community/tutorials/simple-laravel-crud-with-resource-controllers 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function create() {
        return view('add_employee');
    }

    //Validation logic was pasted inside the rules of EmployeeRequest.php:
    //Reference Source: https://www.youtube.com/watch?v=ddWAmMf5hEU 
    public function store(EmployeeRequest $request) {
        Employee::create($request->validated());
        return redirect()->route('home')->with('success', 'New Employee created successfully!');
    }

    public function edit($id) {
        $employee = Employee::findOrFail($id); //seems better than find($id) because it automatically handles the 'not-found' case.

        return view('edit_employee', compact('employee'));
    }

    public function update(EmployeeRequest $request, $id) {

        $employee = Employee::findOrFail($id);
        
        $employee->update($request->validated());

        return redirect()->route('home')->with('success', 'Employee updated successfully!');
    }

    public function delete($id) {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('home')->with('success', 'Employee deleted successfully!');
    }
}
