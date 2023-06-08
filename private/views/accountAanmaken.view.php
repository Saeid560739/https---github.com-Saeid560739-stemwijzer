<!DOCTYPE html>
<html lang="en" id="user_body">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="John Doe">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="http://localhost/stemwijzer/public/style/user_style.css">
    </head>
    <body>

        <div class="wrapper fadeInDown">
          <div id="formContent">
            <!-- Tabs Titles -->
            <h1 class="active"> Account aanmaken </h1>

            <!-- Login Form -->
            <form method="post">
              <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username">
              <input type="text" id="email" class="fadeIn second" name="email" placeholder="Email">
              <input type="text" id="password" class="fadeIn third" name="password" placeholder="Wachtwoord">
              <input type="text" id="password1" class="fadeIn second" name="password1" placeholder="Wachtwoord bevestiging">

              <?php// if (isset($_POST['submit'])):?>
              <?php foreach($errors as $error):?>
              <div id="errors" style="color:red"><?=$error?><div>
              <?php endforeach;?>
              <?php //endif;?>

              <input type="submit" name="submit" class="fadeIn fourth" value="Aanmaken">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
              <a class="underlineHover" href="http://localhost/stemwijzer/public/login">Inloggen</a>
            </div>

          </div>
        </div>
  </body>
</html>