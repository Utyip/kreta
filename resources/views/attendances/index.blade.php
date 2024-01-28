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
                <table class="table table-dark" id="courseTable">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">name</th>
                            @foreach ($LearnDays as $item)
                                <th scope="col">{{ $item->date }}</th>
                            @endforeach

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($LearnDays as $item)
                            {{ $id = $item->id }}
                            @foreach ($item->attendance as $item2)
                                <tr>
                                    <td class="text-center">
                                        {{ $item2->student->name }}
                                    </td>

                                    @if ($item2->learn_day_id == $id)
                                        @if ($item2->learn_day_id == 1)
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    {{ $item2->status }}
                                                </button>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        @endif
                                        @if ($item2->learn_day_id == 2)
                                            <td></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    {{ $item2->status }}
                                                </button>
                                            </td>
                                            <td></td>
                                        @endif
                                        @if ($item2->learn_day_id == 3)
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    {{ $item2->status }}
                                                </button>
                                            </td>
                                        @endif
                                    @else
                                    @endif

                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="col-2"></div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <div class="card border-secondary">
                            <div class="card-body">
                                <form action="{{ route('attendances.index', $item2) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <input type="number" name="status" id="status" class="form-control"
                                            placeholder="1" aria-describedby="helpId" min="1" max="3"
                                            value="{{ old('status', $item2->status) }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>

            </div>
        </div>
    </div>
@endsection


<script>
    $(document).ready(function() {
        $('#courseTable').DataTable({
            "language": {
                "search": "Keresés: ",
                "lengthMenu": "_MENU_ sor mutatása",
                "zeroRecords": "Nothing found - sorry",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)"
            },
            ordering: false,
        });
    });

    /*         let table = new DataTable('#courseTable');
     */
</script>
