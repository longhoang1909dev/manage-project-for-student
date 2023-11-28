<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
    <title>@yield('title')</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        #image-main {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100vw;
            height: 100vh;
            background-image: url('https://plus.unsplash.com/premium_photo-1673480195911-3075a87738b0?auto=format&fit=crop&q=80&w=2070&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
        }

        #login {
            width: 60vw;
            height: 65vh;
            background-color: rgb(255, 255, 255);
            border-radius: 50px;
            overflow: hidden;
        }

        .img-box {
            height: 100%;
            background-image: url("{{ asset('images/login.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: unset;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .img-box img {
            border-radius: 40px;
            width: 88%;
            height: 90%;
            object-fit: cover;
        }

        main {
            margin: unset;
        }

        /* FORM LOGIN */
        .login-box {
            height: 100%;
            padding: 40px;
            box-sizing: border-box;
            border-radius: 10px;
        }

        .login-box h2,
        h5 {
            margin: 0 0 20px;
            padding: 0;
            color: black;
            text-align: center;
        }

        h5 {
            margin-bottom: 50px;
        }

        .login-box .user-box {
            position: relative;
        }

        .login-box .user-box input {
            height: 55px;
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: black;
            margin-bottom: 50px;
            border: none;
            border-bottom: 1px solid black;
            outline: none;
            background: transparent;
        }

        .login-box .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 18px;
            color: black;
            pointer-events: none;
            transition: .3s;
        }

        .login-box .user-box i {
            position: absolute;
            top: 15px;
            right: 10px;
            cursor: pointer;
        }

        .login-box .user-box input:focus~label,
        .login-box .user-box input:valid~label {
            top: -25px;
            left: 0;
            color: black;
            font-size: 17px;
            opacity: 0.8;
        }

        .login-box form a {
            float: right;
        }

        .login-box form button {
            position: relative;
            display: block;
            padding: 10px 15px;
            color: white;
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            margin-top: 40px;
            letter-spacing: 5px;
            background: #626d77;
            border-radius: 5px;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            width: 40%;
        }

        @media (min-width: 1024px) and (max-width: 1440px) {
            .login-box form button {
                width: 65%;
            }

            .img-box {
                width: 55%;
            }

            .login-box {
                width: 45%;
                padding: 40px 20px 40px 0px;

            }
        }

        @media (min-width: 768px) and (max-width: 1023px) {
            .img-box {
                display: none;
            }

            .login-box {
                width: 100%;
            }
        }

        @media (min-width: 425px) and (max-width: 768px) {
            #login {
                height: 80vh;
            }

            .img-box {
                display: none;
            }

            .login-box form button {
                width: 77%;
            }
        }

        .login-box button:hover {
            background: #6c757d;
            color: #fff;
            border-radius: 6px;
            box-shadow: 0 0 5px #03e9f4,
                0 0 25px #03e9f4,
                0 0 50px #03e9f4,
                0 0 100px #03e9f4;
        }

        .login-box button span {
            position: absolute;
            display: block;
        }

        .login-box button span:nth-child(1) {
            top: 0;
            left: -100%;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, transparent, #03e9f4);
            animation: btn-anim1 1s linear infinite;
        }

        @keyframes btn-anim1 {
            0% {
                left: -100%;
            }

            50%,
            100% {
                left: 100%;
            }
        }

        .login-box button span:nth-child(2) {
            top: -100%;
            right: 0;
            width: 3px;
            height: 100%;
            background: linear-gradient(180deg, transparent, #03e9f4);
            animation: btn-anim2 1s linear infinite;
            animation-delay: .25s
        }

        @keyframes btn-anim2 {
            0% {
                top: -100%;
            }

            50%,
            100% {
                top: 100%;
            }
        }

        .login-box button span:nth-child(3) {
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 3px;
            background: linear-gradient(270deg, transparent, #03e9f4);
            animation: btn-anim3 1s linear infinite;
            animation-delay: .5s
        }

        @keyframes btn-anim3 {
            0% {
                right: -100%;
            }

            50%,
            100% {
                right: 100%;
            }
        }

        .login-box button span:nth-child(4) {
            bottom: -100%;
            left: 0;
            width: 3px;
            height: 100%;
            background: linear-gradient(360deg, transparent, #03e9f4);
            animation: btn-anim4 1s linear infinite;
            animation-delay: .75s
        }

        @keyframes btn-anim4 {
            0% {
                bottom: -100%;
            }

            50%,
            100% {
                bottom: 100%;
            }
        }

        /* END FORM LOGIN */

        article>div {
            margin: unset;
        }
    </style>
</head>

<body id="body">
    <div>
        <main>
            <article style="margin: unset;">
                @yield('content')
            </article>
        </main>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>
