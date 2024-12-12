<?php

namespace App\Livewire\Delegate;

use App\Models\WhatsappGroup;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class EditGroup extends Component
{
    public bool $alert2 = false;

    #[Reactive]
    public $id;

    public function render()
    {
        return view('livewire.delegate.edit-group');
    }
}
