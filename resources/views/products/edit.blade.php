<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">Food&Stuff</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/">Products</a></li>
      <!-- <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li> -->
    </ul>
  </div>
</nav>
    @if($message = Session::get('success'))
        <div class="alert alert-success alert block">
            <strong>{{$message}}</strong>
        </div>
    @endif
    <div class="container">
       <div class="row justify-content-center">
        <div class="col-sm-6">
            <h3>Product Edit #{{$product->name}}</h3>
            <form action="/products/{{$product->id}}/update" method="get" enctype="multipart/form-data" >
                @csrf
                @method('get')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value= "{{old('name',$product->name)}}" name="name" class="form-control" placeholder="product name">
                    @if($errors->has('name'))
                        <span class="text-danger"> {{$errors->first('name')}} </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>description</label>
                    <textarea name="description" class="form-control" placeholder="description">{{old('description', $product->description)}}</textarea>
                    @if($errors->has('description'))
                        <span class="text-danger"> {{$errors->first('description')}} </span>
                    @endif
                </div>

                <!-- <div class="form-group">
                    <label>Image</label>
                    <input value= "{{old('image',$product->image)}}" type="file" name="image" class="form-control">
                    @if($errors->has('image'))
                        <span class="text-danger"> 
                        {{$errors->first('image')}}
                        </span>
                    @endif
                </div> -->
                <button type ="submit" class="btn btn-success">Update</button>
            </form>
        </div>
       </div>
    </div>
</body>
</html>