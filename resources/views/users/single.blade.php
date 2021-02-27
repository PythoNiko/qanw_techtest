@extends('layout')

@section('title')
    | {{ $user->name }}
@endsection

@section('content')
    <div class="container bg-white shadow">
        <div class="row">
            <div class="col-md-12">
            <h1>{{ $user->name }}</h1>

                <div class="container bg-white shadow">
                    <div class="row">
                        <table class="table table-strped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">City</th>
                                <th scope="col">Phone</th>
                            </tr>
                            </thead>
                            {{-- ToDo: Validation and error handling --}}
                            @if ($user)
                                    <tr>
                                        <td>
                                            {{ $user->username }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->city }}
                                        </td>
                                        <td>
                                            {{ $user->phone }}
                                        </td>
                                    </tr>
                            @else
                                <tr>
                                    <td class="centeredTitleText" colspan="9">
                                        User Not Found
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
