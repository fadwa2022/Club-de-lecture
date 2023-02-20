<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APP\Models\Livre;
class Categories extends Model
{
    protected $fillable = [
        'id',
    'categorie'
];

    use HasFactory;
    public function Lives(){
        return $this->hasMany(Livre::class,'categorie_id','id');
    }
}
