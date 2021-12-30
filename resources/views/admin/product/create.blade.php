<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>

<body>
    <div class="container">
        <h2>Product</h2>
        <form action="{{ route('productStore') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Product Name:</label>
                <input type="text" class="form-control" name="product_name" id="" style="width:250px"
                    placeholder="Enter Product Name">
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
                <input type="number" class="form-control" name="opening_stock" id="" min="1" style="width:250px"
                    placeholder="Enter Product Stock">
            </div>
            <div class="form-group">
                <label for="">Cost Price:</label>
                <input type="number" class="form-control" name="cost" id="" min="1" style="width:250px"
                    placeholder="">
            </div>
            <div class="form-group">
                <label for="">Retail Price:</label>
                <input type="number" class="form-control" name="price" id="" min="1" style="width:250px"
                    placeholder="">
            </div>
            <div class="form-group">
                <label for="">Product Details:</label>
                <input type="text" class="form-control" name="details" id="" min="1" style="width:250px"
                    placeholder="Enter Product Details">
            </div>
            <div class="form-group">
                <label for="">Product Description:</label>
                <textarea name="description" class="form-control" id="" style="width:250px"
                    placeholder="Enter Product Description" cols="30" rows="10"></textarea>
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
</body>

</html>
