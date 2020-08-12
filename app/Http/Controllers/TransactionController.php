<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();

        foreach ($transactions as $transaction) {
            $transaction->product;
            $transaction->user;
            $transaction->office;
        }

        return $transactions;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $valor_inventario = 0;
        $valor_nueva_entrada = $request->quantity * $request->amount;

        $cantidad_actual = 0;
        $cantidad_nueva = $request->quantity;

        /**
         * Valor inventario  + Valor nueva entrada (quantity * amount)
         * --------------------------------------  ====== Costo Promedio (cost)
         * Cantidad actual + Cantidad nueva (quantity)
         */

        if ($last_transaction = Transaction::where('product_id', $request->product_id)
            ->where('office_id', $request->office_id)
            ->latest('id')
            ->first()
        ) {
            $valor_inventario = $last_transaction->stock * $last_transaction->cost;
            $cantidad_actual = $last_transaction->stock;
        }

        if (boolval($request->type)) {
            $nuevo_stock = $cantidad_actual + $cantidad_nueva;
            $costo_promedio = ($valor_inventario + $valor_nueva_entrada) / ($cantidad_actual + $cantidad_nueva);
        } else {
            $nuevo_stock = $cantidad_actual - $cantidad_nueva;
            $costo_promedio = ($valor_inventario - $valor_nueva_entrada) / ($cantidad_actual - $cantidad_nueva);
        }

        $transaction = Transaction::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'office_id' => $request->office_id,
            'type' => $request->type,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'stock' => $nuevo_stock,
            'amount' => $request->amount,
            'cost' => $costo_promedio
        ]);

        return response($transaction, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionRequest $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionRequest $transaction)
    {
        //
    }
}
