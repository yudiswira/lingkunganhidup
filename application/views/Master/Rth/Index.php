<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="card-title">
                            <i class="mdi mdi-database"></i> Master Ruang Terbuka Hijau
                        </h4>
                    </div>
                    <div class="col-lg-6">
                        <a href="<?=site_url('Mst_Rth/Form/Input')?>" type="button" class="btn waves-effect waves-light btn-info pull-right"><i class="mdi mdi-plus"></i>Tambah</a>
                    </div>
                </div>    
                <hr>
                <span><?php  if ($this->session->flashdata('message')){echo $this->session->flashdata('message');}?></span>
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Title Ruang Tumbuh Hijau</th>
                                <th>Url Cctv</th>
                                <th>Foto RTH</th>
                                <th>Status</th>
                                <th>Descripsi</th>
                                <th style="text-align: center;width: 200px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rth as $row) : ?>
                                <tr>
                                    <td><?=$row->title;?></td>
                                    <td><?=$row->link;?></td>
                                    <td><img src="<?=base_url('assets/img/rth/'.$row->img)?>" width="80" height="40"></td>
                                    <td><?php if($row->status == 0){echo '<span class="label label-success">Active</span>';}else{echo '<span class="label label-danger">NonActive</span>';}?></td>
                                    <td><?= substr($row->keterangan, 0, 40);?></td>
                                    <td style="text-align: right;">
                                        <a href="<?=site_url('Mst_Rth/Form/Update/'.$row->tamanID)?>" type="button" class="btn waves-effect waves-light btn-info"><i class="mdi mdi-table-edit"></i>  Edit</a>
                                        <!-- <?php if($row->status == 0){ ?>
                                        <a href="" type="button" class="btn waves-effect waves-light btn-success"><i class="mdi mdi-check"></i> On</a>
                                        <?php }else{ ?>
                                        <a href="" type="button" class="btn waves-effect waves-light btn-danger"><i class="mdi mdi-close"></i> Off</a>
                                        <?php } ?> -->
                                        <a href="<?=site_url('Mst_Rth/DeleteMstRth/'.$row->tamanID.'/'.$row->img)?>" type="button" class="btn waves-effect waves-light btn-danger"><i class="mdi mdi-delete"></i>  Hapus</a>
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