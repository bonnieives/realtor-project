<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

    protected $table = 'myusers';

    protected $fillable = ['FirstName','LastName','Email','Password','CategoryId'];

    public $timestamps = false;

    public function category(){
        return $this->belongsTo('App\Models\Categories', 'CategoryId');
    }

    use HasFactory;
}
