@extends('layouts.app')

@section('content')
  <h3>{{$photo->title}}</h3>
  <p>{{$photo->description}}</p>
  <a href="/albums/{{$photo->album_id}}" class="button secondary">Go Back</a>
  <hr>
  <img class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
  <br><br>
  {!! Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST']) !!}    
    <label>      
        {{Form::hidden('_method', 'DELETE')}}
    </label>
    <label>
      {{form::submit('Delete Photo', ['class' => 'button alert'])}}
    </label>
  {!! Form::close() !!}
  <hr>
  <small>Size: {{$photo->size}}</small>
@endsection