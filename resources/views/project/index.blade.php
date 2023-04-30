@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between p-5">
        <h1>
            Elenco Projects 
        </h1>
        <div>
            @if(request('trashed'))
                <a class="btn btn-sm btn-light" href="{{ route('projects.index') }}">Tutti i post</a>
            @else
                <a class="btn btn-sm btn-light" href="{{ route('projects.index',['trashed' => true]) }}">
                    Cestino ({{ $number_of_trashed}})
                </a>
            @endif
            <a href="{{route('projects.create')}}" class="btn btn-outline-primary">
                Aggiungi Projects
            </a>
        </div>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Type</th>
            <th scope="col">Tecnologies</th>
            <th scope="col">Content</th>
            <th scope="col">Slug</th>
            <th scope="col">Elimina</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)

                <tr>
                    <th scope="row">{{$project->id}}</th>
                    <td>
                        <a href="{{ route('projects.show', $project) }}">
                            {{$project->title}}
                        </a>
                    </td>
                    <td>{{$project->type ? $project->type->name : '-'}}</td>
                    <td>
                        @forelse($project->technologies as $technology)
                            <span class="badge text-bg-secondary">{{ $technology->name }}</span>
                        @empty
                            -
                        @endforelse
                    </td>
                    @if($project->content)
                        <td>{{$project->content}}</td>
                    @else
                        <td>
                            <strong>
                                Nessun Contenuto.
                            </strong>
                        </td>
                    @endif    
                    <td>{{$project->slug}}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <form action="{{ route('projects.destroy',$project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-sm btn-danger" type="submit" value="Elimina">
                            </form>
                            @if($project->trashed())
                                <form action="{{ route('projects.restore',$project) }}" method="POST">
                                    @csrf
                                    <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
      </table>
</div>
@endsection