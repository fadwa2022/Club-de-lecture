<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Livre;
use App\Models\groupes;
use App\Models\Categories;
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
        // for ($i = 0; $i < sizeof($livres); $i++) {
        //     $tab = explode("\\",$livres->image);
        //     $livres->image = $tab[6];
        //       };
      return view('livres\index',
      [
    'livres' =>$livres,
      'categories'=> Categories::all()

    ]);
    }


    public function livre (Livre $livre ){
        return view('livres\livre', [
            'livre' => $livre
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

        favorites::create($formFields);

        return redirect('/profile');
    }


}



