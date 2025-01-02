<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\User;
use App\Models\Videogame;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetailsComponent extends Component
{

    // Parameter to identify the game for which the details are to be displayed
    public $videogame_id;

    // The details of the user of the current session
    public $userName;
    public $role; // Admin or User

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
        $this->userName = $user->name;
        $this->role = $user->role;
    }


    /**
     * Get the details of the video game
     */
    public function getVideogameDetails(){
        $videogame = Videogame::where('id', $this->videogame_id)->first();
        $this->videogameTitle = $videogame->title;
        $this->videogameDescription = $videogame->description;
        $this->videogameCover = $videogame->cover;
        $this->comments = Comment::where('videogame_id', $videogame->id)->get();
    }


    /**
     * Get the name of the user who made the comment.
     */
    public function getUserName($user_id){
        $user = User::find($user_id);
        return $user->name;
    }


    /**
     * It allows identifying if the user in the current session is the owner of the game they clicked on for details.
     */
    public function isOwner(){
        $isOwner = Videogame::where('id', $this->videogame_id)
            ->where('user_id', Auth::id())
            ->first();

        if($isOwner){
            return true;
        }
        return false;
    }


    /**
     * Mount the component
     */
    public function mount($id){
        $this->videogame_id = $id;        
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
