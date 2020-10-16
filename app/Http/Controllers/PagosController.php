<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class PagosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pagos.create');
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'amount' => 'required',
            'fecha' => 'required'
        ]);

        $payment = new Payment();
        $payment->amount = $request->input('amount');
        $payment->date = $request->input('fecha');
        $payment->save();
        return redirect('home')->with('success', 'Pago agregado correctamente');
    }

    public function delete($id) {
        $payment = Payment::find($id);
        if ($payment) {
            $payment->delete();
            return redirect('home')->with('success', 'Pago eliminado correctamente');
        }
    }

    public function edit($id) {
        $payment = Payment::find($id);
        if ($payment) {
            return view('pagos.edit', ['payment' => $payment]);
        }
    }

    public function update(Request $request, $id) {
        $payment = Payment::find($id);
        if ($payment) {
            $validateData = $request->validate([
                'amount' => 'required',
                'fecha' => 'required'
            ]);

            $payment->amount = $request->input('amount');
            $payment->date = $request->input('fecha');
            $payment->save();
            return redirect('home')->with('success', 'Pago actualizado correctamente');
        }
    }
}
