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
        'county',
        'country',
        'town',
        'description',
        'full_details_url',
        'displayable_address',
        'image_url',
        'thumbnail_url',
        'latitude',
        'longtitude',
        'num_of_bedrooms',
        'num_of_bathrooms',
        'price',
        'property_type',
        'for_sale_rent'
    ];
}
