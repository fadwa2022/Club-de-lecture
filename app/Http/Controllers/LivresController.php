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
                    'categories'=> Categories::all(),
                    'books'=> Livre::all()->filter(function ($entry) {
                        return $entry->archiver === null;
                    }),
                    'booksarchiver'=> Livre::all()->filter(function ($entry) {
                        return $entry->archiver === 'archive';
                    }),

                ]);
    }
     //store
     public function store(Request $request)
     {
         $formFields = $request->validate([
             'categorie' => 'required',
         ]);

         Categories::create($formFields);

         return redirect('/dashboard')->with('message','categorie created successfully');
     }
       // update
    public function update(Request $request,Categories $categorie)
    {
        $formFields = $request->validate([
            'categorie' => 'required',
   ]);

        $categorie->update($formFields);

        return redirect('/dashboard')->with('message','categorie updated successfully');
    }

    public function  delete(Categories $categorie){
        $categorie->delete();
        return Redirect('/dashboard')->with('message','categorie deleted successfully');
     }
          // updateLIVRE
    public function updatebook(Request $request,Livre $book)
    {
        $formFields = $request->validate([
            'title'=>'required',
            'discription'=>'required',
            'auteur'=>'required',
            'categorie_id'=>'',
            'likes'=>'required',
            'dislikes'=>'required',
   ]);

        $book->update($formFields);
        return Redirect('/dashboard')->with('message','book updated successfully');

    }
    public function  deletebook(Livre $book){
        $book->delete();
        return Redirect('/dashboard')->with('message','book deleted successfully');
     }
     public function archiverbook(Livre $book)
     {
         $formFields = ['archiver'=>'archive'];

         $book->update($formFields);
         return Redirect('/dashboard')->with('message','book updated successfully');

     }
//     public function index(){
// $result = Livre::table('books')
// ->join('categories','books.caegories','=','categories.id')
// ->select('*')
// ->get();
// return $result;
//     }
}
