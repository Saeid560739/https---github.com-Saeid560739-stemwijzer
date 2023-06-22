
<?php $this->view('inclodes/header')?>
<div id="content">
<?php
// print_r($data[0]->email);

 ?>


   <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
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
    </nav>-->

</div>
        
                <div id="title">
                        <h1>Dashboard</h1>
                </div>
                
                <div class="row mb-3" id="form-container">
                    
                    <div class="col-md-1" >
                    </div>
                    <div class="col-md-10 ">
                    <a class="succes_btn" href="http://localhost/stemwijzer/public/addPartij">Partij toevoegen</a>

                    <table class="table table-striped">
                    <thead>
                        <tr >
                        <th style="width:5%" scope="col"> ID</th>
                        <th style="width:15%" scope="col">Logo</th>
                        <th style="width:15%" scope="col">Partij naam</th>
                        <th style="width:5%" scope="col">Afkorting</th>
                        <th style="width:10%" scope="col">Ideologie</th>
                        <th style="width:10%" scope="col">Richting</th>
                        <th style="width:10%" scope="col">Leader</th>
                        <th style="width:5%" scope="col">x</th>
                        <th style="width:5%" scope="col">y</th>
                        <th style="width:20%" scope="col"></th>
                        
                        </tr>
                    </thead>
                <?php 
                if($data):
                    foreach( $data as $key => $value ):
                ?>
                    <tbody>
                        <tr style="height:70px">
                        <th style="width:5%" scope="row"><?=$value->id;?></th>
                        <td style="width:15%"><img src="foto's/<?=$value->logo;?>" alt="Girl in a jacket" width="50" height="50"></td>
                        <td style="width:15%"><?=$value->name;?></td>
                        <td style="width:5%"><?=$value->abbreviation;?></td>
                        <td style="width:10%"><?=$value->ideology;?></td>
                        <td style="width:10%"><?=$value->direction;?></td>
                        <td style="width:10%"><?=$value->leader;?></td>
                        <td style="width:5%"><?=$value->x;?></td>
                        <td style="width:5%"><?=$value->y;?></td>
                        <td style="width:20%" style="display:flex">
                            <form action="http://localhost/stemwijzer/public/partijEdit" method="post">
                                <input type="submit" name="edit" class="btn btn-primary" value="Edit  ">
                                <input type="hidden" name="id" value="<?=$value->id;?>" >
                                <input type="submit" name="delete" class="btn btn-danger" value="Delete">

                            </form>


                        </td>
                        </tr>
                    </tbody>
                    <?php 
                        endforeach;
                    endif;
                    ?>
                    </table>
                    </div>
                    <div class="col-md-1">
                    </div>
            </div>    
                    


               

            <?php //print_r($generalOfWeek[0]->value_sum) ?>



        </div>

        <?php
        //echo "<pre>";
        //print_r ($lastReport);
        ?>


<?php $this->view('inclodes/footer')?>