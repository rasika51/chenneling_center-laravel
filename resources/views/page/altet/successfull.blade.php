<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sucessfull</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body onload="showaltet()">
    <script>
        function showaltet() {
            const urlParams = new URLSearchParams(window.location.search);
            const successMessage = urlParams.get('successMessage');
            const goto = urlParams.get('goto');
            const check = urlParams.get('check');
            const msg = urlParams.get('msg');


            Swal.fire({
                icon: check,
                title: msg,
                text: successMessage
            }).then((result) => {

                window.location.href = goto;

            });
        }
    </script>
</body>

</html>
