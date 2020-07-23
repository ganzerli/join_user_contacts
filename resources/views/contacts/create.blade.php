@extends('layouts.app')

@section('content')

view create


<div class="container">

  @if(session('message'))
    <div class="alert alert-success" role="alert">
      {{session('message')}}
    </div>
  @endif
    <div class="row">

        <form method="post" action="{{route('contacts.store')}}" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="name">Nome</label>
            <input id="name" type="text" name="name" value="{{old('name')}}" class="form-control">
          </div>

          <div class="form-group">
            <label for="email">Indirizzo</label>
            <input id="address" type="text" name="address" value="{{old('address')}}" class="form-control">
          </div>

          <div class="form-group">
            <label for="tel">Telefono</label>
            <input id="tel" type="tel" name="tel" value="{{old('tel')}}" class="form-control">
          </div>

          <div class="form-group">
            <label for="img">Immagine</label>
            <input id="img" type="file" name="img" value="{{old('img')}}" class="form-control">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>

@if($errors->any())
  @foreach($errors->all() as $err)
    {{$err}}
  @endforeach
@endif



@endsection