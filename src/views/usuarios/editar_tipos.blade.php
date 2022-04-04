@extends('layouts.main')
@section('content')
  <div class="content__header content__boxed rounded-0">
                <div class="content__wrap">

                    <h1 class="page-title mb-0 mt-2">Editar Tipo de Usuario</h1>

                </div>

            </div>

            <div class="content__boxed">
                <div class="content__wrap">

                    <section>
                        <div class="row justify-content-center">
                            <div class="col-lg-12 mb-3">
                              <h2 class="mt-5 mb-3">Tipo de Usuario</h2>
                                <div class="card h-100">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-xl-5">
                                          <form method="post" action="/usuarios/editar/doedittipo">
                                            @csrf
                                            <input type="hidden" name="tipoid" value="{{$tipo->id}}">
                                            <input type="text" class="form-control mb-2" placeholder="Tipo" value="{{ $tipo->user_type }}" name="nombre" autocomplete="off" required/>
                                            <button type="submit" class="btn btn-success ver_detalles mt-3">Editar Tipo <i class="fas fa-pencil-alt"></i>
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
