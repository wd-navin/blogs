$(document).ready(function () {
    ////// DONATION ////

    //// GET DATA ///
    $('#donationModal').on('click', function () {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: webUrl + '/ajax_list',
            type: 'POST',
            dataType: 'json',
            success: function (response) {

                $('#DonationModal').modal('show');
                $('.cat-data').html('');
                $.each(response.data, function (key, val) {
                    //alert(key + val);
                    $('.cat-data').append('<option value="' + val.id + '">' + val.product_name + '</option>');
                });
            }
        });
    });

    ////// STORE DATA ////
    $('.AddData').submit(function () {
        var image = $('.AddData')[0];
        var images = new FormData(image);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            enctype: 'multipart/form-data',
            url: webUrl + '/store_data',
            type: 'POST',
            data: images,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (data) {
                console.log(data)
                $('#DonationModal').modal('hide');
                //$('.AddData input').val('');
                var myarray = [];
                $.each(data.image, function (key, val) {
                    myarray.push('<img src="' + val.image + '" width="50">')
                });
                $('.append').prepend('<tr>\n\
                <th scope="row">' + data.data.id + '</th>\n\
                <td>' + data.data.category_id + '</td>\n\
                <td>' + data.data.city + '</td>\n\
                <td>' + data.data.state + '</td>\n\
                <td>' + myarray + '</td>\n\
                <td><button data-id="' + data.data.id + '" class="deleteRecord btn btn-danger btn-sm">\n\
                Delete </button> \n\
                <a href="http://blogs.local/edit_data/' + data.data.id + '" class="btn btn-danger btn-sm">Edit</a>\n\
                </td></tr>');
                $('.cardappend').prepend('<div class="col-md-3  col-sm-6">\n\
<div class="product-grid">\n\
<div class="product-image">\n\
<img src="'+data.image[0].image+'" width="50"> \n\
</div>\n\
 <div class="product-content">\n\
<h3 class="title">\n\
<a href="#" style="color: rgb(0, 0, 0);">Sweeters </a>\n\
</h3>\n\
 <div class="price">\n\
<p>delhi</p>\n\
</div>\n\
 <div class="price">\n\
<p>Uttrakhand</p>\n\
</div>\n\
</div>\n\
</div></div>')
            }
        });
    });

/////  DELETE DATA /////
    $(document).on("click", ".deleteRecord", function () {
        var id = $(this).attr("data-id");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: webUrl + "/users_destroy",
            type: 'DELETE',
            data: {ids: id},
            dataType: 'json',
            context: this,
            success: function (data) {
                if (data.message == 'success') {
                    $(this).parents('tr').remove();
                } else {
                    alert(data.message)
                }
            }
        });
    });

    ///... delete image..///
    $('.deleteImage').on('click', function () {
        var image_id = $(this).attr('img_id');
        //alert(image_id); return false;

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: webUrl + '/del_image',
            type: 'DELETE',
            data: {id: image_id},
            dataType: 'json',
            context: this,
            success: function (data) {
                if (data.message == 'success')
                {
                    $(this).parent('div').remove();
                    //$(this).parent('div').remove();
                } else {
                    alert(data.message);
                }
            }

        });
    });

    /////..... EDIT/GET DATA .... ////
    var myarray = [];
    $(document).on('click', '.editrecord', function () {

        myarray.push($(this).parents('tr').html());
        var d_id = $(this).attr('edit-data-id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            enctype: 'multipart/form-data',
            url: webUrl + '/edit_data',
            type: 'get',
            data: {don_id: d_id},
            dataType: 'json',
            success: function (response) {
                $('#EditDonationModal').modal('show');
                $('#category-id').html('');
                // get fields values
                $('#donation-id').val(response.data.id);
                $('#user-id').val(response.data.user_id);
                $('#user-city').val(response.data.city);
                $('#state').val(response.data.state);
                $.each(response.cat, function (key, val) {
                    response.data.category_id == val.id
                            ? $('#category-id').append('<option value="' + val.id + '" selected>' + val.product_name + '</option>')

                            : $('#category-id').append('<option value="' + val.id + '" >' + val.product_name + '</option>')

                });


                var myarray = [];
                $('.viewimages').html('');
                $.each(response.image, function (key, val) {
                    $('.viewimages').append('<img src="' + val.img + '" width="50"/>')
                });


            }
        });
    });

    ///////......... UPDATE DATA ...../////

    $('.UpdateData').submit(function () {
        var image = $('.UpdateData')[0];
        var images = new FormData(image);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            enctype: 'multipart/form-data',
            url: webUrl + '/update',
            type: 'POST',
            data: images,
            dataType: 'json',
            processData: false,
            contentType: false,
            context: this,
            success: function (data) {
                console.log($('#' + data.data.id))
                $('#EditDonationModal').modal('hide');
                $('#' + data.data.id).find('#city-id').html(data.data.city);
                $('#' + data.data.id).find('#state-id').html(data.data.state);
                $('#' + data.data.id).find('#cat-id').html(data.data.category_id);
                $('#' + data.data.id).find('.appendImges').html('');
                $.each(data.image, function (key, val) {
                    $('#' + data.data.id).find('.appendImges').append('<img src="' + webUrl + val.image + '" width="50">')

                });
                // get fields values


            }
        });
    });



    ///////  CATEGORY AJAX ///////

    /////// GET DATA /////////
    $("#CategoryAddData").on('click', function () {
        $("#CategoryModal").modal('show');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: webUrl + '/cat_ajax',
            type: 'post',
            dataType: 'json',
            success: function (data) {
                $('.catData').html('');
                $.each(data.dataData, function (key, val) {
                    $('.catData').append('<option value="' + val.id + '">' + val.name + '</option>');
                });

            }


        });
    });

    /////// ADD DATA /////////
    $('.AddCatData').submit(function () {
        var cat_data = $('.AddCatData').serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: webUrl + '/store',
            type: 'post',
            data: cat_data,
            dataType: 'json',
            context: this,
            success: function (category)
            {
                $('#CategoryModal').modal('hide');
                $('.AddCatData input').val('');
                $('.appenddata').prepend('<tr>\n\
                <th scope="row">' + category.data.id + '</th>\n\
                <td>' + category.data.product_name + '</td>\n\
                <td>' + category.data.data_id + '</td>\n\
                <td><button cat-id="' + category.data.id + '" class="btn btn-primary btn-sm cat_delete">delete</button></td>\n\
                 </tr>')
            }
        });
    });

    /////// DELETE DATA /////////
    $(document).on('click', '.cat_delete', function () {
        var cat_id = $(this).attr('cat-id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'category',
            type: 'delete',
            data: {catid: cat_id},
            dataType: 'json',
            context: this,
            success: function (data) {
                if (data.message == 'success') {
                    $(this).parents('tr').remove();
                } else {
                    alert(data.message);
                }
            }
        });
    });

    /////// UPDATE DATA /////////


    //////////////////

});