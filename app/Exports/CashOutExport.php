<?php

namespace App\Exports;

use App\CashOut;
use App\FiscalCredit;
use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CashOutExport implements FromView, ShouldAutoSize, WithStyles
{
    protected $cashOut;

    public function __construct(CashOut $cashOut)
    {
        $this->cashOut = $cashOut;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function view(): View
    {
        $minDate = CashOut::where('id', '<', $this->cashOut->id)->latest()->pluck('date')->first();
        $maxDate = $this->cashOut->date;

        // Calc total amount of money from fiscal credits created after latest cashout
        $fiscalCredits = FiscalCredit::with(['user', 'customer'])
            ->whereRaw("created_at >= '$minDate' AND created_at <= '$maxDate'")->get();

        // Calc total amount of money from fiscal credits created after latest cashout
        $invoices = Invoice::with(['user', 'customer'])
            ->whereRaw("created_at >= '$minDate' AND created_at <= '$maxDate'")->get();

        $mergedSales = $fiscalCredits->merge($invoices);

        $total = $mergedSales->reduce(function ($carry, $sale) {
            return $carry + $sale->total;
        }, 0);

        return view('cashout', [
            'total' => $total,
            'sales' => $mergedSales
        ]);
    }
}
