<div class="container">
    <div class="float-right">
        <a href="#modalForm" data-toggle="modal" data-href="{{url('programa/create')}}"
           class="btn btn-primary">Nuevo</a>
    </div>
    <h1 style="font-size: 1.3rem">Roles</h1>
    <hr/>
    <div class="row">
        <div class="col-sm-4 form-group">

        </div>
        <div class="col-sm-5 form-group">
            <div class="input-group">
                <input class="form-control" id="search"
                       value="{{ request()->session()->get('search') }}"
                       onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('programa')}}?search='+this.value)"
                       placeholder="Search name" name="search"
                       type="text" id="search"/>
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-warning"
                            onclick="ajaxLoad('{{url('programa')}}?search='+$('#search').val())"
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
                <a href="javascript:ajaxLoad('{{url('programa?field=descripcion&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Name
                </a>
                {{request()->session()->get('field')=='descripcion'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>
           
            
            
            <th width="152px" style="vertical-align: middle">Acción</th>
        </tr>
        </thead>
        <tbody>
        @php
            $i=1;
        @endphp
        @foreach($programas as $programa)
            <tr>
                <th style="vertical-align: middle;text-align: center">{{$i++}}</th>
                <td style="vertical-align: middle">{{ $programa->descripcion }}</td>
                
                
                <td style="vertical-align: middle" align="center">
                    <a class="btn btn-primary btn-sm" title="Edit" href="#modalForm" data-toggle="modal"
                       data-href="{{url('programa/update/'.$programa->id)}}">
                        Editar</a>
                    <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-sm" title="Delete" data-toggle="modal"
                       href="#modalDelete"
                       data-id="{{$programa->id}}"
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