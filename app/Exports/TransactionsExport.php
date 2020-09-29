<?php

namespace App\Exports;

use App\Transaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransactionsExport implements FromView, ShouldAutoSize, WithStyles
{
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function view(): View
    {

        $transactions = Transaction::select(
            'date',
            'user_id',
            'product_id',
            'office_id',
            'date',
            'type',
            'description',
            'quantity',
            'stock',
            'amount',
            'cost'
        )->orderBy('id', 'desc')->get();

        foreach ($transactions as $transaction) {
            $transaction['user'] = $transaction->user->full_name;
            $transaction['product'] = $transaction->product->description;
            $transaction['type'] = $transaction['type'] == 1 ? 'Entrada' : 'Salida';
            $transaction['office'] = $transaction->office->name;
        }

        return view('transactions', [
            'transactions' => $transactions
        ]);
    }
}
