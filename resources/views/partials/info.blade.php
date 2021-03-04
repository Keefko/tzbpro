

<section id="triplets">
    <div class="container-fluid h-100 ">
        <div class="row equal">
            <div class="col-lg-6 col-md-12 hidden-md-down bg-white info">
                <div class="heading">
                    <h1><span> 03</span> {{$info->title}}</h1>
                    @if($info->text_active == 1)
                       {!! $info->text !!}
                    @endif
                </div>
                <div class="content" id="info-content">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 no-padding">
                <div class="pricing two-box">
                    <div class="heading">
                        <h1><span> 04</span> {{$price->title}}</h1>
                    </div>

                    @if($price->text_active == 1)
                        {!! $price->text !!}
                    @endif

                    <a href="{{$price->button_first_url}}" class="btn btn-custom btn-custom-white mt-3">{{$price->button_first_text}}</a>
                </div>
                <div class="cooperation two-box">
                    <div class="heading">
                        <h1><span> 05</span> {{$cooperation->title}}</h1>
                    </div>

                    @if($cooperation->text_active == 1)
                        {!! $cooperation->text !!}
                    @endif

                   <div class="mt-3">
                       @if(!empty($cooperation->button_first_text) || $cooperation->button_first_text != null)
                           <a href="{{$cooperation->button_first_url}}" class="btn btn-custom btn-custom-white-full">{{$cooperation->button_first_text}}</a>
                       @endif
                       @if(!empty($cooperation->button_second_text) || $cooperation->button_second_text != null)
                           <a href="{{$cooperation->button_second_url}}" class="btn btn-custom btn-custom-white">{{$cooperation->button_second_text}}</a>
                       @endif
                   </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script>
    let xmlContent = '';
    let infoContent = document.querySelector('#info-content');
    fetch('tzb.xml').then((response) => {
        response.text().then((xml) => {
            xmlContent = xml;
            let parser = new DOMParser();
            let xmlDOM = parser.parseFromString(xmlContent, 'application/xml');
            let items = xmlDOM.querySelectorAll('item');
            let i = 0;
            items.forEach(itemNode => {
                if(i > 3) throw BreakException;
                let blogBox = document.createElement('div')
                blogBox.classList.add('blog-box');

                let a = document.createElement('a');
                a.setAttribute('href', itemNode.children[5].innerHTML)
                a.innerText = itemNode.children[0].innerHTML;
                blogBox.appendChild(a);

                let date = document.createElement('p');
                date.classList.add('date');
                date.innerText = itemNode.children[4].innerHTML;
                blogBox.appendChild(date);

                let description = document.createElement('p');
                description.classList.add('para');
                let desc = itemNode.children[3].innerHTML;
                if (desc.length > 20) {
                    desc = desc.substring(0,200) + "...";
                }
                description.innerText = desc;
                blogBox.appendChild(description);

                infoContent.appendChild(blogBox);
                i++;
            });
        });
    });

</script>
