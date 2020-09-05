@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __("Page d'accueil") }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{ route('users.index') }}" class="btn btn-link btn-lg btn-block">Gestion des Employées</a>
                        <a href="{{url('/emails/home')}}"  class="btn btn-link btn-lg btn-block">Gestion des courriels</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
