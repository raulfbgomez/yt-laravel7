@extends('layouts.main')

@section('contenido')
  <form action="/pagos/create" method="POST" class="form">
    @csrf
    <input type="text" name="amount" placeholder="Ingresa el monto" />
    <input type="date" name="fecha" />
    <button type="submit">Guardar</button>
  </form>
@endsection