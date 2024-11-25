<?php

namespace App\Livewire\Pages;

use App\Models\StudentWhatsappGroup;
use App\Models\WhatsappGroup;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Forms\addGroup as FormsAddGroup;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use ReturnTypeWillChange;

class AddGroup extends Component
{
  use LivewireAlert;

  //public FormsAddGroup $form;
  #[Validate('required')]
  public $semester = "";

  #[Validate('required')]
  public $subject = "";

  #[Validate('required')]
  public $section = "";

  public function getIdWhatsappGroup(int $id)
  {
    return;
  }

  public function save()
  {
    $check = WhatsappGroup::where('subject_id', $this->subject)->get();

    if (count($check) == 0) {
      WhatsappGroup::create(['link' => null, 'subject_id' => $this->subject]);
      $get = WhatsappGroup::firstWhere('subject_id', $this->subject);
      StudentWhatsappGroup::create(['user_id' => Auth::id(), 'whatsapp_group_id' => $get->id]);
    } else {
      $get = WhatsappGroup::firstWhere('subject_id', $this->subject);
      StudentWhatsappGroup::create(['user_id' => Auth::id(), 'whatsapp_group_id' => $get->id]);
    }
    $this->alert('success', 'Guardado Correctamente!', [
      'position' => 'center',
      'toast' => false
    ]);

    $this->reset();
  }

  public function render()
  {
    return view('livewire.pages.add-group');
  }
}
