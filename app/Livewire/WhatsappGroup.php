<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class WhatsappGroup extends Component
{
  public bool $modal1 = false;
  public array $header;
  public $groups;
  protected $roletype;

  #[On('subject-added')]
  public function mount()
  {
    $this->groups = DB::table('users')
      ->join('student_whatsapp_groups', 'users.id', '=', 'student_whatsapp_groups.user_id')
      ->join('whatsapp_groups', 'whatsapp_groups.id', '=', 'student_whatsapp_groups.whatsapp_group_id')
      ->join('subjects', 'subjects.id', '=', 'whatsapp_groups.subject_id')
      ->join('sections', 'sections.subject_id', '=', 'subjects.id')
      ->select(DB::raw('subjects.semester as semestre,subjects.code as codigo ,subjects.name as materia, sections.section_name as seccion'))
      ->where('users.id', Auth::id())
      ->get();
    $this->header = [
      ['key' => 'codigo', 'label' => 'Código', 'class' => 'bg-blue-500 w-3 sm:text-base'],
      ['key' => 'materia', 'label' => 'Materia', 'class' => 'sm:text-base'],
      ['key' => 'seccion', 'label' => 'Seccion', 'class' => 'sm:text-base'] # <---- nested attributes
    ];
  }

  public function render()
  {
    $userId = Auth::id();
    $this->roletype = User::find($userId)->hasRole('delegate');
    return view('livewire.student.whatsapp-group')->with(['permission' => $this->roletype]);
  }
}
