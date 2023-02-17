<?php
namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ListingController extends Controller
{
    // show alll istings
    // request for get from url
    public function index(Request $request)
    {
        // dd(request()->tag);or Request('tag')
        return view('livres\index', [
            // 'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4) // for simplepagination Simplepaginete()
        ]);
    }

    // show single listing

    public function show(Listing $listing)
    {
        return view('listings\show', [
            'listing' => $listing
        ]);
    }
    // show create form

    public function create()
    {
        return view('listings\create');
    }
    //store
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'discription' => 'required'
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        $formFields['user_id'] = auth()->id();
        Listing::create($formFields);

        return redirect('/')->with('message','listing created successfully');
    }
    // show edit form
    public function edit (Listing $listing){
        return view('listings\edit', [
            'listing' => $listing
        ]);
    }
    // update
    public function update(Request $request,Listing $listing)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'discription' => 'required'
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        $listing->update($formFields);

        return back()->with('message','listing updated successfully');
    }
    public function  destroy (Listing $listing){
       $listing->delete();
       return Redirect('/')->with('message','listing deleted successfully');
    }
    // // Manage Listings
    // public function manage() {
    //     return view('listings\manage', ['listings' => auth()->user()->listings()->get()]);
    // }
}
