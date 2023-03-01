<?php

namespace App\Http\Controllers;

use App\Models\commentaire_groupe;
use App\Models\groupes;
use App\Models\membres;
use Illuminate\Http\Request;

class GroupeController extends Controller
{

    // create groupe
    public function create(Request $request)
    {

        $formFields = $request->validate([
            'name_groupe' => 'required',
            'books_id'=>'required',
        ]);
        $formFields['user_created'] = auth()->id();
        groupes::create($formFields);
        return redirect('/');
    }

    public function  delete(groupes $groupe){
        $groupe->delete();
        return Redirect('/profile')->with('message','groupe deleted successfully');
     }

    //  join
    public function join($groupe)
    {
        $formFields = [
            'user_id'=>auth()->id(),
            'groupe_id'=>$groupe

        ];
        $membres= membres::where('user_id', auth()->id())
        ->where('groupe_id', $groupe)
        ->first();


if($membres) {
  return redirect('/');

} else {
    membres::create($formFields);
    return redirect('/');

  }

    }
    public function groupe ($groupe){
      $groupes=groupes::join('books', 'groupes.books_id', '=', 'books.id')
      ->where('groupes.id', $groupe)
      ->select('groupes.*', 'books.title','books.image','books.discription','books.auteur','books.id as id_book')
      ->get();
      $commentaire = commentaire_groupe::where('groupe_id', $groupe)->get();
        return view('livres\groupe', [
            'groupe' => $groupes,
            'commentaire' => $commentaire
        ]);
    }
       // create groupe
       public function comment(Request $request,$groupe)
       {

           $formFields = $request->validate([
               'commentaire' => 'required',
           ]);
           $formFields['groupe_id'] = $groupe;
          commentaire_groupe::create($formFields);

          return redirect()->action([GroupeController::class, 'groupe'], ['groupe' => $groupe]);
        }

}
