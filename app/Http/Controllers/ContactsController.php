<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactRequest;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $req)
    {   

        // use create strafico, con arr-element user_id => Auth::id()
        $contact = Contact::create([
            'name'=>$req->name,
            'address'=>$req->address,
            'tel'=>$req->tel,
            'img'=>$req->file('img')->store('public/img'),
            'user_id'=>Auth::id()
        ]);
        
        //dd($contact);

        return redirect()->back()->with('message','contatto inserito');
        
        // without User..
        //$contact = Contact::create($req->validated());
       
        //with user
        //$user = Auth::user();
        // method contacts is created in User model
        // contacts() returns Contact object, related with user
        //$contact = $user->contacts()->create($req->validated());



        // OR :
        //$contact = new Contact();
        //$contact->name = $req->input('name');
        //$contact->... = ... 
        //$contact->user()->associate(Auth::id());
        //$contact->save();
        // in this case no user_id in $fillable User
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
