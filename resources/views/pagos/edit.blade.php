@extends('layouts.main')

@section('contenido')
  <form action="/pagos/{{ $payment->id }}/edit" method="POST" class="form">
    @if ($errors->any())
      @foreach ($errors->all() as $error)
          <div class="message message-error">
            {{ $error }}
          </div>
      @endforeach
    @endif
    @csrf
    <input type="text" name="amount" value="{{ $payment->amount }}" placeholder="Ingresa el monto" />
    <input type="date" name="fecha" value={{ $payment->date }} />
    <button type="submit">Guardar</button>
  </form>
@endsection