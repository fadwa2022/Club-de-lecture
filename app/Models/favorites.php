<?php

namespace App\Models;

use App\Models\Livre;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class favorites extends Model
{
    use HasFactory;

    public function livre(){
        return $this->belongsTo(Livre::class);
     }
    // public function user(){
    //     return $this->belongsTo(User::class);
    //  }

}
