<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Images S3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style>
        body, .card{
            background: #ededed;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center mt-5">Upload images to S3</h1>
    <div class="row pt-5">
        <div class="col-sm-12">
            @if ($errors->any())
                <div class="alert alert-danger w-25 m-auto mb-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-info w-25 m-auto mb-3">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
        </div>
        <div class="col-sm-12 mb-3">
            <div class="card border-0 text-center">
                <form action="{{ url('/images') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="file" name="image" id="image">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6 m-auto">
            @if (count($images) > 0)
                        @foreach ($images as $image)
                            <div class="mb-3">
                                <p class="d-block w-100 text-break" >Image name: {{$image['name']}}</p>
                                <div class="link text-break mb-3">{{ $image['src'] }}</div>
                                <img class="d-block w-100" src="{{ $image['src'] }}" alt="{{ $image['name'] }}">
                                <div class="mt-3">
                                    <form action="{{ url('images/' . $image['name']) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
            @else
                <p>Nothing found</p>
            @endif
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>
</html>
