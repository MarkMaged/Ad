@extends('layout.main-layoy')

@section('title', 'Add Ads')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2>Add Ad</h2>
                <div class="card col-md-10">
                    <div class="card-body ">
                        <form class="row g-3" method="POST" action="{{ route('ads.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="inputTitle4" class="form-label">Title</label>
                                <input type="text" class="form-control" id="inputTitle4" name="title"
                                    value="{{ old('title') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCategory" class="form-label">Category</label>
                                <input type="text" class="form-control" id="inputCategory" name="category"
                                    value="{{ old('category') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="inputTags" class="form-label">Tage</label>
                                <input type="text" class="form-control" id="inputTags" name="tags"
                                    value="{{ old('tags') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="inputAdvertiser" class="form-label">Advertiser</label>
                                <input type="text" class="form-control" id="inputAdvertiser" name="advertiser"
                                    value="{{ old('advertiser') }}">
                            </div>
                            <div class="col-md-6">
                                <select name="type" id="type" class="form-control">
                                    <option value="select">Select</option>
                                    <option value="free">Free</option>
                                    <option value="paid">Paid</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputdescription4" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="inputdescription4" cols="30" rows="10">{{ old('description') }}</textarea>
                                <!-- <input type="text" id="inputContent4" name="content"> -->
                            </div>
                            <div class="col-6">
                                <label for="inputImage" class="form-label">Image</label>
                                <input type="file" class="form-control" id="inpuImage" name="image">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>

            </main>
        </div>
    </div>


@endsection
