
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
                    <a class="succes_btn" href="http://localhost/stemwijzer/public/addPartij">Partij toevoegen</a>
                
                    <div class="row mb-3" id="form-container">
                <div class="col-md-1" >
                </div>
                <div class="col-md-10 ">
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
            <?php foreach( $data as $key => $value ):?>
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
                    <td style="width:20%">
                        <button type="button" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>
                        <button type="button" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                            </svg>
                        </button>
                    </td>
                    </tr>
                </tbody>
                <?php endforeach;?>
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