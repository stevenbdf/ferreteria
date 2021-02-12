<html>
<table>
    <thead>
        <tr style="border: 1px solid black;">
            <th>Fecha</th>
            <th>Usuario</th>
            <th>Cliente</th>
            <th>Tipo de Venta</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sales as $sale)
        <tr>
            <td>{{ $sale->date }}</td>
            <td>{{ $sale->user->full_name }}</td>
            <td>{{ $sale->customer->full_name }}</td>
            <td>{{ isset($sale->status) ? "FACTURA #$sale->id" : "CREDITO FISCAL #$sale->id" }}</td>
            <td>{{ number_format($sale->total, 2) }}</td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="font-weight: bold;">Sumas: </td>
            <td>{{ round($total, 2) }}</td>
        </tr>
    </tbody>
</table>

</html>
