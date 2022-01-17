@extends('admin')

@section('heading')
    <h2>Add Product Stock</h2>
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('storeStock') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Product:</label>
                <select name="product_id" style="width:250px" class="form-control" id="">
                    <option>
                        <--Select Product -->
                    </option>
                    @forelse ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                    @empty
                        <option>Insert Product</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <label for="">Stock:</label>
                <input type="number" class="form-control" name="stock" value="" id="" min="1" style="width:250px"
                    placeholder="Enter Product Stock">
            </div>
            <div class="form-group">
                <input type="submit" name="" value="Add Quantity" class="btn btn-success" id="">
            </div>
        </form>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="background: red; color: white;"> {{ $error }} </p>
            @endforeach
        @endif
    </div>
@endsection
