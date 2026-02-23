<!DOCTYPE html>
<html>
<head>
    <title>Financial Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <body class="bg-light">

        <div class="container mt-5">
            <h2 class="mb-4 text-center">Date Wise Financial Report</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Filter Form -->
            <div class="card p-4 mb-4">
                <form method="GET" action="{{ route('report.index') }}" class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label">From:</label>
                        <input type="date" name="from" class="form-control" value="{{ request('from') }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">To:</label>
                        <input type="date" name="to" class="form-control" value="{{ request('to') }}">
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ route('report.index') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </form>
            </div>

            <!-- Totals -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="alert alert-success">
                        <strong>Total Sell:</strong> {{ number_format($totalSell,2) }} TK
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-danger">
                        <strong>Total Expense:</strong> {{ number_format($totalExpense,2) }} TK
                    </div>
                </div>
            </div>

            <!-- Sales Table -->
            <div class="card p-4">
                <h4 class="mb-3">Sales List</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sales as $sale)
                            <tr>
                                <td>{{ $sale->id }}</td>
                                <td>{{ $sale->product->name ?? '-' }}</td>
                                <td>{{ $sale->quantity }}</td>
                                <td>{{ number_format($sale->total_amount,2) }}</td>
                                <td>{{ number_format($sale->paid_amount,2) }}</td>
                                <td>{{ number_format($sale->due_amount,2) }}</td>
                                <td>{{ $sale->created_at->format('d M Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No sales found for this date range.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('product.index') }}" class="btn btn-outline-primary mt-3">Back to Product</a>
            </div>

        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>