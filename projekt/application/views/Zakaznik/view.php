
<div class="container">
 <div class="row">
 <div class="panel panel-default">
 <div class="panel-heading">Zakaznik Details <a href="<?php
echo site_url('temperatures/'); ?>" class="glyphicon glyphicon-arrow-left
pull-right"></a></div>
 <div class="panel-body">
 <div class="form-group">
 <label>ID:</label>
 <p><?php echo
!empty($Zakaznik['idZakaznik'])?$Zakaznik['idZakaznik']
:''; ?></p>
</div>
<div class="form-group">
    <label>Meno:</label>
    <p><?php echo
        !empty($Zakaznik['Meno'])?$Zakaznik['Meno']:'';
        ?></p>
</div>
<div class="form-group">
    <label>TelCislo:</label>
    <p><?php echo
        !empty($Zakaznik['TelCislo'])?$Zakaznik['TelCislo']:''; ?></p>
</div>
<div class="form-group">
    <label>Email:</label>
    <p><?php echo
        !empty($Zakaznik['Email'])?$Zakaznik['Email']:''; ?></p>
</div>
<div class="form-group">
    <label>Description:</label>
    <p><?php echo
        !empty($Zakaznik['description'])?$Zakaznik['description']:'';
        ?></p>
</div>
</div>
</div>
</div>
</div>