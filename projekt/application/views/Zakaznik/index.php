
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
 <h1>List zákazníkov</h1>
 </div>
 <div class="row">
 <div class="col-xs-12">
 <div class="panel panel-default ">
 <div class="panel-heading">Zakaznik <a href="<?php echo
site_url('Zakaznik'); ?>" class="glyphicon glyphicon-plus pullright"
></a></div>
 <table class="table table-striped">
 <thead>
 <tr>
<th width="15%">idZakaznik</th>
 <th width="25%">Meno</th>
 <th width="25%">TelCislo</th>
 <th width="20%">Email</th>
 <th width="15%">Action</th>
 </tr>
 </thead>
 <tbody id="userData">
 <?php if(!empty($Zakaznik)): foreach($Zakaznik as $zakaznik): ?>
 <tr>
 <td><?php echo
$zakaznik['idZakaznik']; ?></td>
 <td><?php echo $zakaznik['Meno'];
?></td>
 <td><?php echo $zakaznik['TelCislo'];?></td>
 <td><?php echo $zakaznik['Email'];?></td>
 <td>
 <a href="<?php echo
site_url('Zakaznik/view/'.$zakaznik['id']); ?>" class="glyphicon
glyphicons-eye-open"></a>
 <a href="<?php echo
site_url('Zakaznik/edit/'.$Zakaznik['id']); ?>" class="glyphicon
glyphicon-edit"></a>
 <a href="<?php echo
site_url('Zakaznik/delete/'.$zakaznik['id']); ?>" class="glyphicon
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