
<div class="container">
    <?php if(!empty($success_msg)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-success"><?php echo $success_msg;
                ?></div>
        </div>
    <?php }elseif(!empty($error_msg)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-danger"><?php echo $error_msg; ?></div>
        </div>
    <?php } ?>
    <div class="row">
        <h1>List Športovísk</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading">Sportoviska <a href="<?php echo
                    site_url('Sportoviska'); ?>" class="glyphicon glyphicon-plus pullright"
                    ></a></div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="15%">idSportoviska</th>
                        <th width="20%">Objekt</th>
                        <th width="20%">otvorene_od</th>
                        <th width="20%">otvorene_do</th>
                        <th width="15%">adresa</th>
                        <th width="10%">Action</th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if(!empty($Sportoviska)): foreach($Sportoviska as $sportovisko): ?>
                        <tr>
                            <td><?php echo
                                $sportovisko['idSportoviska']; ?></td>
                            <td><?php echo $sportovisko['Objekt'];
                                ?></td>
                            <td><?php echo $sportovisko['otvorene_od'];?></td>
                            <td><?php echo $sportovisko['otvorene_do'];?></td>
                            <td><?php echo $sportovisko['adresa'];?></td>
                            <td>
                                <a href="<?php echo
                                site_url('Sportoviska/view/'.$sportovisko['id']); ?>" class="glyphicon
glyphicons-eye-open"></a>
                                <a href="<?php echo
                                site_url('Sportoviska/edit/'.$sportovisko['id']); ?>" class="glyphicon
glyphicon-edit"></a>
                                <a href="<?php echo
                                site_url('Sportoviska/delete/'.$sportovisko['id']); ?>" class="glyphicon
glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4">Žiadne záznamy neboli nájdené</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>