@extends('layouts.main')

@section('contenido')
  <div class="container">
    @if (session('success'))
      <div class="message message-success">
        {{ session('success') }}
      </div>
    @endif
    <h1>Clientes</h1>
    <a href="/customers/create" class="button button-primary">Nuevo cliente</a>
    <ul class="lista-pagos">
      @foreach($customers as $customer)
        <li>{{ $customer->name }} {{ $customer->lastName }}</li>
      @endforeach
    </ul>
  </div>
@endsection