@extends('layouts.app')
@section('css')
    <style>
        .loading {
            background: lightgrey;
            padding: 15px;
            position: fixed;
            border-radius: 4px;
            left: 50%;
            top: 50%;
            text-align: center;
            margin: -40px 0 0 -50px;
            z-index: 2000;
            display: none;
        }

        a, a:hover {
            color: white;
        }

        .form-group.required label:after {
            content: " *";
            color: red;
            font-weight: bold;
        }
        input[id="delete_id"] {
            display: none;
        }
    </style>
@endsection
@section('content')
    <!-- Modal -->

    <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modal_content"></div>
        </div>
    </div>
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Seguro?</p>
                    <input type="hidden" id="delete_token"/>
                    <input type="text" id="delete_id"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="ajaxDelete('{{url('grado/delete')}}/'+$('#delete_id').val(),$('#delete_token').val())">
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="content">
        @include('grado.index')

    </div>
    <div class="loading">
        <i class="fa fa-refresh fa-spin fa-2x fa-fw"></i><br/>
        <span>Cargando</span>
    </div>
@endsection
@section('js')


@endsection