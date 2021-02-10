<html>

<head>
    <style>
        @page {
            size: 22cm 28cm portrait;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .text-center {
            text-align: center;
        }

        table {
            border-collapse: collapse;
        }

        table td,
        table th {
            border: 1px solid black;
            height: 30px;
            padding-left: 10px;
            page-break-inside: avoid;
        }
    </style>
</head>

<body>
    <div class="text-center">
        <h1 class="uppercase ">Ferreteria Y Transporte el aguila</h1>
        <h3 style="margin:0;">Materiales de Construcción</h3>
        <p style="margin:0;">Calle a Colonia Montecarmelo, frente a Casa Comunal, Cuscatancingo, San Salvador</p>
        <p style="margin:0;">Tel: 2204-7425, 2613-7613</p>
        <h1 style="margin-bottom: 5px;" class="uppercase">Cotizacion <span style="font-size:28px;color:red;">#{{ $id }}</span></h1>
    </div>
    <div style="border: 1px solid black;border-radius:5px;padding-left:20px;" class="uppercase">
        <p style="margin-bottom:10px;margin-top:10px;">Fecha: {{ date("d-m-Y") }}</p>
        <p style="margin-bottom:10px;margin-top:10px;">Cliente: {{ $customer['full_name'] ? $customer['full_name'] : '_____________________________________________' }}</p>
        <p style="margin-bottom:10px;margin-top:10px;">Dirección: {{ $customer['address'] ? $customer['address'] : '_____________________________________________' }}</p>
        <p style="margin-bottom:10px;margin-top:10px;">DUI: {{ $customer['dui'] ? $customer['dui'] : '__________________' }}
            NIT: {{ $customer['nit'] ? $customer['nit'] : '______________________________' }}</p>
        <p style="margin-bottom:10px;margin-top:10px;">Número de registro: {{ $customer['registry_number'] ? $customer['registry_number'] : '__________________________________' }}</p>
        <p style="margin-bottom:10px;margin-top:10px;">Rubro: {{ $customer['business_item'] ? $customer['business_item'] : '_________________________________________________' }}</p>
    </div>
    <p class="uppercase" style="font-size: 14px;">
        Con mucho gusto le(s) presento(amos) la siguiente cotizacion de precios, esperando que sean de su total agrado y contar con su aprobacion
    </p>
    <table style="width:100%;border: 1px solid black;border-radius:5px;margin-bottom:20px;">
        <tr>
            <th style="width:10%;">Cantidad</th>
            <th style="width:50%;">Descripcion</th>
            <th style="width:15%;">P. Unitario</th>
            <th style="width:15%;">Total</th>
        </tr>
        @for ($i = 0; $i < 10; $i++) <tr>
            <td>{{ isset($quote_details[$i]['quantity']) ? $quote_details[$i]['quantity'] : ' '}}</td>
            <td>{{ isset($quote_details[$i]['product']['description']) ? substr($quote_details[$i]['product']['description'], 0, 50) : ' '}}</td>
            <td>{{ isset($quote_details[$i]['sale_price']) ? '$' . number_format($quote_details[$i]['sale_price'], 2) : ' '}}</td>
            <td>{{ isset($quote_details[$i]['sub_total']) ? '$' . number_format($quote_details[$i]['sub_total'], 2) : ' '}}</td>
            </tr>

            @endfor
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold;" class="uppercase">Sumas</td>
                <td style="font-weight: bold;" class="uppercase">{{ '$' . number_format($total, 2) }}</td>
            </tr>
    </table>
    <div style="height:92px;margin:0;border: 1px solid black;border-radius:5px;padding-left:20px;width:50%;float:left;" class="uppercase">
        <p style="font-size: 14px;">Observaciones:</p>
    </div>
    <div style="height:92px;margin:0;border: 1px solid black;border-radius:5px;padding-left:20px;width:40%;float:right;" class="uppercase">
        <p style="font-size: 14px;margin-bottom:25px">Aprobado: _________________________</p>
        <p style="font-size: 14px;margin:0;">Vendedor: <span style="font-weight:bold;">{{ $user['full_name']}}</span></p>
    </div>
</body>

</html>
