<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <title>ShoppingList</title>
  </head>
  <body>
  <div class="container" style="margin-top: 20px;">
    <div class="row">
        <h1>ShoppingList</h1>
      </div>
      {{-- display success message --}}
      @if (Session::has('success'))
      <div class="alert alert-success">
        <strong>Success:</strong> {{Session::get('success')}}

      </div>

      @endif


      {{-- display error message --}}
      @if (count($errors) >0)
      <div class="alert alert-danger">
        <strong>Error:</strong>
        <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="row">
        <form action="{{ route('shopping-list.update', [$listUnderEdit->id]) }}" style="width:900px;" method="post">
          {{csrf_field()}}
          <input type="hidden" name="_method" value="PUT">

          <div class="form-group">Name
            <input type="text" name="updatedListName" class="form-control input-lg" value="{{ $listUnderEdit->name}}">
          </div>
          <div class="form-group">Nummer
            <input type="text" name="updatedListNumber" class="form-control input-lg" value="{{ $listUnderEdit->anzahl}}">
          </div>
          <div class="form-group">
            <input type="submit" value="Save Changes" class="btn btn-success btn-lg">
            <a href="/shopping-list" class="btn btn-danger btn-lg pull-right">Go back</a>
          </div>
        </form>
      </div>


    </div>
  </body>
</html>
