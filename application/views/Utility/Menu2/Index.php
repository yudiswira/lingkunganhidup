<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="card-title">
                            <i class="mdi mdi-database"></i> Menu Level 2
                        </h4>
                    </div>
                    <div class="col-lg-6">
                        <a href="<?=site_url('Utl_Menu2/Form/Input')?>" type="button" class="btn waves-effect waves-light btn-info pull-right"><i class="mdi mdi-plus"></i>Tambah</a>
                    </div>
                </div>    
                <hr>
                <span><?php  if ($this->session->flashdata('message')){echo $this->session->flashdata('message');}?></span> 
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Menu ID</th>
                                <th>Menu Name</th>
                                <th>menu Icon</th>
                                <th>Menu Link</th>
                                <th>Menu Header</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($menu2 as $row) : ?>
                            <tr>
                                <td><?=$row->menuID;?></td>
                                <td><?=$row->menuName;?></td>
                                <td><?=$row->menuIcon;?> (<i class="<?=$row->menuIcon;?>"></i>)</td>
                                <td><?=$row->menuLink;?></td>
                                <td><?=$row->menuHeaderName;?></td>
                                <td style="text-align: center;">
                                    <a href="<?=site_url('Utl_Menu2/Form/Update/'.$row->menuID)?>" type="button" class="btn waves-effect waves-light btn-info"><i class="mdi mdi-table-edit"></i>  Edit</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>