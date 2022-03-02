<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <div class="row mb-3">
        <label for="username" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input type="username" name="Username" class="form-control Username" id="inputUsername" placeholder="Username">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" name="Password" class="form-control Password" id="inputPassword" placeholder="Password">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-10 offset-sm-2">
            <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="checkRemember">
                    <label class="form-check-label" for="checkRemember">Remember me</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" name="Submit" class="btn btn-primary">Sign in</button>
        </div>
    </div>
</form>
<?php
if(isset($_POST['Submit'])){
$conn = mysqli_connect("localhost","root","");

}
?>