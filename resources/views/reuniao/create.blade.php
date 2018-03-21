@extends('main')

@section('title', '| Criar Nova Reunião')

@section('stylesheets')
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{ asset('css/timepicker.less') }}">
@endsection

@section('content')
<section class="wrapper site-min-height">    
    <br>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('reuniao.index') }}">Reuniao</a></li>
      <li class="active">Criar</li>
    </ol>
    <h3><i class="fa fa-angle-right"></i> Nova Reunião - Condomínio Placeholder</h3>

    <div class="row mt">
      <div class="col-lg-12 col-md-12">
        <form class="form-horizontal" action="{{ route('reuniao.store') }}" method="POST">{{ csrf_field() }}
          <div class="box-body">

            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Assunto</label>

              <div class="col-sm-6">
                    <select class="form-control" id="assunto" name="assunto" required>
                      <option value="">Selecione...</option>
                      @foreach($assuntos as $assunto)
                      <option value="{{ $assunto->ASSUNTO_ID }}">{{ $assunto->ASSUNTO_DESCRICAO }}</option>                      
                      @endforeach
                    </select>                    
                  </div>     
            </div>

            <div class="form-group">
              <label for="condominio" class="col-sm-2 control-label">Data da Reuniao</label>

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
              <label for="cnpj" class="col-sm-2 control-label">Hora da Reuniao</label>

              <div class="col-sm-6">
                <div class="input-group bootstrap-timepicker timepicker">
                    <input id="timepicker2" type="text" class="form-control input-small" name="hora_reuniao">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-time"></i>
                    </span>
                </div>
              </div>
            </div>

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <a href="{{ route('reuniao.index') }}"><button type="button" class="btn btn-default">Cancelar</button></a>
            <button type="submit" class="btn btn-info pull-right">Cadastrar</button>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
    </div>
    
</section>    

@endsection

@section('scripts')
<!-- bootstrap datepicker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('js/bootstrap-timepicker.js') }}"></script>
<script type="text/javascript">
  //Date picker
  $('#datepicker').datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy',
    startDate: new Date()
  });
  //Timepicker
  $('#timepicker2').timepicker({
      minuteStep: 15,
      showMeridian: false,
      showInputs: true
  });
</script>	
@endsection