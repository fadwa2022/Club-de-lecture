<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Livre;
use App\Models\groupes;
use App\Models\Categories;
use App\Models\commentaire_livre;
use App\Models\favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LivresController extends Controller
{

    // show alll istings
    // request for get from url
    public function index(Request $request)
    {

    $livres = Livre::latest()->filter(request(['search']))->paginate(4);
    $groupes = groupes::join('books', 'groupes.books_id', '=', 'books.id')
    ->select('groupes.*', 'books.title','books.image','books.discription','books.auteur','books.id as id_book')
    ->get();

        // for ($i = 0; $i < sizeof($livres); $i++) {
        //     $tab = explode("\\",$livres->image);
        //     $livres->image = $tab[6];
        //       };
      return view('livres\index',
      [
    'livres' =>$livres,
     'books'=>livre::all(),
      'categories'=> Categories::all(),
      'groupes' => $groupes
    ]);
    }


    public function livre (Livre $livre ){
        $commentaire = commentaire_livre::where('livre_id', $livre->id)->get();
        // dd($commentaire);
        return view('livres\livre', [
            'livre' => $livre,
            'commentaire'=>$commentaire
        ]);
    }

    public function updatelike ($id)
    {
        $livre = Livre::find($id);
        $formFields = ['likes'=> $livre->likes+1];

             $livre->update($formFields);
             return view('livres\livre', [
                'livre' => $livre
            ]);

    }
    public function updatedislike ($id)
    {
        $livre = Livre::find($id);

        $formFields = ['dislikes'=> $livre->dislikes+1];

             $livre->update($formFields);

             return view('livres\livre', [
                'livre' => $livre
            ]);

    }
    public function stars($id,$star){
        $livre = Livre::find($id);

        $formFields = ['stars'=> $star];

             $livre->update($formFields);

             return view('livres\livre', [
                'livre' => $livre
            ]);
    }
    public function favorite($id){

        $formFields = [
            'user_id' => auth()->id(),
            'books_id' => $id,
          ];
          $favorite = Favorites::where('user_id', auth()->id())
          ->where('books_id', $id)
          ->first();


if($favorite) {
    return redirect('/profile');

  } else {
        favorites::create($formFields);
        return redirect('/profile');

    }

    }


    // create comment
    public function comment(Request $request,$livre)
    {

        $formFields = $request->validate([
            'commentaire' => 'required',
        ]);
        $formFields['livre_id'] = $livre;
       commentaire_livre::create($formFields);

       return redirect()->action([LivresController::class, 'livre'], ['livre' => $livre]);
     }

}



