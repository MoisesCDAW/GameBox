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

    // Control when to display the modal to edit the video game.
    public $editModal = false;
    
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
     * Open the modal to edit the video game.
     */
    public function OpenEditVideogame(){
        $this->editModal = true;
    }

    /**
     * Close the modal to edit the video game.
     */
    public function CloseEditVideogame(){
        $videogame = Videogame::where('id', $this->videogame_id)->first();
        $this->editModal = false;
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
     * Edit the video game.
     */
    public function editVideogame(){
        $videogame = Videogame::where('id', $this->videogame_id)->first();
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

        $this->js("setTimeout(() => {alert('Video game edited successfully.')}, 200);");

        // Close the modal and refresh the details
        $this->editModal = false;
        $this->getVideogameDetails();
    }


    /**
     * Delete the video game.
     */
    public function deleteVideogame(){
        $videogame = Videogame::where('id', $this->videogame_id)->first();

        // Delete the cover
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
