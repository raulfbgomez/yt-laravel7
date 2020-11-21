<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Customer, Payment};

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', [
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'lastName' => 'required'
        ]);

        $customer = Customer::create($request->all());

        return redirect('/customers')->with('success', 'Cliente agregado correctamente');
    }

    public function payment($customer_id) {
        return view('customers.payment', ['customer_id' => $customer_id]);
    }

    public function paymentStore(Request $request, $customer_id) {
        $validateData = $request->validate([
            'amount' => 'required',
            'fecha' => 'required'
        ]);

        $payment = new Payment();
        $payment->amount = $request->input('amount');
        $payment->date = $request->input('fecha');

        if ($payment->save()) {
            $customer = Customer::find($customer_id);
            if ($customer) {
                $customer->payments()->attach($payment->id);
                return redirect('/customers/'.$customer->id.'/payments');
            }
        }   
    }

    public function payments($customer_id) {
        $customer = customer::find($customer_id);
        return view('customers.payments', [
            'customer' => $customer
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
