<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>



<div class="invoice">
    <h3>Invoice specification #{{ $orderId }}</h3>
    <table width="80%">
        <thead>
        <tr>
            <th align="left">Name</th>
            <th>Quantity</th>
            <th align="right">Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($order as $item)
        <tr>
            <td >{{ $item['DishName'] }}</td>
            <td align="center">{{ $item['Quantity'] }}</td>
            <td align="right">${{ $item['Quantity'] * $item['Price'] }},-</td>
        </tr>
        @endforeach
        </tbody>

        <tfoot>
        <tr>
            <td colspan="1"></td>
            <td align="left">Total</td>
            <td align="right" class="gray">${{ $totalPrice }},-</td>
        </tr>
        </tfoot>
    </table>
</div>


</div>
</body>
</html>
