var editor_config = {
    path_absolute : "/",
    selector: "textarea.description",

    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    menubar: 'insert',
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    image_title: true,
    images_upload_url: 'postAcceptor.php',
    /* enable automatic uploads of images represented by blob or data URIs*/
    automatic_uploads: true,
    /*
      URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
      images_upload_url: 'postAcceptor.php',
      here we add custom filepicker only to Image dialog
    */
    file_picker_types: 'image',
    /* and here's our custom image picker*/
    file_picker_callback: function (cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        /*
          Note: In modern browsers input[type="file"] is functional without
          even adding it to the DOM, but that might not be the case in some older
          or quirky browsers like IE, so you might want to add it to the DOM
          just in case, and visually hide it. And do not forget do remove it
          once you do not need it anymore.
        */

        input.onchange = function () {
            var file = this.files[0];

            var reader = new FileReader();
            reader.onload = function () {
                /*
                  Note: Now we need to register the blob in TinyMCEs image blob
                  registry. In the next release this part hopefully won't be
                  necessary, as we are looking to handle it internally.
                */
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                /* call the callback and populate the Title field with the file name */
                cb(blobInfo.blobUri(), { title: file.name });
            };
            reader.readAsDataURL(file);
        };

        input.click();
    },

};
tinymce.init(editor_config);



$(document).ready(function(){
    $('#new').click(function (e){
        e.preventDefault();
        $('#item').toggleClass("active", 800);
    });

    $('#type').click(function (e){
        e.preventDefault();
        $('#types').toggleClass("active", 800);
    });


        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideDown("fast");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");
                $(this).toggleClass('open');
            }
        );

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
});


$(window).on('load', function() {
    if ($('#preloader').length) {
        $('#preloader').delay(300).fadeOut('slow', function() {
            $(this).remove();
        });
    }
});

if(window.innerWidth > 768) {
    $(window).scroll(function () {
        const nav = document.querySelector('#navbar');
        if (window.pageYOffset > nav.clientHeight) {
            nav.classList.remove('bg-transparent');
            nav.classList.add('sticky');

        } else {
            nav.classList.remove('sticky');
            nav.classList.add('bg-transparent');
        }
    });
} else {
    $(window).on('load', function (){
        const nav = document.querySelector('#navbar');
        nav.classList.remove('bg-transparent');
        nav.classList.add('sticky');
    });
}

$(document).ready(function (){

    const nav = document.querySelector('.navbar-toggler');
    const navInner = document.querySelector('.navbar-toggler-inner');

    $(nav).click(function() {
        $(nav).toggleClass('active');
        if($(nav).hasClass('active')){
            navInner.classList.add('active');
        } else {
            navInner.classList.remove('active');
        }
    });

});
