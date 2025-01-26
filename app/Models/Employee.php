<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'department_id',
        'position_id',
        'nik',
        'join_date',
        'photo_path',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'join_date' => 'date',
    ];

    // Relationship with User
    public function user()
    {
        return $this->hasOne(User::class);
    }

    // Relationship with Department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // Relationship with Position
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
