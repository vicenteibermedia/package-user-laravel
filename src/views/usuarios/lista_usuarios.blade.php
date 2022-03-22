<div class="row">
  <div class="col-12">
    <div class="panel panel-innverse" data-sortable-id="table-basic-7">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table m-b-0">
            <thead>
              <tr>
                <th style="text-align:center;">Imagen</th>
                <th style="text-align:center;">Usuario</th>
                <th style="text-align:center;">Email</th>
                <th style="text-align:center;">Codigo</th>
                <th style="text-align:center;">Permisos</th>
                <th style="text-align:center;">Activo</th>
                <th style="text-align:center;">Opciones</th>
              </tr>
            </thead>
            <tbody>
            {{--  @foreach($users as $user) <tr>
               <td class="with-img" style="text-align:center;">
                 <form action="/usuarios/subir_imagen_usuario" method="POST" style="display: none" id="subirImagenUsuario_{{ $user->id }}" enctype="multipart/form-data"> @csrf <input id="profile-image-upload_{{ $user->id }}" data-id="{{ $user->id }}" class="hidden upload_imagen" type="file" name="image">
                   <input type="hidden" name="usuario" value="{{ $user->id }}">
                 </form>
                 <img width="50" id="{{ $user->id }}" @if(!$user->ruta_imagen_usuario) src="../assets/img/user/user-1.jpg" @else src="/img/usuarios/{{ str_replace(' ','', $user->name) }}.png" @endif class="img-rounded height-30 usuario_imagen_subir_2">
               </td>
               <td style="text-align:center;vertical-align: middle;">{{$user->name}}</td>
               <td style="text-align:center;vertical-align: middle;">{{$user->email}}</td>
               <td style="text-align:center;vertical-align: middle;">{{$user->cod}}</td>
               <td style="text-align:center;vertical-align: middle;">
               @if($user->Permiso)
                    <span class="label label-blue " style="float:center; cursor:pointer;">{{$user->Permiso->name}}</span>
               @else
                    <span class="label label-danger " style="float:center; cursor:pointer;">Sin Permisos</span>
               @endif </td>
               <td style="text-align:center;">
                 @if($user->activo == 1) <i class="fas fa-circle" style="color:green;"></i>
                 @else <i class="fas fa-circle" style="color:red;"></i>
                 @endif
               </td>
               <td style="text-align:center;" class="with-btn ">
                 <a class="btn btn-sm btn-primary" href="editar/{{$user->id}}">Editar</a>
                 <a @if( Auth::user()->id != $user->id) class="btn btn-sm btn-danger btn_borrar_usuario" @else class="btn btn-sm btn-danger btn_borrar_usuario disabled"  @endif data-idusuario={{$user->id}}>Borrar</a>
                 @if($user->activo == 1)
                   <a @if( Auth::user()->id != $user->id) class="btn btn-sm btn-warning btn_activo" @else class="btn btn-sm btn-warning btn_activo disabled" @endif data-idusuario={{$user->id}}>Desactivar</a>
                 @else
                   <a @if( Auth::user()->id != $user->id) class="btn btn-sm btn-success btn_activo" @else class="btn btn-sm btn-success btn_activo disabled" @endif data-idusuario={{$user->id}}>Activar</a>
                 @endif

               </td>
             </tr>
           @endforeach--}}

            </tbody>

          </table>

        </div>

      </div>

    </div>

  </div>

</div>
