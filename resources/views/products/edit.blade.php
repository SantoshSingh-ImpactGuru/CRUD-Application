<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{old('name',$product->name)}}">
            <span>
                @error('name')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </span>
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" name="price" id="price" value="{{old('price',$product->price) }}">
            <span>
                @error('price')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </span>
        </div>
        <div>
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" value="{{old('quantity',$product->quantity) }}">
            <span>
                @error('quantity')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </span>
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>
