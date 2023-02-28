<?php

namespace App\Models;

use App\Models\favorites;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livre extends Model
{
   use HasFactory;
    protected $table='books';

 public function favorites(){
        return $this->hasMany(favorites::class);
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
