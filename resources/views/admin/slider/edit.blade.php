<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edit Slider</h1>

    <form action="{{ route('updateSlider', ['id' => $slider->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <textarea name="title" placeholder="Enter Title">{{ $slider->title }}</textarea>
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
@extends('admin')

@section('heading')

@endsection

@section('content')

@endsection