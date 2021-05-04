<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public function nameLowerCased()
    {
        return Str::lower($this->name);
    }
    use HasFactory;
}
