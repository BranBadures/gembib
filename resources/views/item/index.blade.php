@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<div id="examploRowBuscaCampoValor" class="d-none">
  <div class="row">
    <div class="form-group col-5">
      Campo para busca 
      <select name="campo[]" name="campo[]" class="w-100">
        <option value="">Todos os campos</option>
        <option value="titulo">Título</option>
        <option value="autor">Autor</option>
        <option value="tombo">Tombo</option>
        <option value="codigoimpressao">Código de Impressão</option>
        <option value="observacao">Observação</option>
        <option value="verba">Verba</option>
        <option value="processo">Processo</option>
      </select>
    </div>
    <div class="form-group col-7">
      Informar palavra ou expressão
      <input class="w-100" type="text" name="valor[]" value="" placeholder="Busca por Título">
    </div>
  </div>
</div>

<form method="GET">

<b>Insira as informações somente nos campos que achar necessário para sua busca:</b>
<br><br>
<div class="row">
  <div class="col-md-6">
    <div id="containerBuscaCampoValor">
      @if(is_array(request()->campo))
      @for($i =0 ; $i < sizeOf(request()->campo); $i++)
      <div class="row">
          <div class="form-group col-5">
            Campo para busca 
            <select name="campo[]" name="campo[]" class="w-100">
              <option value="" @if(request()->campo[$i] == "")  selected="selected" @endif>Todos os campos</option>
              <option value="titulo"  @if(request()->campo[$i] == "titulo") selected="selected" @endif>Título</option>
              <option value="autor"  @if(request()->campo[$i] == "autor") selected="selected" @endif>Autor</option>
              <option value="tombo" @if(request()->campo[$i] == "tombo") selected="selected" @endif>Tombo</option>
              <option value="codigoimpressao" @if(request()->campo[$i] == "codigoimpressao") selected="selected" @endif>Código de Impressão</option>
              <option value="observacao" @if(request()->campo[$i] == "observacao") selected="selected" @endif>Observação</option>
              <option value="verba" @if(request()->campo[$i] == "verba") selected="selected" @endif>Verba</option>
              <option value="processo" @if(request()->campo[$i] == "processo") selected="selected" @endif>Processo</option>
            </select>
          </div>
          <div class="form-group col-7">
            Informar palavra ou expressão
            <input class="w-100" type="text" name="valor[]" value="{{ request()->valor[$i]}}" placeholder="Busca por Título">
          </div>
      </div>
      @endfor
      @else
      <div class="row">
          <div class="form-group col-5">
            Campo para busca 
            <select name="campo[]" name="campo[]" class="w-100">
              <option value="">Todos os campos</option>
              <option value="titulo">Título</option>
              <option value="autor">Autor</option>
              <option value="tombo">Tombo</option>
              <option value="codigoimpressao">Código de Impressão</option>
              <option value="observacao">Observação</option>
              <option value="verba">Verba</option>
              <option value="processo">Processo</option>
            </select>
          </div>
          <div class="form-group col-7">
            Informar palavra ou expressão
            <input class="w-100" type="text" name="valor[]" value="" placeholder="Busca por Título">
          </div>
      </div>
      @endif
    </div>
  </div>
  <div class="form-group col-1 pt-3">
    <span id="btnAdd" class="btn btn-success" alt="Adicionar mais um campo">
      <i class="fas fa-plus"></i>
    </span>
    &nbsp;
    <span id="btnRemove" class="btn btn-danger d-none" alt="Remover último campo">
      <i class="fas fa-minus"></i>
    </span>
    
  </div>
</div>


<div class="row d-none">
  
  <div class="form-group">
        <div class="form-group col-sm-2">
        <input type="text" name="titulo" value="{{ request()->titulo }}" placeholder="Busca por Título">
      </div>
    </div>
    <div class="form-group">
        <div class="form-group col-sm-2">
        <input type="text" name="autor" value="{{ request()->autor }}" placeholder="Busca por Autor">
      </div>
    </div>
    <div class="form-group">
        <div class="form-group col-sm-2">
        <input type="text" name="tombo" value="{{ request()->tombo }}" placeholder="Busca por Tombo">
      </div>
    </div>
    <div class="form-group">
      <div class="form-group col-sm-2">
        <input type="text" name="codigoimpressao" value="{{ request()->codigoimpressao  }}" style="width: 300px" placeholder="Busca por Código de Impressão"> 
      </div>
    </div>
</div>
<div class="row d-none">
  <div class="form-group">
    <div class="form-group col-sm-2">
        <input type="text" name="observacao" value="{{ request()->observacao }}" placeholder="Busca por Observação">
      </div>
    </div>
    <div class="form-group">
      <div class="form-group col-sm-2">
        <input type="text" name="verba" value="{{ request()->verba }}" placeholder="Busca por Verba">
      </div>
    </div>
    <div class="form-group">
        <div class="form-group col-sm-2">
        <input type="text" name="processo" value="{{ request()->processo }}" placeholder="Busca por Processo">    </div>
      </div>
    </div>
</div>
</div>

<div class="row">
  <div class="col-sm form-group">
  <select name="status">
  <option value="" selected="">Selecionar status</option>
    @foreach($status as $i)
      <option @if(Request()->status == "$i") selected @endif>
        {{$i}}
      </option>
    @endforeach
  </select>

  <select name="procedencia">
  <option value="" selected>Selecionar procedência</option>
    @foreach($procedencia as $p)
      <option @if(Request()->procedencia == "$p") selected @endif>
        {{$p}}
      </option>
    @endforeach
  </select>

  <select name="tipo_material">
  <option value="" selected>Selecionar tipo de material</option>
    @foreach($tipo_material as $t)
      <option @if(Request()->tipo_material == "$t") selected @endif>
        {{$t}}
      </option>
    @endforeach
  </select>

  <select name="tipo_aquisicao">
  <option value="" selected>Selecionar tipo de aquisição</option>
    @foreach($tipo_aquisicao as $a)
      <option @if(Request()->tipo_aquisicao == "$a") selected @endif>
        {{$a}}
      </option>
    @endforeach
  </select>
  </div>
