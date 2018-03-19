@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Top 100 alunos certificados</div>

                <div class="card-body">

                    <table id="listaCertificadosAlunos" class="display">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th></th>
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
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="{{ $aluno->user_id }}">Certificados</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="modalCertificadosLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCertificadosLabel">Certificados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
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
    $('#listaCertificadosAlunos').DataTable();
} );

$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var aluno_id = button.data('whatever') // Extract info from data-* attributes

  var modal = $(this)
  modal.find('.modal-title').text('Buscando certificados');
  modal.find('.modal-body').empty();
  modal.find('.modal-body').append('Buscando certificados');

   $.get( "{{ route('certificados.por.aluno') }}/"+aluno_id, function(cert_alunos) {
        modal.find('.modal-title').text('Certificados '+cert_alunos.nome);
        if (cert_alunos.total === 0){
            modal.find('.modal-body').empty();
            modal.find('.modal-body').append('Nenhum certificado encontrado');
        }else{
            modal.find('.modal-body').empty();
            var html = '';
                html += '<table class="table">';
                html += '<thead>';
                    html += '<th>Curso</th>';
                    html += '<th>Data Matricula</th>';
                    html += '<th>Data Conclusão</th>';
                    html += '<th>Nota</th>';
                html += '</thead>';
                html += '<tbody>';
                cert_alunos.certificados.forEach(function(certificado){
                    console.log(certificado);
                    html += '<tr>';
                    html += '<td>'+ certificado.curso +'</td>';
                    html += '<td>'+ certificado.data_matricula +'</td>';
                    html += '<td>'+ certificado.data_conclusao +'</td>';
                    html += '<td>'+ certificado.nota +'</td>';
                    html += '</tr>';
                });
                html += '</tbody>';
            html += '</table>';
            modal.find('.modal-body').append(html);
        }
    })
    .fail(function() {
        modal.find('.modal-title').text('Falha ao buscar certificados');
        modal.find('.modal-body').empty();
        modal.find('.modal-body').append('Falha ao buscar certificados');
    });
})

</script>
@endsection
