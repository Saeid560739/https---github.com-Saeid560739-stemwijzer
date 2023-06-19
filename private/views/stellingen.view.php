
<?php $this->view('inclodes/header')?>
<div id="content">
<?php
// print_r($data[0]->email);

 ?>

</div>
        
                <div id="title">
                        <h1>Stellingen</h1>
                </div>
                
                <div class="row mb-3" id="form-container">
                    
                    <div class="col-md-1" >
                    </div>
                    <div class="col-md-10 ">
                    <a class="succes_btn" href="http://localhost/stemwijzer/public/addStelling">Stelling toevoegen</a>

                    <table class="table table-striped">
                    <thead>
                        <tr >
                        <th style="width:70%"  scope="col"> steling</th>
                        <th style="width:10%" scope="col">Politieke richting</th>

                        <th style="width:20%" scope="col"></th>
                        
                        </tr>
                    </thead>
                <?php 
                if($data):
                    foreach( $data as $key => $value ):
                ?>
                    <tbody>
                        <tr style="height: auto">
                        <td style="width:70%"><?=$value->text;?></td>
                        <td style="width:10%"><?=$value->political_direction;?></td>
                        <td style="width:20%" style="display:flex">
                            <form action="http://localhost/stemwijzer/public/stellingEdit" method="post">
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