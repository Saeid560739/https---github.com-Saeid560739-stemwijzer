
<?php $this->view('inclodes/header')?>
<div id="content">


    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            
            <a class="logo" href="#">
                StemWijzer
            </a>
           
            <div class="" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="username" aria-current="page" href="http://localhost/stemwijzer/public/userEdit">saeid</a>
                    <div class="uitloggen_btn">
                        <a class="uitloggen" href="http://localhost/stemwijzer/public/log_out">Uitloggen</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

</div>
        <div id="content_container">
                <div id="title">
                        <h1>Dashboard</h1>
                </div>

            <?php //print_r($generalOfWeek[0]->value_sum) ?>



        </div>

        <?php
        //echo "<pre>";
        //print_r ($lastReport);
        ?>

</div>
<?php $this->view('inclodes/footer')?>