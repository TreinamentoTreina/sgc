<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <div id="user-info">
              <p class="centered"><a href="profile.html"><img src="{{ asset('theme/img/ui-sam.jpg') }}" class="img-circle" width="80"></a></p>
              <h5 class="centered">{{ Auth::user()->name }}</h5>
            </div>

            @if(Auth::user()->condomino->CONDOMINO_SINDICO == 1)
              
            <li class="mt">
                <a href="{{ route('dashboard.index') }}" class="dashboard">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu">
                <a  href="{{ route('condominio.index') }}" class="condominio">
                    <i class="fa fa-building"></i>
                    <span>Condomínio</span>
                </a>
            </li>

            <li class="menu">
                <a  href="{{ route('condomino.index') }}" class="condomino">
                    <i class="fa fa-user"></i>
                    <span>Condomíno</span>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route('reuniao.index') }}" class="reuniao">
                    <i class="fa fa-users"></i>
                    <span>Reunião</span>
                </a>                
            </li>

            <li class="menu">
                <a href="{{ route('assunto.index') }}" class="assunto">
                    <i class="fa fa-tags"></i>
                    <span>Assunto</span>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route('area.index') }}" class="area">
                    <i class="fa fa-futbol-o"></i>
                    <span>Area</span>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route('reserva.index') }}" class="reserva">
                    <i class="fa fa-child"></i>
                    <span>Reservar Area Comum</span>
                </a>                
            </li>

            @elseif(Auth::user()->condomino->CONDOMINO_SINDICO == 0)
            <li class="mt">
                <a href="{{ route('dashboard.index') }}" class="dashboard">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route('reuniaoC.index') }}" class="reuniaoC">
                    <i class="fa fa-users"></i>
                    <span>Reunião</span>
                </a>                
            </li>

            <li class="menu">
                <a href="{{ route('reserva.index') }}" class="reserva">
                    <i class="fa fa-child"></i>
                    <span>Reservar Area Comum</span>
                </a>                
            </li>
            @endif


        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>