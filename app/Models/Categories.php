<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['Description'];

    public $incrementing = false;

    public $timestamps = false;

    use HasFactory;
}
