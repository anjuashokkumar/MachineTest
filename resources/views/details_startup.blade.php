<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Startup Registration Portal</title>
  </head>
  <body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="title" style="float:left;">
                            <h2>Startup</h2>
                        </div>
                        <div class="add-button" style="float:right;">
                            <a class="btn btn-dark" href="{{ route('index') }}">All Startups</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Startup Name</label>
                            <div class="col-sm-10">
                            : {{ $startup->startup_name }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Founder Name</label>
                            <div class="col-sm-10">
                            : {{ $startup->founder_name }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            : {{ $startup->email }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                            : {{ $startup->phone }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Website</label>
                            <div class="col-sm-10">
                            : @if(!empty($startup->website)) <?php echo $startup->website; ?> @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Sector</label>
                            <div class="col-sm-10">
                            : {{ $startup->sector }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Pitch Deck</label>
                            <div class="col-sm-10">
                            : {{ $startup->file }}
                            <img src="{{ asset('startup/file/'.$startup->file) }}" alt="Image" style="width:150px; height:120px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>