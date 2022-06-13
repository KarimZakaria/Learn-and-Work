@extends('layouts.app')

@section('title', 'All Users')
@section('content')

    <div class="d-flex justify-content-between">

        <a href="{{ route('AdminDashboard') }}" class="btn btn-success"
        style="margin-bottom: 5px">Back</a>

    </div>

    <div class="card card-default">

        <h4 class="card-header text-center">All Users (Editors)</h4>

            <div class="card-body">
                <table class="table table-striped table-bordered bg-dark text-white">
                    <thead>
                      <tr>
                        <th class="text-center text-primary" scope="col">#</th>
                        <th class="text-center text-danger" scope="col">User Name </th>
                        <th class="text-center text-danger" scope="col">Actions </th>

                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <th class="text-center" scope="row">{{$loop->iteration}}</th>
                                <th class="text-center" scope="row">{{ $user->name }}</th>
                                <th class="text-center" scope="row">
                                    <a href="{{ route('Admin.User.destroy' , $user->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </th>
                            </tr>
                        @empty
                            No Categories Yet

                        @endforelse

                    </tbody>
                  </table>
            </div>
    </div>

    @endsection
