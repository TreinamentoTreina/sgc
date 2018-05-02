<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<!--script src="{{ asset('dist/js/adminlte.min.js') }}"></script-->
<!-- Sparkline -->
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap  -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('bower_components/chart.js/Chart.js') }}"></script>
<!-- AdminLTE for demo purposes 
<script src="{{ asset('dist/js/demo.js') }}"></script>-->
<!-- iCheck 1.0.1 -->
<script src="{{ asset('iCheck/icheck.min.js') }}"></script>
<!-- Alertify -->
<script src="{{ asset('alertifyjs/alertify.min.js') }}"></script>

<script src="{{ asset('theme/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
<script src="{{ asset('theme/js/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('theme/js/jquery.dcjqaccordion.2.7.js') }}" class="include" type="text/javascript"></script>
<script src="{{ asset('theme/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('theme/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<!--common script for all pages-->
<script src="{{ asset('theme/js/common-scripts.js') }}"></script>
<!--script for this page-->
<script>
  //custom select box
  $(function(){
      /*$('select.styled').customSelect();*/
  });
</script>

<script>
var urlSegment = "{{request()->segment(1)}}";

$(document).ready(function(){

    limparSelecao();

    if(urlSegment == "dashboard")
    {
		  $('.dashboard').addClass('active');
    }
    else if(urlSegment == "condominio")
    {
		  $('.condominio').addClass('active');		
    }
    else if(urlSegment == "condomino")
    {
      $('.condomino').addClass('active');    
    }
    else if(urlSegment == "reuniao")
    {	
		  $('.reuniao').addClass('active');
    }
    else if(urlSegment == "assunto")
    {
    	$('.assunto').addClass('active');
    }
    else if(urlSegment == "reuniaoC")
    {
        $('.reuniaoC').addClass('active');
    }
    else if(urlSegment == "area")
    {
        $('.area').addClass('active');
    }
    else if(urlSegment == "reserva")
    {
        $('.reserva').addClass('active');
    }

    function limparSelecao(){

        $('.dashboard').removeClass('active');
        $('.condominio').removeClass('active');
        $('.condomino').removeClass('active');
        $('.reuniao').removeClass('active');
        $('.assunto').removeClass('active');
        $('.reuniaoC').removeClass('active');
        $('.area').removeClass('active');
        $('.reserva').removeClass('active');

    }
});
</script>