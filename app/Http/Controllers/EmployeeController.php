<?php
// Code made with a reference from 
// https://www.digitalocean.com/community/tutorials/simple-laravel-crud-with-resource-controllers 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function create() {
        return view('add_employee');
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone' => 'required|string',
            'email' => 'required|string',
        ]);

        Employee::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
        ]);

        return redirect()->route('home')->with('success', 'New Employee created successfully!');
    }

    public function edit($id) {
        $employee = Employee::findOrFail($id); //seems better than find($id) because it automatically handles the 'not-found' case.

        return view('edit_employee', compact('employee'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone' => 'required|string',
            'email' => 'required|string',
        ]);

        $employee = Employee::findOrFail($id);
        
        $employee->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
        ]);

        return redirect()->route('home')->with('success', 'Employee updated successfully!');
    }

    public function delete($id) {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('home')->with('success', 'Employee deleted successfully!');
    }
}
