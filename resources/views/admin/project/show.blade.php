@extends('layouts.app')

@section('content')
    <section class="container text-center pt-5">
      <img src="{{ $project->preview }}" alt="{{ $project->title }}">
      <h1>{{ $project->title }}</h1>
      <h3>Author: {{ $project->author }}</h3>
      <div>date: {{ $project->date }}</div>
      <div class="d-flex">
        <a href="{{ route("admin.project.show", $prevProject->id ?? "") }}" class="@if(!isset($prevProject)) disabled @endisset me-auto btn btn-secondary">Prev</a>

        <a href="{{ route("admin.project.index") }}" class="btn btn-primary">Back</a>
        <a href="" class="btn btn-warning">Edit</a>
        <form class="d-inline" action="{{ route("admin.project.destroy", $project->id) }}" method="POST">
          @csrf
          @method("DELETE")
          <button type="submit" class="btn btn-danger" value="delete">Delete</button>
        </form>

        <a href="{{ route("admin.project.show", $nextProject->id ?? "") }}" class="@if(!isset($nextProject)) disabled @endisset btn btn-secondary ms-auto">Next</a>
      </div>
    </section>
@endsection