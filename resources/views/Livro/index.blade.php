@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Livros</h1>
        <a href="{{ route('livros.create') }}" class="btn btn-success mb-3">Novo Livro</a>

        <!-- Barra de Busca -->
        <form method="GET" action="{{ route('livros.index') }}" class="mb-3">
            <input type="text" name="search" class="form-control" placeholder="Busca por titulo" value="{{ request()->input('search') }}">
        </form>



        <!-- Grid de Livros -->
        <div class="row">
            @foreach ($livros as $livro)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($livro->foto)
                            <img src="{{ asset('storage/' . $livro->foto) }}" class="card-img-top" alt="{{ $livro->nome }}">
                        @else
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="{{ $livro->nome }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $livro->nome }}</h5>
                            <p class="card-text">{{ Str::limit($livro->descicao, 100) }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('livros.show', $livro) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('livros.edit', $livro) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('livros.destroy', $livro) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginação -->
        <div class="mt-3">
            {{ $livros->links() }}
        </div>
    </div>
@endsection