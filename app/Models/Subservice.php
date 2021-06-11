<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subservice extends Model
{
    use HasFactory;

    protected $fillable = [
      'slug',
      'name',
      'description',
      'is_available',
      'is_homevisitable',
      'service_id'
    ];
}
