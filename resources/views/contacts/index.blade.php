@extends('layouts.app')

@section('content')

abcd
<ul>
@foreach($contacts as $contact )

    <li>{{$contact->name}}</li>
    <li>{{$contact->address}}</li>
    <li>{{$contact->tel}}</li>
    <li>{{$contact->user_id}}</li>
    <li><img src="{{Storage::url($contact->img)}}" alt="img contact"></li>

@endforeach
</ul>

@endsection