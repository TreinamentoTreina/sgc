@extends('main')

@section('title', '| Criar Novo Condomino')

@section('stylesheets')
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}">
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reunião
        <small>Criar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Reunião</a></li>
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
              <h3 class="box-title">Nova Reunião</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('reuniao.store') }}" method="POST">{{ csrf_field() }}            	
              <div class="box-body">
                <div class="form-group">
                  <label for="condominio" class="col-sm-2 control-label">Assunto</label>

                  <div class="col-sm-6">
                    <select class="form-control" id="assunto" name="assunto" required>
                      <option value="">Selecione...</option>
                      <option value="1">Segurança</option>
                      <option value="2">Barulho</option>
                      <option value="3">Agua</option>
                      <option value="4">Gas Encando</option>
                      <option value="5">Reforma dos predios</option>
                      <option value="6">Pintura das fachadas</option>
                      <option value="7">Limpeza</option>
                    </select>                    
                  </div>                  
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Data da Reuniao</label>

                  <div class="col-sm-6">
                    <div class="input-group date">
                      <input type="text" name="data_reuniao" required="true" class="form-control pull-right" id="datepicker">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>                      
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Hora da Reuniao</label>
                  
                  <div class="col-sm-6">
                    <div class="bootstrap-timepicker">
                      <div class="input-group">
                        <input type="text" class="form-control timepicker">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div>
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
<!-- bootstrap datepicker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script type="text/javascript">
  //Date picker
  $('#datepicker').datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy',
    endDate: new Date()
  });
  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  });
</script>	
@endsection