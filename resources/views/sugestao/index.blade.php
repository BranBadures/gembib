@extends('laravel-usp-theme::master')

@section('content')
@include('item.partials.modal_desativar_tombo')
@include('flash')

<form method="GET" action="/sugestao/pesquisa">
  <div class="form-group">
    <div id="container" class="col-sm form-group">
      @foreach(request()->campos ?? [''] as $select_campo)
        <div class="row mb-1" id="pesquisa{{ $loop->index }}">
          <select name="campos[]" class="btn btn-success mr-2">
          <option value="" selected="">Selecione um campo</option>
          @foreach($campos as $key => $valor)
            <option value = "{{ $key }}" @if($key == $select_campo) selected @endif>
                {{$valor}}
            </option>
          @endforeach
          </select>
          <input name="search[]" value="{{ request()->search[$loop->index] ?? '' }}">
          <button class="btn btn-primary float-left ml-2">+</button>
          <button class="btn btn-danger float-left ml-2">-</button>
        </div>
      @endforeach
      <div class="row mb-1" id="pesquisa{{ count(request()->campos ?? ['']) }}"></div>
    </div>

    <div class="row justify-content-md-left">
      <div class="col col-lg-2">
        <label for="">Data de Sugestão</label>
      </div>
      <div class="col-md-lg-2">
        <input type="text" data-mask="00/00/0000" name="data_sugestao_inicio" class="datepicker" value="{{ Request()->data_sugestao_inicio }}"> <b>-</b>
      </div>
      <div class="col col-lg-2">
        <input type="text" data-mask="00/00/0000" name="data_sugestao_fim" class="datepicker" value="{{ Request()->data_sugestao_fim }}">
      </div>
    </div>
    
    <br><button type="submit" class="btn btn-success mr-2" id="buscar" name="buscar" value="buscar">Buscar</button>

    <button name="excel" type="submit" class="btn btn-info" id="excel" value="excel">Exportar busca em excel</button>
    
    <button name="relatorio" type="submit" class="btn btn-warning" name = "relatorio" value="relatorio"> Gerar Relatório </button>
    </div>
</form>

<br>
@include('item.partials.quantidades')

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
    @foreach($query as $item)
      <tr>
        <td><a href="/item/{{ $item->id }}">{{ $item->tombo ?? 'Sem tombo' }}</a></td>
        <td><a href="/item/{{ $item->id }}">{{ $item->titulo }}</a></td>
        <td>{{ $item->autor }}</td>
        <td>{{ $item->editora }}</td>
        <td>{{ $item->status }}</td>
        <td>{{ $item->ano }}</td>
        <td>{{ $item->procedencia }}</td>
        <td>{{ $item->sugerido_por }}</td>
        <td>
          @if($item->status != 'Sugestão' && $item->status != 'Em Cotação' && $item->status != 'Negado' && $item->status != 'Em Licitação' && $item->status != 'Em Tombamento' )
            <a href="/item/{{ $item->id }}/edit" class="btn btn-warning w-100 mb-1">Editar</a>
          @endif
          @if(in_array($item->status, ['Em Tombamento', 'Sugestão', 'Em Cotação', 'Negado', 'Em Licitação', 'Em Tombamento']) )
            <form method="POST" action="/item/{{$item->id}}"> 
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Tem certeza que deseja excluir?');"> Excluir </button>  
            </form>
          @endif
          @if(in_array($item->status, ['Sugestão', 'Negado', 'Em Licitação', 'Tombado', 'Em Processamento Técnico', 'Processado']) )
          @if($item->is_active)
            <button type="button" class="btn btn-danger w-100 mt-1" onclick="desativarTombo({{$item->tombo}});"> Desativar </button> 
          @else
           <form method="POST" action="/item/is_active"> 
              @csrf
              <input type="hidden" name="tombo" value="{{$item->tombo}}">
              <input type="hidden" name="is_active" value="1">
    
              <button type="submit" class="btn btn-success w-100 mt-1" onclick="return confirm('Tem certeza que deseja ativar?');"> Ativar </button>  
            </form>
          @endif
          @endif


          <form method="POST" action="/item/duplicar"> 
            @csrf
            <input type="hidden" name="itemId" value="{{$item->id}}">
            <button type="submit" class="btn btn-info w-100 mt-1" onclick="return confirm('Tem certeza que deseja duplicar?');"> Duplicar </button>  
          </form>
        </td>  
      </tr>
    @endforeach
  </tbody>
</table>

{{$query->appends(request()->query())->links()}}

@endsection