@extends('master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mb-3">Show information for - {{ $carro->Modelo }}</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Fipe</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Preco</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $carro->Fipe }}</td>
                        <td>{{ $carro->Marca }}</td>
                        <td>{{ $carro->Modelo }}</td>
                        <td>{{ $carro->Ano }}</td>
                        <td>{{ $carro->Preco }}</td>
                        <td>
                            <form action="{{ route('carros.destroy', ['carro' => $carro->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr class="mb-4">
            <a href="{{ route('carros.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>


@endsection
