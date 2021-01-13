<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cleopatra - @yield('title')</title>
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css\app.css') }}">
    @livewireStyles
    <style>
        .nunito {
            font-family: 'nunito', font-sans;
        }

        .border-b-1 {
            border-bottom-width: 1px;
        }

        .border-l-1 {
            border-left-width: 1px;
        }

        hover\:border-none:hover {
            border-style: none;
        }

    </style>

</head>

<body class="flex h-screen bg-gray-100 font-sans">

    <div class="flex flex-row flex-wrap flex-1 flex-grow content-start">
        <div class="h-20 lg:h-20 w-full flex flex-wrap fixed">
            <nav class="bg-blue-800 bg-opacity-60 w-auto flex-1 order-1 lg:order-2">
                <div class="flex h-full justify-between items-center">

                    <div x-data="{ open: false }" class="flex-none w-56 ml-5 flex flex-row items-center">
                        <img src="{{ asset('img/logoWhite.png') }}" class="w-10 flex-none text-right text-gray-900">
                        <strong class="capitalize ml-1 flex-1 text-white text-opacity-100 ">Cleopatra
                            Ecosermy</strong>
                        <button @click="open=true"  class="flex-none text-right text-gray-900 md:block ">
                            <img src="{{asset('icons\043-menu.svg')}}" class="w-6" alt="">
                        </button>
                        <!-- start sidebar -->
                        <div x-show="open" @click.away="open = false" class="top-0 left-0 h-screen w-60 bg-white rounded shadow-md absolute mt-20 bg-white text-black">
                            <!-- sidebar content -->
                            <div class="flex flex-col mt-1">
                                <div x-data="{ open: false }" class="flex flex-col divide-y-8 divide-y divide-blue-900 mb-4">
                                    @component('components/menu_lists.menu_title')
                                        @slot('title', 'Cargos u Ocupaciones')
                                    @endcomponent
                                    <div x-show="open" @click.away="open = false" class="flex flex-col">
                                        @component('components/menu_lists.menu_item')
                                            @slot('url', 'ecosermyCharges')
                                            @slot('icon', 'icons\094-partnership.svg')
                                            @slot('text', 'Cargo Ecosermy')
                                        @endcomponent
                                        @component('components/menu_lists.menu_item')
                                            @slot('url', 'volcanCharges')
                                            @slot('icon', 'icons\094-partnership.svg')
                                            @slot('text', 'Cargo Volcan')
                                        @endcomponent
                                        @component('components/menu_lists.menu_item')
                                            @slot('url', 'Ruta')
                                            @slot('icon', 'icons\094-partnership.svg')
                                            @slot('text', 'Cargo Chinalco')
                                        @endcomponent
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col mt-1">
                                <div x-data="{ open: false }" class="flex flex-col divide-y-8 divide-y divide-blue-900 mb-4">
                                    @component('components/menu_lists.menu_title')
                                        @slot('title', 'Convocatorias')
                                    @endcomponent
                                    <div x-show="open" @click.away="open = false" class="flex flex-col">
                                        @component('components/menu_lists.menu_item')
                                            @slot('url', 'calls')
                                            @slot('icon', 'icons\095-promotion.svg')
                                            @slot('text', 'Convocatorias')
                                        @endcomponent
                                        @component('components/menu_lists.menu_item')
                                            @slot('url', 'Ruta')
                                            @slot('icon', 'icons\096-profile.svg')
                                            @slot('text', 'Postulantes')
                                        @endcomponent
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col mt-1">
                                <div x-data="{ open: false }" class="flex flex-col divide-y-8 divide-y divide-blue-900 mb-4">
                                    @component('components/menu_lists.menu_title')
                                        @slot('title', 'Areas y proyectos')
                                    @endcomponent
                                    <div x-show="open" @click.away="open = false" class="flex flex-col">
                                        @component('components/menu_lists.menu_item')
                                            @slot('url', 'areas')
                                            @slot('icon', 'icons\098-department.svg')
                                            @slot('text', 'Areas')
                                        @endcomponent
                                        @component('components/menu_lists.menu_item')
                                            @slot('url', 'Ruta')
                                            @slot('icon', 'icons\097-project.svg')
                                            @slot('text', 'Proyectos')
                                        @endcomponent
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end sidebar content -->
                    </div>

                    <div class="flex relative inline-block pr-6">
                        <div x-data="{ open: false }" class="relative text-sm">
                            <button @click="open=true" class="flex items-center focus:outline-none mr-3 hover:text-pink-600 transition duration-500">
                                <img class="w-8 h-8 rounded-full mr-4" src="http://i.pravatar.cc/300"
                                    alt="Avatar of User"> <span
                                    class="hidden md:inline-block hover:text-pink-600 transition duration-500 text-white">Bienvenido,
                                    User </span>
                            </button>
                            <div x-show="open" @click.away="open = false" class="bg-white nunito rounded shadow-md mt-2 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30">
                                <ul class="list-reset">
                                    <li><a href="#"
                                            class="px-4 py-2 block text-gray-900 hover:bg-indigo-400 hover:text-white no-underline hover:no-underline">Mi
                                            cuenta</a></li>
                                    <li><a href="#"
                                            class="px-4 py-2 block text-gray-900 hover:bg-indigo-400 hover:text-white no-underline hover:no-underline">Notificaciones</a>
                                    </li>
                                    <li>
                                        <hr class="border-t mx-2 border-gray-400">
                                    </li>
                                    <li><a href="#"
                                            class="px-4 py-2 block text-gray-900 hover:bg-indigo-400 hover:text-white no-underline hover:no-underline">Salir</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
</body>

</html>
