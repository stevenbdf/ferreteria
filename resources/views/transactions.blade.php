<html>
<table>
    <thead>
        <tr style="border: 1px solid black;">
            <th>Sucursal</th>
            <th>Fecha</th>
            <th>Código</th>
            <th>Producto</th>
            <th>Usuario</th>
            <th>Transacción</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Monto USD</th>
            <th>Stock</th>
            <th>Costo Promedio (unidad)</th>
            <th>Valor Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
        <tr>
            <td>{{ $transaction->office }}</td>
            <td>{{ $transaction->date }}</td>
            <td>{{ $transaction->product_id }}</td>
            <td>{{ $transaction->product }}</td>
            <td>{{ $transaction->user }}</td>
            <td>{{ $transaction->type }}</td>
            <td>{{ $transaction->description }}</td>
            <td>{{ $transaction->quantity }}</td>
            <td>{{ $transaction->amount }}</td>
            <td>{{ $transaction->stock }}</td>
            <td>{{ $transaction->cost }}</td>
            <td>{{ $transaction->stock * $transaction->cost }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</html>
