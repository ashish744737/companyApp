<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "companies";

    protected $guarded = [];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function scopeOrderByColumn($query, $column, $direction = 'asc')
    {
        return $query->orderBy($column, $direction);
    }
}
