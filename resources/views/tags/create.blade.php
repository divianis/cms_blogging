@extends('layouts.app')


@section('content')

    <div class="card card-default">
        <div class="card-header text-center">
            <h3>
            {{ isset($tag) ? 'EDIT CURRENT TAG' : 'CREATE NEW TAG' }} <!-- isset dipakai karena tag hanya akan tersedia ketika user memilih 'Edit' -->
            </h3>
        </div>
        <div class="card-body">

            @include('partials.errors')

            <form
                action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}"
                method="POST">
                @csrf
                @if(isset($tag))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name"><b>Name</b></label>
                    <input type="text" id="name" class="form-control" name="name"
                           value="{{ isset($tag) ? $tag->name : '' }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success mx-2" style="float: right;"><i class="fa fa-save"></i>
                        {{ isset($tag) ? ' Finish Updating Tag' : ' Finish Creating Tag'}}
                    </button>
                </div>

                <div class="form-group">
                    <a href="{{ route('tags.index') }}" class="btn btn-dark mx-2" style="float: right;"><i class="fa fa-times"></i>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
