<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Brands</title>
</head>

<body>
    <h1>Brand <a href=" {{ route('createBrand') }} ">Add Brand</a> </h1>


    <table>
        <tr>
            <th>Brand Name</th>
            <th>Brand Image</th>
            <th>Action</th>
        </tr>
        @forelse ($brands as $brand)
            <tr>
                <td><a
                        href=" {{ route('showBrand', ['id' => $brand->id]) }} ">{{ $brand->brand_name }}</a>
                </td>
                <td>
                    <img src="{{ asset('storage/images/' . $brand->brand_image) }}" height="100" width="140" alt="">
                </td>
                <td>
                    <a href=" {{ route('editBrand', ['id' => $brand->id]) }} ">Edit</a>
                </td>
                <td>
                    <a href="{{ route('deleteBrand', ['id' => $brand->id]) }}">Delete</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2">Brand Empty. Please Insert Brand</td>
            </tr>
        @endforelse

    </table>

</body>

</html>
