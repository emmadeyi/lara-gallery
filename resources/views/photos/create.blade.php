@extends('layouts.app')

@section('content')
  <h3>Create Photos</h3>
  {!! Form::open(['action' => 'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <label>
      {{Form::label('title', 'Photo Title')}}
      {{Form::text('title', '', ['placeholder' => 'Photo Title'])}}
    </label>    
    <label>
      {{Form::label('description', 'Photo Description')}}
      {{Form::textarea('description', '', ['placeholder' =>'Photo description'])}}
    </label>
    <label>      
      {{Form::file('photo')}}
    </label>
    <label>      
        {{Form::hidden('album_id', $album_id)}}
    </label>
    <label>
      {{form::submit('submit', ['class' => 'btn btn-block btn-default'])}}
    </label>
  {!! Form::close() !!}
@endsection