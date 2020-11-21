@extends('layouts.main')

@section('contenido')
  <div class="container">
    <h1>Pagos realizados por {{ $customer->name }}</h1>
    <a href="{{ url('/customers/'.$customer->id.'/payment') }}" class="button button-accent">Agregar pago</a>
    <ul class="lista-pagos">
      @foreach ($customer->payments as $payment)
        <li>{{ $payment->amount }}</li>
      @endforeach
    </ul>
  </div>
@endsection