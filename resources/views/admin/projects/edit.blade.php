@extends('layouts.app')





@section('content')
<div class="container">
  <h1>Edit Project</h1>

  
  <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
    @csrf()
    @method('PUT')

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>       
          @endforeach
        </ul>
      </div>
      @endif



    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" class="form-control" name="name" value="{{$project->name}}">
    </div>

    <div class="mb-3">
      <label class="form-label">Descrizione</label>
      <textarea name="description" cols="30" rows="5" class="form-control">{{$project->description}}"</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Thumb</label>
      <input type="text" class="form-control" name="cover_img" value="{{$project->cover_img}}">
    </div>

    <div class="mb-3">
      <label class="form-label">Github</label>
      <input type="text" class="form-control" name="github_link" value="{{$project->github_link}}">
    </div>
    


    <div class="buttons-containr d-flex justify-content-center">
        <div class="mt-4">
            <button type="submit" class="btn btn-primary me-3">Add</button>
        </div>

        <div class="mt-4">
           <a href="{{route("admin.projects.index")}}"><button class="btn btn-danger">Back</button></a>
       </div>
    </div>  
  </form>


</div>
@endsection