<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        Simple Dashboard
    </title>

</head>

<body>

    <div style="width:90%; margin:auto;">

        @include('layouts.navigation')

        @isset($header)

            <header style="padding:15px 0; border-bottom:1px solid #ccc;">

                {{ $header }}

            </header>

        @endisset

        <main style="padding-top:20px;">

            {{ $slot }}

        </main>

    </div>

</body>

</html>