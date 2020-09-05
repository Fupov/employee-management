@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modification du Courriel</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('emails.update',$email) }}">
                            @csrf
                            {{csrf_field()}}
                            {{method_field('patch')}}
                            <div class="form-group row">
                                <label for="from_id" class="col-md-4 col-form-label text-md-right">{{ __('Email:') }} </label>
                                <input type="hidden" name="from_id" value="{{$email->id}}" />
                                <div class="col-md-6 ">
                                    <div class="form-control">{{ $email->from->email  }}</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="to_id" class="col-md-4 col-form-label text-md-right">{{ __('Email Destinataire') }} </label>
                                <input type="hidden" name="to_id" />
                                <div class="col-md-6 ">
                                    <div class="form-control">{{ $email->to->email  }}</div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

                                <div class="col-md-6">
                                    <textarea id="message"  style="width:390px; height:140px;" rows="4" cols="50" type="text" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ $email->message }}" required></textarea>

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
                                        {{ __("Modifier") }}
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
