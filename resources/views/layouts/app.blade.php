<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'NutriHealth') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
         <!-- Custom CSS -->
         <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


        @vite(['resources/css/app.css', 'resources/js/app.js'])
          <style>
        .page-content {
            background-color: white;
            padding: 20px;
        }
        .btn-verde {
            background-color: #00907f;
            color: #fff;
            border-color:#00a88e;
        }
        .btn-rojo {
            background-color: #c1121f;
            color: #fff;
            border-color:#780000;
        }
        
        .btn-rubi-verde {
            background-color: #8ceeab;
            color: #fff;
            border-color: #e91e63;
        }
        .btn-rubi-verde:hover {
            background-color: #80cc98;
            border-color: #ad1457;
        }
        .btn-verde:hover {
            background-color: #83cebd;
            border-color:#83cebd;
        }
        .sidebar1 {
            background-color: #00483a; /*235747;*/
            border-color: #ad1457;
        }
        .sidebarLetras {
            background-color: #83cebd; /*235747;*/
            border-color: #ad1457;
        }
        .header {
            background-color: #6dc6aa; /*235747;*/
            border-color: #ad1457;
            text-color: #fff;
        }

        .custom-dark-hover:hover {
            background-color: #6dc6aa; 
        }
        .custom-thead-bg {
            background-color: #00C5B7;
            color: #ffffff; 
        }

        .custom-border {
            border: 1px solid #52d2c9;
        }
        .custom-tbody {
            color: #000000;
        }




    </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-DztnIkkbK5ZXwL0YBnmBlK8fS3pV7XllF9c4v9gWDe7XK5tEd3s5K5t8y5IACB7j" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFwA5Km0FRCpDqlEujyk7tu3m41" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.1/dist/flowbite.bundle.min.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

</html>
