
<div id="services">
    <div class="container">
        <div class="bg-white p-5">
            <div class="row">
                <div class="col-md-1">
                    <div class="heading">
                        <h1><span>01</span> {{ $section->title }}</h1>
                    </div>
                </div>
                <div class="col-md-11 services">
                    <div class="row">
                        @foreach($services as $service)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="service-box">
                                    <div class="d-inline">
                                        <i class="{{$service->icon}}"></i>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h2>{{$service->title}}</h2>
                                        </div>
                                        <div class="card-text">
                                            {!! $service->text !!}
                                            @if(!empty($service->button_text))
                                                <a href="{{ url($service->button_url) }}" class="btn btn-custom btn-custom-green">{{$service->button_text}}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center link mt-4">
                @if(!empty($section->button_first_text) ||$section->button_first_text != null)
                    <a href="{{$section->button_first_url}}" class="text-uppercase">{{$section->button_first_text}}</a>
                @endif
                @if(!empty($section->button_second_text) || $section->button_second_text != null)
                    <a href="{{$section->button_second_url}}" class="btn btn-custom btn-custom-white">{{$section->button_second_text}}</a>
                @endif

            </div>
        </div>
    </div>
</div>
