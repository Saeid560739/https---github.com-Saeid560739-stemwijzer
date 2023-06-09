
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
                <a class="succes_btn" href="http://localhost/stemwijzer/public/addPartij">addd</a>
                    
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Partij ID</th>
                    <th scope="col">Partij naam</th>
                    <th scope="col">Richting</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                </tbody>
                </table>

            <?php //print_r($generalOfWeek[0]->value_sum) ?>



        </div>

        <?php
        //echo "<pre>";
        //print_r ($lastReport);
        ?>

</div>
<?php $this->view('inclodes/footer')?>