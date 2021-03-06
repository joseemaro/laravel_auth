@extends('layouts.app')

@section('content')
      
<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card">
                <div class="card-header">{{ __('Registro de roles') }}</div>
                    <div class="card-body">
                        <form action="{{route('roles.store')}}" method="POST">
                            @csrf
                            @error('nombre')
                            <div class="alert alert-danger">
                                El nombre es obligatorio!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                            </div>  
                            @enderror

                            @error('descripcion')
                                <div class="alert alert-danger">
                                    La descripcion es obligatoria!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>    
                                </div>  
                            @enderror

                            @if (session('mensaje'))
                                <div class="alert alert-success">
                                    {{session('mensaje')}}
                                </div>  
                            @endif

                            <div class="form-group row">
                                <label for="name"class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>          


                                <div class="col-md-6">                              
                                    <input type="text" name="name" id="name" 
                                    value="{{old('username')}}" placeholder="Nombre" 
                                    class="form-control mb-2" required>
                                </div>       
                            </div>
                            

                            <div class="form-group row">
                                <label for="descr" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>  

                                <div class="col-md-6 ">         
                                    <input type="text" name="descr" id="descr"
                                    value="{{old('descripcion')}}"
                                    placeholder="Descripcion" class="form-control mb-2" required>
                                </div>  
                            </div>

                            
                            <p>Seleccione los permisos de los roles:</p>
                            <div class="form-group row offset-md-5">
                           @foreach ($permisos as $permiso)
                                <div class="form-check col-md-8">            
                                    <input type="checkbox" class="form-check-input" name="{{$permiso->name}}" id="{{$permiso->name}}">
                                    <label for="{{$permiso->name}}" class="form-check-label text-capitalize mb-3">{{$permiso->name}}</label>
                                </div>
                           @endforeach  
                           </div>

                            {{-- <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    
                                </div>
                            </div> --}}
                            <button type="submit" class="btn btn-primary btn-block mt-3">
                                {{ __('Registrar') }}
                            </button>
                                <a class="btn btn-secondary btn-block mt-3" href="{{route('roles.index')}}">Volver</a>
                        </form>                        
                </div>
            </div>
        </div>
    </div>        
</section>  
@endsection