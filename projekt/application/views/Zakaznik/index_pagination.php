<div class="container">
    <?php if(!empty($success_msg)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-success"><?php echo $success_msg; ?></div>
        </div>
    <?php }elseif(!empty($error_msg)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-danger"><?php echo $error_msg; ?></div>
        </div>
    <?php } ?>
    <div class="row">
        <h1>List Zakaznikov</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading">Zakaznik <a href="<?php echo site_url('temperatures/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="10%">idZakaznik</th>
                        <th width="30%">Meno</th>
                        <th width="25%">TelCislo</th>
                        <th width="20%">Email</th>
                        <th width="15%">Action</th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if(!empty($Zakaznik)): foreach($Zakaznik as $zakaznik): ?>
                        <tr>
                            <td><?php echo $zakaznik->idZakaznik; ?></td>
                            <td><?php echo $zakaznik->Meno; ?></td>
                            <td><?php echo $zakaznik->TelCislo;?></td>
                            <td><?php echo $zakaznik->Email;?></td>
                            <td>
                                <a href="<?php echo site_url('Zakaznik/view/'.$zakaznik->id); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('Zakaznik/edit/'.$zakaznik->id); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('Zakaznik/delete/'.$zakaznik->id); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4">Temperature(s) not found......</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div id="pagination" style="align-content: center">
                <ul class="pagination">
                    <!-- Show pagination links -->
                    <?php foreach ($links as $link) {
                        echo "<li class=\"page-item\">". $link."</li>";
                    } ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="panel panel-default ">
                <div class="panel-heading">Records per user</div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Count</th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php foreach($records_per_user->result() as $row):;?>
                        <tr>
                            <td><?php echo $row->user;?></td>
                            <td><?php echo $row->counts;?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="panel panel-default ">
                <div class="panel-heading">Records per user - chart</div>
                <p><?php //echo $json_records_per_user;?></p>
                <div id="chart_div"></div>
            </div>
        </div>
    </div>
</div>