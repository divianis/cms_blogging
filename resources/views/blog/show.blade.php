@extends('layouts.blog')

@section('title')
    {{ $post->title }}
@endsection

@section('header')
    <!-- Header -->
    <header class="header text-white h-fullscreen pb-80"
            style="background-image: url({{ asset('storage/'.$post->image) }});"
            data-overlay="6">
        <div class="container text-center">

            <div class="row h-100">
                <div class="col-lg-8 mx-auto align-self-center">

                    <a class="text-uppercase text-white">
                        <span>
                            <i class="badge badge-success fa fa-modx mt-8 p-2">
                                Category : {{ $post->category->name }}
                            </i>
                        </span>
                    </a>

                    <h1 class="display-4 mt-7 mb-8">
                        {{ $post->title }}
                    </h1>
                    <p><span class="opacity-70 mr-1">Ditulis Oleh : </span>
                        <a class="text-white" href="#">
                            {{ $post->user->name  }}
                        </a>
                    </p>
                    <p><img class="avatar avatar-sm" src="{{ Gravatar::src($post->user->email) }}" alt="..."></p>

                </div>

                <div class="col-12 align-self-end text-center">
                    <a class="scroll-down-1 scroll-down-white" href="#section-content"><span></span></a>
                </div>

            </div>

        </div>
    </header><!-- /.header -->
@endsection

@section('content')
    <!-- Main Content -->
    <main class="main-content">


        <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Blog content
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
        <div class="section" id="section-content">
            <div align="center">
                <div class="container">
                    <div class="card" style="width: 50rem; color:black;" align="justify">
                        <div class="card-body">

                            {{-- UNTUK IGNORE HTML CONTENT, PAKAI '!!' --}}
                            {!! $post->content !!}

                            <div class="addthis_inline_share_toolbox">
                            </div>

                            <div class="row">
                                <div class="gap-xy-2 mt-6">
                                    <h6>Tag Related : </h6>
                                    @foreach($post->tags as $tag)
                                        <a class="badge badge-pill badge-primary"
                                           href="{{ route('blog.tag', $tag->id) }}">
                                            <span><i class="fa fa-tags"></i></span>
                                            {{ $tag->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Comments
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
        <div class="section bg-gray">
            <div class="container">

                <div class="row">
                    <div class="col-lg-8 mx-auto">

                        <hr>

                        {{-- BEGIN DISQUS COMMENT PLUGIN --}}
                        <div id="disqus_thread"></div>
                        <script>

                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                            var disqus_config = function () {
                                this.page.url = "{{ config('app.url') }}/blog/posts/{{ $post->id }}";  // Replace PAGE_URL with your page's canonical URL variable
                                this.page.identifier = "{{ $post->id }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };

                            (function () { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://vians-blog.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
                                powered by Disqus.</a></noscript>
                        {{-- END DISQUS COMMENT PLUGIN --}}
                    </div>
                </div>

            </div>
        </div>


    </main>
@endsection
