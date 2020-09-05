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
                                    <th>Intitulé :</th>
                                    <td> {{$user->id}} </td>
                                </tr>
                            </div>
                            <div>
                                <tr>
                                    <th>Nom :</th>
                                    <td>{{$user->name}}</td>
                                </tr>
                            </div>
                            <div>
                                <tr>
                                    <th>Prénom :</th>
                                    <td>{{$user->prenom}}</td>
                                </tr>
                            </div>
                            <div>
                                <tr>
                                    <th>Numéro de Téléphone :</th>
                                    <td>{{$user->phone}}</td>
                                </tr>
                            </div>
                            <div>
                                <tr>
                                    <th>Division :</th>
                                    <td>{{$user->departement->name}}</td>
                                </tr>
                            </div>
                            <div>
                                <tr>
                                    <th>Role :</th>
                                    <td>{{$user->roles->first()->name }}
                                        </td>
                                </tr>
                            </div>
                            <div>
                                <tr>
                                    <th>Adresse Mail :</th>
                                    <td>{{$user->email}}</td>
                                </tr>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
