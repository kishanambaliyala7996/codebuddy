@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="d-flex justify-content-between align-items-center">
                            Categories
                            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">Add New</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Parent Category</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->parentCategory->title ?? "- - -" }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $item->id) }}"
                                           class="btn btn-primary btn-sm">
                                            Edit
                                        </a>
                                        <a href="javascript:;" data-id="{{ $item->id }}"
                                           class="btn btn-danger btn-sm deleteCategory">
                                            Delete
                                        </a>
                                        <form id="deleteCategoryForm_{{ $item->id }}"
                                              action="{{ route('categories.destroy', $item->id) }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Empty Records</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {!! $categories->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('footer_scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.deleteCategory', function () {
                if (confirm("Are you sure you want to delete this category and it's child category?")) {
                    $("#deleteCategoryForm_" + $(this).data('id')).submit();
                }
            })
        })
    </script>
@endpush
