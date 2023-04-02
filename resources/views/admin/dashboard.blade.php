@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>
                    <div class="card-body">
                        <h4>Categories</h4>
                        @if(count($categories) > 0)
                            <div id="jstree-checkbox">
                                <ul>
                                    @foreach ($categories as $category)
                                        <li id="{{ $category['id'] }}" data-jstree='{"icon" : false, "opened":true}'>
                                            {{ $category['title'] }}
                                            @if(count($category['child']))
                                                @include('admin.categories.partials.child_categories', ['childs' => $category['child']])
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            No Categories Found
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.15/themes/default/style.min.css"/>
@endpush
@push('footer_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.15/jstree.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#jstree-checkbox').jstree({
                plugins: ['types', 'wholerow'],
            });
        });
    </script>
@endpush
