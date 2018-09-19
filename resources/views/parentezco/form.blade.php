
@if(isset($parentezco))
    {!! Form::model($parentezco,['method'=>'put','id'=>'frm']) !!}
@else
    {!! Form::open(['id'=>'frm']) !!}
@endif

<div class="modal-header">
    <h5 class="modal-title">{{isset($parentezco)?'Edit':'New'}} parentezco</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="form-group row ">
        {!! Form::label("descripcion","Descripcion",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-6">
            <select id="id_alumno" class="form-control" name="id_alumno">

                @foreach($personas as $a)
                    <option value="{{$a->alumno->id }}"  >{{$a->alumno->nombre.' '.$a->alumno->apellido }}</option>
                @endforeach
            </select>

        </div>
    </div>
    <div class="form-group row ">
        {!! Form::label("descripcion","Descripcion",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-6">
            <select id="id_tutor" class="form-control" name="id_tutor">

                @foreach($personas as $p)
                    <option value="{{$p->tutor->id }}"  >{{$p->tutor->nombre.' '.$p->tutor->apellido }}</option>
                @endforeach
            </select>

        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar</button>
    {!! Form::submit("Save",["class"=>"btn btn-primary"])!!}
</div>
{!! Form::close() !!}