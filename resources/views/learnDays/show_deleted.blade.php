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
                            <th scope="col">Title</th>
                            <th scope="col">Date</th>
                            <th scope="col">Course</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($learnDays as $item)
                            <tr class="">
                                <td scope="row">{{$item->name}}</td>
                                <td>{{$item->birthday}}</td>
                                <td>{{$item->course_id}}</td>
                                <td>
                                    <form action="{{ route('learndays.restore', ['learnDays' => $item]) }}" method="POST">
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