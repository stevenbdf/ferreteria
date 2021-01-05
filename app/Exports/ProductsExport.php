<?php

namespace App\Exports;

use App\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductsExport implements FromView, ShouldAutoSize, WithStyles
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
        $products = Product::select(
            'id',
            'department_id',
            'supplier_id',
            'description'
        )->orderBy('id', 'desc')->get();

        foreach ($products as $product) {
            $product['department'] = $product->department->name;
            $product['supplier'] = $product->supplier->name;
        }

        return view('products', [
            'products' => $products
        ]);
    }
}
