<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Quote;
use App\QuoteDetail;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Quote::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuoteRequest $request)
    {
        $quote = Quote::create([
            'office_id' => $request->office_id,
            'customer_id' => $request->customer_id,
            'user_id' => $request->user_id
        ]);

        foreach ($request->details as $detail) {
            $detail['quote_id'] = $quote->id;
            QuoteDetail::create($detail);
        }

        $quote->quoteDetails;
        return $quote;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        $quote->user;
        $quote->customer;
        $total = 0;
        foreach ($quote->quoteDetails as $detail) {
            $sub_total = $detail->quantity * $detail->sale_price;
            $detail->sub_total = $sub_total;
            $total = $total + $sub_total;
        }
        $quote->total = $total;
        return $quote;
    }
}
