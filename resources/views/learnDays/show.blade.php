@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col"></div>
    <div class="col">
        <div class="card border-secondary">
            <div class="card-body">
                <h4 class="card-title">{{$learnDay->name}}</h4>

                
                <p>A kurzus neve: {{$learnDay->name}}</p>
                <p>A kurzus leírása: {{$learnDay->birthday}}</p>
                <p>A kurzus leírása: {{$learnDay->course_id}}</p>
                
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>

@endsection