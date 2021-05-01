<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    public $fillable = ['user_id','name','country', 'location', 'price', 'description', 'image'];
    public $timestamps=false;
}


