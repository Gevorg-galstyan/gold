
    @if(isset($dataTypeContent->images))
        <?php $images = json_decode($dataTypeContent->images); ?>
        @if($images != null)
            @foreach($images as $image)
                <div class="img_settings_container" data-field-name="categories" style="float:left;padding-right:15px;">
                    <img src="{{ Voyager::image( $image ) }}" data-image="images" data-id="{{ $dataTypeContent->id }}"
                         style="max-width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:5px;">
                    <a href="#" class="voyager-x remove-multi-image"></a>
                </div>
            @endforeach
        @endif
    @endif
    <div class="clearfix"></div>


