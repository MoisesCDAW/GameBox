<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Videogame extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
    ];

    /**
     * Get the user that owns the videogame
     * Many-to-one relationship with User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the comments for the videogame
     * One-to-many relationship with Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
    }

    /**
     * The roles that belong to the videogame
     * Many-to-many relationship with User (via Comment)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'comments', 'user_id', 'videogame_id')->withTimestamps();
        
        /*
        comments: The name of the pivot table (in this case, comments).
        user_id: The foreign key in the comments table that references the users table.
        videogame_id: The foreign key in the comments table that references the videogames table.
        */

        // withTimestamps: This method is used in many-to-many relationships to allow Laravel to automatically manage the created_at and updated_at columns in the pivot table.
    }
}
