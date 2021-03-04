

<section id="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-md-6  d-xl-flex justify-content-start align-items-center">
                <div class="heading">
                    <h1><span> 06</span> {{$testimonial->title}}</h1>
                    @if($testimonial->text_active == 1)
                        <p> {!! $testimonial->text !!}</p>
                    @endif
                </div>
            </div>
        </div>

            <div id="multi-item-example" class="carousel slide carousel-multi-item mt-4" data-ride="carousel">
                <div class="carousel-inner" role="listbox">

                    @foreach($testimonials->chunk(4) as $references )
                    <div class="carousel-item @if($loop->first) active @endif">
                        <div class="row">
                            @foreach($references as $reference)
                            <div class="col-md-3  testimonial-item">
                                <div class="card mb-2 d-flex ">
                                    <div class="card-body text-center align-items-center d-flex justify-content-center">
                                        <div class="text">
                                            <h4 class="card-title font-weight-bold">{{$reference->text}}</h4>
                                            @if(isset($reference->type->type))
                                                <p class="card-text">{{$reference->type->type}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach

                </div>
                <!--/.Slides-->

                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                    <li data-target="#multi-item-example" data-slide-to="1"></li>
                    <li data-target="#multi-item-example" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->
            </div>



            <div class="col-md-12 text-center link mt-4">
                @if(!empty($testimonial->button_first_text) ||$testimonial->button_first_text != null)
                    <a href="{{$testimonial->button_first_url}}" class="text-uppercase">{{$testimonial->button_first_text}}</a>
                @endif
                @if(!empty($testimonial->button_second_text) || $testimonial->button_second_text != null)
                    <a href="{{$testimonial->button_second_url}}" class="btn btn-custom btn-custom-white">{{$testimonial->button_second_text}}</a>
                @endif
            </div>
    </div>
</section>
