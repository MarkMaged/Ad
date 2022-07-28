@extends('layout.main-layoy')

@section('title', 'Show Ad')


@section('content')

    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <h2>My Ads
                </h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-weight-bold">{{ $ads->id }}</td>
                                <td class="font-weight-bold">{{ $ads->title }}</td>
                                <td class="font-weight-bold">{{ $ads->category }}</td>
                                <td class="font-weight-bold">{{ $ads->tags }}</td>
                                <td><img style="width: 400px" src="{{ url('storage/' . $ads->image) }}" alt=""
                                        srcset=""></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </main>
        </div>
    </div>



@endsection
