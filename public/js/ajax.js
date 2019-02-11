$(document).ready(function () {
    $('.submitForm').submit(function () {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: webUrl + '/store_data',
            type: 'POST',
            data: $('.submitForm').serialize(),
            dataType: 'html',
            success: function (data) {
                //.$('#container').html(data);
                location.reload();
            }
        });
    });

    $('.AddBlogForm').submit(function () {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: webUrl + '/ajax_post',
            type: 'POST',
            data: $('.AddBlogForm').serialize(),
            dataType: 'html',
            success: function (data) {
                //.$('#container').html(data);
                location.reload();
            }
        });
    });
    
    //////////////////

});