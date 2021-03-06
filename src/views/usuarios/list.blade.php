@extends('layouts.main')
@section('content')

  <div class="content__header content__boxed overlapping">
      <div class="content__wrap">
          <h1 class="page-title mb-2">Usuarios</h1>
          {{-- <h2 class="h5">Welcome back to the Dashboard.</h2>
          <p>Scroll down to see quick links and overviews of your Server, To do list<br> Order status or get some Help using Nifty.</p> --}}
          <!-- END : Page title and information -->
      </div>
  </div>

  <div class="content__boxed">
      <div class="content__wrap">

          <!-- Table with toolbar -->
          <div class="card mt-5">

            <div class="card-header">
                <div class="row">

                    <!-- Left toolbar -->
                    <div class="col-md-6 d-flex gap-1 align-items-center justify-content-md-start mb-3">

                      {{-- <div class="form-group">
                        <form method="GET" action='/contratas/lista' id="searchForm" style="height:40px">
                          <div class="input-group">
                            <div class="input-group-prepend d-flex align-items-center" style="margin-right: 1.5rem">
                              <label>Búsqueda: </label>
                              </div>
                            <div class="input-group-prepend d-flex align-items-center" style="margin-right: 1.5rem">
                              <select data-toggle="dropdown" class="select2 input-group select4atribute" style="width:120px; height: 37px" name="search_col" id="select">
                                    <option value="nombre" selected="selected" >Por nombre</option>
                                    <option value="cod" >Por código</option>
                                    <option value="contacto">Por contacto</option>
                                </select>
                              </div>
                              <input type="search" name="search_text" class="form-control" id="filter" value="" placeholder="Introduzca el dato a buscar ">
                            </div>
                            <br>
                        </form>
                      </div> --}}


                    </div>
                    <!-- END : Left toolbar -->

                    <!-- Right Toolbar -->
                    <div class="col-md-6 d-flex gap-1 align-items-center justify-content-md-end mb-3">
                        <a href="/usuarios/new_usuario" class="btn btn-primary hstack gap-2 align-self-center btn_new_user">
                            <i class="demo-psi-add fs-5"></i>
                            <span class="vr"></span>
                            Añadir usuario
                        </a>
                    </div>

                    <!-- END : Right Toolbar -->

                </div>
            </div>

              <div class="card-body">
                <div id="list_usuarios_list">
                    @include('usuarios.lista_usuarios')
                </div>

              </div>
          </div>

      </div>
  </div>
@stop
@section('scripts')
  <script type="text/javascript">
  $(document).ready(function(){
      const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    $(document).on('click', '.btn_borrar_usuario', function(e){
      e.preventDefault()
      let data = {
        iduser: $(this).data('idusuario')
      };
      Swal.fire({
        title: '¿Desea eliminar este usuario?',
        text: 'Una vez eliminado no podrás recuperarlo',
        icon: 'warning',
        showCloseButton: true,
        showCancelButton: true,
      }).then(function(result){
        if (result.isConfirmed) {
          $.ajax({
            type: "POST",
            url: '/ajax/usuarios/delete_usuarios',
            data: data,
            success: function(result) {
              var json = JSON.parse(result);
              var vista_html = decodeURIComponent(json.vista_usuarios).replace(/\+/g,' ');
              $("#list_usuarios_list").html(vista_html);
              Toast.fire({
                position: 'top',
                icon: 'success',
                title:  '¡Usuario borrado correctamente!',
                showConfirmButton: false,
              });
            }
          });
        }
      });
    });
    $(document).on('click', '.usuario_imagen_subir_2', function(){
      $('#profile-image-upload_'+$(this).attr('id')).click();
    });

    $(document).on('change', '.upload_imagen', function(){
      $('#subirImagenUsuario_'+$(this).data('id')).submit();
    });

    $(document).on("click", ".btn_activo", function() {
      var data = {
        idusuario: $(this).data('idusuario'),
      };

      $.ajax({
        type: "POST",
        url: '/ajax/usuarios/cambiar_activo',
        data: data,
        success: function(result) {
          var json = JSON.parse(result);
          var vista_html = decodeURIComponent(json.activo_cambiado_usuarios).replace(/\+/g, ' ');
          $('#list_usuarios_list').html(vista_html)
        }

      });
    });
  });


  </script>
@stop
