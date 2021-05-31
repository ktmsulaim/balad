<section id="page-title">

    <div class="container">
        <h1>{{ $pageTitle ?: 'Untitled' }}</h1>
        <span>{{ $pageSubTitle ?: '' }}</span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
            @if ($links && is_array($links) && count($links))
                @foreach ($links as $link)    
                    <li class="breadcrumb-item {{ URL::current() == $link['url'] ? 'active' : '' }}" {{ URL::current() == $link['url'] ? 'aria-current="page"' : '' }}><a href="{{ $link['url'] }}">{{ $link['label'] }}</a></li>
                    @endforeach
            @endif
        </ol>
    </div>

</section>