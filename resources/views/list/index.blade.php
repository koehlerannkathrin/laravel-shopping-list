<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <title>ShoppingList</title>
  </head>
  <body>
  <div class="container">
    <div class="row">
        <h1>ShoppingList</h1>
      </div>
      <form class=" " action="{{ route('shopping-list.store') }}" method="post">
        {{csrf_field()}}
        <div class="row">
          <div class="col-md-9">
            <input type="text" name="newShoppinglistName" class="form-control">
          </div>
          <div class="col-md-3">
            <input type="submit" class="btn btn-primary" value="Add something">
          </div>
        </div>
      </form>
  </div>
  </body>
</html>
