<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_certificate',
        'img_certificate',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function educatione(){
        return $this->hasOne(Educatione::class);
    }
}
