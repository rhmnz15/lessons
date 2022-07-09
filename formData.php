<?php

require_once "get_request.php";
require_once "post_request.php";

if (isset($_POST['login'])) {
    $arr = array(
        "email" => $_POST['email'],
        "password" => $_POST['password']
    );

    $login = json_decode(post_request("https://account.lumintulogic.com/api/login.php", json_encode($arr)));
    // var_dump($login);


    $access_token = $login->data->accessToken;

    if ($login->{'success'}) {
        $userData = json_decode(http_request("https://account.lumintulogic.com/api/user.php", $access_token));
        session_start();
        $_SESSION['user_data'] = $userData;
        setcookie('X-LUMINTU-REFRESHTOKEN', $access_token, time() + (86400 * 30));


        // var_dump($_COOKIE['X-LUMINTU-REFRESHTOKEN']);
        // die;

        switch ($userData->{'user'}->{'role_id'}) {
            case 1:
                // Admin
                break;
            case 2:
                // Mentor
                header("location: role-mentor/list-modul.php");
                break;
            default:
                break;
        }

        // var_dump($_SESSION['user_data']);
        // var_dump($_COOKIE['X-LUMINTU-REFRESHTOKEN']);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <!-- <form action="" method="POST">
        <label for="email">Email: </label>
        <input type="text" name="email" id="email">
        <br>
        <label for="password">Password: </label>
        <input type="text" name="password" id="password">
        <br>
        <button type="submit" id="login" name="login">Login</button>
    </form> -->


    <section class="h-full gradient-form bg-gray-200 md:h-screen">
        <div class="container py-12 px-6 h-full">
            <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
                <div class="xl:w-10/12">
                    <div class="block bg-white shadow-lg rounded-lg">
                        <div class="lg:flex lg:flex-wrap g-0">
                            <div class="lg:w-6/12 px-4 md:px-0">
                                <div class="md:p-12 md:mx-6">
                                    <div class="text-center">
                                        <img class="mx-auto w-48 mb-4" src="asset/img/logo/Logo-prokid.png" alt="logo" />

                                    </div>
                                    <form method="POST">

                                        <div class="mb-4">
                                            <input type="text" name="email" id="email" class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput1" placeholder="Email" />
                                        </div>
                                        <div class="mb-4">
                                            <input type="text" name="password" id="password" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput1" placeholder="Password" />
                                        </div>
                                        <div class="text-center pt-1 mb-12 pb-1">
                                            <button id="login" name="login" class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3" type="submit" data-mdb-ripple="true" data-mdb-ripple-color="light" style="background: linear-gradient( to right,#ee7724,  #d8363a,
                          #dd3675,
                          #b44593
                        );
                      ">
                                                Log in
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div class="lg:w-6/12 flex items-center lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none" style="
                background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
              ">
                                <div class="text-white px-4 grid grid-cols-2">
                                    <img src="asset/gambar/scol.png" alt="">
                                    <div class="mt-10">
                                        <h4 class="text-xl font-semibold mb-6">Prokidz</h4>
                                        <p class="text-sm">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua.
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // $("#login").click(function(e) {
        //     e.preventDefault();

        //     let emailVal = $("#email").val();
        //     let passwordVal = $("#password").val();

        //     let data = {
        //         "email": emailVal,
        //         "password": passwordVal
        //     }

        //     $.ajax({
        //         url: "http://103.129.221.147/gradit/api/login.php",
        //         data: JSON.stringify(data),
        //         type: "post",
        //         success: function(data) {
        //             console.log(data);
        //         }
        //     })
        // })
    </script>

</body>

</html>