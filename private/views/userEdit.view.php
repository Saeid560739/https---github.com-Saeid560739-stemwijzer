<?php $this->view('inclodes/header')?>
<div id="content">

        <div id="content_container">
                <div id="title"> 
                        <h1>Mijn gegevens wijzegen</h1>
                </div>
                <form method="post">
                    <div class="gegevens" >
                        Voornaam: <input type="text" class="test_input" name="firstName" style="margin-left: 40px" value="<?=$rows[0]->firstname?>">
                    </div>
                    <div class="gegevens">
                        Achternaam: <input type="text" class="test_input" name="lastName" style="margin-left: 14px" value="<?=$rows[0]->lastname?>">
                    </div>
                    <div class="gegevens">
                        E-mail: <input type="text" class="test_input" name="email" style="margin-left: 88px" value="<?=$rows[0]->email?>">
                    </div>
                    <div class="gegevens">
                        Gewicht: <input type="text" class="test_input" name="weight" style="margin-left: 68px" value="<?=$rows[0]->weight?>">
                    </div>
                    <input type="submit" class="succes_btn" name="submit" value="Opslaan" style="margin: 20px  ">
                </form>
       
        </div>
</div> 
          
<?php $this->view('inclodes/footer')?>