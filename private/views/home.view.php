<!--<div>test</div>
--><?php
print_r($data);
?>

<?php if($data):?>

    <?php foreach ($data as $row):?>

        <tr>
            <td><?=$row->text?></td>
        </tr>

    <?php endforeach;?>
<?php else:?>
    <div class="d-flex justify-content-center">
        <h4>Er zijn op dit moment stellingen teams gevonden!</h4>

    </div>
<?php endif;?>
