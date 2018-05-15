
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Rezervacia <a href="<?php
                echo site_url('Rezervacia'); ?>" class="glyphicon glyphicon-arrow-left
pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>ID:</label>
                    <p><?php echo
                        !empty($Rezervacia['idRezervacia'])?$Rezervacia['idRezervacia']
                            :''; ?></p>
                </div>
                <div class="form-group">
                    <label>cas od:</label>
                    <p><?php echo
                        !empty($Rezervacia['cas_od'])?$Rezervacia['cas_od']:'';
                        ?></p>
                </div>
                <div class="form-group">
                    <label>cas do:</label>
                    <p><?php echo
                        !empty($Rezervacia['cas_do'])?$Rezervacia['cas_do']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>den:</label>
                    <p><?php echo
                        !empty($Rezervacia['den'])?$Rezervacia['den']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Sposob platby:</label>
                    <p><?php echo
                        !empty($Rezervacia['Sposob_platby'])?$Rezervacia['Sposob_platby']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>ID Zakaznika:</label>
                    <p><?php echo
                        !empty($Rezervacia['Zakaznik_idZakaznik'])?$Rezervacia['Zakaznik_idZakaznik']:''; ?></p>
                </div>

            </div>
        </div>
    </div>
</div>