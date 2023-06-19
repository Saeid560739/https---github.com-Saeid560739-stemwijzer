<?php $this->view('inclodes/header')?>

      <!-- Login Form -->
      
        <div id="title">
                <h1>Partij toevoegen</h1>
        </div>
        <div class="row mb-3" id="form-container">
                <div class="col-md-3 col-sm-2" >
                </div>
                <div class="col-md-6 col-sm-8">
                        <form method="post" class="partij-form">
                                <input type="hidden" name="id" value="<?=$data[0]->id;?>">
                                <div class="mb-3">
                                        <label for="partijNaam" class="form-label">Partij naam</label>
                                        <input type="text" name="name" class="form-control" value="<?=$data[0]->name;?>" id="partijNaam" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Afkorting</label>
                                        <input type="text" name="abbreviation" class="form-control" value="<?=$data[0]->abbreviation;?>" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                        <label for="partijNaam" class="form-label">Ideologie</label>
                                        <input type="text" name="ideology" class="form-control" value="<?=$data[0]->ideology;?>" id="partijNaam" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                        <label for="partijNaam" class="form-label">Richting</label>

                                        <div class="input-group mb-3">
                                                <select class="form-select" id="inputGroupSelect03" name="direction" value="<?=$data[0]->direction;?>" aria-label="Example select with button addon">
                                                        <option selected>Richting...</option>
                                                        <option value="Richt">Richt</option>
                                                        <option value="Links">Links</option>
                                                        <option value="Conservatief">Conservatief</option>
                                                        <option value="Progressief">Progressief</option>
                                                </select>
                                        </div>
                                </div>
                                <div class="mb-3">
                                        <label for="partijNaam" class="form-label">Leader</label>
                                        <input type="text" name="leader" class="form-control" value="<?=$data[0]->leader;?>" id="partijNaam" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                        <label for="partijNaam" class="form-label">Logo</label>
                                        <input type="file" name="logo" class="form-control" id="formFile" aria-describedby="emailHelp">
                                <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Samenvatting</label>
                                        <input type="text" name="summary" class="form-control" value="<?=$data[0]->summary;?>" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3" style="display:flex">
                                        <label style="padding-right: 20px " for="exampleInputPassword1" class="form-label">x</label>
                                        <input type="number" name="x" max="10" min="-10" class="form-control" value="<?=$data[0]->x;?>" id="exampleInputPassword1">
                                        <label style="padding-right: 20px; padding-left: 20px " for="exampleInputPassword1" class="form-label">y</label>
                                        <input type="number" name="y" max="10" min="-10" class="form-control" value="<?=$data[0]->y;?>" id="exampleInputPassword1">
                                </div> 
                


                                <?php// if (isset($_POST['submit'])):?>
                                <?php foreach($errors as $error):?>
                                <div id="errors" style="color:red"><?=$error?></div>
                                <?php endforeach;?>
                                <?php //endif;?>

                                <input type="submit" name="submit" id="aanmaken" class="succes_btn" value="Aanmaken">
                        </form>
                </div>
                <div class="col-md-3 col-sm-2">
                </div>
        </div>
        

<?php $this->view('inclodes/footer')?>