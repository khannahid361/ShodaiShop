@extends('admin')

@section('heading')
    <h2>Slider</h2>
@endsection

@section('content')
    <table class="table table-bordered table-striped">
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
@endsection
