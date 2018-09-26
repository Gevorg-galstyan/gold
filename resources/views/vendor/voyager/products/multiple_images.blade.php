<br>
@if(isset($dataTypeContent->{$row->field}))
    <?php $images = json_decode($dataTypeContent->{$row->field}); ?>
    @if($images != null)
        <div id="sortable">
            @foreach($images as $image)

                <div class="img_settings_container ui-state-default col-md-2" data-field-name="{{ $row->field }}" style="float:left;padding-right:15px;">
                    <a href="#" class="voyager-x remove-multi-image"></a>
                    <img src="{{str_replace('.jpg','-cropped.jpg', Voyager::image( $image ))  }}" data-image="{{ $image }}" data-id="{{ $dataTypeContent->id }}" style=" clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:5px;" width="100%" class="gallery-multi-image">
                </div>
            @endforeach
        </div>

    @endif
@endif
<div class="clearfix"></div>
<input @if($row->required == 1) required @endif type="file" name="{{ $row->field }}[]" multiple="multiple" accept="image/*">
