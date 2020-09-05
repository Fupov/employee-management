@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Liste des Employées') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                @can('view', $user)
                                <tr>
                                    <th scope="row"> {{$user->id}} </th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->prenom}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a href="{{route('users.show',$user->id)}}"><button type="button" class="btn btn-outline-info float-left" >Afficher</button></a>

                                            <a href="{{route('users.edit',$user->id)}}"><button type="button" class="btn btn-outline-info float-left" >Modifier</button></a>

                                            <form action="{{route('users.destroy',$user)}}" method="post" class="float-left">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                                            </form>

                                    </td>
                                </tr>
                                @endcan
                            @endforeach
                            </tbody>
                        </table>
                        @can('create-users',$user)
                        <a href="{{route('users.create')}}"><button type="button" class="btn btn-primary float-left">Ajouter</button></a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
