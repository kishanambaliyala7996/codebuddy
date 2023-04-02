<ul>
    @foreach ($childs as $category)
        <li id="{{ $category['id'] }}" parent="{{ $category['id'] }}"
            data-jstree='{"icon" : false, "opened":true}'>
            {{ $category['title'] }}
            @if(count($category['child']))
                @include('admin.categories.partials.child_categories', ['childs' => $category['child']])
            @endif
        </li>
    @endforeach
</ul>
