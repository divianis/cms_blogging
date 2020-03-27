@extends('layouts.blog')

@section('title')
    Vian's Blog
@endsection

@section('header')
    <!-- Header -->
    <header class="header text-center text-white"
            style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
        <div class="container">

            <div class="row">
                <div class="col-md-8 mx-auto">

                    <h1 style="color:black;"><b>LARAVEL DEVELOPMENT PROJECT</b></h1>
                    <p class="lead-2 opacity-80 mt-2" style="color:black;"><i>"Jika kalian berbuat baik, sesungguhnya
                            kalian berbuat baik bagi diri kalian sendiri” (QS. Al-Isra:7)"</i></p>

                </div>
            </div>

        </div>
    </header><!-- /.header -->
@endsection

@section('content')
    <!-- Main Content -->
    <main class="main-content">
        <div class="section bg-gray">
            <div class="container">
                <div class="row">

                    <div class="col-md-8 col-xl-9">
                        <div class="row gap-y">

                            @forelse($posts as $post)
                                <div class="col-md-6">
                                    <div class="card border hover-shadow-6 mb-6 d-block">
                                        <a href="{{ route('blog.show', $post->id) }}">
                                            <img class="card-img-top img-fluid"
                                                 src="{{ asset('storage/'.$post->image) }}"
                                                 alt="Gambar postingan terkait" style="height:250px">
                                        </a>
                                        <div class="p-6 text-center">
                                            <p>
                                                <a class="small-5 text-uppercase ls-2 fw-400 text-success"
                                                   href="#">
                                                    {{ $post->category->name }}
                                                </a>
                                            </p>
                                            <h5 class="mb-0" style="height:100px">
                                                <a class="text-dark" href="{{ route('blog.show', $post->id) }}">
                                                    {{ $post->title }}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">
                                    Tidak ada hasil yang ditemukan dengan keyword
                                    "<strong>{{ request()->query('search') }}</strong>".
                                </p>
                            @endforelse

                        </div>

                        {{ $posts->appends([ 'search' => request() -> query('search') ]) -> links() }}

                    </div>

                    @include('partials.sidebar')

                </div>
            </div>
        </div>
    </main>
@endsection
