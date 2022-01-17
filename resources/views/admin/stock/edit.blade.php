@extends('admin')

@section('heading')
    <h2>Edit Stock</h2>
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('updateStock', ['id' => $stock->product_id, 'stockId' => $stock->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Stock:</label>
                <input type="number" class="form-control" name="stock" value="{{ $stock->stock }}" id="" min="1"
                    style="width:250px" placeholder="Enter Product Stock">
            </div>
            <div class="form-group">
                <input type="submit" name="" value="Update Stock" class="btn btn-success" id="">
            </div>
        </form>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <b>{{ $error }}</b>
            @endforeach

        @endif
    </div>
@endsection
