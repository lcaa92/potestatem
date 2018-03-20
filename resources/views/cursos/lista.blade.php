@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cursos
                    <div class="float-right">
                        <a class="btn btn-sm btn-primary" href="{{ route('add.cursos') }}"> <i class="fas fa-plus"></i>  Novo Curso </a>
                    </div>
                </div>

                <div class="card-body">

                    @if(count($cursos)>0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>Curso</th>
                                    <th>Ativo</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach($cursos as $curso)
                                        <tr>
                                            <td>{{ $curso->curso }}</td>
                                            <td>{{ $curso->inativo === 0 ? 'Ativo' : 'Desativado' }}</td>
                                            <td>
                                                <div class="float-right">
                                                    <a class="btn btn-sm btn-warning" href="{{ route('edit.cursos', ['id'=>$curso->id]) }}"> <i class="fas fa-edit"></i>  Editar Curso </a> 
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <a href="{{ route('delete.cursos', ['id'=>$curso->id]) }}" data-method="delete" class="delete-curso btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i>  Delete</a>
                                                </div> 
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        Nenhum curso encontrado.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script>
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
$(document).on('click', 'a.delete-curso', function(e) {
    e.preventDefault(); // does not go through with the link.

    var $this = $(this);

    $.post({
        type: $this.data('method'),
        url: $this.attr('href')
    }).done(function (data) {
        alert('Curso excluído com sucesso');
        location.reload();
    }).fail(function (data) {
        alert('Falha ao excluir curso');
        console.log(data);
    });
});

</script>
@endsection
