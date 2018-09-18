
@if(isset($tipopersona))
    {!! Form::model($tipopersona,['method'=>'put','id'=>'frm']) !!}
@else
    {!! Form::open(['id'=>'frm']) !!}
@endif

<div class="modal-header">
    <h5 class="modal-title">{{isset($tipopersona)?'Edit':'New'}} tipopersona</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="form-group row required">
        {!! Form::label("descripcion","Descripcion",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("descripcion",null,["class"=>"form-control".($errors->has('descripcion')?" is-invalid":""),'placeholder'=>'descripcion','id'=>'focus']) !!}
            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>


</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar</button>
    {!! Form::submit("Save",["class"=>"btn btn-primary"])!!}
</div>
{!! Form::close() !!}