<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{

    protected $fillable = [
        'color_name',
        'code_color'
    ];

    /** 
     * Relation
    */

    public function lunettes(){
        return $this->belongsToMany(Color::class, 'lunette_color');
    }
}
