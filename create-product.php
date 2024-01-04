<?php
spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});

require_once "./partials/header.php";

$users = new User();
$users = $users->all();

$category = new Category();








?>
<div class="container">
        <div class="row mt-md-5">
            <div class="col-md-10">
                <form action="/process/add-product.php" method="post">
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-4">
                        <div class="col">
                            <div data-mdb-input-init class="form-outline">
                                <input type="text" id="form3Example1" class="form-control" name="name"/>
                                <label class="form-label" for="form3Example1">Name</label>
                            </div>
                        </div>
                        <div class="col">
                            <div data-mdb-input-init class="form-outline">
                                <input type="text" id="form3Example2" class="form-control" name="price" />
                                <label class="form-label" for="form3Example2">Description</label>
                            </div>
                        </div>
                        <div class="col">
                            <div data-mdb-input-init class="form-outline">
                                <select name="user_id" class="form-control">
                                    <?php
                                    foreach($users as $user)
                                    {
                                    echo '<option value="'.$user['id'].'">'.$user['first_name'].' '. $user['last_name'] .'</option>';

                                    }

                                    ?>
                                </select>
                                <label class="form-label" for="form3Example2">User_id</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div data-mdb-input-init class="form-outline">
                                <input type="text" id="form3Example1" class="form-control" name="name"/>
                                <label class="form-label" for="form3Example1">Quantity</label>
                            </div>
                        </div>
                         <div class="col">
                            <div data-mdb-input-init class="form-outline">
                                <input type="text" id="form3Example1" class="form-control" name="name"/>
                                <label class="form-label" for="form3Example1">Price</label>
                            </div>
                        </div>
                        <div class="col">
                            <div data-mdb-input-init class="form-outline">
                                <?php
                                $category->getOptions($category->all());

                                ?>

                                <label class="form-label" for="form3Example1">Category_id</label>
                            </div>
                        </div>
                        <div class="row mb-4">
                        <div class="col">
                            <input type="file" name="image" class="form-control" id="image">
                            <label class="form-label" for="image">Upload Image</label>
                           
                        </div>
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        <textarea id="description" class="form-control" name="description"> </textarea>
                        <label class="form-label" for="description">Description</label>
                        
                    </div>

                       
                    

                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <select id="type" class="form-control" name="type">
                            <option value="new" selected>New</option>
                            <option value="old">Old</option>
                        </select>
                        <label class="form-label" for="type">Select Type</label>
                    </div>





                   
                    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Create product</button>

                </form>
            </div>

        </div>

    </div>
   
<?php require_once "./partials/footer.php"; ?>
';