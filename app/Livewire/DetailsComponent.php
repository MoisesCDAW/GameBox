<?php

namespace App\Livewire;

use Livewire\Component;

class DetailsComponent extends Component
{

    // Parameters to identify the game for which the details are to be displayed
    public $id;
    public $owner;

    /**
     * Render the component
     */
    public function render($id, $owner)
    {
        $this->id = $id;
        $this->owner = $owner;
        return view('livewire.details-component');
    }
}
