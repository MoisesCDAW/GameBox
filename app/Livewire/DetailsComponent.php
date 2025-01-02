<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\User;
use App\Models\Videogame;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetailsComponent extends Component
{

    // Parameters to identify the game for which the details are to be displayed
    public $id;
    public $owner;

    // The details of the user
    public $username;
    public $role;

    // The details of the video game
    public $videogameTitle;
    public $videogameDescription;
    public $videogameCover;
    public $comments = [];

    
    /**
     * Get the details of the user
     */
    public function getUserDetails(){
        $user = User::where('id', Auth::id())->first();
        $this->username = $user->name;
        $this->role = $user->role;
    }


    /**
     * Get the details of the video game
     */
    public function getVideogameDetails(){
        $videogame = Videogame::where('id', $this->id)->first();
        $this->videogameTitle = $videogame->title;
        $this->videogameDescription = $videogame->description;
        $this->videogameCover = $videogame->cover;
        $this->comments = Comment::where('videogame_id', $videogame->id)->get();
    }

    /**
     * Get the name of the user who made the comment.
     */
    public function getUserName($id){
        $user = User::find($id);
        return $user->name;
    }


    /**
     * Mount the component
     */
    public function mount($id){
        $this->id = $id;        
        $this->getUserDetails();
        $this->getVideogameDetails();
    }


    /**
     * Render the component
     */
    public function render(){
        return view('livewire.details-component')->layout('layouts.app');
    }
}
