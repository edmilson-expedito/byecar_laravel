@extends('master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mb-3">Edit cars</h2>
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('error') }}
                </div>
            @endif
            <form action="{{ route('carros.update', ['carro' => $carro->id]) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="mb-3">
                    <label for="Fipe" class="form-label">Código Fipe</label>
                    <input type="text" class="form-control" id="Fipe" name="Fipe" value="{{ $carro->Fipe }}">
                </div>
                <div class="mb-3">
                    <label for="Marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="Marca" name="Marca" value="{{ $carro->Marca }}">
                </div>
                <div class="mb-3">
                    <label for="Modelo" class="form-label">Modelo</label>
                    <input type="text" class="form-control" id="Modelo" name="Modelo" value="{{ $carro->Modelo }}">
                </div>
                <div class="mb-3">
                    <label for="Ano" class="form-label">Ano</label>
                    <input type="text" class="form-control" id="Ano" name="Ano" value="{{ $carro->Ano }}">
                </div>
                <div class="mb-3">
                    <label for="Preco" class="form-label">Preço</label>
                    <input type="text" class="form-control" id="Preco" name="Preco" value="{{ $carro->Preco }}">
                </div>
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
            <hr class="mb-4">
            <a href="{{ route('carros.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>


@endsection
