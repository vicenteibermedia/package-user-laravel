<div class="row">
  <div class="col-12">
    <div class="panel panel-innverse" data-sortable-id="table-basic-7">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table m-b-0">
            <thead>
              <tr>
                <th style="text-align:center;">Nombre</th>
              </tr>
            </thead>
            <tbody>
            @foreach($departamentos as $departamento) <tr>
               <td style="text-align:center;vertical-align: middle;">{{$departamento->department_name}}</td>
               <td style="text-align:center;" class="with-btn ">
                 <a class="btn btn-sm btn-primary" href="editarDepartamento/{{$departamento->id}}">Editar</a>
                 <a @if($departamento->id) class="btn btn-sm btn-danger btn_borrar_departamento" @else class="btn btn-sm btn-danger btn_borrar_departamento disabled"  @endif data-iddepartamento={{$departamento->id}}>Borrar</a>
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
