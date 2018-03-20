@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if(isset($curso))
                        Editar curso {{ $curso->curso }}
                    @else
                        Cadastrar novo curso
                    @endif
                </div>

                <div class="card-body">
                     @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                     <form action="{{ isset ($curso) ? route('atualizar.cursos') : route('salvar.cursos') }}" method="POST">
                            <div class="form-group">
                                <label for="curso">Nome Curso</label>
                                <input type="text" class="form-control" id="curso" name="curso" placeholder="Nome do curso" value="{{ isset($curso) ? $curso->curso : old('curso') }}" required>
                            </div>
                            @if(isset($curso))
                            <input type="hidden" name="id" value="{{$curso->id}}">
                            @endif
                            <div class="form-group">
                                <label for="inativo">Status</label>
                                <select name="inativo" class="form-control" required>
                                    <option value="">Escolha um status</option>
                                    <option value="0" {{ isset ($curso) ? $curso->inativo == '0' ? 'selected' : '' : old('inativo') == 0 ? 'selected' : '' }}>Ativo</option>
                                    <option value="1" {{ isset ($curso) ? $curso->inativo == '1' ? 'selected' : '' : old('inativo') == 1 ? 'selected' : '' }}>Desativado</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">
                            @if(isset($curso))
                                Atualizar curso {{ $curso->curso }}
                            @else
                                Cadastrar curso
                            @endif
                            </button>
                            {{csrf_field()}}
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script>

</script>
@endsection
