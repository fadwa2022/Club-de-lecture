<?php

namespace App\Models;

use App\Models\groupes;
use App\Models\favorites;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livre extends Model
{
   use HasFactory;
    protected $table='books';
    protected $fillable = [
    'id',
    'image',
    'title',
    'discription',
    'auteur',
    'categorie_id ',
    'likes',
    'dislikes',
    'archiver',
    'stars'
];
 public function favorites(){
        return $this->hasMany(favorites::class);
 }
 public function groupes(){
    return $this->hasMany(groupes::class);
}

 public function categorie(){
    return $this->belongsTo(Categories::class);
 }


public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('title', 'like','%'.request('search').'%')
                ->orWhere('discription','like','%'.request('search').'%')
                ->orWhere('auteur', 'like','%'.request('search').'%')
                ->orWhere('categorie_id', 'like', '%' . request('search') . '%');

        }
    }
}
