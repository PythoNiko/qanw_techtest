@extends('layout')

@section('title')
    | Albums
@endsection

@section('content')
    <div class="container bg-white shadow">
        <div class="row">
            <div class="col-md-12">
                <h1>Albums</h1>

                <p>Number of albums: {{ $albumCount }}</p>

                <div class="container bg-white shadow">
                    <div class="row">
                        <table class="table table-strped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Album ID</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Title</th>
                            </tr>
                            </thead>
                            {{-- ToDo: Validation and error handling --}}
                            @if ($albums)
                                @foreach ($albums as $album)
                                    <tr>
                                        <td>
                                            {{ $album->album_id }}
                                        </td>
                                        <td>
                                            {{-- ToDo: Link to User page here --}}
                                            {{ $album->user_id }}
                                        </td>
                                        <td>
                                            {{ $album->title }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="centeredTitleText" colspan="9">
                                        No Albums Found
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </div>
{{--                    <a href="{{route('album.create')}}" class="button noMarginBottom">--}}
{{--                        Add New Album--}}
{{--                    </a>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
