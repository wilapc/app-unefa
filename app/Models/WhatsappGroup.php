<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsappGroup extends Model
{
  protected $fillable = [
    'link',
    'subject_id',
  ];
}
