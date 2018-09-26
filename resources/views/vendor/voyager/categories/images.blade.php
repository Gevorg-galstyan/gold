@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop


@section('page_title', $dataType->display_name_singular.' '.__('generic.images'))
@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">


                            <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                                            data-target="#modal-media">
                                        @lang('generic.choose_user_image')
                                    </button>
                                </div>
                                <form role="form"
                                      action="{{route('category.save_image',$dataTypeContent->id)}}"
                                      method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group">
                                        <input type="file" name="images[]" multiple="multiple" accept="image/*">
                                    </div>
                                    <div class="panel-footer">
                                        <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                                    </div>
                                </form>

                            </div>


                            <div class="form-group  col-md-12">
                                @include('vendor.voyager.categories.multiple_images')
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('vendor.voyager.categories.media_modal')
@stop
@section('javascript')

    <script>
        MediaManager();

        $(document).ajaxStop(function () {
            if (parseInt($('.image-name').length) > 0) {
                $('.image-name').each(function () {
                    //
                    var image_name = $(this).data('image');
                    var array = image_name.split('-');
                    array = array[array.length - 1].split('.');
                    if (array[0] == 'cropped') {
                        $(this).parent('.file_link').parent('.file_link_li').remove();
                    }
                })

            }
        });

        function select_cat_image() {
            cat_image_save();
        }

        $('.choose-image').click(function () {
            cat_image_save();
        });

        function cat_image_save() {
            var image = $('.selected').find('.image-name').data('image');
            if (image) {
                $.ajax({
                    url: '{{route('category.select_images', $dataTypeContent->id)}}',
                    type: 'post',
                    data: {image: image, _token: token},
                    success: function (data) {
                        if (data) {
                            $('#modal-media').modal('hide')
                        }
                    }
                })
            }

        }
    </script>

@endsection