<div class="container-fluid backgroun-grey">
    <div class="text-center">
<h1>Create an Account</h1>
    </div>
    <div class="registration-container">
        <?php if(!empty($error)){ ?>
            <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
        <?php } ?>
        <?php if(!empty($success)){ ?>
            <div class="alert alert-success" role="alert"><?php echo $success ?></div>
        <?php } ?>
        <form method="post">

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="data[]">First name</label>
                    <input type="text" class="form-control" name="data[fname]" id="data[fname]" placeholder="First Name" required="required">
                </div>
                <div class="form-group col-md-6">
                    <label for="data[]">Last Name</label>
                    <input type="text" class="form-control" name="data[lname]" id="data[lname]" placeholder="Last Name" required="required">
                </div>
            </div>
            <div class="form-group">
                <label for="data[]">Email address</label>
                <input type="email" class="form-control" name="data[email]" id="data[email]" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <label for="data[]">Password</label>
                <input type="password" class="form-control" name="data[password]" id="data[password]" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <label for="data[]">Re-enter Password</label>
                <input type="password" class="form-control" name="ret-pass" id="ret-pass" placeholder="Retype Password" required="required">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="data[]">Zip Code</label>
                    <input type="number" class="form-control" name="address[zip]" id="address[zip]" placeholder="Zip Code">
                </div>
                <div class="form-group col-md-6">
                    <label for="data[]">Phone</label>
                    <input type="tel" class="form-control" name="data[telephone]" id="data[telephone]" placeholder="Phone">
                </div>
            </div>
            <button type="submit" class="btn btn-info width-max">Create an Account</button>
            <small> By creating an account, you agree to the Teahery Tearms of Use and Privacy Policy</small>
        </form>
    </div>

</div>