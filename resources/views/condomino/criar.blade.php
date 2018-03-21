@extends('main')

@section('title', '| Condomínio | Criar')

@section('stylesheets')


@endsection

@section('content')

<section class="wrapper site-min-height">    
    <br>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('condominio.index') }}">Condominio</a></li>
      <li class="active">Criar</li>
    </ol>
    <h3><i class="fa fa-angle-right"></i> Novo Condomínio</h3>

    <div class="row mt">
      <div class="col-lg-12 col-md-12">
        <form class="form-horizontal" action="{{ route('condominio.store') }}" method="POST">{{ csrf_field() }}
          <div class="box-body">
            <div class="form-group">
              <label for="condominio" class="col-sm-2 control-label">Nome do Condominio</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="nome_condominio" name="nome_condominio" placeholder="Nome" required>
              </div>
            </div>
            <div class="form-group">
              <label for="cnpj" class="col-sm-2 control-label">Cadastro Nacional da Pessoa Juridica (CNPJ)</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="00.000.000/0001-00" required>
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Quantidade de Blocos</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="qtdade_bloco" name="qtdade_bloco" placeholder="13" required>
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Cada bloco possui quantos Andares?</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="qtdade_andares" name="qtdade_andares" placeholder="5" required>
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Cada andar possui quantos apartamentos?</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="qtdade_apartamentos" name="qtdade_apartamentos" placeholder="4" required>
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Nome dos Blocos</label>

              <div class="col-sm-6">
                <select class="form-control" id="nome_bloco" name="nome_bloco" required>
                  <option value="">Selecione...</option>
                  <option value="A">Letras (A, B, C...) Até 26 blocos</option>
                  <option value="1">Numeros (1, 2, 3...)</option>
                </select>                    
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Cep</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="cep" name="cep" placeholder="31800000" required maxlength="8">
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Endereço</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua das Conchas" required>
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Número</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="numero" name="numero" placeholder="50" required>
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Bairro</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Das conhcas" required>
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Cidade</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Belo Horizonte" required>
              </div>
            </div>
            <div class="form-group">
              <label for="bloco" class="col-sm-2 control-label">Estado</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="estado" name="estado" placeholder="MG" required>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <a href="{{ route('condominio.index') }}" type="button" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-info pull-right">Cadastrar</button>
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
                  $("#numero").val('');
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
                    $("#numero").val('');
                    $("#bairro").val(response.bairro);
                    $("#cidade").val(response.localidade);
                    $("#estado").val(response.uf);  
                  }
                }
              }
          });
    } else {
      $("#endereco").val('');
      $("#numero").val('');
      $("#bairro").val('');
      $("#cidade").val('');
      $("#estado").val(''); 
    }
  });
</script>
	
@endsection