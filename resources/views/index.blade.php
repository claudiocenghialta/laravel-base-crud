@extends('layouts.app')
@section('title','Contatti')
@section('content')
    @foreach ($contacts as $contact)
        <ul>
            <li><strong>Name: </strong>  {{$contact->name}} </li>
            <li><strong>Surname: </strong>  {{$contact->surname}} </li>
            <li><strong>Mail: </strong>  {{$contact->mail}} </li>
            <li><strong>Phone: </strong>  {{$contact->phone}} </li>
            <li><strong>Address: </strong>  {{$contact->address}} </li>
            <li><strong>City: </strong>  {{$contact->city}} </li>
            <li><strong>Postal Code: </strong>  {{$contact->postalCode}} </li>
        </ul>
    @endforeach
@endsection