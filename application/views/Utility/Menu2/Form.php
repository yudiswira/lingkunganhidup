<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form method="POST" action="<?=site_url('Utl_Menu2/'.$url)?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="card-title">
                                <i class="mdi mdi-file-document-box"></i> Form Menu Level 2
                            </h4>
                        </div>
                    </div>    
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Group Name</label>
                                <select class="select2" name="menuHeader" id="menuHeader" style="width: 100%" onchange="getKodeMenuHeader();" required>
                                    <option value=""> --- Pilih ---</option>
                                <?php 
                                if(isset($menu2->menuID)){
                                    $menuID = $menu2->menuHeader;
                                }else{
                                    $menuID = "";
                                }
                                foreach ($menu1 as $row) : ?>
                                    <?php if($menuID == $row->menuID){ ?>
                                    <option value="<?=$row->menuID?>" selected><?=$row->menuName?></option>
                                    <?php }else{ ?>
                                    <option value="<?=$row->menuID?>"><?=$row->menuName?></option>
                                    <?php } ?>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Menu ID</label>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="text" name="menuID1" class="form-control" id="menuID1" value="<?php if(isset($menu2->menuID)){ echo $menu2->menuHeader; };?>" autocomplete="off" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="menuID2" class="form-control" id="menuID2" value="00" autocomplete="off" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="menuID3" class="form-control" id="menuID3" value="<?php if(isset($menu2->menuID)){ echo substr($menu2->menuID, 3); };?>" autocomplete="off" maxlength="11" required>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Menu Name</label>
                                <input type="text" name="menuName" class="form-control" id="menuName" value="<?php if(isset($menu2->menuName)){ echo $menu2->menuName; };?>" autocomplete="off" maxlength="25" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Menu Icon</label>
                                <input type="text" name="menuIcon" class="form-control" id="menuIcon" value="<?php if(isset($menu2->menuIcon)){ echo $menu2->menuIcon; };?>" autocomplete="off" maxlength="50" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Menu Link</label>
                                <input type="text" name="menuLink" class="form-control" id="menuLink" value="<?php if(isset($menu2->menuLink)){ echo $menu2->menuLink; };?>" autocomplete="off" maxlength="50" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">                    
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                            <a href="<?=site_url('Utl_Menu2')?>" type="button" class="btn btn-inverse waves-effect waves-light">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function getKodeMenuHeader(){
        var menuHeader = $("#menuHeader").val();
        $("#menuID1").val(menuHeader);
        console.log(menuHeader);
    }
</script>