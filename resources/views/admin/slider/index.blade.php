<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sliders</title>
</head>

<body>
    <h1>Slider <a href=" {{ route('createSlider') }} ">Add Slider</a> </h1>


    <table>
        <tr>
            <th>Slider Title</th>
            <th>Slider Image</th>
            <th>Action</th>
        </tr>
        @forelse ($sliders as $slider)
            <tr>
                <td><a href=" {{ route('showSlider', ['id' => $slider->id]) }} ">{{ $slider->title }}</a>
                </td>
                <td>
                    <img src="{{ asset('storage/images/' . $slider->slider_image) }}" height="100" width="140" alt="">
                </td>
                <td>
                    <a href=" {{ route('editSlider', ['id' => $slider->id]) }} ">Edit</a>
                </td>
                <td>
                    <a href="{{ route('deleteSlider', ['id' => $slider->id]) }}">Delete</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2">Slider Empty. Please Insert Slider</td>
            </tr>
        @endforelse

    </table>

</body>

</html>
