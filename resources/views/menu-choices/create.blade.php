@extends('layouts.wedding')

@section('title', 'Veronika & Alex | Menu Choices')

@section('content')
    <div class="container mt-5">
        @if ($rsvp->attending !== 'attending')
            <div class="row">
                <div class="col-md-12">
                    <h1>Menu Choices</h1>

                    <p>
                        Unfortunately, as you have responded to our invitation as 'not attending', you wont be able to
                        make any menu choices. But please feel free to explore the rest of the website to find out where
                        the venue is, as well as places to stay in the area.
                    </p>
                    @else
                        <form method="POST" action="">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h1>Menu Choices</h1>
                                </div>
                                <div class="card-body">
                                    <h2>Adults</h2>
                                    @foreach($rsvp->adult_choices as $adult)

                                        <div class="card col-md-8 offset-2 mb-3">
                                            <div class="card-header">
                                                Adult {{ $loop->index +1 }}
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="form-group">
                                                        <label for="adult_name[{{ $adult->id }}]">Name</label>
                                                        <input type="text" class="form-control" name="adult_name[{{ $adult->id }}]" id="adult_name[{{ $adult->id }}]"
                                                               value="{{ old('adult_name.'.$adult->id) }}">
                                                        @if ($errors->has('adult_name.'.$adult->id.''))
                                                            <span
                                                                class="text-danger">{{ $errors->first('adult_name.'.$adult->id) }}</span>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-group">
                                                        <label for="name">Starter</label>
                                                        <select name="adult_starter[{{ $adult->id }}]">
                                                            <option class="custom-select" selected>Please select a
                                                                starter
                                                            </option>
                                                            @foreach($adult_starters as $starter)
                                                                <option
                                                                    value="{{ $starter->id }}">{{ $starter->name }}</option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('adult_starter.'.$adult->id.''))
                                                            <p>
                                                            <span
                                                                class="text-danger">{{ $errors->first('adult_starter.'.$adult->id) }}</span>
                                                            </p>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-group">
                                                        <label for="name">Main Course</label>
                                                        <select name="adult_main_course[{{ $adult->id }}]">
                                                            <option class="custom-select" selected>Please select a main
                                                                course
                                                            </option>
                                                            @foreach($adult_main_courses as $main_course)
                                                                <option
                                                                    value="{{ $main_course->id }}">{{ $main_course->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('adult_main_course.'.$adult->id.''))
                                                            <p>
                                                            <span
                                                                class="text-danger">{{ $errors->first('adult_main_course.'.$adult->id.'') }}</span>
                                                            </p>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-group">
                                                        <label for="name">Dessert</label>
                                                        <select name="adult_dessert[{{ $adult->id }}]">
                                                            <option class="custom-select" selected>Please select a
                                                                dessert
                                                            </option>
                                                            @foreach($adult_desserts as $dessert)
                                                                <option
                                                                    value="{{ $dessert->id }}">{{ $dessert->name }}</option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('adult_dessert.'.$adult->id.''))
                                                            <p>
                                                                <span class="text-danger">{{ $errors->first('adult_dessert.'.$adult->id.'') }}</span>
                                                            </p>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-group">
                                                        <label for="adult_requirements[{{ $adult->id }}]">Special/Dietary Requirements</label>
                                                        <input type="text" class="form-control" name="adult_requirements[{{ $adult->id }}]" id="adult_requirements[{{ $adult->id }}]"
                                                               value="{{ old('adult_requirements.'.$adult->id) }}">
                                                        @if ($errors->has('adult_requirements.'.$adult->id.''))
                                                            <span
                                                                class="text-danger">{{ $errors->first('adult_requirements.'.$adult->id) }}</span>
                                                        @endif
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <input type="submit" class="btn btn-lg btn-primary pull-right"
                                                           name="submit"
                                                           value="Save">
                                                </li>

                                            </ul>
                                        </div>
                                    @endforeach

                                    <h2>Children</h2>
                                    @foreach($rsvp->child_choices as $child)

                                        <div class="card col-md-8 offset-2 mb-3">
                                            <div class="card-header">
                                                Child {{ $loop->index +1 }}
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" name="name" id="name"
                                                               value="{{ old('name') }}">
                                                        @if ($errors->has('name'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('name') }}</span>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-group">
                                                        <label for="name">Starter</label>
                                                        <select name="starter">
                                                            <option class="custom-select" selected>Please select a
                                                                starter
                                                            </option>
                                                            @foreach($child_starters as $starter)
                                                                <option
                                                                    value="{{ $starter->id }}">{{ $starter->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('starter'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('starter') }}</span>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-group">
                                                        <label for="name">Main Course</label>
                                                        <select name="main_course">
                                                            <option class="custom-select" selected>Please select a main
                                                                course
                                                            </option>
                                                            @foreach($child_main_courses as $main_course)
                                                                <option
                                                                    value="{{ $main_course->id }}">{{ $main_course->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('main_course'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('main_course') }}</span>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-group">
                                                        <label for="name">Dessert</label>
                                                        <select name="starter">
                                                            <option class="custom-select" selected>Please select a
                                                                dessert
                                                            </option>
                                                            @foreach($child_desserts as $dessert)
                                                                <option
                                                                    value="{{ $dessert->id }}">{{ $dessert->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('dessert'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('dessert') }}</span>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <input type="submit" class="btn btn-lg btn-primary pull-right"
                                                           name="submit"
                                                           value="Save">
                                                </li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
    </div>
@stop
