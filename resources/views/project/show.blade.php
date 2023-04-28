@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h1>{{$project->title}}</h1>
            <p>({{$project->slug}})</p>
            <p>
                @if($project->type)
                    <strong>
                        Tipologia:{{$project->type->name}}
                    </strong> 
                @endif   
            </p>
        </div>

        <div>

            @if ($project->content == NULL)

                <p class="fw-bold text-center">
                    Il contenuto è in lavorazione.
                </p>
            
            @endif

            <p>
                {{$project->content}}
            </p>

        </div>

        <a href="{{route('projects.edit', $project)}}" class="btn btn-success">
            Modifica
        </a>

    </div>
@endsection