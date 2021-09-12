@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Teste 2') }}</div>

                <div class="card-body">
                    <p>Desenvolva um código que escolhe as notas necessárias em um saque.</p>

                    <div style="display: block">
                        <strong>Regras:</strong> <br>
                        <ul>
                            <li>Entregar o menor número de notas;</li>
                            <li>É possível sacar o valor solicitado com as notas disponíveis;</li>
                            <li>Saldo do cliente infinito;</li>
                            <li>Quantidade de notas infinito (pode-se colocar um valor finito de cédulas para aumentar a dificuldade do problema);</li>
                            <li>Notas disponíveis de R$ 100,00; R$ 50,00; R$ 20,00 e R$ 10,00</li>
                        </ul>
                    </div>

                    <div style="display: block">
                        <strong>Exemplos:</strong> <br>
                        <ul>
                            <li>Valor do Saque: R$ 30,00 – Resultado Esperado: Entregar 1 nota de R$20,00 e 1 nota de R$ 10,00.</li>
                            <li>Valor do Saque: R$ 80,00 – Resultado Esperado: Entregar 1 nota de R$50,00 1 nota de R$ 20,00 e 1 nota de R$ 10,00.</li>
                        </ul>
                    </div>


                </div>

                <div class="card-header">{{ __('Resultado') }}</div>

                <div class="card-body">
                    <div class="from-group">
                        <strong>Informe o valor a ser sacado:</strong>
                        <p>(Somente valores inteiros, múltiplo de 10 e acima de R$ 10,00.)</p>
                        <form action="{{route('t2Result')}}" class="post">
                            @csrf
                            R$
                            <input type="number" name="amount" id="amount">
                            ,00
                            <br><br>
                            <button type="submit" class="btn btn-lg btn-outline-success">Executar</button>
                        </form>
                    </div>
                    <hr>
                    <div class="text-lg-left">
                        @if (isset($amount))
                            <?php
                                echo ('<strong>O valor a ser sacado é de R$ '.$amount.',00<br><br></strong>');
                                $currBill = 100;
                                $totBills = 0;
                                while (true) {
                                    if ($amount >= $currBill) {
                                        $amount -= $currBill;
                                        $totBills += 1;
                                    }
                                    else {
                                        if ($totBills > 0) {
                                            print("$totBills cédulas de R$ $currBill,00<br/>\n");
                                        }
                                        if ($currBill == 100) {
                                            $currBill = 50;
                                        }
                                        elseif ($currBill == 50) {
                                            $currBill = 20;
                                        }
                                        elseif ($currBill == 20) {
                                            $currBill = 10;
                                        }
                                        $totBills = 0;
                                        if ($amount == 0) {
                                            break;
                                        }
                                    }
                                }
                            ?>
                        @else
                            <p class="alert alert-danger">{{__('Nenhum valor foi inserido.')}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
