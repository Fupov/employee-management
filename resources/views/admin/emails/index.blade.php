@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Liste des Courriels') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">email</th>
                            <th scope="col">Date d'envoi</th>
                            <th scope="col">Action</th>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                @can('view', $message)
                                <tr>
                                    <th scope="row"> {{$message->id}} </th>
                                    <td>{{$message->from->email}}</td>
                                    <td>{{$message->to->email}}</td>
                                    <td>{{$message->created_at}}</td>
                                    <td>
                                        <a href="{{route('emails.show',$message->id)}}"><button type="button" class="btn btn-outline-info float-left" >Afficher</button></a>
                                        <a href="{{route('emails.edit',$message->id)}}"><button type="button" class="btn btn-outline-info float-left" >Modifier</button></a>
                                        <form action="{{route('emails.destroy',$message->id)}}" method="post" class="float-left">
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
                        <a href="{{route('emails.create')}}"><button type="button" class="btn btn-primary float-left">Ajouter</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
