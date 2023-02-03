@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center my-2">My Projects</h1>

        <div class="row">

            <div class="col">

                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                      <div class="card">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Project title</h5>
                          <p class="card-text">Description</p>
                        </div>
                    </div>
                        {{-- <a href="{{route('admin.projects.edit')}}" class="btn btn-primary">Edit</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class=" text-center">
            <a href="{{route('admin.projects.create')}}" class="btn btn-primary my-5">Create  new Project</a>
        </div>




    </div>

    <h1>ciao</h1>
    
@endsection