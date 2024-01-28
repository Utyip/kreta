@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col"></div>
    <div class="col">
        <div class="card border-secondary">
            <div class="card-body">
                <h4 class="card-title">{{$student->name}}</h4>

                
                <p>A kurzus neve: {{$student->name}}</p>
                <p>A kurzus leírása: {{$student->birthday}}</p>
                <p>A kurzus leírása: {{$student->course_id}}</p>
                
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>

@endsection