@if($errors->any())
<div class="alert alert-danger container">
  <ul>
    @foreach($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
<form class="container my-5" action="{{route($route, $project->id)}}" method="POST">
    @csrf
    
    @method($method)

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Title</label>
      <input type="text" class="form-control"name="title" value="{{old('title', $project->title) }}">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">preview</label>
      <input type="text" class="form-control"name="preview" value="{{old('preview', $project->preview) }}">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">date</label>
      <input type="text" class="form-control"name="date" value="{{old('date', $project->date) }}">
    </div>
    <button type="submit" class="btn btn-primary">CREATE</button>
  </form>