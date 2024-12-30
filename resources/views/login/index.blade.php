<!doctype html>
<html lang="en">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--Style -->

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="login.css">

<!--Font Google-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #008000;
        }

        .container{
            align-items: center;
            width: 100%;
            display: flex;
            height: 600px;
            max-width: 850px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;

        }


        .login{
            width: 400px;
        }

        form{
            width: 250px;
            margin: 60px auto;
        }

        h1{
            font-size: 25px;
            margin: 20px;
            text-align: center;
            font-weight: bolder;
            text-transform: uppercase;
        }

        .login h2{
            color: #008000;
            font-size: small;
            text-align: center;
            font-weight: 100;
        }

        hr{
            border-top: 2px solid grey;
        }

        p{
            text-align: center;
            max-resolution: 10px;
        }

        .right img{
            align-items:center;
            position: relative;
            top: 20px;
            left: 0px;
            bottom: 0px;
            width: 450px;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .right h2{
            font-size: 20px;
            text-align: center;
            font-weight: bold;
            position: relative;
            bottom: 20px;
        }

        form label{
            display: block;
            font-size: 16px;
            font-weight: 600;
            padding: 5px;
        }

        input{
            width: 100%;
            margin: 5px;
            border: none;
            outline: none;
            padding: 8px;
            border-radius: 10px;
            background: #FFF;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset, 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        }

        button{
            border: none;
            outline: none;
            padding: 8px;
            width: 252px;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            border-radius: 20px;
            background: #008000;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        }


        button:hover{
            background: rgba(214, 86, 64, 1);
        }
    </style>

    <title>Login</title>
</head>
<body>
    <div class="container">
        @if(session()->has('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
             {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
         </div>
        @endif
        @if(session()->has('loginErr'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginErr') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="login">
            <form action="/login" method="post">
                @csrf
                <h1>Login Akun</h1> 
                <h2>Silahkan Masuk Terlebih Dahulu</h2>
                <hr>
                <i class="fa-solid fa-user"></i>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required>
                @error('email')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
                <input type="password" name="password" class="form-control" id="email" placeholder="Password">

                <button type="submit">Login</button>
            </form>
        </div>

        <div class="right">
            <img src="/img/logokp.png" alt="">
        </div>
    </div>

    


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>
</html>
