<html>
<table>
    <thead>
        <tr style="border: 1px solid black; font-weight: bold;">
            <th>Departamento</th>
            <th>Código</th>
            <th>Descripción</th>
            <th>Proveedor</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->department }}</td>
            <td>{{ $product->id }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->supplier }}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>

</html>
