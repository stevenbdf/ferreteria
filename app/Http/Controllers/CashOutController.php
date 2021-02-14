<?php

namespace App\Http\Controllers;

use App\CashOut;
use App\Exports\CashOutExport;
use App\FiscalCredit;
use App\FiscalCreditDetail;
use App\Invoice;
use App\InvoiceDetail;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CashOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cash_outs = CashOut::latest('id')->get();

        foreach ($cash_outs as $cash_out) {
            $cash_out->user;
            $cash_out->total_sales = number_format($cash_out->total_sales, 2);
        }

        return $cash_outs;
    }

    private function get_current_total()
    {
        // Get latest date from cash out
        $latestDate = CashOut::select('date')->latest('date')->first();

        // Calc total amount of money from fiscal credits created after latest cashout
        $fiscal_details = FiscalCreditDetail::when($latestDate, function ($query, $latestDate) {
            return $query->whereRaw("created_at >= '$latestDate->date'");
        })->get();

        $fiscal_credit_total = 0;

        foreach ($fiscal_details as $fiscal_detail) {
            $fiscal_credit_total += $fiscal_detail->quantity * $fiscal_detail->sale_price;
            $fiscal_credit_total += $fiscal_detail->quantity * $fiscal_detail->iva;
        }

        // Calc total amount of money from invoices created after latest cashout
        $invoice_details = InvoiceDetail::when($latestDate, function ($query, $latestDate) {
            return $query->whereRaw("created_at >= '$latestDate->date'");
        })->get();

        $invoice_total = 0;

        foreach ($invoice_details as $invoice_detail) {
            $invoice_total += $invoice_detail->quantity * $invoice_detail->sale_price;
        }

        return $invoice_total + $fiscal_credit_total;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cash_out = CashOut::create([
            'user_id' => auth()->user()->id,
            'total_sales' => $this->get_current_total()
        ]);

        $cash_out = CashOut::find($cash_out->id);

        $cash_out->user;
        $cash_out->total_sales = number_format($cash_out->total_sales, 2);

        return $cash_out;
    }

    public function current()
    {
        return [
            'total_sales' => number_format($this->get_current_total(), 2)
        ];
    }

    public function export(CashOut $cashOut)
    {
        return Excel::download(new CashOutExport($cashOut), "corte-de-caja-$cashOut->date.xlsx");
    }
}
