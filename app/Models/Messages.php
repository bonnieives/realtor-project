<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = ['MessageId','PropertyId','Description'];

    protected $primaryKey = 'MessageId';

    public $timestamps = false;

    public function message(){
        return $this->belongsTo(Properties::class,'PropertyId','PropertyId');
    }

    use HasFactory;
}
