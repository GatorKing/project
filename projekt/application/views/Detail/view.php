
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Detail <a href="<?php
                echo site_url('Detail'); ?>" class="glyphicon glyphicon-arrow-left
pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Rezervacia :</label>
                    <p><?php echo
                        !empty($Detail['Rezervacia_idRezervacia'])?$Detail['Rezervacia_idRezervacia']
                            :''; ?></p>
                </div>
                <div class="form-group">
                    <label>Sportovisko:</label>
                    <p><?php echo
                        !empty($Detail['Sportoviska_idSportoviska'])?$Detail['Sportoviska_idSportoviska']:'';
                        ?></p>
                </div>
                <div class="form-group">
                    <label>Detail:</label>
                    <p><?php echo
                        !empty($Detail['idDetail'])?$Detail['idDetail']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>cena_hod:</label>
                    <p><?php echo
                        !empty($Detail['cena_hod'])?$Detail['cena_hod']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>obsadene:</label>
                    <p><?php echo
                        !empty($Detail['obsadene'])?$Detail['obsadene']:''; ?></p>
                </div>


            </div>
        </div>
    </div>
</div>