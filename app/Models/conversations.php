<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class conversations extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsToMany(User::class,"conversation_participants","conversations_id","user_id");
    }
}
