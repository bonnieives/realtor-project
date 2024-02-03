<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    protected $fillable = ['InitialDate','FinalDate','Value','PayDay','TenantId','PropertyId'];

    public $timestamps = false;

    public function tenant(){
        return $this->belongsTo('App\Models\Users');
    }

    public function property(){
        return $this->belongsTo('App\Models\Properties');
    }

    use HasFactory;
}
