@extends('layouts.app')

@section('content')
    <a href="/" class="btn btn-default">Go Back</a>
    <h1><a href="todo/{{$todo->id}}">{{$todo->text}}</a></h1>
    <span class="label label-danger">{{$todo->due}}</span>
    <hr/>
    <p>{{$todo->body}}</p>
    <br/><br/>

    <a href="/todo/{{$todo->id}}/edit" class="btn btn-default">Edit</a>
    {!! Form::open(['action' => ['TodosController@destroy', $todo->id], 'method' => 'POST']) !!}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::bsSubmit('Delete') }}
    {!! Form::close() !!}
@endsection