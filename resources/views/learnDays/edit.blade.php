@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div class="card border-secondary">
                <div class="card-body">
                    <h4 class="card-title">Edit the title: {{$learnDay->title}}</h4>
                    @if ($errors->any())
                        <div class="mb-3 mt-3">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <strong>ÁHHHHHHHHHHH</strong>

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
               true;       </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         
                            <strong>ÁHHHHHHHHHHH!</strong> 
                            <p>{{Session::get('success')}}</p>
                        </div>
                    @endif

                    <form action="{{ route('learnDays.update', $learnDay) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control @if($errors->has('title')) border border-danger @endif"
                                placeholder="learnDay Title" aria-describedby="helpId" value="{{old('title', $learnDay->title)}}">

                            @if ($errors->has('title'))
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                            @else
                                <small id="helpId" class="text-muted">The title of the learn day.</small>
                            @endif

                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">date</label>
                            <input type="date" name="date" id="date" class="form-control"
                                aria-describedby="helpId" value="{{old('date', $learnDay->date)}}">
                            <small id="helpId" class="text-muted">Birtday of the student.</small>
                        </div>
                        <div class="mb-3">
                            <label for="course_id" class="form-label">Course id</label>
                            <input type="number" name="course_id" id="course_id" class="form-control" placeholder="1" aria-describedby="helpId"  min="1" max="3" value="{{old('name',$learnDay->course_id)}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>

@endsection
