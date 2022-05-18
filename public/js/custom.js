
//ajax crud for product
//create product
$('#createproductform').on('submit', function(event) {
event.preventDefault();
    $.ajax({
        url:$(this).attr('action'),
        method:$(this).attr('method'),
        data:new FormData(this),
        processData:false,
        dataType:'json',
        contentType:false,
        beforeSend:function(){
            $(document).find('span.error-text').text('');
        },
        success: function(data)
        {
            if(data.status == 0){
                $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                });
            }else{
                console.log(data.data.category);
                $("#datatable tbody").append('<tr id ="row'+data.data.id+'"><td>'+ data.data.title +'</td><td>'+ data.data.parentCategory +'</td><td>'+ data.data.category +'</td><td>'+ data.data.price +'</td><td>In process</td><td>'+
                '<a href="javascript:void(0)" onclick="editProduct('+data.data.id+')" class="mr-2"><i class="far fa-edit text-info mr-1"></i></a>'+
                '<a class="deleteproduct" data-toggle="modal" data-target="#deleteproduct" data-id="'+data.data.id+'" data-name="'+data.data.title+'"><i class="far fa-trash-alt text-danger"></i></a>'+
                '</td></tr>');
                $('#createproduct').modal('hide');
                Swal.fire(
                'Success!',
                'Product has been listed',
                'success'
                )
            }
        }
    })
});

//edit product

function editProduct(id){
    $.get('/product/'+id,function(product){
        $('#productId').val(product.data.id);
        $('#title').val(product.data.title);
        $('#description').val(product.data.description);
        $('#price').val(product.data.price);
        $('#phone').val(product.data.phone);
        $('#location').val(product.data.location);
        $('#status').val(product.data.status);
        $('#editproduct').modal('toggle');
    })
}

$('#updateproductform').on('submit', function(event) {
    event.preventDefault();
    let id = $('#productId').val();
    let title = $('#title').val();
    let description = $('#description').val();
    let price = $('#price').val();
    let phone = $('#phone').val();
    let location = $('#location').val();
    let status = $('#status').val();
    console.log(id + title + description + price + phone + location + status);
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    $.ajax({
        url:$(this).attr('action'),
        method:'PUT',
        data:{
            productId:id,
            title:title,
            description:description,
            price:price,
            phone:phone,
            location:location,
            status:status

        },
        beforeSend:function(){
            $(document).find('span.error-text').text('');
        },
        success: function(data)
        {
            console.log(data);
            if(data.status == 0){
                $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                });
            }
            else{
                $('#row'+ data.data.id + ' td:nth-child(1)').text(data.data.title);
                $('#row'+ data.data.id + ' td:nth-child(2)').text(data.data.parentCategory);
                $('#row'+ data.data.id + ' td:nth-child(3)').text(data.data.category);
                $('#row'+ data.data.id + ' td:nth-child(4)').text('$'+ data.data.price);
                $('#editproduct').modal('hide');
                Swal.fire(
                'Success!',
                'Product has been updated',
                'success'
                )
            }
        }
    })
});

//delete product

$('.deleteproduct').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var delId = button.data('id')
    var name = button.data('name')
    var modal = $(this)

    modal.find('.modal-content #deleteproductId').val(delId);
    modal.find('.modal-body').html('<h1>You are about to delete product '+name+'<br> Are you sure?</h1>');
})
$('#deleteproductform').on('submit', function(event) {
    event.preventDefault();
    let id = $('#deleteproductId').val();
    let _token = $("input[name=_token]").val();
    $.ajax({
        url: '/productdelete/'+id,
        type:'DELETE',
        data:{
            id:id,
             _token:_token
        },
        success:function(response){
            $('#row'+id).remove();
            $('#deleteproduct').modal('hide');
            Swal.fire(
                'Success!',
                'Product has been deleted',
                'success'
                )
        }
    });
});



