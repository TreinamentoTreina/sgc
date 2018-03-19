@extends('main')

@section('title', '| Criar Novo Condominio')

@section('stylesheets')


@endsection

@section('content')

<section class="wrapper site-min-height">    
    <br>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Condominio</a></li>
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
                  <option value="A">Letras (A, B, C...)</option>
                  <option value="1">Numeros (1, 2, 3...)</option>
                </select>                    
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
    </div>
    
</section>

@endsection

@section('scripts')

	
@endsection