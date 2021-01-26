@extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Profile</div>
                    <div class="card-body">
                        <form method="POST"  action="{{route('admin.editprofile')}}">
                          @csrf
                          <div class="form-group row">
                            <label for="Name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input type="hidden" value="{{auth()->user()->id}}"  name="id"> 
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" value="{{Auth()->user()->name}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>
  
                              <div class="col-md-6">
                                  <input id="email" disabled type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" value="{{auth()->user()->email}}">
  
                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                        </div>
                        <div class="form-group row">
                            <label for="is-super" class="col-md-4 col-form-label text-md-right">{{ __('Super') }}</label>

                            <div class="col-md-6">
                                <input id="is-super" type="checkbox" class="form-control" name="is_super" required value="{{auth()->user()->is_super==1 ? 1 : 0  }}">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Submit') }}
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