//ajax crud for admin
//approve product
function approve(id){
    $.get('/admin/product/'+id,function(application){
        console.log(application);
        $('#id').val(application.data.id);
        $('#category').text(application.data.parentCategory);
        $('#subcategory').text(application.data.category);
        $('#title').text(application.data.title);
        $('#description').text(application.data.description);
        $('#price').text(application.data.price);
        $('#phone').text(application.data.phone);
        $('#location').text(application.data.location);
        $('#status').text(application.data.status);
        if (application.data.image){
            $('#image').attr('src', '/'+application.data.image);
        }
        else {
            $('#image').attr('src', '/images/products/img-7.png');
        }
        $('#approveproduct').modal('toggle');
    })
}
//deny product
function deny(id){
    $.get('/admin/product/'+id,function(application){
        console.log(application.data.id);
        $('#denyid').val(application.data.id);
        $('#denycategory').text(application.data.parentCategory);
        $('#denysubcategory').text(application.data.category);
        $('#denytitle').text(application.data.title);
        $('#denydescription').text(application.data.description);
        $('#denyprice').text(application.data.price);
        $('#denyphone').text(application.data.phone);
        $('#denylocation').text(application.data.location);
        $('#denystatus').text(application.data.status);
        if (application.data.image){
            $('#denyimage').attr('src', '/'+application.data.image);
        }
        else {
            $('#denyimage').attr('src', '/images/products/img-7.png');
        }
        $('#denyproduct').modal('toggle');
    })
}

//delete product
$('.deleteadminproduct').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var delId = button.data('id')
    var name = button.data('name')
    var modal = $(this)

    modal.find('.modal-content #deleteproductadminId').val(delId);
    modal.find('.modal-body').html('<h1>You are about to delete product '+name+'<br> Are you sure?</h1>');
})
$('#deleteproductadminform').on('submit', function(event) {
    event.preventDefault();
    let id = $('#deleteproductadminId').val();
    let _token = $("input[name=_token]").val();
    $.ajax({
        url: '/admin/product/delete/'+id,
        type:'DELETE',
        data:{
            id:id,
            _token:_token
        },
        success:function(response){
            $('#row'+id).remove();
            $('#deleteadminproduct').modal('hide');
            Swal.fire(
                'Success!',
                'Product has been deleted',
                'success'
            )
        }
    });
});
//create user
$('#createuserform').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url:$(this).attr('action'),
        method:$(this).attr('method'),
        data:new FormData(this),
        processData:false,
        dataType:'json',
        contentType:false,
        beforeSend:function(){
            $(document).find('span.error-text').text('');
        },
        success: function(data)
        {
            if(data.status == 0){
                $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                });
            }else{
                $("#datatable tbody").append('<tr id ="row'+data.data.id+'"><td>'+ data.data.firstname +'</td><td>'+ data.data.lastname +'</td><td>'+ data.data.username +'</td><td>'+ data.data.email +'</td>'+
                    '<td>'+data.data.address+'</td><td>'+ data.data.city +'</td><td>'+
                    '<a href="javascript:void(0)" onclick="editCustomer('+data.data.id+')" class="mr-2"><i class="far fa-edit text-info mr-1"></i></a>'+
                    '<a class="deletecustomer" data-toggle="modal" data-target="#deletecustomer" data-id="'+data.data.id+'" data-name="'+data.data.username+'"><i class="far fa-trash-alt text-danger"></i></a>'+
                    '</td></tr>');
                $('#createuser').modal('hide');
                Swal.fire(
                    'Success!',
                    'User has been listed',
                    'success'
                )
            }
        }
    })
});

function editCustomer(id){
    $.get('/admin/customers/edit/'+id,function(product){
        $('#userId').val(product.data.id);
        $('#firstname').val(product.data.firstname);
        $('#lastname').val(product.data.lastname);
        $('#username').val(product.data.username);
        $('#email').val(product.data.email);
        $('#address').val(product.data.address);
        $('#city').val(product.data.city);
        $('#updateuser').modal('toggle');
    })
}

