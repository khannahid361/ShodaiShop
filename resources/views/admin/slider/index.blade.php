@extends('admin')

@section('heading')
    <h2>Slider <a class="btn btn-warning" href=" {{ route('createSlider') }} ">Add Slider</a> </h2>
@endsection

@section('content')
    <table class="table table-display table-striped table-bordered">
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
@endsection
