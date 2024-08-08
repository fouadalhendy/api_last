<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacte extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'img',
        'phone_number',
        'website'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}

