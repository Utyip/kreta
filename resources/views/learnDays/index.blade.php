@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>Holy guacamole!</strong>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            <div class="table-responsive-xl">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">date</th>
                            <th scope="col">Course</th>
                            <th scope="col" colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($learnDays as $item)
                            <tr class="">
                                <td scope="row">{{ $item->title }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->course->name }}</td>
                                <td>
                                    <form action="{{ route('learnDays.edit', $item) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-warning">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('learnDays.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>

                                    <form action="{{ route('learnDays.show', $item) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-info">Show data</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="col-2"></div>
    </div>
@endsection
