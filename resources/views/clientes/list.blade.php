@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-lg btn-outline-success" href="{{ route('cadastro', ['id' => 'new'])}}"> Cadastrar um novo cliente</a>
                    @csrf
                    <br><br>
                    <h1>Lista de clientes</h1>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <!-- <th scope="col">Id</th> -->
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Status</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Deletar</th>
                            </tr>
                        </thead>
                    @foreach ($clientes as $cliente)
                        <tbody>
                            <tr>
                                <!-- <th scope="row"> {{ $cliente->id}}</th> -->
                                <td> {{ $cliente->nome }}</td>
                                <td>{{$cliente->email}}</td>
                                <td>{{$cliente->status}}</td>
                                <td>
                                    <a href="{{ route('cadastro', ['id' => $cliente->id]) }}" class="btn btn-info"> Editar </a>
                                </td>
                                <td>
                                    <form action="clientes/delete/{{$cliente->id}}" method="post">
                                @csrf
                                @method('delete')
                                        <button class="btn btn-danger"> Deletar</button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                        </tbody>
                        </table>
                        {!! $clientes->links() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
