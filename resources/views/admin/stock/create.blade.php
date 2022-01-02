<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Stock</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>

<body>
    <div class="container">
        <h2>Add Product Stock</h2>
        <form action="{{ route('storeStock') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Product:</label>
                <select name="product_id" style="width:250px" class="form-control" id="">
                    <option>
                        <--Select Product -->
                    </option>
                    @forelse ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                    @empty
                        <option>Insert Product</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <label for="">Stock:</label>
                <input type="number" class="form-control" name="stock" value="" id="" min="1" style="width:250px"
                    placeholder="Enter Product Stock">
            </div>
            <div class="form-group">
                <input type="submit" name="" value="Add Quantity" class="btn btn-success" id="">
            </div>
        </form>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="background: red; color: white;"> {{ $error }} </p>
            @endforeach
        @endif
    </div>
</body>

</html>
