<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>

<body>
    <div class="container">
        <h2>Edit Stock</h2>
        <form action="{{ route('updateStock', ['id' => $stock->product_id, 'stockId' => $stock->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Stock:</label>
                <input type="number" class="form-control" name="stock" value="{{ $stock->stock }}" id="" min="1"
                    style="width:250px" placeholder="Enter Product Stock">
            </div>
            <div class="form-group">
                <input type="submit" name="" value="Update Stock" class="btn btn-success" id="">
            </div>
        </form>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <b>{{ $error }}</b>
            @endforeach

        @endif
    </div>
</body>

</html>
