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
                        <h2 class="text-left">Add New Startup</h2>
                    </div>
                    <div class="add-button" style="float:right;">
                        <a class="btn btn-dark" href="{{ route('index') }}">All Startups</a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif

                    <form action="{{ route('update.new', $startup->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="mb-1">Startup Name</label>
                                    <input type="text" name="startup_name" class="form-control" value="{{ $startup->startup_name }}">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">Founder Name</label>
                                    <input type="text" name="founder_name" class="form-control" value="{{ $startup->founder_name }}">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $startup->email }}">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">Phone</label>
                                    <input type="number" name="phone" class="form-control" value="{{ $startup->phone }}">
                                </div>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <div class="mb-3">
                                    <label class="mb-1">Website</label>
                                    <input type="text" name="website" class="form-control" value="{{ $startup->website }}">
                                </div>
                                <div class="mb-3">Sector</label>
                                    <select name="sector" class="form-control">
                                        <option value="">Select</option>
                                        <option value="HealthTech" @if($startup->sector === 'HealthTech') selected @endif>HealthTech</option>
                                        <option value="EdTech" @if($startup->sector === 'EdTech') selected @endif>EdTech</option>
                                        <option value="FinTech" @if($startup->sector === 'FinTech') selected @endif>FinTech</option>
                                        <option value="Agritech" @if($startup->sector === 'Agritech') selected @endif>Agritech</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">Pitch Deck</label>
                                    <input type="file" name="file" class="form-control" value="{{ old('file') }}">
                                </div>
                                
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="check_me" class="form-check-input" value="1" @if($startup->check_me === 1) checked @endif>
                                    <label class="form-check-label">Check me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>