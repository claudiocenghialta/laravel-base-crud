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
        // if (empty($data['name']) || empty($data['surname']) || empty($data['mail']) || empty($data['phone']) || empty($data['address'])|| empty($data['city'])|| empty($data['postalCode'])) {
        //     return back()->withInput();
        // }
        // $contactNew = new Contact;
        // $contactNew->name = $data['name'];
        // $contactNew->surname = $data['surname'];
        // $contactNew->mail = $data['mail'];
        // $contactNew->phone = $data['phone'];
        // $contactNew->address = $data['address'];
        // $contactNew->city = $data['city'];
        // $contactNew->postalCode = $data['postalCode'];
        // $saved = $contactNew->save();
        $request->validate([
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'mail' => 'required|min:2|max:100',
            'phone' => 'required|numeric|min:2|max:2147483647',
            'address' => 'required|min:2|max:255',
            'city' => 'required|min:2|max:255',
            'postalCode' => 'required|numeric|min:2|max:2147483647',
        ]);
        

        $contactNew = new Contact;
        $contactNew->fill($data);
        $saved = $contactNew->save();

        if ($saved) {
            return redirect()->route('contacts.index');
        } /* else (
            return back()->withInput();
        ) */

        // $contact = Contact::orderBy('id', 'desc')->first();
        // return redirect()->route('contacts.show', $contact);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //   public function show($id)
    // {
    //     $contact = Contact::find($id);
    //     return view('show',compact('contact'));
    // }

    public function show(Contact $contact)
    {
        return view('show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('create', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $data = $request->all();
        $request->validate([
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'mail' => 'required|min:2|max:100',
            'phone' => 'required|numeric|min:2|max:2147483647',
            'address' => 'required|min:2|max:255',
            'city' => 'required|min:2|max:255',
            'postalCode' => 'required|numeric|min:2|max:2147483647',
        ]);
        $contact->update($data);
        return view('show', compact('contact'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}
