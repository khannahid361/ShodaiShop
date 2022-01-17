@extends('admin')

@section('heading')
    <h2 class="mb-0">Category List <a class="btn btn-warning" href=" {{ route('category.create') }} ">Add
            Category</a></h2>
@endsection

@section('content')

    <table id="example" class="table table-striped table-display table-bordered second" style="width:100%">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Category Image</th>
                <th>Action</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td><a
                            href=" {{ route('showCategory', ['id' => $category->id]) }} ">{{ $category->category_name }}</a>
                    </td>
                    <td>
                        <img src="{{ asset('storage/images/' . $category->cat_image) }}" height="100" width="140" alt="">
                    </td>
                    <td>
                        <a href=" {{ route('editCategory', ['id' => $category->id]) }} ">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('deleteCategory', ['id' => $category->id]) }}">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Category Empty. Please Insert Category</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
        </tfoot>
    </table>

@endsection
