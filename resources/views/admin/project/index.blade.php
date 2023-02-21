@extends('layouts.app')

@section('content')
<section  class="container">

  <div class="text-center py-4">
    <a href="{{ route("admin.project.create") }}" class="btn btn-primary">Add new Project</a>
  </div>
  <table class="table table-dark table-striped table-hover">
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
    <tbody class="table-group-divider">
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
              <form class="d-inline" action="{{ route("admin.project.destroy", $project->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger" value="delete">Delete</button>
              </form>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $projects->links() }}
</section>
@endsection