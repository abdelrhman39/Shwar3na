{{-- @if ($paginator->hasPages())
    <ul class="pager">

        @if ($paginator->onFirstPage())
            <li class="disabled"><span>← Previous</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        @else
            <li class="disabled"><span>Next →</span></li>
        @endif
    </ul>
@endif









 --}}


@if ($paginator->hasPages())
<!-- pagination-->
<div class="pagination">


    @if ($paginator->onFirstPage())
        <a  rel="prev" class="prevposts-link disabled"><i class="fa fa-caret-left"></i></a>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
    @endif


    @foreach ($elements as $element)

        @if (is_string($element))
            <a href="#" class=" disabled">{{ $element }}</a>
        @endif


        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <a href="#" class="blog-page current-page transition">{{ $page }}</a>
                @else
                    <a href="{{ $url }}" class="blog-page transition">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach


        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
        @else
            <a disabled class=" nextposts-link"><i class="fa fa-caret-right"></i></a>
        @endif


</div>
@endif
