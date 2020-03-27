@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header" style="text-align: center">
            <h3>
                {{ isset($post) ? 'EDIT CURRENT POST'  : 'CREATE NEW POST' }}
            </h3>
        </div>

        <div class="card-body">

        @include('partials.errors')

        <!-- <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data"> -->
            <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST"
                  enctype="multipart/form-data">
                @csrf

                @if(isset($post))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="title"><b>Title</b></label>
                    <input type="text" class="form-control" name="title" id="title"
                           value="{{ isset($post) ? $post->title : '' }}">
                </div>

                <div class="form-group">
                    <label for="description"><b>Description</b></label>
                    <textarea name="description" id="description" cols="5" rows="5"
                              class="form-control">{{ isset($post) ? $post->description : '' }}</textarea>
                </div>

                <div class="form-group">
                    <label for="content"><b>Content</b></label>
                    <!-- <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea> -->
                    <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content:'' }}">
                    <trix-editor input="content"></trix-editor>
                </div>

                @if(isset($post))
                    <div class="form-group">
                        <img src="{{ URL::asset('storage/'.$post->image) }}" alt="" style="width:100%">
                    </div>
                @endif

                <div class="form-group">
                    <label for="image"><b>Image</b></label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>

                <div class="form-group">
                    <label for="category"><b>Category</b></label>
                    <select name="category" id="category" class="form-control category-selector">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                    @if(isset($post))
                                    @if($category->id == $post->category_id)
                                    selected
                                @endif
                                @endif
                            >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- karena tag tidak wajib, maka hanya ditampilkan jika > 0-->
                @if($tags->count()>0)
                    <div class="form-group">
                        <label for="tags"><b>Tags</b></label>
                        <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"
                                        @if(isset($post))

                                        {{-- hanya ditampilkan saat melakukan edit, bukan create --}}
                                        {{-- semua 'tags' dikonversi ke array, karena DB default return record data dalam bentuk collections --}}
                                        {{-- @if(in_array($tag->id, $post->tags->toArray())) --}}

                                        @if($post->hasTag($tag->id))
                                        selected
                                    @endif
                                    {{-- @endif --}}
                                    @endif
                                >

                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="form-group">
                    <label for="published_at"><b>Published At</b></label>
                    <input type="text" class="form-control" name="published_at" id="published_at"
                           value="{{ isset($post) ? $post->published_at : '' }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success mx-2" style="float: right;"><i class="fa fa-save"></i>
                        {{ isset($post) ? ' Finish Updating Post' : ' Finish Creating Post' }}
                    </button>
                </div>

                <div class="form-group">
                    <a href="{{ route('posts.index') }}" class="btn btn-dark mx-2" style="float: right;"><i
                            class="fa fa-times"></i>
                        Cancel
                    </a>
                </div>

        </form>
    </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script>
        flatpickr('#published_at', {
            enableTime: true,
            enableSeconds: true
        })

        $(document).ready(function () {
            $('.tags-selector').select2(); //'.tags-selector' adalah class
        });

        $(document).ready(function () {
            $('.category-selector').select2();
        });


        // $('#category option:not(:selected)').prop('disabled', true);

    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
