@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <h2>Profiles</h2>
                        </div>
                        <div class="pull-right">
                            @can('profile-create')
                                <a class="btn btn-success" href="{{ route('profiles.create') }}"> Create Profile</a>
                            @endcan
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Details</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($profiles as $profile)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $profile->name }}</td>
                                    <td>{{ $profile->detail }}</td>
                                    <td>
                                        <form action="{{ route('profiles.destroy',$profile->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('profiles.show',$profile->id) }}">Show</a>
                                            @can('profile-edit')
                                                <a class="btn btn-primary" href="{{ route('profiles.edit',$profile->id) }}">Edit</a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('profile-delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $profiles->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
