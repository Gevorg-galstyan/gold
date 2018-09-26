@extends('user.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.'.(!is_null($data->getKey()) ? 'edit' : 'add')))

@section('page_header')
    <h1 class="page-title">
        {{ __('voyager::generic.'.(!is_null($data->getKey()) ? 'edit' : 'add')) }}
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <form role="form"
                      class="form-edit-add"
                      action="{{$data->slug ? route('product.update',$data->slug) : route('product.store')}}"
                      method="POST" enctype="multipart/form-data">
                    <!-- PUT Method if we are editing -->
                @if(!is_null($data->getKey()))
                    {{ method_field("PUT") }}
                @endif

                <!-- CSRF TOKEN -->
                    {{ csrf_field() }}
                    @if (count($errors) > 0 && $errors->all()[0])
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{--  Name  --}}
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control"
                                   id="name" name="name"
                                   value="{{$data->translate('en')->name}}"
                                   placeholder="Name">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name_ru">Имя:</label>
                            <input type="text" class="form-control"
                                   id="name_ru" name="name_ru"
                                   value="{{$data->translate('ru')->name}}"
                                   placeholder="Имя">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name_hy">Անուն:</label>
                            <input type="text" class="form-control"
                                   id="name_hy" name="name_hy"
                                   value="{{$data->translate('hy')->name}}"
                                   placeholder="Անուն">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="slug">Slug:</label>
                            <input type="text" class="form-control"
                                   id="name_hy" name="slug"
                                   data-slug-origin="name"
                                   value="{{$data->slug}}"
                                   placeholder="Slug">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="price">Price:</label>
                            <input type="text" class="form-control"
                                   id="price" name="price"
                                   value="{{$data->price}}"
                                   placeholder="price">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="weight">Weight:</label>
                            <input type="text" class="form-control"
                                   id="weight" name="weight"
                                   value="{{$data->weight}}"
                                   placeholder="Slug">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="samples">Samples:</label>
                            <input type="text" class="form-control"
                                   id="samples" name="samples"
                                   value="{{$data->samples}}"
                                   placeholder="Samples">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="quantity">Quantity:</label>
                            <input type="text" class="form-control"
                                   id="quantity" name="quantity"
                                   value="{{$data->quantity}}"
                                   placeholder="Quantity">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="price">Category:</label>
                            <select class="form-control select2" name="category">
                                <optgroup label="Type">
                                    @foreach($categories as $key => $option)
                                        <option value="{{ $option->id }}" {{$data->category_id == $option->id ? 'selected' : ''}}>
                                            {{$option->translate()->name}}
                                        </option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="price">Sipping:</label>
                            <input type="checkbox" name="shipping" class="toggleswitch"
                                   data-on="ka"
                                   data-off="chka"
                                   @if($data->shipping) checked @endif>
                        </div>
                    </div>

                    {{--   Images   --}}

                    @include('user.products.multiple_images')

                    {{--  Short Description  --}}

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="short_description">Short Description</label>
                            <textarea class="form-control" id="short_description" rows="3"
                                      placeholder="Short Description"
                                      name="short_description"
                            >{!! $data->translate('en')->short_description !!}</textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="short_description_ru">Краткое описание</label>
                            <textarea class="form-control" id="short_description_ru" rows="3"
                                      placeholder="Краткое описание"
                                      name="short_description_ru"
                            >{!! $data->translate('ru')->short_description !!}</textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="short_description_hy">Կարճ նկարագրություն</label>
                            <textarea class="form-control" id="short_description_hy" rows="3"
                                      placeholder="Կարճ նկարագրություն"
                                      name="short_description_hy"
                            >{!! $data->translate('hy')->short_description !!}</textarea>
                        </div>
                    </div>

                    {{--   Description  --}}

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="richtext_description">Description</label>
                            <textarea class="form-control richTextBox"
                                      name="description" id="richtext_description">
    @if(isset($data->translate('en')->description))
                                    {{ old('description', $data->description) }}
                                @else
                                    {!! $data->translate('en')->description !!}
                                @endif</textarea>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="richtext_description_ru">Описание</label>
                            <textarea class="form-control richTextBox"
                                      name="description_ru" id="richtext_description_ru">
    @if(isset($data->translate('en')->description))
                                    {{ old('description_ru', $data->translate('ru')->description) }}
                                @else
                                    {!! $data->translate('ru')->description !!}
                                @endif</textarea>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="richtext_description_hy">Նկարագրություն</label>
                            <textarea class="form-control richTextBox"
                                      name="description_hy" id="richtext_description_hy">
    @if(isset($data->translate('en')->description))
                                    {{ old('description_hy', $data->translate('hy')->description) }}
                                @else
                                    {!! $data->translate('hy')->description !!}
                                @endif</textarea>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <button type="submit"
                                class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}
                    </h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'
                    </h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger"
                            id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        $('.toggleswitch').bootstrapToggle();
        $('input[data-slug-origin]').each(function (i, el) {
            $(el).slugify();
        });

        $(document).on('click', '.remove-multi-image', function (e) {
            e.preventDefault();
            $image = $(this).siblings('img');

            params = {
                slug: 'products',
                image: $image.data('image'),
                id: $image.data('id'),
                field: $image.parent().data('field-name'),
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text($image.data('image'));
            $('#confirm_delete_modal').modal('show');
        });

        $('#confirm_delete').on('click', function () {
            $.post('{{ route('user.delete_image') }}', params, function (response) {
                if (response
                    && response.data
                    && response.data.status
                    && response.data.status == 200) {

                    toastr.success(response.data.message);
                    $image.parent().fadeOut(300, function () {
                        $(this).remove();
                    })
                } else {
                    toastr.error("Error removing image.");
                }
            });

            $('#confirm_delete_modal').modal('hide');
        });


                @if(isset($data->id))
        var image_url = '{{route('change_general_image',$data->slug)}}';
                @else
        var image_url = '';
        @endif
    </script>
@stop
