<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $fillable = ['Date','Time','PropertyId'];

    public $timestamps = false;

    public function property(){
        return $this->belongsTo('App\Models\Properties');
    }

    use HasFactory;
}
