<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'basic_salary',
        'allowances',
        'deductions',
        'net_salary',
        'payroll_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'basic_salary' => 'decimal',
        'allowances' => 'decimal',
        'deductions' => 'decimal',
        'net_salary' => 'decimal',
        'payroll_date' => 'date',
    ];
}
