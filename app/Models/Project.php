<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'head',
        'description',
        'img_project'
    ];
    public function categore(){
        return $this->belongsTo(Categore::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function educationes(){
        return $this->belongsToMany(Educatione::class);
    }
}
