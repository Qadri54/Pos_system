<!DOCTYPE html>
<html>
<head>
    <title>Struk Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            margin: 0 auto;
            width: 58mm; /* Lebar kertas struk kecil (sekitar 80mm) */
        }
        .header, .footer {
            text-align: center;
            padding: 10px 0;
            border-bottom: 1px solid #000;
        }
        .footer {
            border-top: 1px solid #000;
            border-bottom: none;
            margin-top: 10px;
        }
        .header h2 {
            margin: 0;
        }
        .header p {
            margin: 2px 0;
            font-size: 10pt;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 4px 0;
            font-size: 11pt;
        }
        th {
            border-bottom: 1px solid #000;
            text-align: left;
        }
        td.qty, th.qty {
            width: 30px;
            text-align: center;
        }
        td.price, th.price, td.subtotal, th.subtotal {
            width: 70px;
            text-align: right;
        }
        .total {
            margin-top: 8px;
            text-align: right;
            font-weight: bold;
            font-size: 13pt;
        }
        .thankyou {
            margin-top: 15px;
            font-size: 11pt;
            font-style: italic;
        }
    </style>
</head>
<body>
<div class="header">
    <h2>{{ $selected_outlet }}</h2>
    <p>{{ $address }}</p>
    <p>Tanggal: {{ $date }}</p>
</div>

<table>
    <thead>
        <tr>
            <th>Produk</th>
            <th class="qty">Qty</th>
            <th class="price">Harga</th>
            <th class="subtotal">Subtotal</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $item)
        <tr>
            <td>{{ $item['product_name'] }}</td>
            <td class="qty">{{ $item['quantity'] }}</td>
            {{ $item['price'] }}
            <td class="price">Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
            <td class="subtotal">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="total">
    Total: Rp {{ number_format($total_price, 0, ',', '.') }}
</div>

<div class="footer">
    <div class="thankyou">Terima kasih atas kunjungan Anda!</div>
    <div>Telp: (021) 123-4567 | www.{{ $selected_outlet }}.com</div>
</div>

</body>
</html>
