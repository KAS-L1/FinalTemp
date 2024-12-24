<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
            <!-- [Favicon] icon -->
        <link rel="icon" href="{{asset('/assets/images/favicon.svg')}}" type="image/x-icon" />
        <link rel="stylesheet" href="{{asset('/assets/css/plugins/dataTables.bootstrap5.min.css')}}" />
        <!-- [Font] Family -->
        <link rel="stylesheet" href="{{asset('/assets/fonts/inter/inter.css')}}" id="main-font-link" />
        <!-- [phosphor Icons] https://phosphoricons.com/ -->
        <link rel="stylesheet" href="{{asset('/assets/fonts/phosphor/duotone/style.css')}}" />
        <!-- [Tabler Icons] https://tablericons.com -->
        <link rel="stylesheet" href="{{asset('/assets/fonts/tabler-icons.min.css')}}" />
        <!-- [Feather Icons] https://feathericons.com -->
        <link rel="stylesheet" href="{{asset('/assets/fonts/feather.css')}}" />
        <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
        <link rel="stylesheet" href="{{asset('/assets/fonts/fontawesome.css')}}" />
        <!-- [Material Icons] https://fonts.google.com/icons -->
        <link rel="stylesheet" href="{{asset('/assets/fonts/material.css')}}" />
        <!-- [Template CSS Files] -->
        <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}" id="main-style-link" />
        <script src="{{asset('/assets/js/tech-stack.js')}}"></script>
        <link rel="stylesheet" href="{{asset('/assets/css/style-preset.css')}}" />


        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
        <!-- [Head] end -->
        <!-- [Body] Start -->

        <body data-pc-preset="preset-8" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">
        <!-- [ Pre-loader ] start -->
        <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
        </div>
        <!-- [ Pre-loader ] End -->

         <!-- [ Sidebar Menu ] start -->
        <x-sidebar-menu />
        <!-- [ Sidebar Menu ] end -->
        <!-- [ Header Topbar ] start -->
        <x-header />
        <!-- [ Header ] end -->



        <!-- [ Main Content ] start -->
        <div class="pc-container">
            <div class="pc-content">


            <!-- [ Main Content ] start -->
            <div class="container">
                {{$slot}}
            </div>
            <!-- [ Main Content ] end -->
            </div>
        </div>
        <!-- [ Main Content ] end -->

        {{-- <x-footer /> --}}

         <!-- Required Js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{asset('/assets/js/plugins/popper.min.js')}}"></script>
        <script src="{{asset('/assets/js/plugins/simplebar.min.js')}}"></script>
        <script src="{{asset('/assets/js/plugins/bootstrap.min.js')}}"></script>
        <script src="{{asset('/assets/js/fonts/custom-font.js')}}"></script>
        <script src="{{asset('/assets/js/pcoded.js')}}"></script>
        <script src="{{asset('/assets/js/plugins/feather.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
        <script src="{{asset('/assets/js/plugins/clipboard.min.js')}}"></script>
        <script src="{{asset('/assets/js/component.js')}}"></script>
        <script src="{{asset('/assets/js/plugins/dataTables.min.js')}}"></script>
        <script src="{{asset('/assets/js/plugins/dataTables.bootstrap5.min.js')}}"></script>
        <script src="{{asset('/assets/js/plugins/scroller.bootstrap5.min.js')}}"></script>

        <script>
            // pc-component

            $('#dataTable').DataTable({
            deferRender: true,
            scrollY: false,
            scrollCollapse: true,
            scroller: true
            });

            var elem = document.querySelectorAll('.component-list-card a');
            for (var l = 0; l < elem.length; l++) {
                var pageUrl = window.location.href.split(/[?#]/)[0];
                if (elem[l].href == pageUrl && elem[l].getAttribute('href') != '') {
                elem[l].classList.add('active');
                }
            }
            document.querySelector('#compo-menu-search').addEventListener('keyup', function () {
                var tval = document.querySelector('#compo-menu-search').value.toLowerCase();
                var elem = document.querySelectorAll('.component-list-card a');
                for (var l = 0; l < elem.length; l++) {
                var aval = elem[l].innerHTML.toLowerCase();
                var n = aval.indexOf(tval);
                if (n !== -1) {
                    elem[l].style.display = 'block';
                } else {
                    elem[l].style.display = 'none';
                }
                }
            });


        </script>
        <script src="{{asset('/assets/js/plugins/sweetalert2.all.min.js')}}"></script>
        <script src="{{asset('/assets/js/pages/ac-alert.js')}}"></script>
    </body>

</html>
