@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Criar Produto</h1>
</div>
<form action="{{ route('cadastrar.produto') }}" method="POST" class="form">
    @csrf
    <div class="mb-3">
    <label  class="form-label">Nome</label>
    <input type="text" value="{{ old('nome') }}" class="form-control"  @error('nome') is-invalid @enderror name="nome">
    @if ($errors->has('nome'))
        <div class="text-danger">
            {{ $errors->first('nome') }}
        </div>
    @endif
  </div>
  <div class="mb-3">
    <label class="form-label">Valor</label>
    <input id="mascara_valor" class="form-control" value="{{ old('valor') }}"  @error('valor') is-invalid @enderror name="valor">
    @if ($errors->has('valor'))
        <div class="text-danger">
            {{ $errors->first('valor') }}
        </div>
    @endif
  </div>

  <button type="submit" class="btn btn-success">Cadastrar</button>
</form>
@endsection