<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    /**
     * Table that the model represents
     *
     * @var string
     */
    protected $table = 'config';

    /**
     * Mass assignable variables
     *
     * @var string[] $fillable
     */
    protected $fillable = [
        'data_loaded'
    ];
}
