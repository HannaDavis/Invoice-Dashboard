<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PDF Demo in Laravel 7</title>
</head>
<body>
<table class="table table-bordered">
    <thead>
    <tr class="table-danger">
        <td>Client</td>
        <td>Description</td>
        <td>Subtotal</td>
        <td>Tax</td>
        <td>Total</td>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td>{{ $client->name }}</td>
        <td>{{ $invoice->description }}</td>
        <td>{{ $invoice->subtotal }}</td>
        <td>{{ $invoice->tax }}</td>
        <td>{{ $invoice->total }}</td>
    </tr>

    </tbody>
</table>
</body>
</html>
