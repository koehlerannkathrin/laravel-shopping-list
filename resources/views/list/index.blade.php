<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title style="text-align:center;">ShoppingList</title>
  </head>
  <body>

  <div class="container" style="margin-top: 20px; ">
     <div class="alert alert-success" style="display:none"></div>
    <div class="row" style="background-color:#dbd4d2;">
  {{--navigation--}}
      <div class="col-md-12" >
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('ShoppingList', 'ShoppingList') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
      </div>
  {{-- navigation END --}}
      </div>
      <div class="row">
        <div class="col-md-12"style="margin-top:23px;">
            <p>Here you can add articles for your next purchase. <br>
              <strong>Enter an article and quantity.</strong>
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
            <input type="text" name="newShoppinglistName" class="form-control" id="name">
          </div>
          <div class="col-md-9" style="margin-top: 20px;">
            <p style="margin-bottom:2px;">Quantity</p>
            <input type="text" name="newShoppinglistNumber" class="form-control" id="anzahl">
          </div>
          <div class="col-md-3">
            <input type="submit" class="btn btn-primary" value="Add something" id="getRequest">
          </div>
      </form>
    </div>
  {{-- display the stored list items --}}
  @if (count($StoredLists) > 0)
    <table class="table" id="dynamic-fileld"style="margin-top: 20px;">
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
              <input type="submit" class="btn btn-danger" id="deletebtn" value="Delete" >
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

<!--
<script>

jQuery(document).ready(function(){
           jQuery('#getRequest').click(function(e){
              e.preventDefault();
              $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                 }
             });
             jQuery.ajax({
                url: "{{ url('/shopping-list/post') }}",
                method: 'post',
                data: {
                   name: jQuery('#name').val(),
                   anzahl: jQuery('#anzahl').val(),

                },
                success: function(result){
                   console.log(result);
                }});
           });
         });

</script>
-->
  </body>
</html>
