<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
    ];

    // Relational structure with the EmployeeDetail table -- bind it to EmployeeDetail
    // one-to-one relationship using hasOne()
    public function details()
    {
        return $this->hasOne(EmployeeDetail::class);
    }
}

