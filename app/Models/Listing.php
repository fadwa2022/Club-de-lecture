<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    // protected $fillable = ['title', 'company', 'location', 'website', 'email', 'discription', 'tags'];
    //     public static function find($id){
    //   $listings =self::all();
    //   foreach($listings as $listing)
    // {
    //     if($listing['id'] == $id)
    //     {
    //         return $listing;
    //     }
    // }
    //     }
    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('discription', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }
    // relation ship to user
    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
}
