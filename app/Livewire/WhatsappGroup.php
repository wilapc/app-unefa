<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class WhatsappGroup extends Component
{   
    public bool $modal1 = false;
    public Array $header;
    public $groups;

    #[On('subject-added')] 
    public function mount(){
      $this->groups = DB::table('users')
              ->join('student_whatsapp_groups','users.id','=','student_whatsapp_groups.user_id')
              ->join('whatsapp_groups','whatsapp_groups.id','=','student_whatsapp_groups.whatsapp_group_id')
              ->join('subjects','subjects.id','=','whatsapp_groups.subject_id')
              ->join('sections','sections.subject_id','=','subjects.id')
              ->select(DB::raw('subjects.semester as semestre,subjects.code as codigo ,subjects.name as materia, sections.section_name as seccion'))
              ->where('users.id',Auth::id())
              ->get();
      $this->header = [
        ['key' => 'codigo', 'label' => 'Código', 'class' => 'bg-blue-500 w-3 sm:text-lg'],
        ['key' => 'materia', 'label' => 'Materia', 'class' => 'sm:text-lg'],
        ['key' => 'seccion', 'label' => 'Seccion', 'class' => 'sm:text-lg'] # <---- nested attributes
      ];

    }

    public function render()
    {
        return view('livewire.whatsapp-group');
    }
}
