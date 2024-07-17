<?php

namespace App\Models;

use App\Models\conversations;
use Workbench\App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class message extends Model
{
    use HasFactory;
    public function conversations(){
        return $this->belongsTo(conversations::class,"conversations_id");
    }
    public function users(){
        return $this->belongsTo(User::class,"user_id");
    }
}
