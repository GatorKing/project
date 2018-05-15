
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
        <h1>List Detailov</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading">Detail <a href="<?php echo
                    site_url('Detail'); ?>" class="glyphicon glyphicon-plus pullright"
                    ></a></div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="15%">Rezervacia_idRezervacia</th>
                        <th width="15%">Sportoviska_idSportoviska</th>
                        <th width="20%">idDetail</th>
                        <th width="20%">cena_hod/th>
                        <th width="15%">obsadene</th>
                        <th width="15%">Action</th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if(!empty($Detail)): foreach($Detail as $detail): ?>
                        <tr>
                            <td><?php echo
                                $detail['idRezervacia']; ?></td>
                            <td><?php echo $detail['idSportoviska'];
                                ?></td>
                            <td><?php echo $detail['idDetail'];?></td>
                            <td><?php echo $detail['cena_hod'];?></td>
                            <td><?php echo $detail['obsadene'];?></td>

                            <td>
                                <a href="<?php echo
                                site_url('Detail/view/'.$detail['idDetail']); ?>" class="glyphicon
glyphicons-eye-open"></a>
                                <a href="<?php echo
                                site_url('Detail/edit/'.$detail['idDetail']); ?>" class="glyphicon
glyphicon-edit"></a>
                                <a href="<?php echo
                                site_url('Detail/delete/'.$detail['idDetail']); ?>" class="glyphicon
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