<?php

namespace App\Http\Controllers;

use App\FiscalCredit;
use App\FiscalCreditDetail;
use App\Http\Requests\FiscalCreditRequest;
use App\Office;
use App\Transaction;

class FiscalCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FiscalCredit::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FiscalCreditRequest $request)
    {
        $fiscalCredit = FiscalCredit::create([
            'id' => $request->id,
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
                'description' => "VENTA C.FISCAL #" . $request->id,
                'quantity' => $detail['quantity'],
                'stock' => $nuevo_stock,
                'amount' => $last_transaction->cost,
                'cost' => $costo_promedio
            ]);

            $detail['fiscal_credit_id'] = $fiscalCredit->id;
            $IVA = $detail['sale_price'] * 0.13;
            $detail['sale_price'] = $detail['sale_price'] - $IVA;
            $detail['iva'] = $IVA;
            FiscalCreditDetail::create($detail);
            array_push($details, $detail);
        }

        Office::find($request->office_id)->update(['fiscal_credit_correlative' => $fiscalCredit->id + 1]);
        $fiscalCredit['fiscal_credit_details'] = $details;
        return $fiscalCredit;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FiscalCredit  $fiscalCredit
     * @return \Illuminate\Http\Response
     */
    public function show(FiscalCredit $fiscalCredit)
    {
        $fiscalCredit->office;
        $fiscalCredit->user;
        $fiscalCredit->customer;
        $total = 0;
        $iva_total = 0;
        foreach ($fiscalCredit->fiscalCreditDetails as $detail) {
            $sub_total = $detail->quantity * $detail->sale_price;
            $iva_sub_total = $detail->quantity * $detail->iva;
            $detail->sub_total = $sub_total;
            $total = $total + $sub_total;
            $iva_total = $iva_total + $iva_sub_total;
        }
        $fiscalCredit->total = $total;
        $fiscalCredit->iva_total = $iva_total;
        return $fiscalCredit;
    }
}
