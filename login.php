<script language="javascript">
function validasi(form){
  if (form.username.value == ""){
    alert("Anda belum mengisikan Username.");
    form.username.focus();
    return (false);
  }
     
  if (form.password.value == ""){
    alert("Anda belum mengisikan Password.");
    form.password.focus();
    return (false);
  }
  return (true);
}
</script>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Dokument Center | UBJOM Paiton</title>
    <link rel="shortcut icon" href="images/sasas.png" />
    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background-image: url(images/background.png); ">
    
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form action='cek_login.php' method='POST' id='loginForm' class='form-signin' autocomplete='off' onSubmit="return validasi(this)">
                        <h1 style="color:  #008B8B;" ><i class="fa fa-ge" style="font-size: 26px; color: #008B8B;"></i><b>  MADUTIGA </b></h1>
                        <div>
                            <input type="text" class="form-control col-md-7 col-xs-12" style="background-color: #; border:2px solid #ADD8E6; border-radius: 12px;" placeholder="Username"  name="username"  />
                        </div>
                        <div>
                            <input type="password" style="background-color: #;  border-radius: 12px; border:2px solid #ADD8E6;" class="form-control col-md-7 col-xs-12" placeholder="Password"  name="password" />
                        </div>
                        <div>
                            <input class="btn " type='submit' style="background-color: #F0FFFF; border-radius: 8px; border:2px solid #ADD8E6;"  id="submit" value='LOGIN'/>
                        </div>
                        <div class="separator"> <div>
                        <h1 style="font-family: Bradley Hand ITC; font-weight: bold;"> Halaman Administrator </h1>

                                &copy;  PT PJB UBJOM PLTU PAITON &nbsp;2018.
                        </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
            <div id="register" class="animate form">
                <section class="login_content">
                    <form>
                        <h1>Create Account</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <a class="btn btn-default submit" href="index.html">Submit</a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <p class="change_link">Already a member ?
                                <a href="#tologin" class="to_register"> Log in </a>
                            </p>
                            <div class="clearfix"></div>
                            <br />
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

</body>

</html>