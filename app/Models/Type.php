<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;
    
    protected $fillable = ['type'];

    /**
     * Relation 
     */
    public function lunettes()
    {
        return $this->hasMany(Lunette::class);
    }
    
}
