<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    protected $fillable = ['PropertyId','OwnerId','StatusId','CivicNumber','Address','Apartment','Zip','City','Province'];

    protected $primaryKey = 'PropertyId';

    public $timestamps = false;

    public function owner(){
        return $this->belongsTo(Users::class,'OwnerId','UserId');
    }

    public function status(){
        return $this->belongsTo(Status::class,'StatusId','StatusId');
    }

    use HasFactory;
}
