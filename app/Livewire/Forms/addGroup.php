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
  public $semester = '';

  #[Validate('required')]
  public $subject = '';

  #[Validate('required')]
  public $section = 'D1';

  public function store()
  {
    $validated = $this->validate();

    $check = WhatsappGroup::where('subject_id', $subject)->get();

    if (count($check) == 0) {
      WhatsappGroup::create(['link' => null, 'subject_id' => $subject]);
    } else {
      $get = WhatsappGroup::select('id')->where('subject_id', $subject);
      StudentWhatsappGroup::create(['user_id' => Auth::id(), 'subject_id' => $subject]);
    }
  }
}
