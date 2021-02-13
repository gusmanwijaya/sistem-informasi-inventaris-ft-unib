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
    @include('includes.style')
    @stack('addon-style')

  </head>

  <body id="page-top">
    <div id="wrapper">
      {{-- Sidebar --}}
      @include('includes.sidebar')

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content" class="content">
            {{-- Navbar --}}
            @include('includes.navbar')

            {{-- Page Content --}}
            @yield('content')
        </div>
        <!-- End of Main Content -->

        {{-- Footer --}}
        @include('includes.footer')

      </div>
      <!-- End of Content Wrapper -->
    </div>

    @include('includes.scroll-top')

    {{-- Logout Modal --}}
    @include('includes.logout-modal')
    @yield('addon-modal')

    {{-- Script --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
  </body>
</html>
