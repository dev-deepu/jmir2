<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {!! Html::style('css/app.css') !!}
    <title>Home</title>
  </head>
  <body>
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link active" href="{{ url('/') }}">ADD INFORMATION</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('list') }}">LISTING PAGE</a>
      </li>
    </ul>

    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              {!! Form::open(['url' => url('save')]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('name'))
                      <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                      </div>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('province', 'Province') !!}
                    {!! Form::select('province', [
                      'Ontario' => 'Ontario', 
                      'Québec' => 'Québec', 
                      'Nova Scotia' => 'Nova Scotia', 
                      {{-- 'Ontario' => 'Ontario', 
                      'Ontario' => 'Ontario', 
                      'Ontario' => 'Ontario', 
                      'Ontario' => 'Ontario', 
                      'Ontario' => 'Ontario', 
                      'Ontario' => 'Ontario', 
                      'Ontario' => 'Ontario', 
                      'Ontario' => 'Ontario', 
                      'Ontario' => 'Ontario',  --}}

                    ], null, ['class' => 'form-control']); !!}

                    @if ($errors->has('province'))
                      <div class="invalid-feedback">
                        {{ $errors->first('province') }}
                      </div>
                    @endif
                  </div>
                <div class="form-group">
                    {!! Form::label('salary', 'Salary') !!}
                    {!! Form::text('salary', '', ['class' => 'form-control']) !!}
                    @if ($errors->has('salary'))
                      <div class="invalid-feedback">
                        {{ $errors->first('salary') }}
                      </div>
                    @endif
                </div>
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
              {!! Form::close() !!}
            </div>
          </div>
          
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    {!! Html::script('js/script.js') !!}
  </body>
</html>