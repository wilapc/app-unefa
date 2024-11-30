<?php

namespace App\Livewire\Pages;

use App\Models\StudentWhatsappGroup;
use App\Models\WhatsappGroup;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Forms\addGroup as FormsAddGroup;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;
use ReturnTypeWillChange;

class AddGroup extends Component
{
  use Toast;

  public FormsAddGroup $form;

  #[Validate('required')]
  public $semester = '';

  #[Validate('required')]
  public $subject = '';

  public bool $alert = false;

  public function save()
  {
    $check = WhatsappGroup::where('subject_id', $this->subject)->get(); //Busca si existe grupo creado

    if (count($check) == 0) {
      
      WhatsappGroup::create(['link' => null, 'subject_id' => $this->subject]); //crea el grupo con el link vacio
      $get = WhatsappGroup::firstWhere('subject_id', $this->subject); //obtiene el id del grupo con la materia a registrar
    } 
    $get = WhatsappGroup::firstWhere('subject_id', $this->subject);
    $exist = StudentWhatsappGroup::where('user_id', Auth::id())->where('whatsapp_group_id', $get->id)->get();
    if (count($exist) == 0) {
      StudentWhatsappGroup::create(['user_id' => Auth::id(), 'whatsapp_group_id' => $get->id]);
      $this->success('Materia Registrada!');
      $this->dispatch('subject-added');
      $this->reset();
    } else {
      $this->alert = true;
    }

  }

  public function render()
  {
    return view('livewire.pages.add-group');
  }
}
