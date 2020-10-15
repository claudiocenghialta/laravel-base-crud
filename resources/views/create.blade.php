@extends('layouts.app')
@section('title','Nuovo contatto')
@section('content')
    <form action="{{route('contacts.store')}}" method="post">
        @csrf
        @method('POST')
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Name" id="name" value="{{old('name')}}">

        <label for="surname">Surname</label>
        <input type="text" name="surname" placeholder="Surname" id="surname" value="{{old('surname')}}">

        <label for="mail">Mail</label>
        <input type="email" name="mail" placeholder="Mail" id="mail" value="{{old('mail')}}">

        <label for="phone">Phone</label>
        <input type="number" name="phone" placeholder="Phone" id="phone" value="{{old('phone')}}">

        <label for="address">Address</label>
        <input type="text" name="address" placeholder="Address" id="address" value="{{old('address')}}">

        <label for="city">City</label>
        <input type="text" name="city" placeholder="City" id="city" value="{{old('city')}}">

        <label for="postalCode">Postal Code</label>
        <input type="number" name="postalCode" placeholder="Postal Code" id="postalCode" value="{{old('postalCode')}}">

        <input type="submit" value="Invia">
    </form>
@endsection