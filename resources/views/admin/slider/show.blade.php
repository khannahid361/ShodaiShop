<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Slider</title>
</head>

<body>

    <table>
        <tr>
            <th>Slider Title</th>
            <th>Slider Image</th>

        </tr>

        <tr>
            <td> {{ $slider->title }} </td>
            <td>
                <img src="{{ asset('storage/images/' . $slider->slider_image) }}" height="100" width="140" alt="">
            </td>

        </tr>

    </table>

</body>

</html>
