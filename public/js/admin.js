var token = $('meta[name="csrf-token"]').attr('content');
$( document ).ajaxStart(function() {
    $('#voyager-loader').css('background', 'rgba(0, 0, 0, 0.21)').fadeIn();
});
$(document).ajaxStop(function () {
    $('#voyager-loader').fadeOut().css('background', '#F9F9F9');
});

$( "#sortable" ).sortable({

    stop: function(evt, ui) {
        var images = [];
        $('.gallery-multi-image').each(function () {
            images.push($(this).data('image'));
        });
        images = JSON.stringify(images);
        if (image_url) {
            $.ajax({
                url:image_url,
                dataType:'json',
                type:'post',
                data:{images:images,_token:token},
                success:function (data) {
                    if (data.success){
                        toastr.success(data.message);
                    } else{

                        toastr.error(data.message);
                    }
                },
                error:function (data) {
                    toastr.error('please try again');
                }
            });
            console.log(images);
        }
    }
}).disableSelection();



