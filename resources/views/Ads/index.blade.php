@extends('layout.main-layoy')

@section('title', 'Ads')


@section('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ads as $ad)
                            <tr>
                                <td class="font-weight-bold">{{ $ad->id }}</td>
                                <td class="font-weight-bold">{{ $ad->title }}</td>
                                <td class="font-weight-bold">{{ $ad->category }}</td>
                                <td class="font-weight-bold">{{ $ad->tags }}</td>
                                <td><img style="width: 400px" src="{{ url('storage/' . $ad->image) }}" alt=""
                                        srcset=""></td>
                                <td>
                                    <a href="{{ route('ads.show', $ad->id) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('ads.edit', $ad->id) }}" class="btn btn-outline-info btn-sm">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{ route('ads.destroy', $ad->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        <input type="hidden" value="delete" name="_method">
                                        <button class="btn btn-danger btn-sm sa-btn-delete"><i class="fa fa-trash"
                                                aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </main>
    </div>
</div>




@endsection
