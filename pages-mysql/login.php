<?php
	require_once(dirname(dirname(__FILE__)) . '/config/mysql_handler.php');	
	$sSuccessMsg = "<div class=\"uk-width-1-1 uk-text-center\"><span class=\"uk-icon uk-margin-small-right\" uk-icon=\"icon: warning\">
                    </span>You are not logged in.</div>";
	if(isset($_POST['submit'])) {
	    $username=$_POST['username'];
	    $pwd=sha1($_POST['passwd']);
	    $sql="SELECT * FROM personalData LEFT JOIN userPassword ON userPassword.accountID = personalData.accountID WHERE userPassword.passwordHash = '$pwd' AND personalData.emailAddress = '$username';";
	    $result=mysqli_query($con, $sql);
	    $count=mysqli_num_rows($result);
		$sSuccessMsg = ($count>0?
			"<div class=\"uk-width-1-1 uk-padding-small uk-text-center uk-text-emphasis uk-background-green\"><span class=\"uk-icon uk-margin-small-right\" uk-icon=\"icon: check\">
            </span>Login successful.</div>":
			"<div class=\"uk-width-1-1 uk-padding-small uk-text-center uk-text-emphasis uk-background-red\"><span class=\"uk-icon uk-margin-small-right\" uk-icon=\"icon: bolt\">
                    </span>Login data incorrect.</div>");
		}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="" content="width=device-width, initial-scale=1">
        <link href="favicon.png" rel="icon" />
        <link rel="stylesheet" href="/css/uikit.css"/>
        <link href="css/styles.css" rel="stylesheet">
    </head>
    <body>

            <nav class="uk-navbar-container" uk-navbar>
                <div class="uk-navbar-center">
            
                    <ul class="uk-navbar-nav">
                        <li><a href="../index.html">HOME</a></li>
                        <li class="uk-active"><a href="#">LOGIN</a></li>
                        <li><a href="#">SEARCH</a>
                            <div class="uk-navbar-dropdown uk-width-medium">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li><a href="search-sq.php">SEARCH SQLi</a></li>
                                    <li><a href="search-mq.php">SEARCH SQLi MULTIQUERY</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="../knowledge_base/index.html" target="_blank">KNOWLEDGE BASE</a></li>
                    </ul>
            
                </div>
            </nav>

            <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-small">
                    <h3 class="uk-card-title uk-text-center">💉Login</h3>
                        <form method="POST" action="login.php" >
                            <div class="uk-margin">
                                 <div class="uk-inline uk-width-1-1">
                                            <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                            <input class="uk-input uk-form-large" type="text" name="username" id="username">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-inline uk-width-1-1">
                                            <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                            <input class="uk-input uk-form-large" type="password" name="passwd" id="passwd">	
                                </div>
                            </div>
                                <div class="uk-margin">
                                        <button class="uk-button uk-button-primary uk-button-large uk-width-1-1" name="submit" id="submit">Login</button>
                                </div>
                        </form>
                        <?php echo $sSuccessMsg;?>
            </div>

            <div class="uk-container uk-container-small uk-height-small uk-padding-small uk-spacing-small uk-background-muted uk-box-shadow-small uk-text-left" uk-alert>
                <button class="uk-alert-close" type="button" uk-close></button>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>  

        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.5.9/js/uikit.min.js" 
                integrity="sha512-OZ9Sq7ecGckkqgxa8t/415BRNoz2GIInOsu8Qjj99r9IlBCq2XJlm9T9z//D4W1lrl+xCdXzq0EYfMo8DZJ+KA==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.5.9/js/uikit-icons.min.js" 
                integrity="sha512-hcz3GoZLfjU/z1OyArGvM1dVgrzpWcU3jnYaC6klc2gdy9HxrFkmoWmcUYbraeS+V/GWSgfv6upr9ff4RVyQPw==" crossorigin="anonymous"></script>
    </body>
</html>