@extends('main')

@section('title', '| Condomínio | Criar')

@section('stylesheets')


@endsection

@section('content')

<section class="wrapper site-min-height">    
    <br>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('condomino.index') }}">Condômino</a></li>
      <li class="active">Criar</li>
    </ol>
    <h3><i class="fa fa-angle-right"></i> Novo Condômino</h3>

    <div class="row mt">
      <div class="col-lg-12 col-md-12">

        <form class="form-horizontal" action="{{ route('condomino.store') }}" method="POST">{{ csrf_field() }}             
          <div class="box-body">
            <div class="form-group">
              <label for="condominio" class="col-sm-2 control-label">Nome do Condômino</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="nome_condomino" name="nome_condomino" placeholder="Nome" required>
              </div>
            </div>
            <div class="form-group">
              <label for="cnpj" class="col-sm-2 control-label">Cadastro de Pessoa Fisica (CPF)</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" required>
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Email</label>

              <div class="col-sm-6">
                <input type="email" class="form-control" id="email" name="email" placeholder="concha@gmail.com" required>
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Confirmação de Email</label>

              <div class="col-sm-6">
                <input type="email" class="form-control" id="confirmacao_email" placeholder="concha@gmail.com" required>
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Sindico?</label>

              <div class="col-sm-6">
                <input type="checkbox" class="minimal" id="sindico" name="sindico" value="1">
              </div>
            </div>                
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <a href="{{ route('condomino.index') }}" type="button" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-primary pull-right" onclick="return validar()">Cadastrar</button>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
    </div>
    
</section>

@endsection

@section('scripts')
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
</script>
@endsection