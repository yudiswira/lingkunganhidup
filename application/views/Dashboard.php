<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- Row -->
<?php for ($i=0;$i<count($rth);$i++) { ?>
    <div class="row">
        <!-- Column -->
    <?php for ($j=0;$j<count($rth[$i]);$j++) { ?>
        <div class="col-lg-6 col-xlg-6 col-md-6">
            <div class="card blog-widget">
                <div class="card-body">
                    <div class="blog-image"><img src="<?=base_url()?>assets/img/rth/<?=$rth[$i][$j]["img"];?>" alt="img" style="height: 350px" class="img-responsive" /></div>
                    <h3><b><?=$rth[$i][$j]["title"];?></b></h3>
                    <p class="m-t-5 m-b-20"><?=$rth[$i][$j]["keterangan"];?></p>
                    <a href="<?=$rth[$i][$j]["link"];?>" target="_blank" type="button" class="btn waves-effect waves-light btn-info"><i class="mdi mdi-eye"></i>  View</a>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
<?php } ?>
<!-- ============================================================== -->
<!-- End Right sidebar -->
<!-- ============================================================== -->