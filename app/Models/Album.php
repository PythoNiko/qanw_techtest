<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    /**
     * Table that the model represents
     *
     * @var string
     */
    protected $table = 'albums';

    /**
     * Mass assignable variables
     *
     * @var string[] $fillable
     */
    protected $fillable = [
        'user_id',
        'album_id',
        'title',
    ];

    /**
     * Get the user associated to the album
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
