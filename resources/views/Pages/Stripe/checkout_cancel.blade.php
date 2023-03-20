<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Success</title>
    <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.0.6') }}" rel="stylesheet" />
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center my-auto">
            <div class="col-3 text-center">
                <h1>CLOSE THIS WINDOW</h1>
            </div>
        </div>
    </div>
<script src="{{ asset('assets/js/plugins/sweetalert.min.js') }}"></script>
<script>
    window.onload = function() {
        // alert('yes');
        Swal.fire(
            {
                title: 'Payment Failed',
                text: 'Close this page to change payment method. Your order and payment was not processed',
                icon: 'error',
                allowOutsideClick: false,
                allowEscapeKey: false,
            }
        )
    };
</script>
</body>
</html>