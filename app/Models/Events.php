<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = ['EventId','ContractId','ManagerId','Description'];

    protected $primaryKey = 'EventId';

    public $timestamps = false;

    public function contract(){
        return $this->belongsTo(Contracts::class,'ContractId','ContractId');
    }

    public function manager(){
        return $this->belongsTo(Users::class,'ManagerId','UserId');
    }

    use HasFactory;
}
