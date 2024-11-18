<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentWhatsappGroup extends Model
{
    protected $fillable = [
      'user_id',
      'whatsapp_group_id'
    ];
}
