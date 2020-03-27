@extends('layouts.app')

@push('head')
    <!-- Scripts -->
    <script src="{{ asset('js/components/pizza.js')}}"></script>
@endpush

@section('content')

    @if(Route::current()->getName() != 'trashed-posts.index')
        <div class="d-flex justify-content-end">
            <a href="{{ route('posts.create') }}" class="btn btn-success float-right mb-2"><i class="fa fa-plus"></i>
                Add Post</a>
        </div>
    @endif

    <div class="card card-default">
        <div class="card-header">
            Posts
        </div>
        <div class="card-body">
            @if($posts->count()>0)
                <table class="table">
                    <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/'.$post->image) }}" width="120px" height="80px"
                                     alt="Gambar Postingan">
                            </td>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', $post->category->id) }}">
                                {{ $post->category->name }} <!-- category diambil dari 'Post.php' di bagian 'public function category()' -->
                                </a>
                            </td>
                            <td>
                                <div align="center" style="display:flex">
                                    @if(!$post->trashed())
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                           class="btn btn-info btn-sm my-2 mx-2"><i class="fa fa-edit"></i> Edit</a>
                                    @else
                                        <form action="{{ route('restore-posts', $post->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-secondary btn-sm my-2 mx-2"><i
                                                    class="fa fa-recycle"></i> Restore
                                            </button>
                                        </form>
                                    @endif

                                    <button class="btn btn-danger btn-sm my-2 mx-2"
                                            onclick="handleDelete({{ $post->id }})">
                                        <i class="fa fa-trash-o"></i>
                                        {{ $post->trashed() ? "Delete" : "Trash" }}

                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">No posts yet.</h3>
        @endif

        <!-- START MODAL EXAMPLE CODE -->

            <form action="" method="POST" id="deletePostForm">
            @csrf
            @method('DELETE')
            <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                @if(Route::current()->getName() != 'trashed-posts.index')
                                    <h5 class="modal-title" id="deleteModalLabel">MOVE POST
                                        INTO TRASH</h5>
                                @else
                                        <h5 class="modal-title" id="deleteModalLabel">DELETE POST
                                            PERMANENTLY</h5>
                                @endif
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if(Route::current()->getName() != 'trashed-posts.index')
                                    <p class="text-center text-bold">
                                        Are you sure to move this post into trash?
                                    </p>
                                @else
                                    <p class="text-center text-bold">
                                        Are you sure to delete this post permanently?
                                    </p>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back.
                                </button>
                                <button type="submit" class="btn btn-danger">Yes, execute.</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

            <!-- END MODAL EXAMPLE CODE -->

        </div>
        @if(Route::current()->getName() != 'trashed-posts.index')
            {{ $posts->links() }}
        @else
            {{ $posts->links() }}
        @endif
    </div>
@endsection

@section('scripts')
    <!-- JAVASCRIPT START -->
    <script>
        function handleDelete(id) {
            var form = document.getElementById('deletePostForm')
            form.action = '/posts/' + id
            //console.log('Deleting', form)
            $('#deleteModal').modal('show')
        }
    </script>
    <!-- JAVASCRIPT END-->
@endsection
