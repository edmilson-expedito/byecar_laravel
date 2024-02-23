@extends('master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mb-3">Criar novo carro</h2>
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success')}}
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('error')}}
                </div>
            @endif

            <form action="{{ route('carros.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="Fipe" class="form-label">Código Fipe</label>
                    <input type="text" class="form-control" id="Fipe" name="Fipe" placeholder="Código Fipe">
                </div>
                <div class="mb-3">
                    <label for="Marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="Marca" name="Marca" placeholder="Marca">
                </div>
                <div class="mb-3">
                    <label for="Modelo" class="form-label">Modelo</label>
                    <input type="text" class="form-control" id="Modelo" name="Modelo" placeholder="Modelo">
                </div>
                <div class="mb-3">
                    <label for="Ano" class="form-label">Ano</label>
                    <input type="text" class="form-control" id="Ano" name="Ano" placeholder="Ano">
                </div>
                <div class="mb-3">
                    <label for="Preco" class="form-label">Preço</label>
                    <input type="text" class="form-control" id="Preco" name="Preco" placeholder="Preço">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
            <hr class="my-4">
            <a href="{{ route('carros.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>


@endsection
