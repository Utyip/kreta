@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1>Deleted courses</h1>
            <div class="table-responsive-xl">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Student name</th>
                            <th scope="col">Student Birthday</th>
                            <th scope="col">Course</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($student as $item)
                            <tr class="">
                                <td scope="row">{{$item->name}}</td>
                                <td>{{$item->birthday}}</td>
                                <td>{{$item->course_id}}</td>
                                <td>
                                    <form action="{{ route('students.restore', ['student' => $item]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-info">Restore</button>
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