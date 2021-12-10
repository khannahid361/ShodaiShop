<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edit Brand</h1>

    <form action="{{ route('updateBrand', ['id' => $brand->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" placeholder="Input Category" value=" {{ $brand->brand_name }} " name="brand_name">
        <input type="file" name="image" class="form-control" id="">
        <input type="submit" name="submit" value="Update Brand">
    </form>
    @if ($errors->any())

        @foreach ($errors->all() as $error)

            <p style="background: red; color: white;"> {{ $error }} </p>

        @endforeach

    @endif
</body>

</html>
