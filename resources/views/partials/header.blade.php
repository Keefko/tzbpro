<header id="hero">

    @include('partials/menu')

    <div class="masthead container">
        @if($section->text_active == 1)

                {!! $section->text!!}

        @endif
        <h1 class="pt-3"> {{$section->title}}</h1>
        <div class="mt-4">
            @if(!empty($section->button_first_text) || $section->button_first_text != null)
                <a href="{{$section->button_first_url}}" class="btn btn-custom btn-custom-white">{{$section->button_first_text}}</a>
            @endif
            @if(!empty($section->button_second_text) || $section->button_second_text != null)
                <a href="{{$section->button_second_url}}" class="btn btn-custom btn-custom-white-full">{{$section->button_second_text}}</a>
            @endif
        </div>
    </div>
</header>
