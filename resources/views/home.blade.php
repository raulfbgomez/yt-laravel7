@extends('layouts.main')

@section('contenido')
<div class="container">
    @if (session('success'))
        <div class="message message-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="/pagos" class="button button-primary">Agregar nuevo pago</a>
    <ul class="lista-pagos">
        @foreach ($payments as $payment)
            <li>
                <span>{{ $payment->amount }}</span>
                <span>{{ $payment->date }}</span>
                <a href="/pagos/{{ $payment->id }}/edit">Editar</a>
                <a href="/pagos/{{ $payment->id }}/delete">Eliminar</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
