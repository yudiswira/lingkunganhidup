<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form method="POST" action="<?=site_url('Mst_Rth/'.$url)?>" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="card-title">
                                <i class="mdi mdi-file-document-box"></i> Form Ruang Terbuka Hijau
                            </h4>
                        </div>
                    </div>    
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Title Ruang Terbuka Hijau</label>
                                <input type="text" name="title" class="form-control" id="title" value="<?php if(isset($rth->title)){ echo $rth->title; };?>" autocomplete="off" maxlength="25" required>
                                <input type="hidden" name="tamanID" value="<?php if(isset($rth->tamanID)){ echo $rth->tamanID; };?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Url Cctv</label>
                                <input type="text" name="link" class="form-control" id="link" value="<?php if(isset($rth->link)){ echo $rth->link; };?>" autocomplete="off" maxlength="250" placeholder="https://www.youtube.com" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Foto RTH</label>
                                <input type="file" id="input-file-max-fs" name="image" data-default-file="<?=base_url()?>assets/img/rth/<?php if(isset($rth->img)){ echo $rth->img; };?>" class="dropify" data-max-file-size="1M" />
                                <input type="hidden" name="imgName" value="<?php if(isset($rth->img)){ echo $rth->img; };?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Descripsi</label>
                                <textarea class="form-control" name="Descripsi" rows="5" maxlength="250"><?php if(isset($rth->keterangan)){ echo $rth->keterangan; };?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">                    
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                            <a href="<?=site_url('Mst_Rth')?>" type="button" class="btn btn-inverse waves-effect waves-light">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>