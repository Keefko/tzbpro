
<footer>
    <div class="container">
        <div class="row contact">
            <div class="col-lg-4 col-md-12 text-center contact-box">
                <i class="fas fa-map-marker-alt"></i>
                <p>{!! $contact->adress!!}</p>
            </div>
            <div class="col-lg-4 col-md-12 text-center contact-box">
                <i class="fas fa-envelope"></i>
                <p>{!! $contact->mail !!}</p>
            </div>
            <div class="col-lg-4 col-md-12 text-center contact-box">
                <i class="fas fa-phone"></i>
                <p>{!!$contact->phone!!}</p>
            </div>
        </div>
    </div>
    <div class="copyright text-center p-3">
        <p>Copyright © 2021 TZBpro s.r.o</p>
    </div>
</footer>
