<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title style="text-align:center;">ShoppingList</title>
  </head>
  <body>
  <div class="container" style="margin-top: 20px;">
    <div class="row">
      <div class="col-md-12">
          <a href="/"><h1>ShoppingList</h1></a>
      </div>

      </div>
      <div class="row">
        <div class="col-md-12">
            <p>Here you can add items for your next purchase. <br>
              <strong>Enter an Article and Quantity.</strong>
            </p>

        </div>

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

      <form class=" " action="{{ route('shopping-list.store') }}" method="post">
        {{csrf_field()}}
        <div class="row" style="margin-top:20px;">
          <div class="col-md-9">
            <p style="margin-bottom:2px;">Article name</p>
            <input type="text" name="newShoppinglistName" class="form-control" id="AddName">
          </div>
          <div class="col-md-9" style="margin-top: 20px;">
            <p style="margin-bottom:2px;">Quantity</p>
            <input type="text" name="newShoppinglistNumber" class="form-control" id="AddNumber">
          </div>
          <div class="col-md-3">
            <input type="submit" class="btn btn-primary" value="Add something" id="getRequest">
          </div>
      </form>
    </div>
  {{-- display the stored list items --}}
  @if (count($StoredLists) > 0)
    <table class="table"style="margin-top: 20px;">
      <thead>

        <th>Quantity</th>
        <th>Article</th>
        <th>Edit</th>
        <th>Delete</th>
      </thead>
      <tbody>
        @foreach ($StoredLists as $StoredList)
        <tr>

          <td>{{ $StoredList->anzahl }}</td>

          <td>{{ $StoredList->name }}</td>
          <td> <a class="btn btn-outline-secondary" href="{{route('shopping-list.edit', ['list'=>$StoredList->id]) }}">Edit</a>
          </td>
          <td>
            <form action="{{ route('shopping-list.destroy', ['list'=>$StoredList->id])}}" method="post">
              {{csrf_field()}}
              <input type="hidden" name="_method" value="Delete">
              <input type="submit" class="btn btn-danger" value="Delete">
            </form>
          </td>
        </tr>

        @endforeach
      </tbody>
    </table>
        @endif
      <div class="row" style="margin-top:15px;">
        <div class="col-md-9">
            {{ $StoredLists->links()}}
        </div>
        <div class="col-md-3">
          <form>
            <input type="button" class="btn btn-light" value=" Print List " onClick="javascript:window.print()">
          </form>
        </div>
      </div>

    </div>
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script type="text/javascript">
    $(document).ready(function(){
      $('#getRequest').click(function(){
        $.get('getRequest', function(data){
          console.log(data);

        });
      });
    });

    </script>

  </body>
</html>
