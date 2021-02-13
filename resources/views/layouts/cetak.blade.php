<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    {{-- Style --}}
    @stack('prepend-style')
    @stack('addon-style')

  </head>

  <body id="page-top">
    @yield('content')

    {{-- Script --}}
    @stack('prepend-script')
    @stack('addon-script')
  </body>
</html>
