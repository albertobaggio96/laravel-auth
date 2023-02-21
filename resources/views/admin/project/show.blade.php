@extends('layouts.app')

@section('content')
    <section class="container text-center pt-5">
      <img src="{{ $project->preview }}" alt="{{ $project->title }}">
      <h1>{{ $project->title }}</h1>
      <h3>Author: {{ $project->author }}</h3>
      <div>date: {{ $project->date }}</div>
      <div>
        <a href="{{ route("admin.project.index") }}" class="btn btn-primary">Torna alla tabella</a>
        <a href="" class="btn btn-warning">Edit</a>
        <form class="d-inline" action="{{ route("admin.project.destroy", $project->id) }}" method="POST">
          @csrf
          @method("DELETE")
          <button type="submit" class="btn btn-danger" value="delete">Delete</button>
        </form>
      </div>
    </section>
@endsection