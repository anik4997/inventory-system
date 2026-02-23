<!DOCTYPE html>
<html>
<head>
    <title>Make Sale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <body class="bg-light">
        <div class="container mt-5">
            <h2 class="mb-4 text-center">Make Sale</h2>

            <!-- Validation Errors -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Success / Error Messages -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Sale Form -->
            <div class="card p-4 mb-4">
                <form method="POST" action="{{ route('sale.store') }}" class="row g-3">
                    @csrf

                    <div class="col-md-4">
                        <label class="form-label">Product</label>
                        <select name="product_id" class="form-select" required>
                            <option value="">Select Product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">
                                    {{ $product->name }} (Stock: {{ $product->stock }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" min="1" required value="{{ old('quantity') }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Discount (TK)</label>
                        <input type="number" name="discount" class="form-control" min="0" value="{{ old('discount',0) }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Paid Amount</label>
                        <input type="number" name="paid_amount" class="form-control" min="0" required value="{{ old('paid_amount') }}">
                    </div>

                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary">Submit Sale</button>
                        <a href="{{ route('product.index') }}" class="btn btn-secondary">Back to Products</a>
                    </div>
                </form>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>