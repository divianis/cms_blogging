<div class="col-md-4 col-xl-3">
    <div class="sidebar px-4 py-md-0">

        <div class="card-header text-center bg-success text-white p-1">
            <h6 style="text-align:center;">PENCARIAN</h6>
        </div>
        <div class="card-body p-2">
            <form class="input-group" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Search"
                       value="{{ request()->query('search') }}">
                <div class="input-group-addon">
                    <span class="input-group-text"><i class="ti-search"></i></span>
                </div>
            </form>
        </div>


        <hr>
        <div class="card-header text-center bg-success text-white p-1">
            <h6 style="text-align:center">KATEGORI</h6>
        </div>

        {{-- <div class="row link-color-default fs-14 lh-24">--}}

        <div class="gap-multiline-items-1">
            @foreach($categories as $category)

                {{-- <div class="col-6">--}}

                <a href="{{ route('blog.category', $category->id) }}" class="badge badge-primary fa fa-modx"
                   style="color:white;">
                    {{ $category->name }}
                </a>

                {{-- </div> --}}

            @endforeach
        </div>

        <hr>

        {{--                        <h6 class="sidebar-title">Top posts</h6>--}}
        {{--                        <a class="media text-default align-items-center mb-5" href="blog-single.html">--}}
        {{--                            <img class="rounded w-65px mr-4" src="../assets/img/thumb/4.jpg">--}}
        {{--                            <p class="media-body small-2 lh-4 mb-0">Thank to Maryam for joining our team</p>--}}
        {{--                        </a>--}}

        {{--                        <a class="media text-default align-items-center mb-5" href="blog-single.html">--}}
        {{--                            <img class="rounded w-65px mr-4" src="../assets/img/thumb/3.jpg">--}}
        {{--                            <p class="media-body small-2 lh-4 mb-0">Best practices for minimalist design</p>--}}
        {{--                        </a>--}}

        {{--                        <a class="media text-default align-items-center mb-5" href="blog-single.html">--}}
        {{--                            <img class="rounded w-65px mr-4" src="../assets/img/thumb/5.jpg">--}}
        {{--                            <p class="media-body small-2 lh-4 mb-0">New published books for product designers</p>--}}
        {{--                        </a>--}}

        {{--                        <a class="media text-default align-items-center mb-5" href="blog-single.html">--}}
        {{--                            <img class="rounded w-65px mr-4" src="../assets/img/thumb/2.jpg">--}}
        {{--                            <p class="media-body small-2 lh-4 mb-0">Top 5 brilliant content marketing strategies</p>--}}
        {{--                        </a>--}}

        <hr>

        <div class="card-header text-center bg-success text-white p-1">
            <h6 style="text-align:center">TAG</h6>
        </div>
        <div class="gap-multiline-items-1">
            @foreach($tags as $tag)
                <a class="badge badge-primary fa fa-tags" href="{{ route('blog.tag', $tag->id) }}">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>

        <hr>
        <div class="card-header text-center bg-success text-white p-1">
            <h6 style="text-align:center">TENTANG</h6>
        </div>
        <div class="card">
            <img class="card-img-top" src="{{ asset('img/vian.png') }}" alt="">
            <div class="card-body">
                <p class="card-text small-4 text-center" style="color:black">Blog ini dibuat oleh admin saat mendapatkan task untuk belajar
                    laravel saat magang di sebuah perusahaan, semua diikuti berdasarkan kursus dan dikerjakan
                    perlahan bersama rekan saya yang ikut membantu membenarkan bug yang ada.</p>
                <div style="text-align: center;">
                    <a href="https://mrdoob.com/projects/chromeexperiments/google-gravity/"
                       class="btn btn-primary fa fa-search">
                        GOOGLE ME
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
