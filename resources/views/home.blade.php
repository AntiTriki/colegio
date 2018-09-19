@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">Dashboard</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--You are logged in!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<div class="container bootstrap snippet">
    <div class="panel-body inf-content">
        <div style="background-color: #d5fffc" class="row justify-content-center rounded bg-gradient-success">
            <div class="col-md-4">
                <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/user-453533-fdadfd.png" data-original-title="Usuario">
                <ul title="Ratings" class="list-inline ratings text-center">
                    <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <strong>Información</strong><br>
                <div class="table-responsive">
                    <table class="table table-condensed table-responsive table-user-information">
                        <tbody>
                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                    Identificación
                                </strong>
                            </td>
                            <td class="text-primary">
                                {{Auth::user()->codigo}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-user  text-primary"></span>
                                    Nombre
                                </strong>
                            </td>
                            <td class="text-primary">
                                {{Auth::user()->nombre}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-cloud text-primary"></span>
                                    Apellido
                                </strong>
                            </td>
                            <td class="text-primary">
                                {{Auth::user()->apellido}}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-bookmark text-primary"></span>
                                    Usuario
                                </strong>
                            </td>
                            <td class="text-primary">
                                {{Auth::user()->usuario}}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-eye-open text-primary"></span>
                                    Rol
                                </strong>
                            </td>
                            <td class="text-primary">
                                @foreach($tipopersonas as $persona)
                                {{$persona->descripcion}}
                                    @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-envelope text-primary"></span>
                                    Email
                                </strong>
                            </td>
                            <td class="text-primary">
                                noreply@email.com
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-calendar text-primary"></span>
                                    created
                                </strong>
                            </td>
                            <td class="text-primary">
                                20 jul 20014
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-calendar text-primary"></span>
                                    Modified
                                </strong>
                            </td>
                            <td class="text-primary">
                                20 jul 20014 20:00:00
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
