@extends('layout.main-layoy')

@section('title', 'Ads')


@section('content')
    <!-- Header-->
    <header class="py-5">
        <div class="container px-lg-5">
            <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                <div class="m-4 m-lg-5">
                    <h1 class="display-5 fw-bold">A warm welcome!</h1>
                    <p class="fs-4">Bootstrap utility classes are used to create this jumbotron since the old component
                        has been removed from the framework. Why create custom CSS when you can use utilities?</p>
                </div>
            </div>
        </div>
    </header>



    <div class="container">
        <div class="row">
            @foreach ($ads as $ad)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="{{url('storage/'. $ad->image )}}" alt="" srcset="" class="w-100" />
                        <div class="card-body">
                            <h3 class="card-text">{{ $ad->title }}</h3>
                            <p class="card-text">{{ $ad->description }} ..</p>
                            <div class="d-flex justify-content-between align-items-center flex-column">
                                <p>Category : {{ $ad->category }}</p>
                                <p>Tags : {{ $ad->tags }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
