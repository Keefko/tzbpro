<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') / TZBpro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <script type="text/javascript" src="{{asset('vendor/harimayco-menu/scripts.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/harimayco-menu/scripts2.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/harimayco-menu/menu.js')}}"></script>
    <script>
        var menus = {
            "oneThemeLocationNoMenus" : "",
            "moveUp" : "Posun hore",
            "moveDown" : "Posun dole",
            "moveToTop" : "Posun navrh",
            "moveUnder" : "Posun na spodok %s",
            "moveOutFrom" : "Out from under  %s",
            "under" : "Under %s",
            "outFrom" : "Out from %s",
            "menuFocus" : "%1$s. Položka menu %2$d  %3$d.",
            "subMenuFocus" : "%1$s. Podmenu %2$d  %3$s."
        };
        var arraydata = [];
        var addcustommenur= '{{ route("haddcustommenu") }}';
        var updateitemr= '{{ route("hupdateitem")}}';
        var generatemenucontrolr= '{{ route("hgeneratemenucontrol") }}';
        var deleteitemmenur= '{{ route("hdeleteitemmenu") }}';
        var deletemenugr= '{{ route("hdeletemenug") }}';
        var createnewmenur= '{{ route("hcreatenewmenu") }}';
        var csrftoken="{{ csrf_token() }}";
        var menuwr = "{{ url()->current() }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            }
        });
    </script>

    <script>
        $(document).ready(function(){
            $(".hamburger").click(function () {
                $('.wrapper').toggleClass("toggle");
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
        });
    </script>
</head>

@yield('content')

</html>
