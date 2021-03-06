@extends('layouts.app')

@section('content')

<section class="container">
<a class="btn btn-primary btn-sm m-1" href="{{route('users.create')}}">Agregar</a>
    <table class="table">
        @if ($errors->any())
        <div class="alert alert-danger">
             {{$errors->first()}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>        
        @endif

        @if (session('mensaje'))        
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div> 
    
        @endif
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Email</th>
            <th scope="col">Activo</th>
            <th scope="col">Acciones</th>            
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>                
                    <td>{{$user->username}}</td>
                    <td>{{$user->descr}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->activo}}</td>
                    <td>
                        <a href="{{route('users.edit', $user)}}" class="btn btn-warning btn-sm">Editar</a>
                        @if ($user->activo)
                            <form action="{{route('users.destroy', $user)}}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Desactivar</button>
                            </form>                        
                        @else                           
                            <a class="btn btn-success btn-sm" href="{{route('users.activate',$user->id)}}">Activar</a> 
                        @endif
                    </td>
                </tr>
            @endforeach
            
        </tbody>
        
      </table>
    <a class="btn btn-secondary btn-sm" href="{{route('admin.menu')}}">Volver</a>
    </section>
@endsection