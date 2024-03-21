<!DOCTYPE html>
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
      </ul>
    </div>
  </nav>
  @if($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <strong>{{$message}}</strong>
  </div>
  @endif
  <div class="container">
    <h1>Products</h1>
    <div class="text-right">
      <a href="products/create" class="btn btn-primary">New product</a>
    </div>

    <!-- Move the form tag here -->
    <form action="products/selected-products" method="post">
      @csrf
      @method('DELETE')

      <table class="table table-hover table-responsive">
        <thead>
          <tr>
            <th>S.NO.</th>
            <th>Name</th>
            <th>Description</th>
            <!-- <th>Image</th> -->
            <th>Action</th>
            <th>Select all<input type="checkbox" name="ids[]" id="checkAll"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
          <tr id="sid{{$product->id}}">
            <td>{{$loop->index+1}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product ->description}}</td>
            <!-- <td>
                            <img src="products/{{$product->image}}" class="rounded-circle" width="50" height="50">
                        </td> -->
            <td>
              <a href="products/{{$product->id}}/edit" class="btn btn-success btn-sm">Edit</a>
              <a href="products/{{$product->id}}/delete" class="btn btn-danger btn-sm">Delete</a>
            </td>
            <td>
              <input type="checkbox" name="ids[]" class="checkboxClass" value="{{$product->id}}">
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="text-right">
        <button type="submit" class="btn btn-danger" id="deleteAllSelected">Delete selected</button>
      </div>
    </form>
    <!-- End of form -->
  </div>
  <script>
    $(function() {
      $("#checkAll").click(function() {
        $(".checkboxClass").prop('checked', $(this).prop('checked'));
      });
    });
  </script>
</body>

</html>