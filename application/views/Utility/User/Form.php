<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form method="POST" action="<?=site_url('Utl_User/'.$url)?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="card-title">
                                <i class="mdi mdi-file-document-box"></i> Form User
                            </h4>
                        </div>
                    </div>    
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" id="username" value="<?php if(isset($user->username)){ echo $user->username; };?>" autocomplete="off" maxlength="25" required <?php if(isset($user->username)){ echo "readonly"; };?>>
                                <input type="hidden" name="userID" value="<?php if(isset($user->userID)){ echo $user->userID; };?>">
                            </div>
                        </div>
                    </div>
                    <?php if(isset($user->username)){ echo ""; }else{;?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control" id="password" value="<?php echo random_string()?>" autocomplete="off" maxlength="25" readonly>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="namaLengkap" class="form-control" id="namaLengkap" value="<?php if(isset($user->namaLengkap)){ echo $user->namaLengkap; };?>" autocomplete="off" maxlength="50" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Group Name</label>
                                <select class="select2" name="groupID" style="width: 100%" required>
                                    <option value=""> --- Pilih ---</option>
                                <?php foreach ($group as $row) : ?>
                                    <?php if($user->groupID == $row->groupID){ ?>
                                    <option value="<?=$row->groupID?>" selected><?=$row->groupName?></option>
                                    <?php }else{ ?>
                                    <option value="<?=$row->groupID?>"><?=$row->groupName?></option>
                                    <?php } ?>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">                    
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                            <a href="<?=site_url('Utl_User')?>" type="button" class="btn btn-inverse waves-effect waves-light">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>