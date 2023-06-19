<?php $this->view('inclodes/header')?>

      <!-- Login Form -->
      
        <div id="title">
                <h1>Stelling toevoegen</h1>
        </div>
        <div class="row mb-3" id="form-container">
                <div class="col-md-3 col-sm-2" >
                </div>
                <div class="col-md-6 col-sm-8">
                        <form method="post" class="partij-form">
                                <div class="mb-3">
                                        <label for="partijNaam" class="form-label">Stelling</label>
                                        <textarea class="form-control" id="w3review" name="statement" rows="4" cols="50" ></textarea>                                </div>
                                
                                <div class="mb-3">
                                        <label for="partijNaam" class="form-label">Richting</label>

                                        <div class="input-group mb-3">
                                                <select class="form-select" id="inputGroupSelect03" name="direction" aria-label="Example select with button addon">
                                                        <option selected>Richting...</option>
                                                        <option value="Rechts">Rechts</option>
                                                        <option value="Links">Links</option>
                                                        <option value="Conservatief">Conservatief</option>
                                                        <option value="Progressief">Progressief</option>

                                                </select>
                                        </div>
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