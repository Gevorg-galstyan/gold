@extends('user.master')


@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
        {{--<i class="{{ $dataType->icon }}"></i>--}}
        {{ __('voyager::generic.edit')}}
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form"
              action="{{ route('profile.edit', ['slug' => $data->slug,'changes' => $view])}}"
              method="POST" enctype="multipart/form-data" autocomplete="off">

            {{ method_field("PUT") }}
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-bordered">
                        {{-- <div class="panel"> --}}
                        @if (count($errors) > 0 && $errors->all()[0])
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">{{ __('voyager::generic.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('voyager::generic.name') }}"
                                       value="{{ $data->name }}">
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('voyager::generic.email') }}</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('voyager::generic.email') }}"
                                       value="{{ $data->email }}">
                            </div>

                            {{--<div class="form-group">--}}
                                {{--<label for="login">{{ __('generic.user_login') }}</label>--}}
                                {{--<input type="text" class="form-control" id="login" name="login" placeholder="{{ __('generic.user_login') }}"--}}
                                       {{--value="@if(isset($data->login)){{ $data->login }}@endif">--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label for="password">{{ __('voyager::generic.password') }}</label>--}}
                                {{--@if(isset($data->password))--}}
                                    {{--<br>--}}
                                    {{--<small>{{ __('voyager::profile.password_hint') }}</small>--}}
                                {{--@endif--}}
                                {{--<input type="password" class="form-control" id="password" name="password" value="" autocomplete="new-password">--}}
                            {{--</div>--}}

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-body">
                            <div class="form-group">
                                @if(isset($data->avatar))
                                    <img src="{{ filter_var($data->avatar, FILTER_VALIDATE_URL) ? $data->avatar : Voyager::image( $data->avatar ) }}" style="width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;" />
                                @endif
                                <input type="file" data-name="avatar" name="avatar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary pull-right save">
                {{ __('voyager::generic.save') }}
            </button>
        </form>

    </div>
@stop

@section('javascript')
    <script>
        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();
        });
        $('input[data-slug-origin]').each(function(i, el) {
            $(el).slugify();
        });
    </script>
@stop
