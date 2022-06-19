<?php
	require_once(dirname(dirname(__FILE__)) . '/config/postgres_handler.php');              
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Search Form</title>
        <meta charset="UTF-8">
        <meta name="" content="width=device-width, initial-scale=1">
        <link href="favicon.png" rel="icon" />
        <link rel="stylesheet" href="css/uikit.css"/>
    </head>
    <body>

            <nav class="uk-navbar-container" uk-navbar>
                <div class="uk-navbar-center">
            
                    <ul class="uk-navbar-nav">
                        <li><a href="../index.html">HOME</a></li>
                        <li><a href="login.php">LOGIN</a></li>
                        <li class="uk-active"><a href="#">SEARCH</a></li>
                        <li><a href="../knowledge_base/index.html" target="_blank">KNOWLEDGE BASE</a></li>
                    </ul>
            
                </div>
            </nav>

            <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-small">
                    <h3 class="uk-card-title uk-text-center">💉Search</h3>
                        <form method="GET" action="search.php" >
                            <div class="uk-margin">
                                 <div class="uk-inline uk-width-1-1">
                                            <span class="uk-form-icon" uk-icon="icon: search"></span>
                                            <input class="uk-input uk-form-large" type="text" name="contentsearch" id="contentsearch">                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-margin">
                                        <button class="uk-button uk-button-primary uk-button-large uk-width-1-1" name="submit" id="submit">Submit</button>
                                </div>
                            </div>
                        </form>

                        <div class="uk-inline uk-width-1-1">
                            <button class="uk-button-default uk-button-small" type="button">Help</button>
                            <div uk-drop="mode: click">
                                <div class="uk-card uk-card-body uk-card-default">
                                    <button class="uk-drop-close" type="button" uk-close></button>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                </div>
                            </div>
                        </div>


                </div>

                <div class="uk-background-muted uk-height-large uk-align-center  uk-padding-small" uk-container>
                     <div class="uk-align-center uk-text-left  uk-width-xlarge uk-padding-small uk-background-default uk-box-shadow-small" uk-container>

                     <div class="uk-text-uppercase uk-text-bold">
                        Search results
                    </div>

                     <?php
                    
                    if(isset($_GET['submit']) && strlen($_GET['contentsearch'])){
                        $contentSearch=$_GET['contentsearch'];
                        $sql = "SELECT * FROM personalData JOIN businessData ON personalData.personalDataID = businessData.businessID WHERE LOWER (businessName) LIKE '%".$contentSearch."%'";
                        $result = pg_query($con, $sql);
                        $count = pg_num_rows($result);
						if( $count != 0 ){
		  				while($content = pg_fetch_array($result)){

		  		            // echo "<p>".$content["businessName"]." | ".$content["addressCity"]." | ".$content["firstName"]. ' ' . $content["lastName"]." | ".$content["emailAddress"]."</p>";
						
                            if(isset($content['businessname'])) :
                                echo $content["businessname"]." | ";
                                echo $content["addresscity"]." | ";
                                echo $content["firstname"].' '.$content["lastname"]." | ";
                                echo $content["emailaddress"];
                            else :
                                foreach($content as $content){
                                    echo $content;
                                }
                            endif;

                        }

                        }else {		
							echo '<p>Nothing found</p>';
                        }

                    ?>


                    </div>
                
                    <?php
                    echo "<div class=\"uk-container uk-margin-xlarge-top uk-text-bold uk-padding-small uk-spacing-small uk-background-muted uk-box-shadow-large uk-text-left uk-position-center\" uk-alert>
                    <button class=\"uk-alert-close\" type=\"button\" uk-close></button>
                    <p>SQL Statement:</p>".$sql."</div>"; 
                    }
                    
                    ?>


                </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.5.9/js/uikit.min.js" 
                integrity="sha512-OZ9Sq7ecGckkqgxa8t/415BRNoz2GIInOsu8Qjj99r9IlBCq2XJlm9T9z//D4W1lrl+xCdXzq0EYfMo8DZJ+KA==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.5.9/js/uikit-icons.min.js" 
                integrity="sha512-hcz3GoZLfjU/z1OyArGvM1dVgrzpWcU3jnYaC6klc2gdy9HxrFkmoWmcUYbraeS+V/GWSgfv6upr9ff4RVyQPw==" crossorigin="anonymous"></script>
    </body>
</html>