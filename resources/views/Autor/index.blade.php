@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Autores</h1>
        <a href="{{ route('autors.create') }}" class="btn btn-success mb-3">Novo Autor</a>
        
        <!-- Barra de Busca -->
        <form method="GET" action="{{ route('autors.index') }}" class="mb-3">
            <input type="text" name="search" class="form-control" placeholder="Buscar por nome" value="{{ request()->input('search') }}">
        </form>
        
        <!-- Lista de Autores -->
        <ul class="list-group">
            @foreach ($autors as $autor)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $autor->nome }} - {{ $autor->biografia }}</span>
                    <div>
                        <a href="{{ route('autors.show', $autor) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('autors.edit', $autor) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('autors.destroy', $autor) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <!-- Paginação -->
        <div class="mt-3">
            {{ $autors->links() }}
        </div>
    </div>
@endsection