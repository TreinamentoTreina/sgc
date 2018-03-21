<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!--link rel="shortcut icon" href="../../../../../alvarez.is/demo/dashio/favicon.html"-->

    <title>SGC | Entrar</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('theme/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('theme/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        
    <!-- Custom styles for this template -->
    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/style-responsive.css') }}" rel="stylesheet">   

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
      <div id="login-page">
        <div class="container">        
              <form class="form-login" method="POST" action="{{ route('login') }}">
                @csrf
                <h2 class="form-login-heading">{{ __('Entrar') }}</h2>
                <div class="login-wrap">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="{{ __('Endereço de E-Mail') }}">

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <br>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ __('Senha') }}">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <label class="checkbox">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Lembrar de mim') }}
                        <span class="pull-right">
                            <a data-toggle="modal" href="#myModal"> {{ __('Esqueceu sua senha?') }}</a>
        
                        </span>
                    </label>
                    <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Entrar</button>
                    <hr>                    
                    
                    <div class="registration">
                        Não tem conta ainda?<br/>
                        <a class="" href="{{ route('register') }}">
                            Criar uma conta
                        </a>
                    </div>        
                </div>
              </form> 
        
              <form class="form-login" method="POST" action="{{ route('password.email') }}">
                @csrf
                  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">{{ __('Esqueceu sua senha?') }}</h4>
                              </div>
                              <div class="modal-body">
                                  <p>Digite seu email abaixo para redefinir sua senha.</p>
                                  <input type="email" id="email" placeholder="Email" name="email" autocomplete="off" class="form-control placeholder-no-fix" required>
        
                              </div>
                              <div class="modal-footer">
                                  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                  <button class="btn btn-theme" type="submit">Submit</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>
        </div>
      </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('theme/js/jquery.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script src="{{ asset('theme/js/jquery.backstretch.min.js') }}"></script>    
    <script>
        $.backstretch("{{ asset('theme/img/login3-bg.jpg') }}", {speed: 500});
    </script>
  </body>
</html>