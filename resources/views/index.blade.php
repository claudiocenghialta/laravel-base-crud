@extends('layouts.app')
@section('title','Contatti')
@section('content')
    @foreach ($contacts as $contact)
        <ul>
            <a href=" {{route('contacts.show',$contact->id)}} "><li><strong>Name: </strong>  {{$contact->name}} </li> </a>
            <li><strong>Surname: </strong>  {{$contact->surname}} </li>
            <li><strong>Mail: </strong>  {{$contact->mail}} </li>
            <li><strong>Phone: </strong>  {{$contact->phone}} </li>
            <li><strong>Address: </strong>  {{$contact->address}} </li>
            <li><strong>City: </strong>  {{$contact->city}} </li>
            <li><strong>Postal Code: </strong>  {{$contact->postalCode}} </li>
            <a href=" {{route('contacts.edit',$contact->id)}} "><li>Modifica</li></a>
            <li>
                <form action=" {{route('contacts.destroy',$contact->id)}} " method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Cancella">
                </form>
            </li>
        </ul>
    @endforeach
@endsection