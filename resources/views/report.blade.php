<!DOCTYPE html>
<html>
<head>
    <title>Financial Report</title>
</head>
    <body>

        <h2>Date Wise Financial Report</h2>

        <form method="GET" action="/report">
            <label>From:</label>
            <input type="date" name="from">

            <label>To:</label>
            <input type="date" name="to">

            <button type="submit">Filter</button>
        </form>

        <br><br>

        <h3>Total Sell: {{ $totalSell }} TK</h3>
        <h3>Total Expense: {{ $totalExpense }} TK</h3>

        <hr>

        <h3>Sales List</h3>

        <table border="1" cellpadding="5">
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Paid</th>
                <th>Due</th>
                <th>Date</th>
            </tr>

            @foreach($sales as $sale)
            <tr>
                <td>{{ $sale->id }}</td>
                <td>{{ $sale->product->name ?? '' }}</td>
                <td>{{ $sale->quantity }}</td>
                <td>{{ $sale->total_amount }}</td>
                <td>{{ $sale->paid_amount }}</td>
                <td>{{ $sale->due_amount }}</td>
                <td>{{ $sale->created_at }}</td>
            </tr>
            @endforeach

        </table>

        <br>
        <a href="{{ route('product.index') }}">Back to Product</a>
    </body>
</html>