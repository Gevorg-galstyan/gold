@extends('user.master')


@section('page_header')
    @can('add',app('App\Models\Product'))
        <div class="container-fluid">
            <a href="{{ route('product.create') }}" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
            </a>
        </div>
    @endcan
@stop



@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row">
                    @foreach($data as $result)
                        @php($images = json_decode($result->images))
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card">
                                <img class="card-img-top"
                                     src="{{!isset($images[0])? asset('storage/default_images/product.png') : str_replace('.jpg','-cropped.jpg', Voyager::image( $images[0] ))}}"
                                     alt="Card image cap" width="100%">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#0" title="View Product">{{$result->translate()->name}}</a>
                                    </h4>
                                    <p class="card-text">
                                        {{$result->translate()->sort_description}}
                                    </p>
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{route('product.edit', $result->slug)}}"
                                               class="btn btn-info btn-block">
                                                Edit
                                            </a>
                                        </div>
                                        <div class="col">

                                            <a href="javascript:;" class="btn btn-sm btn-danger pull-right delete"
                                               data-id="{{$result->slug}}"
                                               data-url="{{route('product.destroy', $result->slug)}}">
                                                Delete
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-12">
                    <nav>
                        {{$data->links()}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="{{ __('voyager::generic.close') }}"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i
                                class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower('Product') }}
                        ?</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="{{ __('voyager::generic.delete_confirm') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right"
                            data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('javascript')
    <script>
        $(document).on('click', '.delete', function (e) {
            $('#delete_form')[0].action = $(this).data('url');
            $('#delete_modal').modal('show');
        });
    </script>
@stop