@extends('master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mb-3">Carros FIPE</h2>
            <hr class="mb-4">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="{{ route('carros.create') }}" class="btn btn-primary mb-3">Create</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <ul class="list-group">
                @foreach ($carros as $carro)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $carro->Modelo }}
                        <div class="btn-group" role="group" aria-label="Carro Actions">
                            <a href="{{ route('carros.edit', ['carro' => $carro->id]) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('carros.show', ['carro' => $carro->id]) }}" class="btn btn-info">Show</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>


@endsection
