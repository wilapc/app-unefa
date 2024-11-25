<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
  protected $fillable = [
    'name',
    'code',
    'semester',
    'career_id',
  ];
}
