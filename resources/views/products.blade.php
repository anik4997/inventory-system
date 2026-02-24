<!DOCTYPE html>
<html>
<head>
    <title>Inventory - Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <body class="bg-light">

        <div class="container mt-5">
            <h2 class="mb-4 text-center">Add New Product</h2>

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

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Add Product Form -->
            <div class="card p-4 mb-4">
                <form method="POST" action="{{ route('product.store') }}" class="row g-3">
                    @csrf

                    <div class="col-md-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Purchase Price</label>
                        <input type="number" name="purchase_price" class="form-control" value="{{ old('purchase_price') }}" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Sell Price</label>
                        <input type="number" name="sell_price" class="form-control" value="{{ old('sell_price') }}" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Stock</label>
                        <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-3">Add Product</button>
                    </div>
                </form>
            </div>

            <!-- Product List -->
            <h2 class="mb-3">Product List</h2>
            <div class="card p-3">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Purchase Price</th>
                            <th>Sell Price</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ number_format($p->purchase_price,2) }}</td>
                                <td>{{ number_format($p->sell_price,2) }}</td>
                                <td>{{ $p->stock }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Links -->
            <div class="mt-4">
                <a href="{{ route('sale.create') }}" class="btn btn-success">Make Sale</a>
                <a href="{{ route('report.index') }}" class="btn btn-info text-white">Financial Report</a>
                <a href="{{ route('journal.index') }}" class="btn btn-info">Journal Entries</a>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>