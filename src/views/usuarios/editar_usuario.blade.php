@extends('layouts.main')
@section('content')
  <div class="content__header content__boxed rounded-0">
                <div class="content__wrap">

                    <h1 class="page-title mb-0 mt-2">Editar usuario</h1>

                </div>

            </div>

            <div class="content__boxed">
                <div class="content__wrap">

                    <section>
                        <div class="row justify-content-center">
                            <div class="col-lg-12 mb-3">
                              <h2 class="mt-5 mb-3">Datos del usuario</h2>
                                <div class="card h-100">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-xl-5">
                                          <form method="post" action="/usuarios/editar/doedit">
                                            @csrf
                                            <input type="hidden" value="{{ $user->id }}" name="userid">
                                            <input type="text" class="form-control mb-2" placeholder="Nombre" value="{{$user->name}}" name="nombre" autocomplete="off" required/>
                                            <input type="email" class="form-control mb-2" placeholder="E-mail" value="{{$user->email}}" name="email" autocomplete="off" required />
                                            <input type="text" class="form-control mb-3" placeholder="Codigo" value="{{ $user->cod }}" name="cod" autocomplete="off" />
                                            <input type="password" class="form-control mb-2" placeholder="Nueva Password"  name="password" autocomplete="off"/>
                                            <div class="form-group row m-b-15">
                                              <label class="col-form-label col-xl-1 col-md-2 col-sm-12 col-12">Tipos:</label>
                                              <div class="col-xl-11 col-md-10 col-sm-12 col-12">
                                                <select class="select2 default-select2 form-control mb-3" name="tipos"  id="select_id">
                                                  <option></option>
                                                  @foreach(App\Models\TipoUsuario::all() as $tipo)
                                                    <option value="{{ $tipo->id }}">{{ $tipo->user_type }}</option>
                                                  @endforeach </select>
                                              </div>
                                            </div>
                                            <button type="submit" class="btn btn-success ver_detalles mt-3">Editar Usuario <i class="fas fa-pencil-alt"></i>
                                            </button>
                                          </form>
                                        </div>
                                      </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>

@stop
@section('scripts')
  <script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2({
      placeholder: 'Seleciona tipo de usuario'
    });
  });
</script> @stop
