@extends('layouts/main')
@section('contenido')
<div class="container">
    <div class="row">
        <div  class="col">
            <center>
                <div class="card border-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header text-primary"><h2>El dato a eliminar</h2></div>
                    <div class="card-body">
                        <ul>
                            <li>La Categoria es: {{$items->tipo}}</li>
                            <li>El Tipo es: {{$items->categoria}}</li>
                            <li>La cantidad es:  {{$items->cantidad}}</li>
                            <li>La descripcion es:{{$items->descripcion}}</li>
                            <li>La fecha es:  {{$items->fecha}}</li>
                        </ul>
                        <form action="{{route('destroy',$items->id)}}" method="post">
                            @csrf
                            <a href="/" class="btn btn-secondary mt-3">
                                Regresar
                            </a>
                            @method('DELETE')
                            <button href="" class="btn btn-danger mt-3">Eliminar</button>
                        </form>
                    </div>
                </div>
            </center>
        </div>
    </div>
</div>
@endsection