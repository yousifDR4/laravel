<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable=[
        "body","content"
    ];
    protected $casts=[
        "body"=>"array"
    ];
    public function post(){
        return $this->belongsTo(post::class,"post_id");
    }
}
