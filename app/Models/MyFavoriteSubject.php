<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyFavoriteSubject extends Model
{
    use HasFactory;
    protected $fillable = 
    ['title', 'image', 'description', 'website', 'is_awesome'];
}
