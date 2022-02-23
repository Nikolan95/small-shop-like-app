// $('#category1').on('change', function() {
//     alert( this.value );
// });

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
                $("#datatable tbody").append('<tr id ="row'+data[0].id+'"><td>'+ data[0].name +'</td><td>'+ data[0].sub_category.category.name +'</td><td>'+ data[0].sub_category.name +'</td><td>'+ data[0].price +'</td><td>'+
                '<a href="javascript:void(0)" onclick="editProduct('+data[0].id+')" class="mr-2"><i class="far fa-edit text-info mr-1"></i></a>'+
                '<a class="deleteproduct" data-toggle="modal" data-target="#deleteproduct" data-id="'+data[0].id+'" data-name="'+data[0].name+'"><i class="far fa-trash-alt text-danger"></i></a>'+
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
        $('#productid').val(product.id);
        $('#category').val(product.sub_category.category.id);
        $('#subcategory').val(product.sub_category.id);
        $('#name').val(product.name);
        $('#description').val(product.description);
        $('#price').val(product.price);
        $('#editproduct').modal('toggle');
    })
}
$('#updateproductform').on('submit', function(event) {
    event.preventDefault();
    let id = $('#productid').val();
    let category = $('#category').val();
    let subcategory = $('#subcategory').val();
    let name = $('#name').val();
    let description = $('#description').val();
    let price = $('#price').val();
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    $.ajax({
        url:$(this).attr('action'),
        method:$(this).attr('method'),
        data:{
            id:id,
            category:category,
            subcategory:subcategory,
            name:name,
            description:description,
            price:price
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
                $('#row'+ data[0].id + ' td:nth-child(1)').text(data[0].name);
                $('#row'+ data[0].id + ' td:nth-child(2)').text(data[0].sub_category.category.name);
                $('#row'+ data[0].id + ' td:nth-child(3)').text(data[0].sub_category.name);
                $('#row'+ data[0].id + ' td:nth-child(4)').text('$'+ data[0].price);
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
//create product
$('#createproductadminform').on('submit', function(event) {
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
                console.log(data);
                $("#datatable tbody").append('<tr id ="row'+data[0].id+'"><td>'+ data[0].name +'</td><td>'+ data[0].user.username +'</td><td>'+ data[0].sub_category.category.name +'</td><td>'+ data[0].sub_category.name +'</td><td>'+ data[0].price +'</td><td>'+
                    '<a href="javascript:void(0)" onclick="editProductAdmin('+data[0].id+')" class="mr-2"><i class="far fa-edit text-info mr-1"></i></a>'+
                    '<a class="deleteproductadmin" data-toggle="modal" data-target="#deleteproductadmin" data-id="'+data[0].id+'" data-name="'+data[0].name+'"><i class="far fa-trash-alt text-danger"></i></a>'+
                    '</td></tr>');
                $('#createproductadmin').modal('hide');
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

function editProductAdmin(id){
    $.get('/admin/product/'+id,function(product){
        $('#productid').val(product.id);
        $('#userid').val(product.user.id);
        $('#category').val(product.sub_category.category.id);
        $('#subcategory').val(product.sub_category.id);
        $('#name').val(product.name);
        $('#description').val(product.description);
        $('#price').val(product.price);
        $('#editproductadmin').modal('toggle');
    })
}
$('#updateproductadminform').on('submit', function(event) {
    event.preventDefault();
    let id = $('#productid').val();
    let userid = $('#userid').val();
    let category = $('#category').val();
    let subcategory = $('#subcategory').val();
    let name = $('#name').val();
    let description = $('#description').val();
    let price = $('#price').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:$(this).attr('action'),
        method:$(this).attr('method'),
        data:{
            id:id,
            userid:userid,
            category:category,
            subcategory:subcategory,
            name:name,
            description:description,
            price:price
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
                console.log(data);
                $('#row'+ data[0].id + ' td:nth-child(1)').text(data[0].name);
                $('#row'+ data[0].id + ' td:nth-child(2)').text(data[0].user.username);
                $('#row'+ data[0].id + ' td:nth-child(3)').text(data[0].sub_category.category.name);
                $('#row'+ data[0].id + ' td:nth-child(5)').text(data[0].sub_category.name);
                $('#row'+ data[0].id + ' td:nth-child(5)').text('$'+ data[0].price);
                $('#editproductadmin').modal('hide');
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

$('.deleteproductadmin').on('show.bs.modal', function(event) {

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
        url: '/productdelete/'+id,
        type:'DELETE',
        data:{
            id:id,
            _token:_token
        },
        success:function(response){
            $('#row'+id).remove();
            $('#deleteproductadmin').modal('hide');
            Swal.fire(
                'Success!',
                'Product has been deleted',
                'success'
            )
        }
    });
});
