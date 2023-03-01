<?php

namespace App\Models;

use App\Models\User;
use App\Models\Livre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class groupes extends Model
{
     use HasFactory;

    public function users(){
        return $this->belongsTo(User::class);
     }
     public function livre(){
        return $this->belongsTo(Livre::class);
     }
}
