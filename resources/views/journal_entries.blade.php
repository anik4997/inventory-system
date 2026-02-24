<!DOCTYPE html>
<html>
<head>
    <title>Journal Entries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">Journal Entries</h2>

    <table class="table table-bordered table-striped bg-white">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Account Name</th>
                <th>Debit (TK)</th>
                <th>Credit (TK)</th>
                <th>Reference Type</th>
                <th>Reference ID</th>
            </tr>
        </thead>
        <tbody>
            @forelse($entries as $entry)
                <tr>
                    <td>{{ $entry->id }}</td>
                    <td>{{ $entry->date }}</td>
                    <td>{{ $entry->account_name }}</td>
                    <td>{{ number_format($entry->debit,2) }}</td>
                    <td>{{ number_format($entry->credit,2) }}</td>
                    <td>{{ $entry->reference_type }}</td>
                    <td>{{ $entry->reference_id }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No journal entries found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ url('/') }}" class="btn btn-secondary mt-3">Back to Product</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>