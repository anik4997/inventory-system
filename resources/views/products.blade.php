<h2>Add Product</h2>
<form method="POST" action="/product/store">
@csrf
<input name="name" placeholder="Name">
<input name="purchase_price" placeholder="Purchase">
<input name="sell_price" placeholder="Sell">
<input name="stock" placeholder="Stock">
<button>Add</button>
</form>

<h2>Product List</h2>
@foreach($products as $p)
<p>{{ $p->name }} | Stock: {{ $p->stock }}</p>
@endforeach

<a href="{{ route('sale.create') }}">Make Sale</a>
<a href="/report">Report</a>