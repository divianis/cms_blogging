@extends('layouts.app')


@section('content')

    <div class="d-flex justify-content-end">
        <!-- <a href="/categories/create" class="btn btn-success float-right mb-2">Add Category</a> -->
        <a href="{{ route('categories.create') }}" class="btn btn-success float-right mb-2"><i class="fa fa-plus"></i>
            Add Category</a>
    </div>

    <div class="card card-default">
        <div class="card-header">Categories</div>
        <div class="card-body">
            @if($categories->count()>0)
                <table class="table">
                    <thead>
                    <th>Categories Name</th>
                    <th>Total Posts</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td>
                                {{ $category->posts->count() }}

                                {{-- menampilkan array = {{ $category->posts }} --}}
                                {{-- perlu dd di CategoriesController bagian index = {{ $category->posts() }} --}}

                            </td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm"
                                   style="color:white"><i class="fa fa-edit"></i> Edit</a>

                                <!-- Pakai '$category->id' dikarenakan di tengah lokasinya ada '{category}', versi lengkapnya 'categories/{category}/edit' -->

                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $category->id }})">
                                    <i class="fa fa-trash-o"></i>
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">No categories yet.</h3>
        @endif

        <!-- START MODAL EXAMPLE CODE -->

            <form action="" method="POST" id="deleteCategoryForm">
            @csrf
            @method('DELETE')
            <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center text-bold">
                                    Are you sure to delete this category?
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

    {{ $categories -> links() }}

    </div>
@endsection

@section('scripts')
    <!-- JAVASCRIPT START -->
    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteCategoryForm')
            form.action = '/categories/' + id
            //console.log('Deleting', form)
            $('#deleteModal').modal('show')
        }
    </script>
    <!-- JAVASCRIPT END-->
@endsection
