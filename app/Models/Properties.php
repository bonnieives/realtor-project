<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    protected $fillable = ['CivicNumber','Address','Apartment','Zip','City','Province','OwnerId','StatusId'];

    public $timestamps = false;

    public function owner(){
        return $this->belongsTo('App\Models\Users');
    }

    public function status(){
        return $this->belongsTo('App\Models\Status');
    }

    use HasFactory;
}
