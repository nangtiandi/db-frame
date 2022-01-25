@extends('layouts.master')
@section('content')
    <div class="row my-3">
        <div class="col-md-6 col-xs-12 my-2">
            <div class="card">
                <div class="card-body">
                    <table class="table align-middle">
                        <div class="d-flex align-items-center">
                            <img src="{{asset('storage/profile/'.Auth::user()->photo)}}" alt="" style="width: 100px;height:auto;border-radius: 50%;" class="img-fluid mb-3">
                        </div>

                        <tr>
                            <td>Name</td>
                            <td>{{Auth::user()->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{Auth::user()->email}}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{Auth::user()->phone}}</td>
                        </tr>
                        <tr>
                            <td>Your Bio</td>
                            <td>{{Auth::user()->bio}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12 my-2">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('profile.update-profile')}}" method="post" enctype="multipart/form-data">
                        @csrf
{{--                        <div class="mb-3">--}}
{{--                            <button class="btn btn-outline-secondary mx-3" id="photoBtn">--}}
{{--                                Choose Image <i class="fas fa-plus"></i>--}}
{{--                            </button>--}}
{{--                                <input type="file" name="photo" id="photoInput" class="d-none">--}}
{{--                        </div>--}}
                        <div class="mb-3">
                            <label for="" class="form-label">Your Photo</label>
                            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Your Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Your Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Your Phone Number</label>
                            <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">What is your Bio</label>
                            <textarea name="bio" cols="30" rows="5" class="form-control @error('bio') is-invalid @enderror">{{old('bio')}}</textarea>
                            @error('bio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button class="btn btn-outline-secondary">Upload Your Profile <i class="fas fa-upload"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

