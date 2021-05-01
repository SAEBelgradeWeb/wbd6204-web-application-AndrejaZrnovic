@extends('layouts.app')

@section('content')

@foreach($properties as $prop)
    <ul>

        <li>{{$prop->country}}</li>
        <li><img style="width:100px;" src="{{$prop->image}}" alt=""></li>
        <a href="/property/{{$prop->id}}">{{$prop->name}}</a>
        <li>{{$prop->description}}</li>
        <li>{{$prop->price}}</li>

    </ul>
@endforeach



@endsection
