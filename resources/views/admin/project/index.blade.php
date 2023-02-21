@extends('layouts.app')

@section('content')
<section>

  <div class="text-center py-4">
    <a href="{{ route("admin.project.create") }}" class="btn btn-primary">Add new Project</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#id</th>
        <th scope="col">title</th>
        <th scope="col">author</th>
        <th scope="col">date</th>
        <th scope="col">preview</th>
        <th scope="col">option</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($projects as $project)
        <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->title }}</td>
            <td>{{ $project->author }}</td>
            <td>{{ $project->date }}</td>
            <td><img src="{{ $project->preview }}" alt="{{ $project->title }}" class="preview"></td>
            <td>
              <a href="{{ route("admin.project.show", $project->id) }}" class="btn btn-primary">Show</a>
              <a href="{{ route("admin.project.edit", $project->id) }}" class="btn btn-warning">Edit</a>
              <form class="d-inline" action="">
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection