<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SportCategory extends Model
{
    protected $fillable = ['name'];

    public function sports()
    {
        return $this->hasMany(Sport::class);
    }
}
