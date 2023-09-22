<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="card-title">
                            <i class="mdi mdi-widgets"></i> Utility Group
                        </h4>
                    </div>
                    <div class="col-lg-6">
                        <a href="<?=site_url('Utl_Group/Form/Input')?>" type="button" class="btn waves-effect waves-light btn-info pull-right"><i class="mdi mdi-plus"></i>Tambah</a>
                    </div>
                </div>    
                <hr>
                <span><?php  if ($this->session->flashdata('message')){echo $this->session->flashdata('message');}?></span> 
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Group Name</th>
                                <th>Status</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($group as $row) : ?>
                                <tr>
                                    <td><?=$row->groupName;?></td>
                                    <td><?php if($row->status == 0){echo '<span class="label label-success">Active</span>';}else{echo '<span class="label label-danger">NonActive</span>';}?></td>
                                    <td style="text-align: right;">
                                        <a href="<?=site_url('Utl_Group/Form/Update/'.$row->groupID)?>" type="button" class="btn waves-effect waves-light btn-info"><i class="mdi mdi-server-network"></i>  Set Akses</a>
                                        <!-- <?php if($row->status == 0){ ?>
                                        <a href="" type="button" class="btn waves-effect waves-light btn-success"><i class="mdi mdi-check"></i> On</a>
                                        <?php }else{ ?>
                                        <a href="" type="button" class="btn waves-effect waves-light btn-danger"><i class="mdi mdi-close"></i> Off</a>
                                        <?php } ?> -->
                                        <a href="<?=site_url('Utl_Group/DeleteGroup/'.$row->groupID)?>" type="button" class="btn waves-effect waves-light btn-danger"><i class="mdi mdi-delete"></i>  Hapus</a>
                                    </td>
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