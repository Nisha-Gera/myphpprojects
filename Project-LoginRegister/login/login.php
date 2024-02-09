<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    .loginbody {
        font-family: serif, sans serif, cursive, fantasy, and monospace;
        margin: auto;
        /* border: 2px solid black; */
        width: 50%;
        /* margin-top: auto; */
        /* top: 50%; */
    }
    .heading{
        text-align: center;
    }
    .form{
        border: 2px solid gray;
        border-radius: 10px;
        padding: 30px;
    }
    .loginfields{
        padding: 5px;
    }
    #btn input{
        background: skyblue;
        padding: 10px;
        border: 1px solid gray;
        border-radius:5px;
        text-align: center;
    
    }
    #btn label{

    }
</style>

<body>

    <div class="loginbody">

        <div class="heading">
            <h1>Login Page</h1>
        </div>

        <div class="form">
            <form action="loginLogic.php" method="POST">

            <h4>Enter your credentials</h4>


                <div class="loginfields">
                    <label for="email">Enter your Email:</label>
                    <input type="email" name="email" id="">
                </div>

                <div class="loginfields">
                    <label for="password">Enter your Password:</label>
                    <input type="password" name="password" id="">
                </div>

                <div class="loginfields" id="btn">
                    <input type="submit" name="submit" id="submit">
                </div>

            </form>
        </div>
    </div>

</body>

</html>