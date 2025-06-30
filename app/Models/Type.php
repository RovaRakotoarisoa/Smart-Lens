<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name'];

    /**
     * Relation 
     */
    public function lunettes()
    {
        return $this->hasMany(Lunette::class);
    }
    
}
