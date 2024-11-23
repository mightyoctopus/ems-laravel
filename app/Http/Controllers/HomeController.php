<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class HomeController extends Controller
{
    public function index() {
        $employees = Employee::paginate(10);
        return view('home', compact('employees'));
    }
}


/* 
Pagination ref: 
https://laravel.com/docs/11.x/pagination 
https://bagisto.com/en/how-to-use-pagination-in-laravel/
https://stackoverflow.com/questions/64002774/laravel-pagination-is-showing-weird-arrows
*/