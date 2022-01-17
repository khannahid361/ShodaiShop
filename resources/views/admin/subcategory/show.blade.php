@extends('admin')

@section('heading')
    <h2>Subcategory</h2>
@endsection

@section('content')
    <table class="table table-display table-striped table-bordered">
        <tr>
            <th>Category Name</th>
            <th>Sub-category Name</th>
            <th>Sub-Category Image</th>

        </tr>

        <tr>
            <td>
                {{ $subcategory->category->category_name }}
            </td>
            <td>{{ $subcategory->subcategory_name }}</td>
            <td>
                <img src="{{ asset('storage/images/' . $subcategory->subcat_image) }}" height="100" width="140" alt="">
            </td>

        </tr>

    </table>
@endsection
