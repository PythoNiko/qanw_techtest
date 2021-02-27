@extends('layout')

@section('title')
    | Users
@endsection

@section('content')
    <div class="container bg-white shadow">
        <div class="row">
            <div class="col-md-12">
                <h1>Users</h1>

                <p>Number of users: {{ $userCount }}</p>

                <div class="container bg-white shadow">
                    <div class="row">
                        <table class="table table-strped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Street</th>
                                <th scope="col">Zipcode</th>
                                <th scope="col">City</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Website</th>
                                <th scope="col">Company Name</th>
                            </tr>
                            </thead>
                            {{-- ToDo: Validation and error handling --}}
                            @if ($users)
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <a href="{{ route('users.show', ['user' => $user]) }}">{{ $user->name }}</a>
                                        </td>
                                        <td>
                                            {{ $user->address_line_1 }}
                                        </td>
                                        <td>
                                            {{ $user->zipcode }}
                                        </td>
                                        <td>
                                            {{ $user->city }}
                                        </td>
                                        <td>
                                            {{ $user->phone }}
                                        </td>
                                        <td>
                                            {{ $user->website }}
                                        </td>
                                        <td>
                                            {{ $user->company_name }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="centeredTitleText" colspan="9">
                                        No Users Found
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
