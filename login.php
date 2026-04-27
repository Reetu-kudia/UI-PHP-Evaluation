<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $username=$_POST["usermname"];
    $password=$_POST["password"];

        $sql=$conn->prepare("select password from user where username=?");
        $sql->bind_param('s',$username);
        $sql->execute();
        $sql->store_result();
        $sql->bind_result($pass);
        if ($sql->fetch() && password_verify($password,$pass)) {
            $_SESSION['username']=$username;
            header('Location:home.php');
        }
        else{
            echo "<script>alert('Invalid Credential')</script>";
        }
}
?>


<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <div
                class="container shadow rounded border mt-5 col-5 p-4"
            >
                <form action="" method="post">
                    <center><h3>Login</h3></center>
                    <div class="mb-3">
                        <label for="" class="form-label">User Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name=""
                            id="username"
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input
                            type="text"
                            class="form-control"
                            name=""
                            id="password"
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                    <a
                        name=""
                        id=""
                        class="btn btn-primary"
                        href="home.php"
                        role="button"
                        >Login</a
                    >
                    
                    
                </form>
            </div>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
