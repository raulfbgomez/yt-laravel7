@extends('layouts.main')

@section('contenido')
  <h1>Nuevo cliente</h1>
  <form action="{{ url('/customers/'.$customer_id.'/edit') }}" method="POST" class="form">
    @csrf
    <input type="text" name="name" value="{{ $customer->name }}" />
    <input type="text" name="lastName" value="{{ $customer->lastName }}" />
    <button type="submit">Guardar</button>
  </form>
@endsection