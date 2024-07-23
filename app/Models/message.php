<?php

namespace App\Models;

use App\Models\conversations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class message extends Model
{
    use HasFactory;
    protected $fillable = ["body", "conversations_id", "sender_id", "group_id", 'receiver_id'];
    public function conversations()
    {
        return $this->belongsTo(conversations::class, "conversations_id");
    }
    public function sender()
    {
        return $this->belongsTo(User::class, "sender_id");
    }
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
    public function groups()
    {
        return $this->belongsTo(group::class, "group_id");
    }
}
