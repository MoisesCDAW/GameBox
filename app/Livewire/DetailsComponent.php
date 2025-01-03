<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\User;
use App\Models\Videogame;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class DetailsComponent extends Component
{
    use WithFileUploads;

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

    public $wirePoll = true; 

    // Control when to display the modal to edit the video game.
    public $editModal = false;

    // The rules for the inputs "EditVideogame"
    protected $rulesEditVideogame = [
        'videogameTitle' => 'required|string|min:4|max:255|regex:/^[A-Za-z0-9¿?¡!.()\s]+$/',
        'videogameDescription' => 'required|string|min:4|max:255|regex:/^[a-zA-Z0-9¿?¡!.()\s]+$/',
        'videogameCover' => 'image|max:5120|mimes:jpg,jpeg,png|nullable',
    ];
    
    /**
     * Get the details of the user
     */
    public function getUserDetails(){
        $user = User::where('id', Auth::id())->first();

        if(!$user){
            $this->wirePoll = false;
            return redirect()->to('dashboard');
        }

        $this->userName = $user->name;
        $this->role = $user->role;
    }


    /**
     * Get the details of the video game
     */
    public function getVideogameDetails(){
        $videogame = Videogame::where('id', $this->videogame_id)->first();

        if(!$videogame){
            $this->wirePoll = false;
            return redirect()->to('dashboard');
        }

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
     * Open the modal to edit the video game.
     */
    public function OpenEditVideogame(){
        if (Videogame::where('id', $this->videogame_id)->first()) {
            $this->wirePoll = false;
            $this->editModal = true;
        }else {
            return redirect()->to('dashboard');
        }
    }

    /**
     * Close the modal to edit the video game.
     */
    public function CloseEditVideogame(){
        $this->wirePoll = true;
        $this->editModal = false;

        // It allows retrieving the game's cover.
        $videogame = Videogame::where('id', $this->videogame_id)->first();
        $this->videogameCover = $videogame->cover;
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
     * It allows keeping each user's "Details" pages synchronized.
     */
    public function renderDetails(){   
        $this->getUserDetails();
        $this->getVideogameDetails();
    }


    /**
     * Edit the video game.
     */
    public function editVideogame(){
        $videogame = Videogame::where('id', $this->videogame_id)->first();

        // If the user did not upload a cover, the previous cover is maintained.
        if ($this->videogameCover === $videogame->cover) {
            $this->rulesEditVideogame['videogameCover'] = '';
        }

        $this->validate($this->rulesEditVideogame);

        $videogame->title = $this->videogameTitle;
        $videogame->description = $this->videogameDescription;
        $cover = $videogame->cover;

        // If the user uploaded a cover, store it and delete the previous one
        if ($this->videogameCover != $cover) {

            // Delete the previous cover
            if($cover != "cover.png"){
                unlink(public_path('img/gameCovers/' . $cover));
            }

            // Store the new cover
            $path = $this->videogameCover->storeAs('', time() . '.' . $this->videogameCover->getClientOriginalExtension(), 'gameCovers');
            $cover = $path;

        }

        // Update the video game
        $videogame->update(
            [
                'title' => $this->videogameTitle,
                'description' => $this->videogameDescription,
                'cover' => $cover
            ]
        );

        // Close the modal and refresh the details
        $this->wirePoll = true;
        $this->editModal = false;
        $this->getVideogameDetails();
    }


    /**
     * Delete the video game.
     */
    public function deleteVideogame(){
        $this->wirePoll = false;

        $videogame = Videogame::where('id', $this->videogame_id)->first();

        // Delete the cover of the video game
        if($videogame->cover != "cover.png"){
            unlink(public_path('img/gameCovers/' . $videogame->cover));
        }

        // Delete the video game
        $videogame->delete();

        // Redirect to the home page
        return redirect()->to('dashboard');
    }

    // Redirect to the home page
    public function backToHome(){
        return redirect()->to('dashboard');
    }

    /**
     * Render the component
     */
    public function render(){
        return view('livewire.details-component')->layout('layouts.app');
    }
}
