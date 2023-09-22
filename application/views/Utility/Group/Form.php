<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form method="POST" action="<?=site_url('Utl_Group/'.$url)?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="card-title">
                                <i class="mdi mdi-file-document-box"></i> Form Group
                            </h4>
                        </div>
                    </div>    
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Group Name</label>
                                <input type="text" name="groupName" class="form-control" id="groupName" value="<?php if(isset($group->groupName)){ echo $group->groupName; };?>" autocomplete="off" maxlength="50">
                                <input type="hidden" name="groupID" value="<?php if(isset($group->groupID)){ echo $group->groupID; };?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card earning-widget">
                                <div class="card-header">
                                    <div class="card-actions">
                                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                    </div>
                                    <h4 class="card-title m-b-0">RTH Akses</h4>
                                </div>
                                <div class="card-body b-t collapse show">
                                    <table class="table v-middle no-border">
                                        <tbody>
                                            <?php foreach ($rth as $rth) : ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="tamanID[]" value="<?=$rth->tamanID?>" id="basic_checkbox_<?=$rth->tamanID?>" class="filled-in" <?php if($rth->flag == 1){echo "checked";}else{echo "";} ?>/>
                                                        <label for="basic_checkbox_<?=$rth->tamanID?>"><?=$rth->title?></label>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card earning-widget">
                                <div class="card-header">
                                    <div class="card-actions">
                                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                    </div>
                                    <h4 class="card-title m-b-0">Menu Akses</h4>
                                </div>
                                <div class="card-body b-t collapse show">
                                    <?php foreach ($menu1 as $mnu1) : ?>
                                        <div class="col-sm-12">
                                            <div class="card earning-widget">
                                                <div class="card-header">
                                                    <div class="card-actions">
                                                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                                    </div>
                                                    <h4 class="card-title m-b-0">
                                                        <input type="checkbox" name="menuID1[]" value="<?=$mnu1->menuID;?>" id="menu1_<?=$mnu1->menuID;?>" class="filled-in" <?php if($mnu1->flag == 1){echo "checked";}else{echo "";} ?>/>
                                                        <label for="menu1_<?=$mnu1->menuID;?>"><?=$mnu1->menuName;?></label>
                                                    </h4>
                                                </div>
                                                <div class="card-body b-t collapse show">
                                                    <table class="table v-middle no-border">
                                                        <tbody>
                                                            <?php foreach ($menu2 as $mnu2) : 
                                                                if($mnu2->menuHeader == $mnu1->menuID){
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <input type="checkbox" name="menuID2[]" value="<?=$mnu2->menuID;?>" id="menu2_<?=$mnu2->menuID;?>" class="filled-in" <?php if($mnu2->flag == 1){echo "checked";}else{echo "";} ?> />
                                                                        <label for="menu2_<?=$mnu2->menuID;?>"><?=$mnu2->menuName;?></label>
                                                                    </td>
                                                                </tr>
                                                            <?php 
                                                                }
                                                            endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">                    
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                            <a href="<?=site_url('Utl_Group')?>" type="button" class="btn btn-inverse waves-effect waves-light">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>