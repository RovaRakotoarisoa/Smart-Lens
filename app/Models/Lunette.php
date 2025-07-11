<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lunette extends Model
{
    /** @use HasFactory<\Database\Factories\LunetteFactory> */
    use HasFactory;

    /** Use this */
    protected $fillable = [
        'name',
        'price',
        'description',
        'quantity',
        'type_id',
        'frameWidth',
        'lensWidth',
        'bridgeWidth',
        'templeWidth',
        'primaryimage',
        'secondaryimage',
        'tertiaryimage',
        'quadriimage',
    ];


    /** OR this if nothing is to Guard 
     * And if this is only one thing to Guard
     * */
    //  protected $guard = [];



    /** 
     * Relation
    */
    public function colors() {
        return $this->belongsToMany(Color::class, 'lunette_color', 'lunette_id', 'color_id');
    }
    
}
