<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booked extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'booked';
    public $fillable = ['user_id','name','country', 'location', 'price'];
}
