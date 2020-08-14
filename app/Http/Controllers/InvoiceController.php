<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Invoice;
use App\InvoiceDetail;
use App\Office;
use App\Transaction;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Invoice::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request)
    {
        $invoice = Invoice::create([
            'id' => $request->id,
            'status' => 1,
            'office_id' => $request->office_id,
            'customer_id' => $request->customer_id,
            'user_id' => $request->user_id
        ]);

        $details = [];
        foreach ($request->details as $detail) {

            $last_transaction = Transaction::where('product_id', $detail['product_id'])
                ->where('office_id', $request->office_id)
                ->latest('id')
                ->first();

            $valor_inventario = $last_transaction->stock * $last_transaction->cost;
            $cantidad_actual = $last_transaction->stock;

            $valor_nueva_entrada = $detail['quantity'] * $last_transaction->cost;
            $cantidad_nueva = $detail['quantity'];

            $nuevo_stock = $cantidad_actual - $detail['quantity'];
            $costo_promedio = ($valor_inventario - $valor_nueva_entrada) / ($cantidad_actual - $cantidad_nueva);

            Transaction::create([
                'user_id' => $request->user_id,
                'product_id' => $detail['product_id'],
                'office_id' => $request->office_id,
                'type' => 0,
                'description' => "VENTA FACTURA #" . $request->id,
                'quantity' => $detail['quantity'],
                'stock' => $nuevo_stock,
                'amount' => $last_transaction->cost,
                'cost' => $costo_promedio
            ]);

            $detail['invoice_id'] = $invoice->id;
            InvoiceDetail::create($detail);
            array_push($details, $detail);
        }

        Office::find($request->office_id)->update(['invoice_correlative' => $invoice->id + 1]);
        $invoice['invoice_details'] = $details;
        return $invoice;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $invoice->office;
        $invoice->user;
        $invoice->customer;
        $total = 0;
        foreach ($invoice->invoiceDetails as $detail) {
            $sub_total = $detail->quantity * $detail->sale_price;
            $detail->sub_total = $sub_total;
            $total = $total + $sub_total;
        }
        $invoice->total = $total;
        return $invoice;
    }
}
