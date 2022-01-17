@extends('admin')

@section('heading')
    <h2>View Category</h2>
@endsection

@section('content')
    <table class="table table-bordered table-striped">
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
@endsection
