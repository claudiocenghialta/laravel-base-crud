@extends('layouts.app')
@section('title','Nuovo contatto')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
        </div>
    @endif

   {{-- controllo se viene passato il valore $contact, se vero è una edit e quindi deve andare su update, se no è una create e deve andare su store--}}
    <form action="{{ (!empty($contact)) ? route('contacts.update',$contact->id) : route('contacts.store')}}" method="post">
        @csrf
        @if (!empty($contact))
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $contact->id }}">
        @else
            @method('POST')
        @endif
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Name" id="name" value="{{ (!empty($contact)) ? $contact->name : old('name')}}">

        <label for="surname">Surname</label>
        <input type="text" name="surname" placeholder="Surname" id="surname" value="{{ (!empty($contact)) ? $contact->surname : old('surname')}}">

        <label for="mail">Mail</label>
        <input type="email" name="mail" placeholder="Mail" id="mail" value="{{ (!empty($contact)) ? $contact->mail : old('mail')}}">

        <label for="phone">Phone</label>
        <input type="number" name="phone" placeholder="Phone" id="phone" value="{{ (!empty($contact)) ? $contact->phone : old('phone')}}">

        <label for="address">Address</label>
        <input type="text" name="address" placeholder="Address" id="address" value="{{ (!empty($contact)) ? $contact->address : old('address')}}">

        <label for="city">City</label>
        <input type="text" name="city" placeholder="City" id="city" value="{{ (!empty($contact)) ? $contact->city : old('city')}}">

        <label for="postalCode">Postal Code</label>
        <input type="number" name="postalCode" placeholder="Postal Code" id="postalCode" value="{{ (!empty($contact)) ? $contact->postalCode : old('postalCode')}}">

        <input type="submit" value=" {{ (!empty($contact)) ? 'Modifica' : 'Invia'}} ">
    </form>
    @if (!empty($contact))
         <form action=" {{route('contacts.destroy',$contact->id)}} " method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="Cancella">
        </form>
    @endif
@endsection