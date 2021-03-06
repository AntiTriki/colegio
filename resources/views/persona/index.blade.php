<style>
    .modal-lg {
        max-width: 80% !important;
        height: 80% !important;
    }
</style>
<div class="container">
    <div class="float-right">
        <a href="{{url('persona/create')}}"
           class="btn btn-primary">Nuevo</a>
    </div>
    <h1 style="font-size: 1.3rem">Persona</h1>
    <hr/>
    <div class="row">
        <div class="col-sm-4 form-group">

        </div>
        <div class="col-sm-5 form-group">
            <div class="input-group">
                <input class="form-control" id="search"
                       value="{{ request()->session()->get('search') }}"
                       onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('persona')}}?search='+this.value)"
                       placeholder="Search name" name="search"
                       type="text" id="search"/>
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-warning"
                            onclick="ajaxLoad('{{url('persona')}}?search='+$('#search').val())"
                    >
                        Buscar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered bg-light">
        <thead class="bg-dark" style="color: white">
        <tr>
            <th width="60px" style="vertical-align: middle;text-align: center">No.</th>
            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('persona?field=nombre&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Nombre
                </a>
                {{request()->session()->get('field')=='nombre'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>
            <th style="vertical-align: middle">
                Apellido
            </th>
            <th style="vertical-align: middle">
                Tipo de Persona
            </th>
            <th width="152px" style="vertical-align: middle">Acción</th>
        </tr>
        </thead>
        <tbody>
        @php
            $i=1;
        @endphp
        @foreach($personas as $persona)
            <tr>
                <th style="vertical-align: middle;text-align: center">{{$i++}}</th>
                <td style="vertical-align: middle">{{ $persona->nombre }}</td>
                <td style="vertical-align: middle">{{ $persona->apellido }}</td>
                <td style="vertical-align: middle">{{ $persona->tipo->descripcion }}</td>

                
                <td style="vertical-align: middle" align="center">
                    <a class="btn btn-primary btn-sm" title="Edit" href="{{url('persona/update/'.$persona->id)}}">
                        Editar</a>
                    <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-sm" title="Delete" data-toggle="modal"
                       href="#modalDelete"
                       data-id="{{$persona->id}}"
                       data-token="{{csrf_token()}}">
                        Eliminar
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav>

    </nav>

</div>