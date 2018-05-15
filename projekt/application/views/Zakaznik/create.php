<div class="container">
    <div class="col-xs-12">
        <?php
        if(!empty($success_msg)){
            echo '<div class="alert alert-success">'.$success_msg.'</div>';
        }elseif(!empty($error_msg)){
            echo '<div class="alert alert-danger">'.$error_msg.'</div>';
        }
        ?>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $action; ?>
                    Zakaznik <a href="<?php echo site_url('Zakaznik/'); ?>"
                                   class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="title">idZakaznik</label>
                            <input type="text" class="form-control"
                                   name="idZakaznik" placeholder="Enter id" value="<?php echo
                            !empty($post['idZakaznik'])?$post['idZakaznik']:''; ?>">
                            <?php echo form_error('idZakaznik','<p
class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Meno</label>
                            <input type="text" class="form-control"
                                   name="Meno" placeholder="Napíš Meno" value="<?php echo
                            !empty($post['Meno'])?$post['Meno']:''; ?>">
                            <?php echo form_error('Meno','<p
class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">TelCislo</label>
                            <input type="text" class="form-control"
                                   name="TelCislo" placeholder="Napíš telCislo" value="<?php echo
                            !empty($post['TelCislo'])?$post['TelCislo']:''; ?>">
                            <?php echo form_error('TelCislo','<p class="helpblock
text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Email</label>
                            <input type="text" class="form-control"
                                   name="Email" placeholder="Napíš email" value="<?php echo
                            !empty($post['Email'])?$post['Email']:''; ?>">
                            <?php echo form_error('Email','<p class="helpblock
text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="content">Description</label>
                            <textarea name="description" class="formcontrol"
                                      placeholder="Enter description"><?php echo
                                !empty($post['description'])?$post['description']:''; ?></textarea>
                            <?php echo form_error('description','<p
class="text-danger">','</p>'); ?>
                        </div>
                        <input type="submit" name="postSubmit" class="btn
btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>