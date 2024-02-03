<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = ['Description','PropertyId'];

    public $timestamps = false;

    public function message(){
        return $this->belongsTo('App\Models\Properties');
    }

    use HasFactory;
}
