@extends('layouts.main')

@section('contenido')
  <h1>Nuevo cliente</h1>
  <form action="/customers/store" method="POST" class="form">
    @csrf
    <input type="text" name="name" placeholder="Ingrese el nombre del cliente">
    <input type="text" name="lastName" placeholder="Ingrese el apellido del cliente">
    <button type="submit">Guardar</button>
  </form>
@endsection