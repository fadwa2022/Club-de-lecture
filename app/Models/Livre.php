<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
class Livre extends Model
{
   use HasFactory;
    protected $table='books';
    // protected $fillable = ['id','image', 'title', 'discription', 'auteur', 'categorie', 'likes', 'dislikes'];
    // //     public static function find($id){
    //   $listings =self::all();
    //   foreach($listings as $listing)
    // {
    //     if($listing['id'] == $id)
    //     {
    //         return $listing;
    //     }
    // }
    //     }
 public function categorie(){
    return $this ->belongsTo(Categories::class);
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

    // // relation ship to user
    // public function user(){
    //     return $this->belongsTo(User::class , 'user_id');
    // }
}
