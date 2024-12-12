<?php

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Professor;
use App\Models\User;
use App\Models\WhatsappGroup as Wg;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class WhatsappGroup extends Component
{
  use LivewireAlert;

  public bool $modal1 = false;
  public bool $modal2 = false;
  public bool $alert2 = false;
  
  public $subject, $subjectId, $wgId;

  public string $professor;
  
  public string $link;

  public array $header;
  public $groups;
  protected $roletype;

  #[On('subject-added')]
  public function mount()
  {
    $this->groups = DB::table('users')
      ->join('student_whatsapp_groups', 'users.id', '=', 'student_whatsapp_groups.user_id')
      ->leftJoin('whatsapp_groups', 'whatsapp_groups.id', '=', 'student_whatsapp_groups.whatsapp_group_id')
      ->join('subjects', 'subjects.id', '=', 'whatsapp_groups.subject_id')
      ->join('sections', 'sections.subject_id', '=', 'subjects.id')
      ->leftJoin('professors', 'professors.subject_id','=','subjects.id')
      ->select(DB::raw('whatsapp_groups.id as id ,whatsapp_groups.link as link, professors.name as profesor, subjects.semester as semestre,subjects.code as codigo ,subjects.name as materia, sections.section_name as seccion'))
      ->where('users.id', Auth::id())
      ->get();
    $this->header = [
      ['key' => 'codigo', 'label' => 'Código', 'class' => 'bg-blue-500 w-3 sm:text-base'],
      ['key' => 'materia', 'label' => 'Materia', 'class' => 'sm:text-base'],
      ['key' => 'seccion', 'label' => 'Seccion', 'class' => 'sm:text-base'],
      ['key' => 'profesor', 'label' => 'Profesor', 'class' => 'sm:text-base'],
      ['key' => 'link', 'label' => 'Grupo', 'class' => 'sm:text-base'],
      ['key' => 'id', 'label' => 'id', 'class' => 'hidden']# <---- nested attributes
    ];
  }

  public function edit(bool $showModal, int $id, string $subject){
    $this->modal2 = $showModal;
    $this->subject = $subject;
    $this->wgId = $id;

    $getLink = Wg::find($id);
    $this->subjectId = $getLink->subject_id;
    $professor = Professor::where('subject_id',$getLink->subject_id)->firstOr(function(){
      return Professor::create([
        'name' => '',
        'subject_id' => $this->subjectId
      ]);
    });

    $this->link = (empty($getLink->link) ? '' : $getLink->link);
    $this->professor = (empty($professor->name) ? '' : $professor->name);
  }

  public function update1(){
    
    $professor = Professor::where('subject_id', $this->subjectId)->first();
    $professor->name = $this->professor;
    $professor->save();

    $link = Wg::find($this->wgId);
    $link->link = $this->link;
    $link->save();

    $this->alert(
      'success', 
      'Materia Actualizada!', 
      ['timer' => 4500]);
    $this->modal2 = false;
    $this->dispatch('subject-added')->self();
  }



  public function render()
  {
    $userId = Auth::id();
    $this->roletype = User::find($userId)->hasRole('delegate');
    return view('livewire.student.whatsapp-group')->with(['permission' => $this->roletype]);
  }
}
