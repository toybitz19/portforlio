<?php
    
    $error = "";
    $success = "" ;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = strip_tags(trim($_POST["name"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);


        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    
            http_response_code(400);
            $error = "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }

        $recipient = "singhalraja.30003@gmail.com";
        $subject = "New contact from $name";

    
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        $email_headers = "From: project@mysite.com";

        if (mail($recipient, $subject, $email_content, $email_headers)) {

            http_response_code(200);
            $success = "Thank You! Your message has been sent.";
        } else {
            http_response_code(500);
            $error = "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        http_response_code(403);
        $error = "There was a problem with your submission, please try again.";
    }

    
?>



<!DOCTYPE html>
    <html>
    <head>
        <title></title>

        <style type="text/css">

        html{

            background:-webkit-linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(michal-grosicki-253506.jpg) no-repeat center center fixed;
            background: -o-linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(michal-grosicki-253506.jpg) no-repeat center center fixed;
            background: -moz-linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(michal-grosicki-253506.jpg) no-repeat center center fixed;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(michal-grosicki-253506.jpg) no-repeat center center fixed;
            height: 100%;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        #success-msg{

            background-color: #dff0d8;
            color: green;
            text-align: center;
            padding: 25px;
            width: 50%;
            margin: auto;
            border:1px solid black;
            border-radius: 8px;
            font-weight: bold;
            font-size: 22px;
            margin-top: 200px;

        }

        #error-msg{

            background-color: #f2dede;
            text-align: center;
            padding: 25px;
            width: 50%;
            margin: auto;
            border:1px solid black;
            border-radius: 8px;
            font-size: 22px;
            color: red;
            margin-top: 200px;
            font-weight: bold;

        }

        .button {
              display: inline-block;
              border-radius: 10px;
              background-color: #3faf8a;
              border: none;
              color: #FFFFFF;
              text-align: center;
              font-size: 28px;
              padding: 17px;
              width: 200px;
              transition: all 0.5s;
              cursor: pointer;
              margin: 5px;
            }

        .button span {
              cursor: pointer;
              display: inline-block;
              position: relative;
              transition: 0.5s;
            }

        .button span:after {
              content: '\00AB';
              position: absolute;
              opacity: 0;
              top: 0;
              left: -20px;
              transition: 0.5s;
            }

        .button:hover span {
              padding-left: 25px;
            }

         .button:hover{

             background-color: green;
         }   

        .button:hover span:after {
              opacity: 1;
              left: 0;
            }

        #button{
            margin-top: 50px;
            text-align: center;
        }

        </style>
    </head>
    <body>

       <div><?

            if($success){

                 echo '<div id="success-msg">'.$success.'</div>';
            }else if($error){

                 echo '<div id="error-msg" >'.$error .'</div>';


            }

            ?>
        </div>
        <div id="button">
            <form method="get" action="https://rsinghal26.github.io/#contect">
                <button class="button"><span>Return </span></button>
            </form>
        </div>
    
    
    </body>
    </html>


