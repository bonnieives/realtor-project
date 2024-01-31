<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['StatusId','Description'];

    protected $primaryKey = 'StatusId';

    public $incrementing = false;

    public $timestamps = false;

    use HasFactory;
}
