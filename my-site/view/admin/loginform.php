
<?php require_once('view/home/shared/header.php'); ?>
<br/>
<?php if(!empty($error)): ?>
    <div class="alert alert-error">~<?php echo  $lang['MSG_LOGGEDOUT_PLEASE_LOGIN']; ?></div>
<?php endif; ?>
<br/>
<div class = "container">
    <div class="wrapper">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" method="post" name="Login_Form" class="form-signin">       
            <h3 class="form-signin-heading"><?php echo $lang['WELCOME_BACK_MSG']; ?></h3>
              <hr class="colorgraph"><br>
              
              <input type="text" class="form-control" name="username" placeholder=<?php echo $lang['TXT_BOX_USERNAME']; ?> required="" autofocus="" />
              <input type="password" class="form-control" name="password" placeholder=<?php echo $lang['TXT_BOX_PASSWORD']; ?> required=""/>            
             
              <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit"><?php echo $lang['BTN_LOGIN']; ?></button>            
        </form>         
    </div>
</div>
<style type="text/css">
.wrapper {    
    margin-top: 80px;
    margin-bottom: 20px;
}

.form-signin {
  max-width: 420px;
  padding: 30px 38px 66px;
  margin: 0 auto;
  background-color: #eee;
  border: 3px dotted rgba(0,0,0,0.1);  
  }

.form-signin-heading {
  text-align:center;
  margin-bottom: 30px;
}

.form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
}

input[type="text"] {
    width: 100%;
  margin-bottom: 5px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

input[type="password"] {
    width: 100%;
  margin-bottom: 20px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.colorgraph {
  height: 7px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
</style>
<?php require_once('shared/footer.php'); ?>