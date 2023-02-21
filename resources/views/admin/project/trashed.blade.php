@extends('layouts.app')

@section('content')
  <section class="container">
    @if (session("message"))
        <div class="alert alert-{{ session('alert-type') }} mb-5">
          {{ session("message") }}
        </div>
      @endif
      
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
                  <a href="{{ route("admin.restore", $project->slug) }}" class="btn btn-warning">Restore</a>
                  <form class="d-inline delete-element" action="{{ route("admin.force-delete", $project->slug) }}" method="POST" method="POST" data-element-name="{{ $project->title }}">
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