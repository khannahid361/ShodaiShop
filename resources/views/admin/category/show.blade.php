<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
</head>

<body>

    <table>
        <tr>
            <th>Category Name</th>
            <th>Category Image</th>

        </tr>

        <tr>
            <td> {{ $category->category_name }} </td>
            <td>
                <img src="{{ asset('storage/images/' . $category->cat_image) }}" height="100" width="140" alt="">
            </td>

        </tr>

    </table>

</body>

</html>
