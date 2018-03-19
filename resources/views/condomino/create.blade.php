@extends('main')

@section('title', '| Criar Novo Condomino')

@section('stylesheets')

@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Condômino
        <small>Criar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Condômino</a></li>
        <li class="active">Criar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Novo Condômino</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('condominio.store') }}" method="POST">{{ csrf_field() }}            	
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
                    <input type="email" class="form-control" id="confirmacao_email" name="confirmacao_email" placeholder="concha@gmail.com" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="bloco" class="col-sm-2 control-label">Sindico?</label>

                  <div class="col-sm-6">
                    <input type="checkbox" class="minimal" id="sindico" name="sindico">
                  </div>
                </div>                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Cadastrar</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->          
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection

@section('scripts')
<script type="text/javascript">
  //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
</script>	
@endsection