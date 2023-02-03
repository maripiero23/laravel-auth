@extends('layouts.app')

@section('content')
    <div class="container">

        <div>
            <h1 class="text-center text-primary">New Project</h1>
        </div>
    
        {{-- Se ci sono degli errori di validazione mostriamo un allert con questi errori --}}
        @if($errors->any())
        <div class="alert alert-danger">
            I dati inseriti non sono validi:
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    
        <div class="row justify-content-center">
            <div class="col-6">
    
                <form action="{{route('admin.projects.store')}}" method="POST">
                    @csrf
        
                    <label class="form-label">Title: </label>
                    <input type="text" name="title" class="form-control">
        
                    <label class="form-label">Description: </label>
                    <input type="text" name="description" class="form-control">
                    
                    <label class="form-label">Thumb: </label>
                    <input type="text" name="thumb" class="form-control">
                    
                    <label class="form-label">GitHub: </label>
                    <input type="text" name="price" class="form-control">
    
                </form>
            </div>
            <div class="buttons-containr d-flex justify-content-center">
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary me-3">Add</button>
                </div>

                <div class="mt-4">
                   <a href="{{route("admin.projects.index")}}"><button class="btn btn-danger">Back</button></a>
               </div>
            </div>           
        </div>
    </div>
@endsection