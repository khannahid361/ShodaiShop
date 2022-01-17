@extends('admin')

@section('heading')
    <h2>Brand <a class="btn btn-warning" href=" {{ route('createBrand') }} ">Add Brand</a> </h2>
@endsection

@section('content')
    <table class="table table-display table-striped table-bordered">
        <tr>
            <th>Brand Name</th>
            <th>Brand Image</th>
            <th>Action</th>
            <th></th>
        </tr>
        @forelse ($brands as $brand)
            <tr>
                <td><a href=" {{ route('showBrand', ['id' => $brand->id]) }} ">{{ $brand->brand_name }}</a>
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
@endsection
