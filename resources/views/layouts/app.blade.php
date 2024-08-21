
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'NutriHealth') }}</title>
            <link rel="icon" href="{{ asset('images/logo_no back.png') }}" type="image/x-icon">


       <!-- bootstrap css -->
        <link rel="stylesheet" href="nutri_index/css/bootstrap.min.css">
        <!-- style css -->
        <link rel="stylesheet" href="nutri_index/css/style.css">
        <!-- Responsive-->
        <link rel="stylesheet" href="nutri_index/css/responsive.css">
        <!-- fevicon -->
        <link rel="icon" href="nutri_index/images/fevicon.png" type="image/gif" />
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="nutri_index/css/jquery.mCustomScrollbar.min.css">
        <!-- Tweaks for older IEs-->
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <!-- owl stylesheets -->
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
         <!-- Custom CSS -->
         <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
             <!-- bootstrap css -->
            <link rel="stylesheet" href="{{ asset('./../nutri_index/css/bootstrap.min.css') }}">
            <!-- style css -->
            <link rel="stylesheet" href="{{ asset('./../nutri_index/css/style.css') }}">
            <!-- Responsive-->
            <link rel="stylesheet" href="./../nutri_index/css/responsive.css">
            <!-- fevicon -->
            <link rel="icon" href="./../nutri_index/images/fevicon.png" type="image/gif" />
            <!-- Scrollbar Custom CSS -->
            <link rel="stylesheet" href="./../nutri_index/css/jquery.mCustomScrollbar.min.css">
            <!-- Tweaks for older IEs-->
            <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
            <!-- owl stylesheets -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">

            <link rel="stylesheet" href="css/owl.carousel.min.css">
            <link rel="stylesheet" href="css/owl.theme.default.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
            <!-- Tailwind CSS -->
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
            


        @vite(['resources/css/app.css', 'resources/js/app.js'])
          <style>
            body {
            font-family: 'Poppins', sans-serif;
            
        }
        .page-content {
            background-color: white;
            padding: 20px;
            font-family: 'Poppins', sans-serif;

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
        .btn-rubi-rojo {
            background-color: #ff0000;
            color: #fff;
            border-color: #e91e63;
        }
        .btn-rubi-rojo:hover {
            background-color: #ce5d59;
            border-color: #ad1457;
        }
        .btn-verde:hover {
            background-color: #83cebd;
            border-color:#83cebd;
        }
        .btn-rubi-amarillo {
            background-color: #ffb310;
            color: #fff;
            border-color: #e91e63;
        }
        .btn-rubi-amarillo:hover {
            background-color: #d6a07c;
            border-color: #ad1457;
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
        .dietas-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            flex: 1 1 300px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card h2 {
            font-size: 1.5em;
            margin-bottom: 15px;
            color: #247b7b;
        }

        .card .btn {
            background-color: #247b7b;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 10px;
        }

        .card .btn:hover {
            background-color: #83c5be;
        }
        .select-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        select {
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            font-size: 16px;
            width: 300px;
            transition: border-color 0.3s;
        }

        select:focus {
            border-color: #83c5be;
            outline: none;
        }

        option {
            padding: 10px;
        }
        
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        .centered-textTarjetas {
        color: #ffffff; /* Blanco */
        text-align: center;
        font-size: 24px; 
        margin-bottom: 20px; 
    }
    

        .colacion-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .colacion-img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            font-size: 16px;
            margin: 5px 0;
        }
        .containerMostrarDiestas {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .colacion-container {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .colacion-image {
            width: 150px;
            height: auto;
            margin-right: 20px;
            border-radius: 5px;
        }

        .colacion-info {
            flex: 1;
        }

        .colacion-info h2 {
            margin-top: 0;
            font-size: 1.5em;
        }

        .colacion-info ul {
            list-style-type: none;
            padding-left: 0;
        }

        .colacion-info li {
            margin-bottom: 10px;
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
