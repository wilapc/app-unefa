<?php

namespace App\Livewire\Pages;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\StudentWhatsappGroup;
use App\Models\WhatsappGroup;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Forms\addGroup as FormsAddGroup;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddGroup extends Component
{
  use LivewireAlert;

  public FormsAddGroup $form;

  #[Validate('required', message: 'El campo no puede estar vacio')]
  public $semester = '';

  #[Validate('required', message: 'El campo no puede estar vacio')]
  public $subject = '';

  public bool $alert1 = false;

  public function save()
  {
    $this->validate();

    $wgId = WhatsappGroup::where('subject_id', $this->subject)
    ->firstOr(function(){
      return WhatsappGroup::create(['link' => null, 'subject_id' => $this->subject]);
    }); //Busca si existe grupo, sino lo crea

    $exist = StudentWhatsappGroup::where('user_id', Auth::id())->where('whatsapp_group_id', $wgId->id)->get();
    if (count($exist) == 0) {
      StudentWhatsappGroup::create(['user_id' => Auth::id(), 'whatsapp_group_id' => $wgId->id]);
      $this->dispatch('subject-added');
      $this->alert('success', 'Materia registrada!', ['timer' => 4500]);
      $this->reset();
    } else {
      $this->alert1 = true; //expone mensaje de alerta para materia agregada
    }
  }

  public function render()
  {
    return view('livewire.pages.add-group');
  }
}
