@extends('layout.principal')

@section('conteudo')

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<h1 class="center">Atualizar produto: {{$p->nome}}</h1>
<form action="/produtos/alterado/{{$p->id}}" method="post">

    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <div class="form-group">
	   <label>Nome</label>
	   <input name="nome" class="form-control" value="{{ $p->nome }}" >
	</div>

    <div class="form-group">
       <label>Valor</label>
        <input name="valor" class="form-control" value="{{$p->valor}}">
    </div>
    <div class="form-group">
        <label>Tamanho</label>
        <input name="tamanho" class="form-control" value="{{$p->tamanho}}" />     
    </div>

    <div class="form-group">
       <label>Quantidade</label>
        <input name="quantidade" class="form-control" type="number" value="{{$p->quantidade}}">
    </div>
  	
  <div class="form-group">
    <label>Descrição</label>
    <input name="descricao" class="form-control" value="{{ $p->descricao }}" >
  </div>

    <input type="submit" class="btn btn-primary" value="Atualizar"/>

</form>
@stop