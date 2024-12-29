<?php

namespace App\Livewire;

use App\Models\Videogame;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VideogameComponent extends Component
{

    // The games that the user has
    public $ownGames = [];

    // The games that the user doesn't have
    public $otherGames = [];

    /**
     * Render the component
     */
    public function render(){
        return view('livewire.videogame-component');
    }


    /**
     * Get the games that the user has
     */
    public function getOwnGames(){
        return Auth::user()->videogames;
    }


    /**
     * Get the games that the user doesn't have
     */
    public function getOtherGames(){
        return Videogame::where('user_id', '!=', auth()->user()->id)->get();
    }


    /**
     * Mount the component
     */
    public function mount(){
        $this->ownGames = $this->getOwnGames();
    }
}
