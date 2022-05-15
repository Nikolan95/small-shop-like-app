@if ($products->lastPage() > 1)
    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item {{ ($products->currentPage() == 1) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $products->url(1) }}" tabindex="-1">Previous</a>
            </li>
            @for ($i = 1; $i <= $products->lastPage(); $i++)
                <li class="page-item {{ ($products->currentPage() == $i) ? ' active' : '' }}">
                    <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item {{ ($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $products->url($products->currentPage()+1) }}">Next</a>
            </li>
        </ul><!--end pagination-->
    </nav><!--end nav-->
@endif
