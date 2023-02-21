@extends('layouts.app')

@section('content')
  <section class="container">
    <table>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">title</th>
            <th scope="col" class="text-center">options</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          @foreach ($trashProjects as $project)
            <tr>
                <td>{{ $project->title }}</td>
                <td class="text-center">
                  <a href="{{ route("admin.project.edit", $project->slug) }}" class="btn btn-warning">Edit</a>
                  <form class="d-inline delete-element" action="{{ route("admin.project.destroy", $project->slug) }}" method="POST" method="POST" data-element-name="{{ $project->title }}">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger" value="delete">Delete</button>
                  </form>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </table>
  </section>
@endsection