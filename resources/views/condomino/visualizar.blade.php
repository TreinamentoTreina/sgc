@extends('main')

@section('title', '| Condomínio | Visualizar')

@section('stylesheets')

@endsection

@section('content')

<section class="wrapper site-min-height">    
    <br>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('condomino.index') }}">Condômino</a></li>
      <li class="active">Visualizar</li>
    </ol>
    <h3><i class="fa fa-angle-right"></i> Condômino</h3>

    <div class="row mt">
      <div class="col-lg-12 col-md-12">
      	<div class="row mt">
      		<div class="col-lg-12 col-md-12">
    				<div class="col-lg-4 col-md-4 col-sm-4 mb">
    					<!-- WHITE PANEL - TOP USER -->
    					<div class="white-panel pn">
    						<div class="white-header">
    							<h5>{{ $condomino->apartamento->bloco->BLOCO_NOME }} - {{ $condomino->apartamento->APTO_NUMERO }}</h5>
    						</div>
    						<p><img src="{{ asset('theme/img/ui-zac.jpg') }}" class="img-circle" width="50"></p>
    						<p><b>{{ $condomino->CONDOMINO_NOME }}</b></p>
    							<div class="row col-md-12">
    								<div class="col-md-6">
    									<p class="small">CPF</p>
    									<p>{{ $condomino->CONDOMINO_CPF }}</p>
    								</div>
    								<div class="col-md-6">
    									<p class="small">EMAIL</p>
    									<p>{{ $condomino->CONDOMINO_EMAIL }}</p>
    								</div>
    							</div>
    					</div>
    				</div><!-- /col-md-4 -->
      		</div>
      	</div>        
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <a href="{{ route('condomino.index') }}"><button type="button" class="btn btn-default">Voltar</button></a>            
    </div>
    <!-- /.box-footer -->
    
</section>

@endsection

@section('scripts')
<!-- InputMask -->
<script src="{{ asset('plugins/dist/jquery.inputmask.bundle.js') }}"></script>
<script src="{{ asset('plugins/dist/inputmask/phone-codes/phone.js') }}"></script>
<script src="{{ asset('plugins/dist/inputmask/phone-codes/phone-be.js') }}"></script>
<script src="{{ asset('plugins/dist/inputmask/phone-codes/phone-ru.js') }}"></script>

<script type="text/javascript">
  //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })

    function validar () 
    {

      if($("#email").val() != $("#confirmacao_email").val())
      {
        alertify.notify('Os Emails devem ser iguais', 'error', 5, function(){  });
        return false;
      } else return true;
    }
    var i = 1;

    function addTelefone()
    {      
      $("#addTelefones").append('<div class="form-group" id="tel'+i+'">' +
              '<label for="bloco" class="col-sm-2 control-label">Telefone</label>' +
              '<div class="col-sm-6">' +
                '<input type="text" class="form-control" id="telefone'+i+'" name="telefone[]" required>' +
              '</div>' +
              '<div class="col-sm-1">' +
                '<button type="button" class="btn btn-danger btn-flat btn-sm pull-left" id="'+i+'" onclick="removerTelefone(this.id)"><i class="fa fa-minus fa-1x"></i></button>' +
              '</div>' +
            '</div>');
      i++;
      id = "#telefone" + i;
      alert(id);
      $(id).inputmask("(99) 9{4,5}-9{4}");
    }

    function removerTelefone(id)
    {
      var id = "#tel" + id;
      $(id).remove();
    }


    $('[data-mask]').inputmask();
</script>
@endsection