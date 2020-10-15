<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
      $payment = new \App\Payment();
      $payment->amount = $request->input('amount');
      $payment->date = $request->input('fecha');
      $payment->save();
      return redirect('home');
    }
}
