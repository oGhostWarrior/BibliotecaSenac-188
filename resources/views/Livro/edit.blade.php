@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Livro</h1>
        <form action="{{ route('livros.update', $livro) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <input type="text" name="titulo" value="{{ $livro->titulo }}" class="form-control" placeholder="Nome">
            </div>
            <div class="mb-3">
                <input type="text" name="descicao" value="{{ $livro->descicao }}" class="form-control" placeholder="Sinopse">
            </div>
            <div class="mb-3">
                <input type="date" name="data_pub" value="{{ $livro->data_pub }}" class="form-control" placeholder="Data de Publicação">
            </div>
            <div class="mb-3">
                <label for="categoria_id">Categoria:</label>
                <select name="categoria_id" class="form-control" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $categoria->id == $livro->categoria_id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="autor_ids">Autores:</label>
                <select name="autor_ids[]" class="form-control" multiple required>
                    @foreach ($autors as $autor)
                        <option value="{{ $autor->id }}" {{ $livro->autores && in_array($autor->id, $livro->autores->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $autor->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="foto">Foto Atual:</label>
                @if ($livro->foto)
                    <div>
                        <img src="{{ asset('storage/' . $livro->foto) }}" alt="Foto do Autor" style="max-width: 150px; max-height: 150px;">
                    </div>
                @else
                    <p>Nenhuma foto atual.</p>
                @endif

                <label for="foto">Mudar Foto:</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection