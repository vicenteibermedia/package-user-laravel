@extends('layouts.main')
@section('content')

  <div class="content__header content__boxed overlapping">
      <div class="content__wrap">
          <h1 class="page-title mb-2">Tipos de Usuario</h1>
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
                        <a href="/usuarios/new_tipo" class="btn btn-primary hstack gap-2 align-self-center btn_create_contrata">
                            <i class="demo-psi-add fs-5"></i>
                            <span class="vr"></span>
                            Añadir Tipo
                        </a>
                    </div>

                    <!-- END : Right Toolbar -->

                </div>
            </div>

              <div class="card-body">
                <div id="list_tipos_list">
                    @include('usuarios.lista_tipos')
                </div>

              </div>
          </div>

      </div>
  </div>
@stop
@section('scripts')
  <script type="text/javascript">
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
  $(document).ready(function(){
    $(document).on('click', '.btn_borrar_tipo', function(e){
      e.preventDefault()
      let data = {
        idtipo: $(this).data('idtipo')
      };
      Swal.fire({
        title: '¿Desea eliminar este tipo de usuario?',
        text: 'Una vez eliminado no podrás recuperarlo',
        icon: 'warning',
        showCloseButton: true,
        showCancelButton: true,
      }).then(function(result){
        if (result.isConfirmed) {
          $.ajax({
            type: "POST",
            url: '/ajax/usuarios/delete_tipo',
            data: data,
            success: function(result) {
              var json = JSON.parse(result);
              var vista_html = decodeURIComponent(json.vista_tipos).replace(/\+/g,' ');
              $("#list_tipos_list").html(vista_html);
              Toast.fire({
                position: 'top',
                icon: 'success',
                title:  '¡Tipo borrado correctamente!',
                showConfirmButton: false,
              });
            }
          });
        }
      });
    });
  });


  </script>
@stop
