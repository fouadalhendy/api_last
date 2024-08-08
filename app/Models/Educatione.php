<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educatione extends Model
{
    use HasFactory;
    protected $fillable = [
        'level',
        'experience'
    ];

    public function projects(){
        return $this->belongsToMany(Project::class);
    }
    public function certificate(){
        return $this->belongsTo(Certificate::class);
    }
}
