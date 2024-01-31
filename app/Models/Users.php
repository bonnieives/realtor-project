<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = ['UserId','CategoryId','FirstName','LastName','Email','Password'];

    protected $primaryKey = 'UserId';

    public $timestamps = false;

    public function category(){
        return $this->belongsTo(Categories::class,'CategoryId','CategoryId');
    }

    use HasFactory;
}
