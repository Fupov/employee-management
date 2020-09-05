@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Informations') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <div>
                                <tr>
                                    <th>Intitulé:</th>
                                    <td> {{$messages->id}} </td>
                                </tr>
                            </div>
                            <div>
                                <tr>
                                    <th>E-mail :</th>
                                    <td>{{$messages->from->email}}</td>
                                </tr>
                            </div>
                            <div>
                                <tr>
                                    <th>Email Destinataire :</th>
                                    <td>{{$messages->to->email}}</td>
                                </tr>
                            </div>
                            <div>
                                <tr>
                                    <th>Message :</th>
                                    <td>{{$messages->message}}</td>
                                </tr>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
