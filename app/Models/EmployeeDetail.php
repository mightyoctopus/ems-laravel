<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'height',
        'weight',
        'age',
        'blood_type',
    ];

       // Relational structure with the Employee table -- bind it to Employee using belongTo()
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
