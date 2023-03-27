<!--Header form -->
<div class="container form-header">
    <div class="form-container">
        <h2>Sign Up<span>Create Account</span></h2>
        <form action="#" method="post">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
                    <input type="text" name="f_name" placeholder="First name" class="normal small">
                    <input type="text" name="l_name" placeholder="Last name" class="normal small last">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
                    <input type="email" name="email" placeholder="Email Address" class="normal">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
                    <input type="password" name="password" placeholder="Password" class="normal">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
                    <input type="password" name="confirm_password" placeholder="Confirm password" class="normal">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input type="submit" class="button" value="Submit">
                </div>
            </div>
            <br>
            <h5><span style="color: #2f5071;">Already an User ?
                    <a style="color: #2f5071;" class="aa" href="#">Login</a>
                </span>
            </h5>
        </form>
    </div>
</div>
<!--/Header form -->
<style>
    a.aa:hover {
        color: white;
    }
    @media only screen and (max-device-width: 1300px) {
      .form-header{
        position: static;
      }
      .form-container{
        position: static;
        width: 100%;
        margin: 15px 0;
        padding: 15px;
      }
    }
</style>
