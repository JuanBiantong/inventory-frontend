<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>


    <!-- Custom styles for this template -->
    <link href="styles/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form>

            <h1 class="h3 mb-3 fw-normal">Login</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="username">
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password">
                <label for="password">Password</label>
            </div>

            <div class="checkbox mb-3">
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" id="submit" onclick="myFunction(event)">Sign
                in</button>

        </form>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <script type="text/javascript">
    function myFunction() {
        // Stop form from submitting normally
        event.preventDefault();
        // let dataSet = new FormData();
        // dataSet.append('username', $('#username').val());
        // dataSet.append('password', $('#password').val())
        let dataSet = new FormData();
        dataSet.append('username', $('#username').val().trim());
        dataSet.append('password', $('#password').val().trim());

        if (dataSet != "") {
            $.ajax({
                contentType: false,
                processData: false,
                type: 'POST',
                url: 'http://localhost:5000/api/user/login',
                data: dataSet,
                success: function(result) {
                    localStorage.setItem('token', result.token)
                    window.location.replace("/pages/product.php");
                },
                error: function(jqXHR) {
                    Swal.fire(jqXHR.responseJSON.error);
                },

                // type: 'POST',

                // success: function(response) {
                //     console.log('hi1');
                //     var msg = "";
                //     if (response == 1) {
                //         // window.location = "product.php";
                //     } else {
                //         console.log('hi2');
                //         msg = "Invalid username and password!";
                //     }
                //     console.log('hi3');
                //     $("#message").html(msg);
                // }
            });
        }

    }
    </script>


</body>

</html>