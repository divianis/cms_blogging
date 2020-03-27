@extends('layouts.app')


@section('content')

    <div class="card card-default">
        <div class="card-header text-center">
            <h3>
            {{ isset($category) ? 'EDIT CURRENT CATEGORY' : 'CREATE NEW CATEGORY' }} <!-- isset dipakai karena kategori hanya akan tersedia ketika user memilih 'Edit' -->
            </h3>
        </div>
        <div class="card-body">

            @include('partials.errors')

            <form
                action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}"
                method="POST">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name"><b>Name</b></label>
                    <input type="text" id="name" class="form-control" name="name"
                           value="{{ isset($category) ? $category->name : '' }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success mx-2" style="float: right;"><i class="fa fa-save"></i>
                        {{ isset($category) ? ' Finish Updating Category' : ' Finish Creating Category'}}
                    </button>
                </div>

                <div class="form-group">
                    <a href="{{ route('categories.index') }}" class="btn btn-dark mx-2" style="float: right;"><i class="fa fa-times"></i>
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>
@endsection
