<!DOCTYPE html>
<html>
<head>
    <title>Make Sale</title>
</head>
<body>

    <h2>Make Sale</h2>

    <form method="POST" action="/sale/store">
        @csrf

        <label>Product</label>
        <select name="product_id" required>
            <option value="">Select Product</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">
                    {{ $product->name }} (Stock: {{ $product->stock }})
                </option>
            @endforeach
        </select>

        <br><br>

        <label>Quantity</label>
        <input type="number" name="quantity" required>

        <br><br>

        <label>Discount (TK)</label>
        <input type="number" name="discount" value="0">

        <br><br>

        <label>Paid Amount</label>
        <input type="number" name="paid_amount" required>

        <br><br>

        <button type="submit">Submit Sale</button>

    </form>

    <br>
    <a href="/">Back to Product</a>

    </body>
</html>