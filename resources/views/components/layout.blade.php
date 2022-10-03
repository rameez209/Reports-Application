<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" href="images/favicon.ico" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- MATERIAL DESIGN BOOTSTRAP 5 --}}
    <link rel="stylesheet" href="{{ asset('mdb5-free-standard/css/mdb.min.css') }}">

    <!-- Custom styles for this template-->
    {{-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('/css/sb-admin-2.min.css') }}" rel="stylesheet"> --}}


    {{-- ALPINJS --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- TAILWIND CSS --}}
    @vite('resources/css/app.css')

    {{-- JQUERY CDN --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- CSS --}}
    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        /* TO STOP THE WHITE SPACE SCROLLING */
        html {
            overflow: hidden;
            height: 100%;
        }

        body {
            overflow: auto;
            height: 100%;
        }

        .department-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding 1%;
            box-shadow: inset 1 0 4px #000000;
            font-family: 'Poppins', sans-serif;
        }

        .department {
            min-width: 290px !important;
            max-width: 400px;
            padding-top: 10px;
            color: #33b5e5 !important;
        }


        .sidenav {
            height: 100%;
            margin-top: 40px;
            width: 280px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            /* background-color: #111; */
            background-color: #484c4d;
            overflow-x: hidden;
            padding-top: 20px;

        }

        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 18px;
            color: #cfcfcf;
            display: block;
        }

        .sidenav a:hover {
            color: #ebdfdf;
        }

        .main {
            margin-left: 280px;
            /* Same as the width of the sidenav */
            font-size: 18px;

        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        .top-bar {
            margin-left: -5px;
            /* border-radius: 2px;
            box-shadow: 0px 1px 10px #999; */
        }

        .title-shadow {
            text-shadow: 1px 1px 1px black;
        }

        a:hover {
            color: inherit;
        }

        .hide-div {
            display: none;
        }
    </style>
    <title>SJGH | Report Catalog</title>
</head>

<body class="mb-48 bg-white">
    <nav class="sticky top-0 z-50 flex justify-between items-center pl-4 pt-2 pb-2 bg-navbarcolor main top-bar ">
        <a href="/">
            {{-- <img class="w-44" src="{{ asset('images/logo.png') }}" alt="" class="logo" /> --}}
            <h1 class="text-2xl font-bold uppercase text-laravel">
                <span class="title-shadow">SJGH Report Catalog</span>
            </h1>
        </a>
        
        <ul class="flex space-x-6 mr-6 text-lg text-white ">
            @auth
                {{-- SHOW IF THE USER IS LOGGED IN --}}
                <li>
                    <span class="font-bold uppercase title-shadow">
                        Welcome {{ auth()->user()->name }}
                    </span>
                </li>
                <li>
                    <a href="/reports/create" class="hover:text-laravel title-shadow">
                        <i class="fa fa-plus-circle"></i> Add Report
                    </a>
                </li>
                <li>
                    <a href="/reports/manage" class="hover:text-laravel title-shadow">
                        <i class="fa fa-tachometer"></i>
                        Dashboard
                    </a>
                </li>
                {{-- LOGOUT --}}
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="hover:text-laravel title-shadow">
                            <i class="fa-solid fa-door-closed"></i> Logout
                        </button>
                    </form>
                </li>
            @else
                {{-- Hide IF NO USER IS LOGGED IN --}}
                <li>
                    <a href="/register" class="hover:text-laravel title-shadow">
                        <i class="fa-solid fa-user-plus"></i>
                        Register
                    </a>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel title-shadow">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login
                    </a>
                </li>
            @endauth
        </ul>
    </nav>
    <div class="sidenav pb-10 border-r-2 border-navbarcolor">
        <li class="list-none mb-1 fs-4 text-[#808080] font-semibold uppercase ml-2 mt-4">Dashboard</li>
        <div class="flex flex-col align-left">
            <a class="uppercase leading-2 " target="_blank" href="/">
                <li class="btn mt-0 list-none flex justify-between text-white items-center">
                    claims <i class="fa fa-external-link bg-navbarcolor rounded-2xl p-2"></i>
                </li>
            </a>
            <a class="uppercase leading-3 " target="_blank" href="/">
                <li class="btn mt-2 list-none flex justify-between text-white items-center">
                    Revenue Usage <i class="fa fa-external-link bg-navbarcolor rounded-2xl p-2"></i>
                </li>
            </a>
            <a class="uppercase leading-3 " target="_blank" href="/">
                <li class="btn mt-2 list-none flex justify-between text-white items-center">
                    Balance Scorecard <i class="fa fa-external-link bg-navbarcolor rounded-2xl p-2"></i>
                </li>
            </a>

        </div>
        {{-- IMPORT departments VARIABLE FROM THE DATABASE --}}
        <li class="list-none fs-4 mt-5 text-[#808080] font-semibold uppercase ml-2">Departments</li>
        @php
            $departments = DB::table('departments')
                ->select('departments')
                ->orderBy('departments', 'asc')
                ->distinct()
                ->get();
        @endphp
        @foreach ($departments->unique('departments') as $rpt)
            <a class="uppercase leading-3 " href="/?department={{ $rpt->departments }}">
                <li class="btn mt-2 list-none text-white flex justify-between items-center">
                    <span>{{ $rpt->departments }}</span> <i
                        class="fas fa-folder-open bg-navbarcolor rounded-2xl p-2"></i>
                </li>
            </a>
            {{-- <hr> --}}
        @endforeach
        {{-- SPACING --}}
        <div class="mb-5"></div>
    </div>
    <main class="main">
        {{-- VIEW OUTPUT --}}
        {{ $slot }}

    </main>
    <x-flash-success />
    {{-- <x-flash-error /> --}}

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    {{-- MDB JAVASCRIPT --}}
    <script rel="stylesheet" src="{{ asset('mdb5-free-standard/js/mdb.min.js') }}"></script>

    <script>
        $(function() {
            // $(".object-contain").hide();
            $(".object-contain").click(function() {
                $(this).toggleClass('max-w-full h-auto', 'max-w-xs');
            });

            // $(".report-list").hide();
            $(".show-details").click(function() {
                $(".report-list-details").toggle();
                $(".report-list").toggle();
            });

            $(".delete-btn-form").on("submit", function() {
                return confirm("Are you sure you want to delete this report?");
            });


        });
    </script>
    



</body>

</html>
