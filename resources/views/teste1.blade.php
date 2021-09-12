@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Teste 1') }}</div>

                <div class="card-body">
                    <p>
                        Escreva um programa em que dado uma frase e a quantidade de colunas que podem ser exibidas na tela, faça a quebra de linhas sem quebrar as palavras.
                        <br><br>
                        Por exemplo, se passarmos a frase "Um pequeno jabuti xereta viu dez cegonhas felizes." e pedirmos para ela ser exibida em 20 colunas, teremos como resposta:
                        <br><br>
                        Um pequeno jabuti
                        <br>
                        xereta viu dez
                        <br>
                        cegonhas felizes.
                    </p>
                </div>

                <div class="card-header">{{ __('Resultado do teste') }}</div>

                <div class="card-body">
                    <div class="from-group">
                        <form action="{{route('t1Result')}}" method="post">
                            @csrf
                            <strong>Digite um texto abaixo</strong>
                            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                            </br>
                            <button class="btn btn-lg btn-outline-success" type="submit">Executar</button>
                        </form>
                    </div>
                    <hr>
                    <div class="text-lg-left">
                        @if (isset($newstr))
                            <?php echo ('<strong>A frase inserida tem '.$length.' caracteres.<br>Sua frase com a limitação de 20 colunas ficou:<br><br></strong>'.$newstr);?>
                        @else
                        <p class="alert alert-danger">{{__('Nenhum texto foi inserido ainda.')}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
