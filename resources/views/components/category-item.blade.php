@props(['category'])
    <li class="jstree-open" data-jstree='{"icon":"fa fa-folder text-warning font-18"}'>{{ $category->name }}
        <ul>
            @foreach($category->children as $child)
                <x-category-item :category="$child" />
            @endforeach
        </ul>
    </li>
