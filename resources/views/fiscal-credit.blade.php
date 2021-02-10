<html>

<head>
    <style>
        @page {
            size: 13.5cm 21.5cm portrait;
        }

        * {
            margin: 0;
            /* margin-top: 1px;
            margin-bottom: 1px; */
            padding: 0;
        }

        /* tr,
        td {
            border: 1px solid black;
        } */

        tr,
        td {
            padding-bottom: 0.1cm;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <table width="100%">
        <tr>
            <td>
                <table style="width:100%;padding-top:4.4cm;">
                    <tr>
                        <td style="text-align:right;padding-right:1.1cm;">
                            <span style="padding-right:1.5cm;">{{ date("d") }}</span> <span style="padding-right:1cm;">{{ date("m") }}</span> <span>{{ date("y") }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left;padding-left:1.5cm;font-size:0.4cm">
                            {{ $customer['full_name'] }}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left;padding-left:2cm;font-size:0.4cm">
                            {{ $customer['address']}}
                        </td>
                    </tr>
                    <tr>
                        <table style="width:100%;">
                            <tr>
                                <td style="text-align:left;padding-left:5.8cm;font-size:0.4cm">
                                    {{ $customer['nit']}}
                                </td>
                            </tr>
                        </table>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;padding-top:1.35cm;height:10.3cm;">
                @for ($i = 0; $i < 10; $i++)
                    <tr>
                        <td style="vertical-align:top;padding-bottom:0cm;padding-top:0.2cm;">
                            <table style="width:100%;padding-left:1cm;height:0.7cm;">
                                <tr>
                                    <td style="width:1.3cm;">
                                        {{ isset($fiscal_credit_details[$i]['quantity']) ? $fiscal_credit_details[$i]['quantity'] : ' ' }}
                                    </td>
                                    <td style="font-size:14px;">
                                        {{ isset($fiscal_credit_details[$i]['product']['description']) ? substr($fiscal_credit_details[$i]['product']['description'], 0, 30) : ' ' }}
                                    </td>
                                    <td style="width:0.8cm;padding-right:2cm;">
                                        {{ isset($fiscal_credit_details[$i]['sale_price']) ? number_format($fiscal_credit_details[$i]['sale_price'], 2) : ' ' }}
                                    </td>
                                    <td style="text-align: right;padding-right:1.2cm;width:1.7cm;">
                                        {{ isset($fiscal_credit_details[$i]['sub_total']) ? number_format($fiscal_credit_details[$i]['sub_total'], 2) : ' ' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @endfor
                    <tr>
                        <td>
                            <table style="padding-left:1cm;">
                                <tr>
                                    <td style="font-size: 11px;width:7cm;padding-left:0.5cm;vertical-align:top;padding-top:0.3cm">
                                        {{ $numeros_letras }}
                                    </td>
                                    <td style="width:4.9cm;">
                                        <table style="width: 100%;font-size: 14px;">
                                            <tr>
                                                <td style="text-align: right;padding-right:0.9cm;">
                                                    {{ number_format($sub_total, 2) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;padding-right:0.9cm;">
                                                    {{ number_format($total_iva, 2) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;padding-right:0.9cm;">
                                                    {{ number_format($total, 2) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;padding-right:0.9cm;padding-top:1.2cm;">
                                                    {{ number_format($total, 2) }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
