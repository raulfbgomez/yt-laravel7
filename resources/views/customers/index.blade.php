@extends('layouts.main')

@section('contenido')
  <div class="container">
    @if (session('success'))
      <div class="message message-success">
        {{ session('success') }}
      </div>
    @endif
    <h1>Clientes</h1>
    <a href="{{ url('/customers/create') }}" class="button button-primary">Nuevo cliente</a>
    <ul class="lista-pagos">
      @foreach($customers as $customer)
        <li>
          {{ $customer->name }} {{ $customer->lastName }}
          <a href="{{ url('/customers/'.$customer->id.'/edit') }}" class="button button-accent">Editar cliente</a>
          <form action="{{ url('/customers/'.$customer->id.'/delete') }}" method="POST">
            @csrf
            <button type="submit" class="button button-danger">Eliminar cliente</button>
          </form>
          <a href="{{ url('/customers/'.$customer->id.'/payments') }}" class="button button-accent">Ver pagos</a>
          <a href="{{ url('/customers/'.$customer->id.'/payment') }}" class="button button-accent">Agregar pago</a>
        </li>
      @endforeach
    </ul>
  </div>
@endsection