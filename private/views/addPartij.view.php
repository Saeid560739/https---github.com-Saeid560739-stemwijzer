<?php $this->view('inclodes/header')?>

      <!-- Login Form -->
      <div class="content">
        <div id="title">
                <h1>Partij toevoegen</h1>
        </div>
        <form method="post">
                <input type="text"  name="partij-naam" placeholder="Partij naam">
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

        </div>

<?php $this->view('inclodes/footer')?>