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
                            <h2>Startup Registration Portal</h2>
                        </div>
                        <div class="add-button" style="float:right;">
                            <a class="btn btn-dark" href="{{ route('add.new') }}">Add New Startup</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                        @endif
                        <table class="table table-bordered">
                        <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Startup Name</th>
                                    <th>Founder Name</th>
                                    <th>Sector</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                                @foreach($startups as $startup)
                                <tr>
                                    <td>{{ $startup->id }}</td>
                                    <td>{{ $startup->startup_name }}</td>
                                    <td>{{ $startup->founder_name }}</td>
                                    <td>{{ $startup->sector }}</td>
                                    <td>
                                        <form action="{{ route('delete',$startup->id) }}" method="POST">
                                            <a class="btn btn-info btn-sm" style="color:#fff;" href="{{ route('details',$startup->id) }}">Details</a>
                                            <a class="btn btn-success btn-sm" href="{{ route('edit',$startup->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {!! $startups->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>