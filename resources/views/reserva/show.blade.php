@extends('main')

@section('title', '| Reunião | Visualizar')

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
      <li><a href="{{ route('reserva.index') }}">Reserva</a></li>
      <li class="active">Visualizar</li>
    </ol>
    <h3><i class="fa fa-angle-right"></i> Reserva</h3>

    <div class="row mt">
      <div class="col-lg-12 col-md-12">
        <div class="form-horizontal">
          <div class="box-body">

            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Area Comum</label>

              <div class="col-sm-6">
                    <input class="form-control" value="{{ $reserva->areaComum->AREA_COMUM_NOME }}" readonly>
                  </div>     
            </div>

            <div class="form-group">
              <label for="condominio" class="col-sm-2 control-label">Data da Reserva</label>

              <div class="col-sm-6">
                <div class="input-group date">
                  <input type="text" class="form-control pull-right" value="{{ $reserva->inverteData($reserva->RESERVA_AREA_DATA_RESERVA) }}" readonly>
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>                      
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="cnpj" class="col-sm-2 control-label">Hora da Reserva</label>

              <div class="col-sm-6">
                <div class="input-group bootstrap-timepicker timepicker">
                    <input type="text" class="form-control input-small" value="{{ $reserva->RESERVA_AREA_HORARIO_INICIO }}" readonly>
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-time"></i>
                    </span>
                </div>
              </div>
            </div>
            

            
            <div class="form-group">
              <label for="reservado_por" class="col-sm-2 control-label">Reservado Por</label>

              <div class="col-sm-6">
                <textarea class="form-control" readonly name="reservado_por" id="reservado_por" rows="6" style="resize: none;" required>{{ $reserva->condomino->CONDOMINO_NOME }}, {{ $reserva->condomino->apartamento->bloco->BLOCO_NOME }} - {{ $reserva->condomino->apartamento->APTO_NUMERO }}</textarea>
              </div>     
            </div>
            

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <a href="{{ route('reserva.index') }}"><button type="button" class="btn btn-default">Voltar</button></a>            
          </div>
          <!-- /.box-footer -->
        </div>
      </div>
    </div>
    
</section>    

@endsection