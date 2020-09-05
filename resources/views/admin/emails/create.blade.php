@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nouveau Courriel</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('emails.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="from_id" class="col-md-4 col-form-label text-md-right">{{ __('Email') }} </label>
                                <input type="hidden" name="from_id" value="{{$authUser->id}}" />
                                <div class="col-md-6 ">
                                    <div class="form-control">{{ $authUser->email  }}</div>
                                </div>
                            </div>
                            <div class="form-group row"><label for="to_id" class="col-md-4 col-form-label text-md-right">{{ __('Email Destinataire') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control @error('to_id') is-invalid @enderror" name="to_id" required>
                                        <option disabled selected value>----------------------------------------------------------------</option>
                                        @foreach($users as $user)
                                            @if ($authUser->id != $user->id)
                                                <option value="{{ $user->id }}" >{{ $user->email  }}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                    @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

                                <div class="col-md-6">
                                    <textarea id="message"  style="width:390px; height:140px;" rows="4" cols="50" type="text" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" required autocomplete="email"></textarea>

                                    @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enregistrer') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
