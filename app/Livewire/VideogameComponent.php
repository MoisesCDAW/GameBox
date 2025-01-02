<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Videogame;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class VideogameComponent extends Component
{
    use WithFileUploads;

    // The games that the user has
    public $ownGames = [];

    // The games that the user doesn't have
    public $otherGames = [];

    // Control when to display the models
    public $addGame = false;
    public $addRate = false;

    // New game parameters
    public $title;
    public $description;
    public $cover;

    // Game rating parameters
    public $score = 3;
    public $comment = "";
    public $videogame_id;

    // The rules for the inputs "AddGame"
    protected $rulesAddGame = [
        'title' => 'required|string|min:4|max:255|regex:/^[A-Za-z0-9 ]+$/',
        'description' => 'required|string|min:4|max:255|regex:/^[A-Za-z0-9 ]+$/',
        'cover' => 'image|max:5120|mimes:jpg,jpeg,png|nullable',
    ];

    // The rules for the inputs "AddRate"
    protected $rulesAddRate = [
        'comment' => 'string|min:4|max:255|regex:/^[A-Za-z0-9 ]+$/',
    ];


    /**
     * Render the component
     */
    public function render(){
        return view('livewire.videogame-component');
    }


    /**
     * Clear the inputs on the add video game page
     */
    public function clearInputsAddGame(){
        $this->title = '';
        $this->description = '';
        $this->cover = '';
    }


    /**
     * Clear the inputs on the add video game page
     */
    public function clearInputsAddRate(){
        $this->comment = '';
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
        $this->validate($this->rulesAddGame);

        $videogame = new Videogame();
        $videogame->title = $this->title;
        $videogame->description = $this->description;

        // If the user uploaded a cover, store it
        if ($this->cover) {
            $path = $this->cover->storeAs('', time() . '.' . $this->cover->getClientOriginalExtension(), 'gameCovers');
            $videogame->cover = $path;

        }else {
            $videogame->cover = "cover.png";
        }

        $videogame->user_id = Auth::id();
        $videogame->save();

        $this->js("setTimeout(() => {alert('Video game added successfully.')}, 200);");

        $this->clearInputsAddGame();
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
        $this->clearInputsAddGame();
        $this->addGame = false;
    }

    
    /**
     * Redirect to the details page of a video game
     */
    public function redirectToDetails($id){
        return redirect()->route('details.videogame', ['id' => $id]);
    }


    /**
     * Open the page to add a rate to a video game
     */
    public function openAddRate($videogame_id){
        $this->addRate = true;
        $this->videogame_id = $videogame_id;
    }


    /**
     * Close the page to add a rate to a video game
     */
    public function closeAddRate(){
        $this->clearInputsAddRate();
        $this->addRate = false;
    }


    /**
     * Select a score for a video game
     */
    public function selectScore($score){
        $this->score = $score;
    }


    /**
     * Add a rate to a video game
     */
    public function addNewRate(){

        $this->validate($this->rulesAddRate);

        $comment = new Comment();
        $comment->comment = $this->comment;
        $comment->score = $this->score;
        $comment->user_id = Auth::id();
        $comment->videogame_id = $this->videogame_id;
        $comment->save();

        $this->js("setTimeout(() => {alert('The rating was done correctly.')}, 200);");

        $this->clearInputsAddRate();
        $this->addRate = false;
    } 
}