</div>

<div class="row justify-content-md-left">
  <div class="col col-lg-2">
    <label for="">Data Sugestão</label>
  </div>
  <div class="col-md-lg-2">
    <input type="text" data-mask="00/00/0000" name="data_sugestao_inicio" class="datepicker" value="{{ Request()->data_sugestao_inicio }}"> <b>-</b>
  </div>
  <div class="col col-lg-2">
    <input type="text" data-mask="00/00/0000" name="data_sugestao_fim" class="datepicker" value="{{ Request()->data_sugestao_fim }}">
  </div>
</div>
<br>

<div class="row justify-content-md-left">
  <div class="col col-lg-2">
    <label for="">Data Tombamento</label>
  </div>
  <div class="col-md-lg-2">
    <input type="text" data-mask="00/00/0000" name="data_tombamento_inicio" class="datepicker" value="{{ Request()->data_tombamento_inicio }}"> <b>-</b>
  </div>
  <div class="col col-lg-2">
    <input type="text" data-mask="00/00/0000" name="data_tombamento_fim" class="datepicker" value="{{ Request()->data_tombamento_fim }}">
  </div>
</div>
<br>

<div class="row justify-content-md-left">
  <div class="col col-lg-2">
    <label for="">Data Processamento</label>
  </div>
  <div class="col-md-lg-2">
    <input type="text" data-mask="00/00/0000" name="data_processamento_inicio" class="datepicker" value="{{ Request()->data_processamento_inicio }}"> <b>-</b>
  </div>
  <div class="col col-lg-2">
    <input type="text" data-mask="00/00/0000" name="data_processamento_fim" class="datepicker" value="{{ Request()->data_processamento_fim }}">
  </div>
</div>

  <button type="submit" class="btn btn-success">Buscar</button>
</form>
<br>

<div>
  <a href="/excel?status={{ request()->status }}
  &procedencia={{ request()->procedencia }}
  &tipo_material={{ request()->tipo_material }}
  &tipo_aquisicao={{ request()->tipo_aquisicao }}
  &busca={{ request()->busca }}
  &data_sugestao_inicio={{ request()->data_sugestao_inicio }}
  &data_sugestao_fim={{ request()->data_sugestao_fim }}
  &data_tombamento_inicio={{ request()->data_tombamento_inicio }}
  &data_tombamento_fim={{ request()->data_tombamento_fim }}
  &data_processamento_inicio={{ request()->data_processamento_inicio }}
  &data_processamento_fim={{ request()->data_processamento_fim }}">
  <i class="fas fa-file-excel"></i> Exportar busca em excel</a>  
</div>

<br>

@include('item.partials.quantidades')
<br>
{{ $itens->appends(request()->query())->links() }}

<div class="card">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Tombo</th>
        <th scope="col">Título</th>
        <th scope="col">Autor</th>
        <th scope="col">Editora</th>
        <th scope="col">Status</th>
        <th scope="col">Ano</th>
        <th scope="col">Procedência</th>
        <th scope="col">Sugestão feita por</th>
        <th scope="col">Alterações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($itens as $item)
      <tr>
        <td><a href="/item/{{ $item->id }}">{{ $item->tombo ?? 'Sem tombo' }}</a></td>
        <th><a href="/item/{{ $item->id }}">{{ $item->titulo }}</a></th>
        <td>{{ $item->autor }}</td>
        <td>{{ $item->editora }}</td>
        <td>{{ $item->status }}</td>
        <td>{{ $item->ano }}</td>
        <td>{{ $item->procedencia }}</td>
        <td>{{ $item->sugerido_por }}</td>
        @if($item->status != 'Sugestão' && $item->status != 'Em Cotação' && $item->status != 'Negado' && $item->status != 'Em Licitação' && $item->status != 'Em Tombamento' )
        <td>
          <a href="/item/{{ $item->id }}/edit" class="btn btn-success">Editar</a>
          <br><br>
          <form method="POST" action="/item/{{$item->id}}"> 
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?');"> Excluir </button>  
          </form>
        </td>  
        @else
        <td>
          <form method="POST" action="/item/{{$item->id}}"> 
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?');"> Excluir </button> 
          </form>
        </td>
        @endif
      </tr>
      @endforeach

    </tbody>
  </table>
</div>
@endsection

@section('javascripts_bottom')
<script>
    $(document).ready(function(){
      $("#btnAdd").click(function(){
        if( $("#containerBuscaCampoValor .row").last().find('input[name^="valor"').val().length == 0){
          alert('Por favor, preencha a última busca antes de adionar mais campos.');
        }else{
          var clone = $("#examploRowBuscaCampoValor .row").last().clone();
          $(clone).appendTo( "#containerBuscaCampoValor" );
          $("#btnRemove").removeClass("d-none");
        }
      });

      $("#btnRemove").click(function(){
        $("#containerBuscaCampoValor .row").last().remove();
        if( $("#containerBuscaCampoValor .row").length == 1){
          $("#btnRemove").addClass("d-none");
        }
      });
      

    });
  </script>
@stop