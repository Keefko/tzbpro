<section id="about">
    <div class="container">
        <div class="about-area">
            <div class="row">
                <div class="col-xl-2 col-md-2 col-sm-12 heading">
                    <h3>02</h3>
                    <h1>{{$section->title}}</h1>
                </div>
                <div class="col-xl-8 col-md-8 col-sm-12">
                    @if($section->text_active == 1)
                        {!! $section->text !!}
                    @endif
                </div>
                <div class="col-xl-2 col-md-2 col-sm-12 d-lg-flex align-items-center flex-column buttons">
                    @if(!empty($section->button_first_text) || $section->button_first_text != null)
                    <a href="{{$section->button_first_url}}" class="btn btn-custom btn-custom-grey">{{$section->button_first_text}}</a>
                    @endif
                    @if(!empty($section->button_second_text) || $section->button_second_text != null)
                        <a href="{{$section->button_second_url}}" class="btn btn-custom btn-custom-grey-full mt-lg-2">{{$section->button_second_text}}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
