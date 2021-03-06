<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Master Pertanyaan</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . $this->config->item('htdoc_folder') . 'application/views/header.php'); ?>
</head>

<body>

<section id="container" >
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <?php include($_SERVER['DOCUMENT_ROOT'] . $this->config->item('htdoc_folder') . 'application/views/headbar.php'); ?>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <?php include($_SERVER['DOCUMENT_ROOT'] . $this->config->item('htdoc_folder') . 'application/views/sidebar_master.php'); ?>
    <!--sidebar end-->

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <div class="col-md-8 col-md-offset-2 margin-up-md">
                <div class="w3-container w3-green page-title w3-center w3-padding-16">
                    Master Pertanyaan
                </div>

                <?php
                $attributes = array('class' => 'form-horizontal', 'id' => 'form_blok');
                if ($state == "update"){
                    echo form_open('Masterpertanyaan/update_data', $attributes);
                } else if ($state == "create"){
                    echo form_open('Masterpertanyaan/add_new_data', $attributes);
                } else if ($state == "delete"){
                    echo form_open('Masterpertanyaan/delete_data', $attributes);
                }
                ?>
                <input type="hidden" name="tid" id="tid" value="<?php echo $id; ?>">
                <div class="w3-container w3-white w3-padding-32">
                    <div style="margin:10px 20px;">
                        <?php if ($state == "delete"){?>
                            <div style="margin-bottom: 20px; font-weight:bold;">Apakah Anda yakin menghapus data ini?</div>
                        <?php } ?>
                        <label>Pertanyaan</label>
                        <?php echo form_input(array('name'=>'pertanyaan', 'id'=>'pertanyaan', 'class'=>'w3-input'), $pertanyaan);?>
                        <?php echo form_error('pertanyaan'); ?>
                        <div class="row" style="margin-top: 25px;">
                            <div class="col-sm-12">
                                <label>Jawaban</label>
                                <select name="jawaban" class="col-sm-12 form-control">
                                    <option value="0" <?php if ($jawaban == "" or $jawaban == 0){echo "selected";}?> >Salah</option>
                                    <option value="1" <?php if ($jawaban == 1){echo "selected";}?> >Benar</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 25px;">
                            <div class="col-sm-12">
                                <label>Gelombang</label>
                                <select name="gelombang_id" class="col-sm-12 form-control">
                                    <?php for($i=0;$i<sizeof($gelombang);$i++){ ?>
                                        <option value="<?=$gelombang[$i]->id?>" <?php if ($gelombang[$i]->id == $gelombang_id){echo "selected";}?> ><?=$gelombang[$i]->nama?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php if ($state != "create"){ ?>
                        <div class="col-sm-12">
                            <h4>Tambahan Informasi</h4>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-sm-6">Dibuat Oleh</div>
                                <div class="col-sm-6">: <?php echo $create_user; ?> </div>
                                <div class="col-sm-6">Dibuat Pada</div>
                                <div class="col-sm-6">: <?php echo $create_time; ?> </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-6">Terakhir di Rubah Oleh</div>
                                <div class="col-sm-6">: <?php echo $write_user; ?> </div>
                                <div class="col-sm-6">Terakhir di Ubah Pada</div>
                                <div class="col-sm-6">: <?php echo $write_time; ?> </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($state == "update") { ?>
                        <div class="text-center">
                            <button name="write" value="write" type="submit" class="w3-button w3-green w3-center margin-up-md">Ubah Data</button>
                            <button name="cancel" class="w3-button w3-grey w3-center margin-up-md"><a href="<?php echo base_url() . index_page(); ?>/Masterpertanyaan">Batal</a></button>
                        </div>
                    <?php } else if ($state == "create"){ ?>
                        <div class="text-center">
                            <button name="add" type="submit" class="w3-button w3-green w3-center margin-up-md">Tambah Data</button>
                        </div>
                    <?php } else if ($state == "delete"){?>
                        <div class="text-center">
                            <button name="delete" value="delete" type="submit" class="w3-button w3-red w3-center margin-up-md">Hapus Data</button>
                            <button name="cancel" class="w3-button w3-grey w3-center margin-up-md"><a href="<?php echo base_url() . index_page(); ?>/Masterpertanyaan">Batal</a></button>
                        </div>
                    <?php }?>
                    <div class="margin-up-sm">
                        <?=$msg?>
                    </div>
                </div>
                <?php
                echo form_close();
                ?>

            </div>
        </section>
    </section>

    <!--main content end-->

</section>
<?php include($_SERVER['DOCUMENT_ROOT'] . $this->config->item('htdoc_folder') . 'application/views/footer.php'); ?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#menu_pertanyaan").addClass('active');
        $("#sub_menu_master_data").css("display", "block");
        $("#err_msg").addClass('text-center');
        $(".sldown").slideDown("slow");
        $(".slup").slideUp("slow");
        $(".slfadein").fadeIn("slow");
        $(".slhide").hide();
        $(".slshow").show();
    });

    if( "<?php echo $state ?>" == "delete" || "<?php echo $state ?>" == "show"){
        $("input[type=text]").prop('disabled', true);
        $("select").prop('disabled', true);
    }
</script>

</body>
</html>
