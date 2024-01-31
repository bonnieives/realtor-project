<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    protected $fillable = ['ContractId','TenantId','PropertyId','InitialDate','FinalDate','Value','PayDay'];

    protected $primaryKey = 'ContractId';

    public $timestamps = false;

    public function tenant(){
        return $this->belongsTo(Users::class,'TenantId','UserId');
    }

    public function property(){
        return $this->belongsTo(Properties::class,'PropertyId','PropertyId');
    }

    use HasFactory;
}