$('#updateuserform').on('submit', function(event) {
    event.preventDefault();
    let id = $('#userId').val();
    let firstname = $('#firstname').val();
    let lastname = $('#lastname').val();
    let username = $('#username').val();
    let email = $('#email').val();
    let address = $('#address').val();
    let city = $('#city').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:$(this).attr('action'),
        method:'PUT',
        data:{
            userId:id,
            firstname:firstname,
            lastname:lastname,
            username:username,
            email:email,
            address:address,
            city:city

        },
        beforeSend:function(){
            $(document).find('span.error-text').text('');
        },
        success: function(data)
        {
            if(data.status == 0){
                $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                });
            }
            else{
                $('#row'+ data.data.id + ' td:nth-child(1)').text(data.data.firstname);
                $('#row'+ data.data.id + ' td:nth-child(2)').text(data.data.lastname);
                $('#row'+ data.data.id + ' td:nth-child(3)').text(data.data.username);
                $('#row'+ data.data.id + ' td:nth-child(4)').text(data.data.email);
                $('#row'+ data.data.id + ' td:nth-child(5)').text(data.data.address);
                $('#row'+ data.data.id + ' td:nth-child(6)').text(data.data.city);
                $('#updateuser').modal('hide');
                Swal.fire(
                    'Success!',
                    'User has been updated',
                    'success'
                )
            }
        }
    })
});

$('.deletecustomer').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var delId = button.data('id')
    var name = button.data('name')
    var modal = $(this)

    modal.find('.modal-content #deletecustomerId').val(delId);
    modal.find('.modal-body').html('<h1>You are about to delete user '+name+'<br> Are you sure?</h1>');
})

$('#deletecustomerform').on('submit', function(event) {
    event.preventDefault();
    let id = $('#deletecustomerId').val();
    let _token = $("input[name=_token]").val();
    $.ajax({
        url: '/admin/customers/delete/'+id,
        type:'DELETE',
        data:{
            id:id,
            _token:_token
        },
        success:function(response){
            $('#row'+id).remove();
            $('#deletecustomer').modal('hide');
            Swal.fire(
                'Success!',
                'Customer has been deleted',
                'success'
            )
        }
    });
});
//$('#')


var firstTime = 1;
function getComboA(elm)
{
    depth = $(elm).attr("data-id");
    // console.log(depth)
    $.ajax({
        url: '/categories/'+elm.value,
        method: 'GET',
        success: function (data) {
            var select = '<option value=""></option>';
            data.forEach((q) =>{
                //console.log(q.id);
                select += '<option value="'+q.id+'">'+q.name+'</option>';
            })
            // console.log(data);
            if (data.length == 0){
                depthId = parseInt(depth) + 1;
                for(depthId; depthId < 500; depthId++){
                    $( "#depth"+depthId ).remove();
                }
                // do{
                //     depthId++
                // }
                // while ($( "#depth"+depthId ).remove())
                firstTime = depth;
            }
            else {


                if (firstTime == depth) {
                    firstTime++;
                    depthId = parseInt(depth) + 1;
                    // console.log(firstTime);
                    $('.selects').append('<div class="row" id="depth' + depthId + '">\n' +
                        '                                    <div class="col-md-12">\n' +
                        '                                        <div class="form-group">\n' +
                        '                                            <label for="firstname">Subcategory</label>\n' +
                        '                                            <select class="form-control" name="category['+parseInt(depth)+']" id="category' + depthId + '" data-id="' + depthId + '" onchange="getComboA(this)">\n' +
                        select +
                        '                                            </select>\n' +
                        '                                            <span class="text-danger error-text category_error"></span>\n' +
                        '                                        </div>\n' +
                        '                                    </div>\n' +
                        '                                </div>'
                    )

                } else {
                    depthId = parseInt(depth) + 1;
                    $('#category' + depthId).html(
                        select
                    )
                    depthId++
                    for(depthId; depthId < 500; depthId++){
                        $( "#depth"+depthId ).remove();
                    }
                }
            }
        },
        error: function (){
            depthId = parseInt(depth) + 1;
            for(depthId; depthId < 500; depthId++){
                $( "#depth"+depthId ).remove();
            }
            // do{
            //     depthId++
            // }
            // while ($( "#depth"+depthId ).remove())
            firstTime = depth;
        }
    });
}


