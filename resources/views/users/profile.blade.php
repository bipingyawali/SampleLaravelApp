@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Profile') }}</div>

                <div class="card-body">
                    @include('flash::message')
                    {!! Form::model($user,['route' =>'users.profile.update', 'method' => 'put','files' => true]) !!}
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                {!! Form::text('name',null, ['class' => 'form-control '.($errors->has("name")? "is-invalid":""), 'autocomplete' => 'name', 'autofocus'=>true]) !!}

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                {!! Form::email('email',null, ['class' => 'form-control '.($errors->has("email")? "is-invalid":""), 'autocomplete' => 'email', 'autofocus'=>true]) !!}
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                {!! Form::text('phone_number',null, ['class' => 'form-control '.($errors->has("phone_number")? "is-invalid":""), 'autocomplete' => 'phone_number', 'autofocus'=>true]) !!}
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                {!! Form::text('address',null, ['class' => 'form-control '.($errors->has("address")? "is-invalid":""), 'autocomplete' => 'address', 'autofocus'=>true]) !!}
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="bio" class="col-md-4 col-form-label text-md-end">{{ __('Bio') }}</label>

                            <div class="col-md-6">
                                {!! Form::textarea('bio',null, ['class' => 'form-control '.($errors->has("bio")? "is-invalid":""), 'autocomplete' => 'bio', 'autofocus'=>true,'rows'=>2]) !!}
                                @error('bio')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>
                            <div class="col-md-6">
                                {!! Form::file('image', ['class' => 'form-control '.($errors->has("image")? "is-invalid":""), 'autocomplete' => 'image', 'autofocus'=>true]) !!}
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <img src="{{ !is_null($user->image) ? asset('storage/'.$user->image) : asset('images/no-image.png') }}" height="200px" id="viewer">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

