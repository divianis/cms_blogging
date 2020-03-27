@extends('layouts.app')


@section('content')

    <div class="d-flex justify-content-end">
        <!-- <a href="/tags/create" class="btn btn-success float-right mb-2">Add tag</a> -->
        <a href="{{ route('tags.create') }}" class="btn btn-success float-right mb-2"><i class="fa fa-plus"></i> Add Tag</a>
    </div>

    <div class="card card-default">
        <div class="card-header">Tags</div>
        <div class="card-body">
            @if($tags->count()>0)
                <table class="table">
                    <thead>
                    <th>Tags Name</th>
                    <th>Total Posts</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>
                                {{ $tag->name }}
                            </td>
                            <td>
                                {{ $tag->posts->count() }}

                                {{-- menampilkan array = {{ $tag->posts }} --}}
                                {{-- perlu dd di TagsController bagian index = {{ $tag->posts() }} --}}

                            </td>
                            <td>
                                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info btn-sm"
                                   style="color:white"><i class="fa fa-edit"></i> Edit</a>

                                <!-- Pakai '$tag->id' dikarenakan di tengah lokasinya ada '{tag}', versi lengkapnya 'tags/{tag}/edit' -->

                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $tag->id }})">
                                    <i class="fa fa-trash-o"></i>
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">No tags yet.</h3>
        @endif

        <!-- START MODAL EXAMPLE CODE -->

            <form action="" method="POST" id="deleteTagForm">
            @csrf
            @method('DELETE')
            <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center text-bold">
                                    Are you sure to delete this tag?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back.
                                </button>
                                <button type="submit" class="btn btn-danger">Yes, delete.</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

            <!-- END MODAL EXAMPLE CODE -->

        </div>
    </div>

    {{ $tags -> links() }}

    </div>
@endsection

@section('scripts')
    <!-- JAVASCRIPT START -->
    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteTagForm')
            form.action = '/tags/' + id
            //console.log('Deleting', form)
            $('#deleteModal').modal('show')
        }
    </script>
    <!-- JAVASCRIPT END-->
@endsection
