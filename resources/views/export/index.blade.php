@extends('layouts.wedding')

@section('title', 'Veronika & Alex | Contact')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Export</h1>

                <h2>People who have not made their food choices:</h2>
                <table class="table table-hover table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Adults</th>
                        <th>Children</th>
                    </tr>
                    @foreach($incompletes as $incomplete)
                        <tr>
                            <td>{{ $incomplete->name }}</td>
                            <td>{{ $incomplete->adult_choices()->count() }}</td>
                            <td>{{ $incomplete->child_choices()->count() }}</td>
                        </tr>
                    @endforeach

                </table>

                <hr>
                <h2>People who have made their food choices:</h2>
                <p>{{ $completed }} out of {{ $total }} have made their choices</p>
                <table class="table table-hover table-striped table-responsive">
                    <tr>
                        <th>Person Name</th>
                        <th>Starter</th>
                        <th>Main Course</th>
                        <th>Dessert</th>
                        <th>Requirements</th>
                    </tr>
                    @foreach($adults as $adult)
                        <tr>
                            <td>{{ $adult->name }}</td>
                            <td>{{ $adult->starter->name }}</td>
                            <td>{{ $adult->main_course->name }}</td>
                            <td>{{ $adult->dessert->name }}</td>
                            <td>{{ $adult->dietary }}</td>
                        </tr>
                    @endforeach
                    @foreach($children as $child)
                        <tr>
                            <td>{{ $child->name }}</td>
                            <td>{{ $child->starter->name }}</td>
                            <td>{{ $child->main_course->name }}</td>
                            <td>{{ $child->dessert->name }}</td>
                            <td>{{ $adult->dietary }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@stop
