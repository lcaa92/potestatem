@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Certificados</div>

                <div class="card-body">

                    <table id="listaTop100AlunosCertificados" class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Qnt Certificados</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alunos as $aluno)
                                <tr>
                                    <td>{{ $aluno->aluno->name }}</td>
                                    <td>{{ $aluno->aluno->email }}</td>
                                    <td>
                                        @isset($aluno->aluno->telefone)
                                            {{ $aluno->aluno->telefone }}
                                        @else
                                            Não informado
                                        @endisset
                                        </td>
                                    <td>
                                    {{ $aluno->num_certificados }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<script>
$(document).ready( function () {
    $('#listaTop100AlunosCertificados').DataTable({
        "order": [[ '3', "desc" ]]
    } );
} );

</script>
@endsection
