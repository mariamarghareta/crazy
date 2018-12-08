<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Lihat Jawaban</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . $this->config->item('htdoc_folder') . 'application/views/header.php'); ?>
    <style type="text/css">
        .wrong{
            color: red;
        }
        .right {
            color: green;
        }
        .gray-bg{

        }
    </style>
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
            <div class="col-md-6 col-md-offset-3 margin-up-md">
                <div class="w3-container w3-green page-title w3-center w3-padding-16">
                    Lihat Jawaban
                </div>
                <div class="w3-container w3-white w3-padding-32">
                    <div class="row" style="margin-top: 25px;">
                        <div class="col-sm-12">
                            <h3>List Jawaban</h3>
                            <div class="col-sm-12" id="div_list">
                                <?php for($i=0;$i<sizeof($arr_soal);$i++){ ?>
                                    <div class="row <?php if($i % 2 == 0){echo " gray-bg";}?> " style="border-bottom:1px solid lightgray; margin-top: 20px;">
                                        <div class="row">
                                            <div class="col-sm-12"><?=$arr_soal[$i]->urutan_soal. ". " . $arr_soal[$i]->pertanyaan?> (<?php if($arr_soal[$i]->jawaban == 1){echo"Benar";}else{echo"Salah";}?>)</div>
                                        </div>
                                        <?php for($j=0;$j<sizeof($list_jawaban[$i]);$j++){ ?>
                                        <div class="row">
                                            <div class="col-sm-12" style="margin-left:25px;"><?="Wil. " . $list_jawaban[$i][$j]->wilayah_id . " - " . $list_jawaban[$i][$j]->username . " - " ?><?php if($list_jawaban[$i][$j]->jawaban == 1) {echo "Benar";} else {echo "Salah";}?></div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </section>

    <!--main content end-->

</section>
<?php include($_SERVER['DOCUMENT_ROOT'] . $this->config->item('htdoc_folder') . 'application/views/footer.php'); ?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#menu_lihat_jawaban").addClass('active');
        $("#err_msg").addClass('text-center');
        $(".sldown").slideDown("slow");
        $(".slup").slideUp("slow");
        $(".slfadein").fadeIn("slow");
        $(".slhide").hide();
        $(".slshow").show();
    });

</script>

</body>
</html>
