<?php

namespace App\Livewire\Forms;

use App\Models\StudentWhatsappGroup;
use App\Models\WhatsappGroup;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class addGroup extends Form
{

  #[Validate('required')]
  public $section = '';

}
