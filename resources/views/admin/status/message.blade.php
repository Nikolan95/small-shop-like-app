@foreach($errors->all() as $error)
<div class="alert icon-custom-alert alert-outline-pink b-round fade show" role="alert" id="notificationParrent">
    <i class="mdi mdi-alert-outline alert-icon"></i>
    <div class="alert-text">
        {{$error}}
    </div>
</div>
@endforeach
@if(session('success'))
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script>
        $('document').ready(function () {
            Swal.fire(
                'Success!',
                'Category has been listed',
                'success'
            )
        });
    </script>
@elseif(session('approved'))
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script>
        $('document').ready(function () {
            Swal.fire(
                'Success!',
                'Product has been approved and listed for customers',
                'success'
            )
        });
    </script>
@elseif(session('denied'))
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script>
        $('document').ready(function () {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Product has not been removed from sale',
            })
        });
    </script>
@endif
