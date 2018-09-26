<br>
@if(isset($data->images))
    <?php $images = json_decode($data->images); ?>
    @if($images != null)
        <div id="sortable">
            @foreach($images as $image)

                <div class="img_settings_container ui-state-default col-md-2" data-field-name="images"
                     style="float:left;padding-right:15px;">
                    <a href="#" class="voyager-x remove-multi-image"></a>
                    <img src="{{str_replace('.jpg','-cropped.jpg', Voyager::image( $image ))  }}"
                         data-image="{{ $image }}" data-id="{{ $data->id }}"
                         style=" clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:5px;"
                         width="100%" class="gallery-multi-image">
                </div>
            @endforeach
        </div>

    @endif
@endif
<div class="clearfix"></div>
<div class="form-group">
    <label for="images">Images</label>
    <input type="file" name="images[]" id="images" multiple="multiple"
           accept="image/*" {{(!is_null($data->getKey()) ? '' : 'required')}}>
</div>