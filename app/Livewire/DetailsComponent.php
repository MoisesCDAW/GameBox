<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetailsComponent extends Component
{

    // Parameters to identify the game for which the details are to be displayed
    public $id;
    public $owner;

    // The role of the user
    public $role;

    /**
     * Render the component
     */
    public function render($id, $owner){

        $this->role = User::where('id', Auth::id())->value('role');
        $this->id = $id;
        $this->owner = $owner;
        return view('livewire.details-component');
    }
}
