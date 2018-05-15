
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Sportoviska <a href="<?php
                echo site_url('Sportoviska'); ?>" class="glyphicon glyphicon-arrow-left
pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>ID:</label>
                    <p><?php echo
                        !empty($Sportoviska['idSportoviska'])?$Sportoviska['idSportoviska']
                            :''; ?></p>
                </div>
                <div class="form-group">
                    <label>Objekt:</label>
                    <p><?php echo
                        !empty($Sportoviska['Objekt'])?$Sportoviska['Objekt']:'';
                        ?></p>
                </div>
                <div class="form-group">
                    <label>Otvorene_od:</label>
                    <p><?php echo
                        !empty($Sportoviska['otvorene_od'])?$Sportoviska['otvorene_od']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Otvorene_do:</label>
                    <p><?php echo
                        !empty($Sportoviska['otvorene_do'])?$Sportoviska['otvorene_do']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Adresa:</label>
                    <p><?php echo
                        !empty($Sportoviska['adresa'])?$Sportoviska['adresa']:''; ?></p>
                </div>

            </div>
        </div>
    </div>
</div>