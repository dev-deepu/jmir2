<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {!! Html::style('css/app.css') !!}
    <title>List</title>
  </head>
  <body>
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">ADD INFORMATION</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ url('list') }}">LISTING PAGE</a>
      </li>
    </ul>

    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          @if (count($users) > 0)
              <section class="users">
                  @include('load')
              </section>
          @endif  
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    {!! Html::script('js/script.js') !!}

    <script type="text/javascript">
      var url = "";
    $(function() {
        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();

            $('#load a').css('color', '#dfecf6');
            $('#load').append('<div id="div-loader"><img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="{{ url('images/loader.gif') }}" /></div>');

            url = $(this).attr('href');  
            getUsers(url);
            window.history.pushState("", "", url);
        });

        $('body').on('click', 'a.delete', function(e) {
            e.preventDefault();

            $('#load a').css('color', '#dfecf6');
            $('#load').append('<div id="div-loader"><img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="{{ url('images/loader.gif') }}" /></div>');
            var deleteUrl = $(this).attr('href');
            deleteUrl
            $.ajax({
                url : deleteUrl,
                type: 'GET'  
            }).done(function (data) {
                // var url = $(this).attr('href');  
                getUsers(url);
                window.history.pushState("", "", url);  
            }).fail(function () {
                alert('Data could not be deleted.');
            });

        });

        function getUsers(url) {
            $.ajax({
                url : url  
            }).done(function (data) {
                $('.users').html(data);  
            }).fail(function () {
                alert('Data could not be loaded.');
            });
        }
    });

    </script>
  </body>
</html>