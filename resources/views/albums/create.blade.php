@extends('layouts.app')

@section('content')
  <h3>Create Album</h3>
  {!! Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <label>
      {{Form::label('name', 'Album Name')}}
      {{Form::text('name', '', ['placeholder' => 'Album Name'])}}
    </label>    
    <label>
      {{Form::label('description', 'Album Description')}}
      {{Form::textarea('description', '', ['placeholder' =>'Album description'])}}
    </label>
    <label>      
      {{Form::file('cover_image')}}
    </label>
    <label>
      {{form::submit('submit', ['class' => 'btn btn-block btn-default'])}}
    </label>
  {!! Form::close() !!}
@endsection