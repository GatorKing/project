
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
        <h1>List Rezervácií</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading">Rezervacie <a href="<?php echo
                    site_url('Rezervacia'); ?>" class="glyphicon glyphicon-plus pullright"
                    ></a></div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="10%">idRezervacia</th>
                        <th width="20%">cas_od</th>
                        <th width="20%">cas_do</th>
                        <th width="20%">den</th>
                        <th width="10%">sposob_platby</th>
                        <th width="10%">Zakaznik_idZakaznik</th>
                        <th width="10%">Action</th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if(!empty($Rezervacia)): foreach($Rezervacia as $rezervacia): ?>
                        <tr>
                            <td><?php echo
                                $rezervacia['idRezervacia']; ?></td>
                            <td><?php echo $rezervacia['cas_od'];
                                ?></td>
                            <td><?php echo $rezervacia['cas_do'];?></td>
                            <td><?php echo $rezervacia['den'];?></td>
                            <td><?php echo $rezervacia['sposob_platby'];?></td>
                            <td><?php echo $rezervacia['Zakaznik_idZakaznik'];?></td>
                            <td>
                                <a href="<?php echo
                                site_url('Rezervacia/view/'.$rezervacia['idRezervacia']); ?>" class="glyphicon
glyphicons-eye-open"></a>
                                <a href="<?php echo
                                site_url('Rezervacia/edit/'.$rezervacia['idRezervacia']); ?>" class="glyphicon
glyphicon-edit"></a>
                                <a href="<?php echo
                                site_url('Rezervacia/delete/'.$rezervacia['idRezervacia']); ?>" class="glyphicon
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