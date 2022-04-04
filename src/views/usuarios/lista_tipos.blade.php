<div class="row">
  <div class="col-12">
    <div class="panel panel-innverse" data-sortable-id="table-basic-7">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table m-b-0">
            <thead>
              <tr>
                <th style="text-align:center;">Tipo</th>
              </tr>
            </thead>
            <tbody>
            @foreach($tiposusuario as $tipousuario) <tr>
               <td style="text-align:center;vertical-align: middle;">{{$tipousuario->user_type}}</td>
               <td style="text-align:center;" class="with-btn ">
                 <a class="btn btn-sm btn-primary" href="editarTipo/{{$tipousuario->id}}">Editar</a>
                 <a @if($tipousuario->id) class="btn btn-sm btn-danger btn_borrar_tipo" @else class="btn btn-sm btn-danger btn_borrar_tipo disabled"  @endif data-idtipo={{$tipousuario->id}}>Borrar</a>
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
