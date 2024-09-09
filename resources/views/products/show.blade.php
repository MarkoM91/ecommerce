<h1>{{ $product->name }}</h1>
<p>{{ $product->description }}</p>
<p>Price: ${{ $product->price }}</p>
<p>Size: {{ $product->size }}</p>
<p>Color: {{ $product->color }}</p>

<form action="{{ route('cart.add', $product->id) }}" method="POST">
    @csrf
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" value="1" min="1">
    <button type="submit">Add to Cart</button>
</form>

<h1>{{ $product->name }}</h1>
<p>{{ $product->description }}</p>
<p>Price: ${{ $product->price }}</p>
<p>Size: {{ $product->size }}</p>
<p>Color: {{ $product->color }}</p>

<form action="{{ route('cart.add', $product->id) }}" method="POST">
    @csrf
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" value="1" min="1">
    <button type="submit">Add to Cart</button>
</form>
