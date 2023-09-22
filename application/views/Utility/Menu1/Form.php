<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form method="POST" action="<?=site_url('Utl_Menu1/'.$url)?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="card-title">
                                <i class="mdi mdi-file-document-box"></i> Form Menu Level 1
                            </h4>
                        </div>
                    </div>    
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Menu Name</label>
                                <input type="text" name="menuName" class="form-control" id="menuName" value="<?php if(isset($menu1->menuName)){ echo $menu1->menuName; };?>" autocomplete="off" maxlength="25" required>
                                <input type="hidden" name="menuID" value="<?php if(isset($menu1->menuID)){ echo $menu1->menuID; };?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Menu Icon</label>
                                <input type="text" name="menuIcon" class="form-control" id="menuIcon" value="<?php if(isset($menu1->menuIcon)){ echo $menu1->menuIcon; };?>" autocomplete="off" maxlength="50" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Menu Link</label>
                                <input type="text" name="menuLink" class="form-control" id="menuLink" value="<?php if(isset($menu1->menuLink)){ echo $menu1->menuLink; };?>" autocomplete="off" maxlength="50" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">                    
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                            <a href="<?=site_url('Utl_Menu1')?>" type="button" class="btn btn-inverse waves-effect waves-light">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>