<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Create Slider</h1>

    <form action="/slider" method="POST" enctype="multipart/form-data">
        @csrf
        <textarea name="title" placeholder="Enter Title"></textarea>
        <input type="file" name="image" class="form-control" id="">
        <input type="submit" name="submit" value="Add slider">
    </form>
    @if ($errors->any())

        @foreach ($errors->all() as $error)

            <p style="background: red; color: white;"> {{ $error }} </p>

        @endforeach

    @endif
</body>

</html>
