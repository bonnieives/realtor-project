<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = ['Description','ContractId','ManagerId'];

    public $timestamps = false;

    public function contract(){
        return $this->belongsTo('App\Models\Contracts');
    }

    public function manager(){
        return $this->belongsTo('App\Models\Users');
    }

    use HasFactory;
}
