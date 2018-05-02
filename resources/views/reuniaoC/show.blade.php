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
      <li><a href="{{ route('reuniaoC.index') }}">Reuniao</a></li>
      <li class="active">Visualizar</li>
    </ol>
    <h3><i class="fa fa-angle-right"></i> Reunião - {{ $reuniao->status->STATUSR_DESCRICAO }}</h3>

    <div class="row mt">
      <div class="col-lg-12 col-md-12">
        <div class="form-horizontal">
          <div class="box-body">

            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Assunto</label>

              <div class="col-sm-6">
                    <input class="form-control" value="{{ $reuniao->assunto->ASSUNTO_DESCRICAO }}" readonly>
                  </div>     
            </div>

            <div class="form-group">
              <label for="condominio" class="col-sm-2 control-label">Data da Reuniao</label>

              <div class="col-sm-6">
                <div class="input-group date">
                  <input type="text" class="form-control pull-right" value="{{ $reuniao->inverteData($reuniao->REUNIAO_DATA) }}" readonly>
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
                    <input type="text" class="form-control input-small" value="{{ $reuniao->REUNIAO_HORA }}" readonly>
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-time"></i>
                    </span>
                </div>
              </div>
            </div>

            @if($reuniao->status->STATUSR_ID == 2)
            <div class="form-group">
              <label for="Ata" class="col-sm-2 control-label">Ata</label>

              <div class="col-sm-6">
                <textarea class="form-control" readonly name="ata" id="ata" rows="6" style="resize: none;" required>{{ $reuniao->REUNIAO_ATA }}</textarea>
              </div>     
            </div>
            @endif

            @if($reuniao->status->STATUSR_ID == 3)
            <div class="form-group">
              <label for="Ata" class="col-sm-2 control-label">Solicitação</label>

              <div class="col-sm-6">
                <input type="text" name="solicitacao" id="solicitacao" class="form-control" readonly value="{{ $reuniao->REUNIAO_OBSERVACAO }}">                
              </div>     
            </div>
            @endif

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <a href="{{ route('reuniaoC.index') }}"><button type="button" class="btn btn-default">Voltar</button></a>            
          </div>
          <!-- /.box-footer -->
        </div>
      </div>
    </div>
    
</section>    

@endsection