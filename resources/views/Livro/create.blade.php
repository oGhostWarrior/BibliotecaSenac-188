@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cadastrar Livro</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('livros.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="text" name="titulo" class="form-control" placeholder="Nome">
            </div>
            <div class="mb-3">
                <input type="text" name="descicao" class="form-control" placeholder="Sinopse">
            </div>
            <div class="mb-3">
                <input type="date" name="data_pub" class="form-control" placeholder="Data de Publicação">
            </div>
            <!--div class="mb-3">
                <input type="text" name="categoria_id" class="form-control" placeholder="Categoria">
            </div-->

            <div class="mb-3">
                <label for="categoria_id">Categoria:</label>
                <select name="categoria_id" class="form-control" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="autor_ids">Autores:</label>
                <select name="autor_ids[]" class="form-control" multiple required>
                    @foreach ($autors as $autor)
                        <option value="{{ $autor->id }}">{{ $autor->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection