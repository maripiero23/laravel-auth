@extends('layouts.app')

@section('content')
    <div class="container">

        <div>
            <h1 class="text-center text-primary">modifica Progetto # {{$project->id}}</h1>
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
    
        <h1> Ciao</h1>
        <div class="row justify-content-center">
            <div class="col-6">
    
                <form action="{{route('admin.projects.update', $project->id)}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    @method('PUT')
        
                    <label class="form-label">Title: </label>
                    {{-- L'unica differenza che la view edit ha con la view create è che i campi devono avere, al loro interno,
                    già il valore salvato nel database, userò quindi il VALUE --}}
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$errors->has('name') ? '' :old('name')}}">
                    @error('name') {{--se ho un errore nel campo name stampami un div con la classe invalid-feedback,un messaggio con errore--}}
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
        
                    <label class="form-label">Description: </label>
                    {{--Per le textare non c'è il VALUE ma bisogna scrivere dentro i tag--}}
                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror">{{$errors->has('description') ? '' :old('description')}}</textarea>
                    
                    <label class="form-label">Thumb: </label>
                    {{--Se ho un errore nel campo name mi stampi il valore prima dell'errore se non c'è nulla da stampare mi stampi il valore che c'è nel form create--}}
                    <input type="file" name="cover_img" class="form-control @error('cover_img') is-invalid @enderror" value="{{$errors->has('cover_img') ? '' :old('cover_img')}}">
                    
                    <label class="form-label">GitHub: </label>
                    <input type="text" name="github_link" class="form-control @error('github_link') is-invalid @enderror" value="{{$errors->has('github_link') ? '' :old('github_link')}}">
                    @error('github_link') 
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
    
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary me-3">Add</button>
                    </div>
                </form>
            </div>
            <div class="buttons-containr d-flex justify-content-center">

                <div class="mt-4">
                   <a href="{{route("admin.projects.index")}}"><button class="btn btn-danger">Back</button></a>
               </div>
            </div>           
        </div>
    </div>
@endsection