@extends('admin')

@section('heading')
    <h2>Brand</h2>
@endsection

@section('content')
    <table class="table table-display table-striped table-bordered">
        <tr>
            <th>Brand Name</th>
            <th>Brand Image</th>

        </tr>

        <tr>
            <td>{{ $brand->brand_name }}
            </td>
            <td>
                <img src="{{ asset('storage/images/' . $brand->brand_image) }}" height="100" width="140" alt="">
            </td>
        </tr>

    </table>
@endsection
