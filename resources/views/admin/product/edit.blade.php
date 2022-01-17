@extends('admin')

@section('heading')
    <h2>Product</h2>
@endsection

@section('content')
    <div class="container">
        <h2>Product</h2>
        <form action="{{ route('updateProduct', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Product Name:</label>
                <input type="text" class="form-control" name="product_name" id="" style="width:250px"
                    value="{{ $product->product_name }}">
            </div>
            <div class="form-group">
                <label for="country">Select Category:</label>
                <select name="category_id" class="form-control" style="width:250px">
                    <option value="">--- Select Category ---</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Select Subcategory:</label>
                <select name="subcategory" class="form-control" style="width:250px">
                    <option>--Subcategory--</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Opening Stock:</label>
                <input type="number" class="form-control" name="opening_stock" value="{{ $product->opening_stock }}"
                    id="" min="1" style="width:250px" placeholder="Enter Product Stock">
            </div>
            <div class="form-group">
                <label for="">Cost Price:</label>
                <input type="number" class="form-control" name="cost" id="" min="1" style="width:250px"
                    value="{{ $product->cost }}" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Retail Price:</label>
                <input type="number" class="form-control" name="price" id="" min="1" style="width:250px"
                    value="{{ $product->price }}" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Product Details:</label>
                <input type="text" class="form-control" value="{{ $product->details }}" name="details" id="" min="1"
                    style="width:250px" placeholder="Enter Product Details">
            </div>
            <div class="form-group">
                <label for="">Product Description:</label>
                <textarea name="description" class="form-control" id="" style="width:250px"
                    placeholder="Enter Product Description" cols="30" rows="10">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Select Brand:</label>
                <select name="brand" style="width:250px" class="form-control" id="">
                    <option>
                        <--Select Brand -->
                    </option>
                    @forelse ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                    @empty
                        <option>Insert Brand</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <label for="">Product Image</label>
                <input type="file" name="image" value="" style="width:250px" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Bulk Images</label>
                <input type="file" class="form-control" name="image_path[]" multiple='multiple' value=""
                    style="width:250px" id="">
            </div>
            <div class="form-group">
                <input type="submit" name="" value="Add Product" class="btn btn-success" id="">
            </div>
        </form>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('select[name="category_id"]').on('change', function() {
                var categoryID = jQuery(this).val();
                if (categoryID) {
                    jQuery.ajax({
                        url: '/product/getSubcategory/' + categoryID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            jQuery('select[name="subcategory"]').empty();
                            jQuery.each(data, function(key, value) {
                                $('select[name="subcategory"]').append(
                                    '<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="subcategory"]').empty();
                }
            });
        });
    </script>
@endsection
