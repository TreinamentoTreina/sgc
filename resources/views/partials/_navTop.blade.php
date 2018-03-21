<header class="header black-bg">
      <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
    <!--logo start-->
    <a href="{{ route('dashboard.index') }}" class="logo"><img class="sgc" src="{{ asset('theme/img/sgc_mobile4.png') }}"></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <img id="sgc" src="{{ asset('theme/img/sgc_nome1.png') }}">
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-menu">
      <ul class="nav pull-right top-menu">
        <li><a class="btn btn-default btn-flat logout" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Sair
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
      </ul>
    </div>
</header>