@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <h2>Profile</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('profiles.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('profiles.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Username:</strong>
                                        <input type="text" name="user_name" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Profile Pic:</strong>
                                        <input type="text" name="profile_pic" class="form-control" placeholder="Profile Pic">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>DOB:</strong>
                                        <input type="text" name="dob" class="form-control" placeholder="DOB">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Location of Residence:</strong>
                                        <input type="text" name="residence_location" class="form-control" placeholder="Location of Residence">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Duration of staying in current location:</strong>
                                        <input type="text" name="current_location_staying_duration" class="form-control" placeholder="Duration of staying in current location">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Total Duration of staying abroad:</strong>
                                        <input type="text" name="abroad_staying_duration" class="form-control" placeholder="Total Duration of staying abroad">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Current profession:</strong>
                                        <input type="text" name="current_profession" class="form-control" placeholder="Current profession">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Designation:</strong>
                                        <input type="text" name="designation" class="form-control" placeholder="Designation">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name of the company:</strong>
                                        <input type="text" name="company_name" class="form-control" placeholder="Name of the company">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Office address:</strong>
                                        <input type="text" name="office_address" class="form-control" placeholder="Office address">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Visa status (valid up to/ PR):</strong>
                                        <input type="text" name="visa_status" class="form-control" placeholder="Visa status (valid up to/ PR)">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Passport number:</strong>
                                        <input type="text" name="passport_no" class="form-control" placeholder="Passport number">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Passport valid (d/m/y):</strong>
                                        <input type="text" name="passport_valid" class="form-control" placeholder="Passport valid (d/m/y)">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Contact number:</strong>
                                        <input type="text" name="contact_no" class="form-control" placeholder="Contact number">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email address:</strong>
                                        <input type="text" name="email" class="form-control" placeholder="Email address">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
