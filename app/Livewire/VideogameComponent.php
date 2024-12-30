<?php

namespace App\Livewire;

use App\Models\Videogame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    // The title and cover of the video game
    public $title;
    public $cover;

    /**
     * Render the component
     */
    public function render(){
        return view('livewire.videogame-component');
    }


    /**
     * Clear the inputs on the add video game page
     */
    public function clearInputs(){
        $this->title = '';
        $this->cover = '';
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
        return Videogame::where('user_id', '!=', Auth::id())->get();
    }


    /**
     * Mount the component
     */
    public function mount(){
        $this->ownGames = $this->getOwnGames();
        $this->otherGames = $this->getOtherGames();
    }


    /**
     * Add a video game to the user
     */
    public function addVideogame(){
        $videogame = new Videogame();
        $videogame->title = $this->title;
        $videogame->cover = "img/gameCovers/cover.png";
        $videogame->user_id = Auth::id();
        $videogame->save();
        $this->clearInputs();
        $this->addGame = false;

        $this->mount();
    }


    /** 
     * Open the page to add a video game
     */
    public function openAddVideogame(){
        $this->addGame = true;
    }


    /**
     * Close the page to add a video game
     */
    public function closeAddVideogame(){
        $this->addGame = false;
    }
}
