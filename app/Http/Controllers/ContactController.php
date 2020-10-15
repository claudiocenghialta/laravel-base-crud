<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if (empty($data['name']) || empty($data['surname']) || empty($data['mail']) || empty($data['phone']) || empty($data['address'])|| empty($data['city'])|| empty($data['postalCode'])) {
            return back()->withInput();
        }
        $contactNew = new Contact;
        $contactNew->name = $data['name'];
        $contactNew->surname = $data['surname'];
        $contactNew->mail = $data['mail'];
        $contactNew->phone = $data['phone'];
        $contactNew->address = $data['address'];
        $contactNew->city = $data['city'];
        $contactNew->postalCode = $data['postalCode'];
        $saved = $contactNew->save();

        return redirect()->route('contacts.index');

        // $contact = Contact::orderBy('id', 'desc')->first();
        // return redirect()->route('contacts.show', $contact);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
