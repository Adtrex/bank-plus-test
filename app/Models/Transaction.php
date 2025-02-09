<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Transaction extends Model
{
    use HasFactory;

    public function transactions()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }
    
}
