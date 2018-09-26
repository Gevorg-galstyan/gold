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
              action="{{ route('profile.update', ['slug' => $data->slug,'changes' => 'edit-login']) }}"
              method="POST" enctype="multipart/form-data" autocomplete="off">

            {{ method_field("PUT") }}
            {{ csrf_field() }}

            <div class="row">
                <div class="col ">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="login">{{ __('generic.user_login') }}</label>
                                    <input type="text" class="form-control" id="login" name="login"
                                           placeholder="{{ __('generic.user_login') }}"
                                           value="@if(isset($data->login)){{ $data->login }}@endif">
                                </div>

                                <div class="form-group">
                                    <label for="password">{{ __('generic.password') }}</label>
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                           autocomplete="new-password">
                                </div>
                                <button type="submit" class="btn btn-primary pull-right save">
                                    {{ __('voyager::generic.save') }}
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </form>

    </div>
@stop

@section('javascript')
    <script>
        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();
        });
        $('input[data-slug-origin]').each(function (i, el) {
            $(el).slugify();
        });
    </script>
@stop
