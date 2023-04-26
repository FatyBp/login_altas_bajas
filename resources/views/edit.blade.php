@extends('layouts/main')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col mt-4">
            <a href="/" class="btn btn-primary">
                Regresar
            </a>
            <br>
            <br>
            <div class="card">
                <div class="card-header">
                    <h2 text-center>Crear | Altas-Bajas</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('update', $items->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div>Categoria</div>
                    <select name="tipo">
                        <option  selected >{{$items->tipo}}</option>
                        <option value="Ingreso">Ingreso</option>
                        <option value="Gasto">Gasto</option>
                    </select>
                </div>
                <div scope="col">Tipo</div>
                <select name="categoria"></select>
                <br>
                        <label for="cantidad">Escribe la cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{$items->cantidad}}">
                        <label for="descripcion">Escribe la descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{$items->descripcion}}">
                        <label for="fecha">Escribe la imagen</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" value="{{$items->fecha}}">
                        <br>
                        <br>
                        <button class="btn btn-outline-warning d-grid gap-2 col-4 mx-auto">
                            Actualizar
                        </button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
</div>
<script>
       let option = document.querySelector('[name=tipo]')
    let catalogoG = document.querySelector('[name=categoria]')
    catalogoG.innerHTML ='<option>{{$items->categoria}}</option>'
    option.addEventListener('change',()=>{
        if (option.value==='Ingreso') {
        let opciones = `
        <option value ="{{$items->tipo}}">Elige una opcion</option>
        <option value="soporte">Soporte</option>
        <option value="Mantenimiento de sistemas">Mantenimiento de sistemas</option>
        <option value="Venta de hardware y software">Venta de hardware y software</option>
        <option value="Análisis de datos">Análisis de datos</option>
        <option value="Seguridad informática">Seguridad informática</option>
        <option value="Servicios en la nube">Servicios en la nube</option>
        <option value="Consultoría en tecnología">Consultoría en tecnología</option>
        `
        catalogoG.innerHTML = opciones
    } else if(option.value==='Gasto'){
        let opciones = `
        <option selected disabled>Elige una opcion</option>
        <option value="comida">Alimento</option>
        <option value="medico">Medico</option>
        <option value="entretenimiento">Entretenimiento</option>
        <option value="servicios">Servicios</option>
        <option value="gastos_financieros">Gastos financieros</option>
        <option value="gastos_gubernamentales">Gastos gubernamentales</option>
        <option value="otro">Otro</option>

        `
        catalogoG.innerHTML = opciones
    }else{
        catalogoG.innerHTML ='<option>Elige una categoria</option>'
    }
    })
</script>  
@endsection