<h1>Available Gym Shoes</h1>
<ul>
    @foreach ($products as $product)
        <li>
            <a href="{{ route('products.show', $product->id) }}">
                {{ $product->name }} - ${{ $product->price }}
            </a>
        </li>
    @endforeach
</ul>

<h1>Your Cart</h1>

@if (session('cart'))
    <ul>
        @foreach (session('cart') as $id => $item)
            <li>
                <strong>{{ $item['name'] }}</strong>
                <p>Price: ${{ $item['price'] }}</p>
                <p>Quantity: {{ $item['quantity'] }}</p>
                <form action="{{ route('cart.update', $id) }}" method="POST">
                    @csrf
                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                    <button type="submit">Update</button>
                </form>
                <form action="{{ route('cart.remove', $id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Remove</button>
                </form>
            </li>
        @endforeach
    </ul>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <label for="shipping_address">Shipping Address:</label>
        <input type="text" name="shipping_address" required>
        <input type="hidden" name="total_price" value="{{ collect(session('cart'))->sum(fn($item) => $item['price'] * $item['quantity']) }}">
        <button type="submit">Place Order</button>
    </form>
@else
    <p>Your cart is empty!</p>
@endif
