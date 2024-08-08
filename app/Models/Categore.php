<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categore extends Model
{
    use HasFactory;
    protected $fillable = [
        'titel',
        'img',
        'content'
    ];
    public function project(){
        return $this->hasMany(project::class);
    }
}
