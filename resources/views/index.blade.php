@extends('layouts/main')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('contenido')
<div class="container">
    <?php 
        $ingreso = 0;
        $gasto = 0;
        $total = $ingreso - $gasto
    ?>
    <div class="row">
        <div class="col">
            <a href="/create" class="btn btn-primary mt-4">
                Nuevo
            </a>
            <br>
            <br>
            <div class="card">
                <div class="card-header">
                    <h2 text-center>Inicio | Altas-Bajas</h2>
                </div>
                
                    <table id="tabla" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Tipo</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{$item->tipo}}</td>
                                <td>{{$item->categoria}}</td>
                                <td>{{$item->cantidad}}</td>
                                <td>{{$item->descripcion}}</td>
                                <td>{{$item->fecha}}</td>
                                <td>
                                    <a href="{{route('edit',$item->id)}}" class="btn btn-warning">Editar</a>
                                </td>
                                <td>
                                    <a href="{{route('show',$item->id)}}" class="btn btn-danger">Eliminar</a>
                                    
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @section('js')
                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
                    @endsection
                </div>
            </div>
            <div class="card mt-5" style="width: 10rem;">
                <div class="card-body">
                    <h5 class="card-title">Totales</h5>
                    <p class="card-text">Ingreso
                        <div style="background-color:rgb(92, 255, 92)">
                            @foreach ($items as $item)
                                @if ($item->tipo=='Ingreso')
                                    <?php
                                        $ingreso = $ingreso + ($item->cantidad)
                                    ?>
                                @endif
                            @endforeach
                            $ {{$ingreso}}
                        </div>
                    </p>
                    <p class="card-text">Gastos
                        <div style="background-color:red">
                            @foreach ($items as $item)
                                @if ($item->tipo=='Gasto')
                                    <?php
                                    
                                        $gasto += intval($item->cantidad)
                                    ?>
                                @endif
                            @endforeach
                            $ {{$gasto}}
                        </div>
                    </p>
                    <p class="card-text">Total
                        <div style="background-color:aqua">
                            <?php
                                $diferencia = $ingreso - $gasto;
                            ?>
                            $ {{$diferencia}}
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('datatable')
    <script>
        $(document).ready(function () {
        $('#tabla').DataTable();
        });
    </script>
@endsection
 
  
  
  
  
  
  
    
<a href="{{route('logout')}}">Salir del sistema</a>