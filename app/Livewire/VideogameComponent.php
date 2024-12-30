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

    // Control when to display the add video game page
    public $addGame = false;

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
     * Open the page to add a video game
     */
    public function openAddGame(){
        $this->addGame = true;
    }

    /**
     * Close the page to add a video game
     */
    public function closeAddGame(){
        $this->addGame = false;
    }

    /**
     * Mount the component
     */
    public function mount(){
        $this->ownGames = $this->getOwnGames();
        $this->otherGames = $this->getOtherGames();
    }
}
