<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD']==="POST") {
    $i_name=$_POST['i_name'];
    $des=$_POST['des'];
    $price=$_POST['price'];
    $cat=$_POST['cat'];
    $Food_img=$_FILES['image']['name'];
    $username=$_SESSION['username'];

    move_uploaded_file($_FILES['image']['temp_name'],"uploads/$image_name");
    $sql=$conn->prepare("insert into item(i_name,des,price,cat,Food_img) values(?,?,?,?,?,?)");
    $sql->bind_param('ssiss',$i_name,$desc,$price,$cat,$Food_img);
    $sql->execut();
    header('Location:view.php');
}

?>



<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
           <nav
            class="navbar navbar-expand-sm navbar-light bg-light"
           >
            <div class="container">
                
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                       <li class="nav-item">
                            <?php $_SESSION["username"]; ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="viewmenu.php">View Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="managemenu.php">Manage Menu</a>
                        </li>
                    </ul>
                    <form class="d-flex my-2 my-lg-0">
                        
                        <a
                            name=""
                            id=""
                            class="btn btn-primary"
                            href=""
                            role="button"
                            style="margin:10px"
                            >Export Data</a
                        >
                        
                        <a
                            name=""
                            id=""
                            class="btn btn-primary"
                            href="login.php"
                            role="button"
                            style="margin:10px"
                            >Logout</a
                        >
                        
                    </form>
                </div>
            </div>
           </nav>
           
        </header>
        <main>
            <h3 class="text-center mt-3">Add Menu Item</h3>
            <div
                class="container col-6 border rounded shadow mt-4 p-5 rounded-4"
            >
                <form action="" method="post" enctype="multipart/file-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Item Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="i_name"
                            id=""
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control" name="desc" id="" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input
                            type="number"
                            class="form-control"
                            name="price"
                            id=""
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select
                            class="form-select form-select-lg"
                            name="cat"
                            id=""
                        >
                            <option value="Stater">Stater</option>
                            <option value="Main Course">Main Course</option>
                            <option value="Dessert">Dessert</option>
                            <option value="Drint">Drink</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Food Image</label>
                        <input
                            type="file"
                            class="form-control"
                            name="image"
                            id=""
                        />
                    </div>
                    <div
                        class="container text-center"
                    >
                        <button type="submit" class="btn btn-primary">Add MENU ITEM</button>
                    </div>
                    
                    
                    
                </form>
            </div>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
