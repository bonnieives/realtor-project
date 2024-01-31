<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $fillable = ['AppointmentId','PropertyId','Date','Time'];

    protected $primaryKey = 'AppointmentId';

    public $timestamps = false;

    public function property(){
        return $this->belongsTo(Contracts::class,'PropertyId','PropertyId');
    }

    use HasFactory;
}
