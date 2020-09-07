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
                        <a href="{{ route('emails.index') }}" class="btn btn-link btn-lg btn-block"> Boite des Courriels </a>
                            <a href="{{ url('/emails/sent') }}" class="btn btn-link btn-lg btn-block">Courriels Envoyées</a>
                            <a href="{{ route('emails.create') }}"  class="btn btn-link btn-lg btn-block">Nouveau Courriel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
