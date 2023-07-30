@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="section-body">
                <h2 class="section-title">Hi, {{ Auth::user()->name }}</h2>
                <p class="section-lead">
                    Change information about yourself on this page.
                </p>

                <div class="row mt-sm-4">

                    <div class="col-12 col-md-12 col-lg-5">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt="image" src="{{asset(Auth::user()->image)}}" class="rounded-circle profile-widget-picture">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-7">

                        <div class="card">
                            <form method="post"  class="needs-validation" novalidate="" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header">
                                    <h4>Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-7 col-12">
                                            <label>Name</label>
                                            <input type="text"  name='name' class="form-control" value="{{ Auth::user()->name }}">
                                            <div class="invalid-feedback">
                                                Please fill in the first name
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-7 col-12">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                            <div class="invalid-feedback">
                                                Please fill in the email
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Profile Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-7">
                        <div class="card">
                            <form method="post" class="needs-validation" novalidate="" action="{{route('admin.password.update')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header">
                                    <h4>Update Password</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-12">
                                            <label>Current Password</label>
                                            <input type="password" name="current_password" class="form-control" >
                                        </div>
                                        <div class="form-group col-12">
                                            <label>New Password</label>
                                            <input type="password" name="password" class="form-control" >
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" >
                                        </div>

                                    </div>


                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
