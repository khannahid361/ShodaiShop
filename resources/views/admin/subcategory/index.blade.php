@extends('admin')

@section('heading')
    <h2>Sub-Category <a class="btn btn-warning" href=" {{ route('createSubcategory') }} ">Add Sub-Category</a> </h2>
@endsection

@section('content')
    <table class="table table-display table-striped table-bordered">
        <tr>
            <th>Category Name</th>
            <th>Category Name</th>
            <th>Sub-Category Image</th>
            <th>Action</th>
        </tr>
        @forelse ($subcategories as $subcategory)
            <tr>
                <td>
                    {{ $subcategory->category->category_name }}
                </td>
                <td><a
                        href=" {{ route('showSubcategory', ['id' => $subcategory->id]) }} ">{{ $subcategory->subcategory_name }}</a>
                </td>
                <td>
                    <img src="{{ asset('storage/images/' . $subcategory->subcat_image) }}" height="100" width="140"
                        alt="">
                </td>
                <td>
                    <a href=" {{ route('editSubcategory', ['id' => $subcategory->id]) }} ">Edit</a>
                </td>
                <td>
                    <a href="{{ route('deleteSubcategory', ['id' => $subcategory->id]) }}">Delete</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2">Sub-Category Empty. Please Insert Sub-Category</td>
            </tr>
        @endforelse

    </table>
@endsection
