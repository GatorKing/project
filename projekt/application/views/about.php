
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

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
                    site_url('Zakaznik/create/'); ?>" class="glyphicon glyphicon-plus pullright"
                    ></a></div>
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
                            <td><?php echo
                                $zakaznik['idZakaznik']; ?></td>
                            <td><?php echo $zakaznik['Meno'];
                                ?></td>
                            <td><?php echo $zakaznik['TelCislo'];?></td>
                            <td><?php echo $zakaznik['Email'];?></td>
                            <td>
                                <a href="<?php echo
                                site_url('Zakaznik/view/'.$zakaznik['id']); ?>" class="glyphicon
glyphicon-eye-open"></a>
                                <a href="<?php echo
                                site_url('Zakaznik/edit/'.$Zakaznik['id']); ?>" class="glyphicon
glyphicon-edit"></a>
                                <a href="<?php echo
                                site_url('Zakaznik/delete/'.$zakaznik['id']); ?>" class="glyphicon
glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4">Temperature(s) not
                                found......</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

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


</div>



</body>
</html>