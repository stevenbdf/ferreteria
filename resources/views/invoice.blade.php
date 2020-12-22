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

        tr, td {
            padding-bottom: 0.13cm;
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
                <table style="width:100%;padding-top:4.3cm;">
                    <tr>
                        <td style="text-align:right;padding-right:1.2cm;">
                            {{ date("d/m/Y") }}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left;padding-left:2cm;font-size:0.4cm">
                            {{ $customer['full_name']}}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left;padding-left:2.3cm;font-size:0.4cm">
                            {{ $customer['address']}}
                        </td>
                    </tr>
                    <tr>
                        <table style="width:100%;">
                            <tr>
                                <td style="text-align:left;padding-left:2.1cm;font-size:0.4cm">
                                {{ $customer['dui']}}
                                </td>
                                <td style="text-align:right;font-size:0.4cm;padding-right:1.2cm;">
                                {{ $user['full_name'] }}
                                </td>
                            </tr>
                        </table>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;padding-top:0.6cm;height:10.3cm;">
                    <tr>
                        <td style="vertical-align:top;padding-bottom: 0.1cm;">
                            <table style="width:100%;padding-left:1cm;height:0.8cm;">
                                <tr>
                                    <td style="width:1.3cm;">
                                        {{ array_key_exists(0, $invoice_details) ? $invoice_details[0]['quantity'] : ' ' }}
                                    </td>
                                    <td>
                                        {{ array_key_exists(0, $invoice_details) ? $invoice_details[0]['product']['description'] : ' ' }}
                                    </td>
                                    <td style="width:0.8cm;padding-right:2cm;">
                                        {{ array_key_exists(0, $invoice_details) ? number_format($invoice_details[0]['sale_price'], 2) : ' ' }}
                                    </td>
                                    <td style="text-align: right;padding-right:1.2cm;width:1.7cm;">
                                        {{ array_key_exists(0, $invoice_details) ? number_format($invoice_details[0]['sub_total'], 2) : ' ' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;padding-bottom: 0.1cm;">
                            <table style="width:100%;padding-left:1cm;height:0.8cm;">
                                <tr>
                                    <td style="width:1.3cm;">
                                        {{ array_key_exists(1, $invoice_details) ? $invoice_details[1]['quantity'] : ' ' }}
                                    </td>
                                    <td>
                                        {{ array_key_exists(1, $invoice_details) ? $invoice_details[1]['product']['description'] : ' ' }}
                                    </td>
                                    <td style="width:0.8cm;padding-right:2cm;">
                                        {{ array_key_exists(1, $invoice_details) ? number_format($invoice_details[1]['sale_price'], 2) : ' ' }}
                                    </td>
                                    <td style="text-align: right;padding-right:1.2cm;width:1.7cm;">
                                        {{ array_key_exists(1, $invoice_details) ? number_format($invoice_details[1]['sub_total'], 2) : ' ' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;padding-bottom: 0.1cm;">
                            <table style="width:100%;padding-left:1cm;height:0.8cm;">
                                <tr>
                                    <td style="width:1.3cm;">
                                        {{ array_key_exists(2, $invoice_details) ? $invoice_details[2]['quantity'] : ' ' }}
                                    </td>
                                    <td>
                                        {{ array_key_exists(2, $invoice_details) ? $invoice_details[2]['product']['description'] : ' ' }}
                                    </td>
                                    <td style="width:0.8cm;padding-right:2cm;">
                                        {{ array_key_exists(2, $invoice_details) ? number_format($invoice_details[2]['sale_price'], 2) : ' ' }}
                                    </td>
                                    <td style="text-align: right;padding-right:1.2cm;width:1.7cm;">
                                        {{ array_key_exists(2, $invoice_details) ? number_format($invoice_details[2]['sub_total'], 2) : ' ' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;padding-bottom: 0.1cm;">
                            <table style="width:100%;padding-left:1cm;height:0.8cm;">
                                <tr>
                                    <td style="width:1.3cm;">
                                        {{ array_key_exists(3, $invoice_details) ? $invoice_details[3]['quantity'] : ' ' }}
                                    </td>
                                    <td>
                                        {{ array_key_exists(3, $invoice_details) ? $invoice_details[3]['product']['description'] : ' ' }}
                                    </td>
                                    <td style="width:0.8cm;padding-right:2cm;">
                                        {{ array_key_exists(3, $invoice_details) ? number_format($invoice_details[3]['sale_price'], 2) : ' ' }}
                                    </td>
                                    <td style="text-align: right;padding-right:1.2cm;width:1.7cm;">
                                        {{ array_key_exists(3, $invoice_details) ? number_format($invoice_details[3]['sub_total'], 2) : ' ' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;padding-bottom: 0.1cm;">
                            <table style="width:100%;padding-left:1cm;height:0.8cm;">
                                <tr>
                                    <td style="width:1.3cm;">
                                        {{ array_key_exists(4, $invoice_details) ? $invoice_details[4]['quantity'] : ' ' }}
                                    </td>
                                    <td>
                                        {{ array_key_exists(4, $invoice_details) ? $invoice_details[4]['product']['description'] : ' ' }}
                                    </td>
                                    <td style="width:0.8cm;padding-right:2cm;">
                                        {{ array_key_exists(4, $invoice_details) ? number_format($invoice_details[4]['sale_price'], 2) : ' ' }}
                                    </td>
                                    <td style="text-align: right;padding-right:1.2cm;width:1.7cm;">
                                        {{ array_key_exists(4, $invoice_details) ? number_format($invoice_details[4]['sub_total'], 2) : ' ' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;padding-bottom: 0.1cm;">
                            <table style="width:100%;padding-left:1cm;height:0.8cm;">
                                <tr>
                                    <td style="width:1.3cm;">
                                        {{ array_key_exists(5, $invoice_details) ? $invoice_details[5]['quantity'] : ' ' }}
                                    </td>
                                    <td>
                                        {{ array_key_exists(5, $invoice_details) ? $invoice_details[5]['product']['description'] : ' ' }}
                                    </td>
                                    <td style="width:0.8cm;padding-right:2cm;">
                                        {{ array_key_exists(5, $invoice_details) ? number_format($invoice_details[5]['sale_price'], 2) : ' ' }}
                                    </td>
                                    <td style="text-align: right;padding-right:1.2cm;width:1.7cm;">
                                        {{ array_key_exists(5, $invoice_details) ? number_format($invoice_details[5]['sub_total'], 2) : ' ' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;padding-bottom: 0.1cm;">
                            <table style="width:100%;padding-left:1cm;height:0.8cm;">
                                <tr>
                                    <td style="width:1.3cm;">
                                        {{ array_key_exists(6, $invoice_details) ? $invoice_details[6]['quantity'] : ' ' }}
                                    </td>
                                    <td>
                                        {{ array_key_exists(6, $invoice_details) ? $invoice_details[6]['product']['description'] : ' ' }}
                                    </td>
                                    <td style="width:0.8cm;padding-right:2cm;">
                                        {{ array_key_exists(6, $invoice_details) ? number_format($invoice_details[6]['sale_price'], 2) : ' ' }}
                                    </td>
                                    <td style="text-align: right;padding-right:1.2cm;width:1.7cm;">
                                        {{ array_key_exists(6, $invoice_details) ? number_format($invoice_details[6]['sub_total'], 2) : ' ' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;padding-bottom: 0.1cm;">
                            <table style="width:100%;padding-left:1cm;height:0.8cm;">
                                <tr>
                                    <td style="width:1.3cm;">
                                        {{ array_key_exists(7, $invoice_details) ? $invoice_details[7]['quantity'] : ' ' }}
                                    </td>
                                    <td>
                                        {{ array_key_exists(7, $invoice_details) ? $invoice_details[7]['product']['description'] : ' ' }}
                                    </td>
                                    <td style="width:0.8cm;padding-right:2cm;">
                                        {{ array_key_exists(7, $invoice_details) ? number_format($invoice_details[7]['sale_price'], 2) : ' ' }}
                                    </td>
                                    <td style="text-align: right;padding-right:1.2cm;width:1.7cm;">
                                        {{ array_key_exists(7, $invoice_details) ? number_format($invoice_details[7]['sub_total'], 2) : ' ' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;padding-bottom: 0.1cm;">
                            <table style="width:100%;padding-left:1cm;height:0.8cm;">
                                <tr>
                                    <td style="width:1.3cm;">
                                        {{ array_key_exists(8, $invoice_details) ? $invoice_details[8]['quantity'] : ' ' }}
                                    </td>
                                    <td>
                                        {{ array_key_exists(8, $invoice_details) ? $invoice_details[8]['product']['description'] : ' ' }}
                                    </td>
                                    <td style="width:0.8cm;padding-right:2cm;">
                                        {{ array_key_exists(8, $invoice_details) ? number_format($invoice_details[8]['sale_price'], 2) : ' ' }}
                                    </td>
                                    <td style="text-align: right;padding-right:1.2cm;width:1.7cm;">
                                        {{ array_key_exists(8, $invoice_details) ? number_format($invoice_details[8]['sub_total'], 2) : ' ' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;padding-bottom: 0.1cm;">
                            <table style="width:100%;padding-left:1cm;height:0.8cm;">
                                <tr>
                                    <td style="width:1.3cm;">
                                        {{ array_key_exists(9, $invoice_details) ? $invoice_details[9]['quantity'] : ' ' }}
                                    </td>
                                    <td>
                                        {{ array_key_exists(9, $invoice_details) ? $invoice_details[9]['product']['description'] : ' ' }}
                                    </td>
                                    <td style="width:0.8cm;padding-right:2cm;">
                                        {{ array_key_exists(9, $invoice_details) ? number_format($invoice_details[9]['sale_price'], 2) : ' ' }}
                                    </td>
                                    <td style="text-align: right;padding-right:1.2cm;width:1.7cm;">
                                        {{ array_key_exists(9, $invoice_details) ? number_format($invoice_details[9]['sub_total'], 2) : ' ' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;padding-bottom: 0.1cm;">
                            <table style="width:100%;padding-left:1cm;height:0.8cm;">
                                <tr>
                                    <td style="width:1.3cm;">
                                        {{ array_key_exists(10, $invoice_details) ? $invoice_details[10]['quantity'] : ' ' }}
                                    </td>
                                    <td>
                                        {{ array_key_exists(10, $invoice_details) ? $invoice_details[10]['product']['description'] : ' ' }}
                                    </td>
                                    <td style="width:0.8cm;padding-right:2cm;">
                                        {{ array_key_exists(10, $invoice_details) ? number_format($invoice_details[10]['sale_price'], 2) : ' ' }}
                                    </td>
                                    <td style="text-align: right;padding-right:1.2cm;width:1.7cm;">
                                        {{ array_key_exists(10, $invoice_details) ? number_format($invoice_details[10]['sub_total'], 2) : ' ' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
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
                                                <td style="text-align: right;padding-right:1.2cm;">
                                                    {{ number_format($total,2) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;padding-right:1.2cm;">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;padding-right:1.2cm;">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;padding-right:1.2cm;">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;padding-right:1.2cm;">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;padding-right:1.2cm;">
                                                    {{ number_format($total,2) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;padding-right:1.2cm;">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;padding-right:1.2cm;">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;padding-right:1.2cm;">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;padding-right:1.2cm;">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;padding-right:1.2cm;">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;padding-right:1.2cm;">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;padding-right:1.2cm;">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;padding-right:1.2cm;">
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
