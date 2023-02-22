<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Livre;
use Illuminate\Http\Request;
use DB;
class LivresController extends Controller
{

    // show alll istings
    // request for get from url
    public function index(Request $request)
    {
        //    $livres= Livre::all();

        // dd($request);

        return view('livres\index', [
            'livres' => livre::latest()->filter(request(['search']))->paginate(4), //for simplepagination Simplepaginete()
            'categories'=> Categories::all()

        ]);
    }
    public function dashboard(){
     return view('dashboard', [
                    'categories'=> Categories::all()
                ]);
    }
     //store
     public function store(Request $request)
     {
         $formFields = $request->validate([
             'categorie' => 'required',
         ]);

         Categories::create($formFields);

         return redirect('/dashboard')->with('message','listing created successfully');
     }
//     public function index(){
// $result = Livre::table('books')
// ->join('categories','books.caegories','=','categories.id')
// ->select('*')
// ->get();
// return $result;
//     }
}
