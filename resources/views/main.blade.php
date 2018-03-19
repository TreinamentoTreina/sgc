<!DOCTYPE html>
<html lang="pt-br">
  <head>

    @include('partials._head')

  </head>

  <body class="hold-transition skin-yellow sidebar-mini">

    <div class="wrapper">

      @include('partials._navTop')
      
      @include('partials._navSide')
      
      <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->

        @include('partials._messages')

        @yield('content')

      </div><!-- /.content-wrapper -->
      
      @include('partials._footer')

      @include('partials._navBag')

    </div> <!-- ./wrapper -->
      
      @include('partials._javascript')

      @yield('scripts')

  </body>    
</html>