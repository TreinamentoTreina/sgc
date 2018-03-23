@extends('main')

@section('title', '| Condomínio | Editar')

@section('stylesheets')


@endsection

@section('content')

<section class="wrapper site-min-height">    
    <br>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('condominio.index') }}">Condominio</a></li>
      <li class="active">Editar</li>
    </ol>
    <h3><i class="fa fa-angle-right"></i> Editar Condomínio</h3>

    <div class="row mt">
      <div class="col-lg-12 col-md-12">
        <form class="form-horizontal" action="{{ route('condominio.update', $condominio->CONDOMINIO_CNPJ) }}" method="POST"><input name="_method" type="hidden" value="PUT">{{ csrf_field() }}
          <div class="box-body">
            <div class="form-group">
              <label for="condominio" class="col-sm-2 control-label">Nome do Condominio</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="nome_condominio" name="nome_condominio" placeholder="Nome" required value="{{ $condominio->CONDOMINIO_NOME }}">
              </div>
            </div>
            <div class="form-group">
              <label for="cnpj" class="col-sm-2 control-label">Cadastro Nacional da Pessoa Juridica (CNPJ)</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="00.000.000/0001-00" readonly value="{{ $condominio->CONDOMINIO_CNPJ }}">
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Quantidade de Blocos</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="qtdade_bloco" name="qtdade_bloco" placeholder="13" readonly value="{{ $condominio->CONDOMINIO_QTDADE_BLOCO }}">
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Cada bloco possui quantos Andares?</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="qtdade_andares" name="qtdade_andares" placeholder="5" readonly value="{{ $condominio->blocos[0]->BLOCO_QTDADE_ANDARES }}">
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Cada andar possui quantos apartamentos?</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="qtdade_apartamentos" name="qtdade_apartamentos" placeholder="4" readonly value="{{ $condominio->blocos[0]->BLOCO_QTDADE_APTO_POR_ANDAR }}">
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Nome dos Blocos</label>

              <div class="col-sm-6">
                <select class="form-control" id="nome_bloco" name="nome_bloco" disabled>
                  <option value="">Selecione...</option>
                  <option value="A" @if($condominio->blocos[0]->BLOCO_NOME == 'A') {{ 'selected' }} @endif>Letras (A, B, C...) Até 26 blocos</option>
                  <option value="1" @if($condominio->blocos[0]->BLOCO_NOME == '1') {{ 'selected' }} @endif>Numeros (1, 2, 3...)</option>
                </select>                    
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Cep</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="cep" name="cep" placeholder="31800000" required maxlength="8" value="{{ $condominio->CONDOMINIO_CEP }}">
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Endereço</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua das Conchas" required value="{{ $condominio->CONDOMINIO_ENDERECO }}">
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Número</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="numero" name="numero" placeholder="50" required value="{{ $condominio->CONDOMINIO_NUMERO }}">
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Bairro</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Das conhcas" required value="{{ $condominio->CONDOMINIO_BAIRRO }}">
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Cidade</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Belo Horizonte" required value="{{ $condominio->CONDOMINIO_CIDADE }}">
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Estado</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="estado" name="estado" placeholder="MG" required value="{{ $condominio->CONDOMINIO_ESTADO }}">
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <a href="{{ route('condominio.index') }}" type="button" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-primary pull-right">Cadastrar</button>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
    </div>
    
</section>

@endsection

@section('scripts')
<script type="text/javascript">
  $("#cep").on('keyup blur', function(e) {
    var cep = $(this).val();
    if(cep.length == 8) 
    {
      var urlCep = "https://viacep.com.br/ws/" + cep + "/json/";

          $.ajax({
              url: urlCep,
              type: 'get',                                                
              dataType: 'json',
              success: function(response) 
              {
                if(response.erro)
                {
                  alertify.notify('Busca de endereco sem Sucesso!', 'error', 5, function(){ });

                  $("#endereco").val('');                  
                  $("#bairro").val('');
                  $("#cidade").val('');
                  $("#estado").val('');                      
                }
                else
                {
                  var japreenchido = $('#endereco').val();

                  if (!japreenchido) 
                  {                     
                    alertify.notify('Busca de endereco realizada com sucesso!', 'success', 5, function(){  });
                        
                    $("#endereco").val(response.logradouro);                    
                    $("#bairro").val(response.bairro);
                    $("#cidade").val(response.localidade);
                    $("#estado").val(response.uf);  
                  }
                }
              }
          });
    } else {
      $("#endereco").val('');      
      $("#bairro").val('');
      $("#cidade").val('');
      $("#estado").val(''); 
    }
  });
</script>
	
@endsection