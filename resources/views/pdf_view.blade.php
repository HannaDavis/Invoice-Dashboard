<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice PDF</title>
</head>
<body>
<div class="container mx-auto mt-10 px-10 p-10 h-100 bg-white">
    <div class="grid grid-cols-3 grid-rows-6 grid-flow-col">
        <div class=" rounded-md h-12 flex items-center justify-left text-xl "><b>Client: </b>{{ $client->name  }}</div>
        <div class=" rounded-md h-12 flex items-center justify-left text-xl ">
            <b>Description: </b>{{ $invoice->description }}</div>
        <div class=" rounded-md h-12 flex items-center justify-left text-xl "><b>Subtotal: </b>{{ $invoice->subtotal }}
        </div>
        <div class=" rounded-md h-12 flex items-center justify-left text-xl "><b>Tax: </b>{{ $invoice->tax }}</div>
        <div class=" rounded-md h-12 flex items-center justify-left text-xl "><b>Total: </b>{{ $invoice->total }}</div>
        <div class=" rounded-md h-12 flex items-center justify-left text-xl "><b>Accountant: </b>
            @if($accountant)
                <span>{{ $accountant->first_name }} {{ $accountant->last_name }}</span>
            @else
                <span v-else>Not Assigned</span>
            @endif
        </div>
    </div>
</div>
</body>
</html>
