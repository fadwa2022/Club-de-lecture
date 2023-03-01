<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


use App\Models\Livre;
use App\Models\groupes;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function dashboard(){

            return view('dashboard', [
                        'categories'=> Categories::all(),
                        'books'=> DB::table('books')
                        ->join('categories', 'books.categorie_id', '=', 'categories.id')
                        ->select('books.*', 'categories.categorie as categories_name')
                        ->get()->filter(function ($entry) {
                            return $entry->archiver === null;
                        }),
                        'booksarchiver'=> DB::table('books')
                        ->join('categories', 'books.categorie_id', '=', 'categories.id')
                        ->select('books.*', 'categories.categorie as categories_name')
                        ->get()->filter(function ($entry) {
                            return $entry->archiver === 'archive';
                        }),
                        'users'=>User::all(),
                        'groupes'=>DB::table('groupes')
                        ->join('users', 'groupes.user_created', '=', 'users.id')
                        ->select('groupes.*', 'users.name as user_name')
                        ->get(),
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


              //storebook
              public function storebook(Request $request)
              {
                  $formFields = $request->validate([
                      'title' => 'required',
                      'discription' => 'required',
                      'auteur' => 'required',
                      'categorie_id' => 'required',

                    ]);
                    if($request->hasfile('image')){
                        $file_name=pathinfo($request->file('image')->getClientOriginalName(),PATHINFO_FILENAME);
                        $file_name_ext=strtolower($request->file('image')->getClientOriginalExtension());
                        // dd($file_name.".".$file_name_ext);
                        $formFields['image'] =$request->file('image')->move(public_path('storage/imagesbooks'), $file_name.".".$file_name_ext);
                        // $formFields['image'] =$request->file('image')->storeAs('public/imagesbooks',$file_name.".".$file_name_ext);
                        // Storage::move('public/imagesbooks/'.$file_name.".".$file_name_ext, 'public/storage/imagesbooks/'.$file_name.".".$file_name_ext);

                    }

                  Livre::create($formFields);

                  return redirect('/dashboard')->with('message','categorie created successfully');
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
         public function desarchiverbook(Livre $book)
         {
             $formFields = ['archiver'=> null];

             $book->update($formFields);
             return Redirect('/dashboard')->with('message','book updated successfully');

         }


}
