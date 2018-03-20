<!DOCTYPE html>
<html lang="pt-br">
  <head>

    @include('partials._head')

  </head>

  <body>

    <section id="container" >

      @include('partials._navTop')
      
      @include('partials._navSide')
      
      <section id="main-content">        

        @yield('content')

      </section><!-- /MAIN CONTENT -->
      
      @include('partials._footer')      

    </section>
      
      @include('partials._javascript')

      @include('partials._messages')

      @yield('scripts')

  </body>    
</html>