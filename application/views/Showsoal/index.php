<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Master Gelombang</title>

    <?php include($_SERVER['DOCUMENT_ROOT'] . $this->config->item('htdoc_folder') . 'application/views/header.php'); ?>
    <style type="text/css">
        .btnjawab{
            font-size:18pt;
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
            <div class="col-md-8 col-md-offset-2" style="text-align: center">
                <?php if(sizeof($active_question) > 0){ ?>
                <div id="pertanyaan" style="font-size:60pt;margin-top: 50px;">
                    <?=$active_question[0]->urutan_soal . ". " . $active_question[0]->pertanyaan?>
                </div>
                <div id="jawaban_benar" class="btn btn-info" style="font-size:60pt">
                    <?php if($active_question[0]->show_jawaban==1){?>
                            <?php if($active_question[0]->jawaban == 0){echo "SALAH";}else{echo "BENAR";} ?>
                    <?php } ?>
                </div>
            </div>
            <?php }else {?>
                <div id="pertanyaan" style="font-size:60pt;margin-top: 50px;">Silahkan Menunggu Soal</div>
                <div id="jawaban_benar" class="btn btn-info" style="font-size:60pt">
                </div>
            <?php } ?>
            </div>
        </section>
    </section>

    <!--main content end-->

</section>
<?php include($_SERVER['DOCUMENT_ROOT'] . $this->config->item('htdoc_folder') . 'application/views/footer.php'); ?>

<script type="text/javascript">
    $(window).load(function(){
        $("#jawaban_benar").hide();
        <?php if(sizeof($active_question) == 0){ ?>
            $("#jawaban_benar").hide();
        <?php } else {
        if($active_question[0]->show_jawaban == 1){
        ?>
            $("#jawaban_benar").show();
        <?php
        }
        ?>

        <?php } ?>
    });

    $(document).ready(function(){
        $("#menu_soal").addClass('active');
        $("#err_msg").addClass('text-center');
        $(".sldown").slideDown("slow");
        $(".slup").slideUp("slow");
        $(".slfadein").fadeIn("slow");
        $(".slhide").hide();
        $(".slshow").show();
    });

    function check_new_question(){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . index_page() . "/Papansoal/get_question_now"; ?>",
            dataType: "json",
            data: {},
            success: function(data) {
                if(data[0].length > 0){
                    $("#row_soal").show();
                    $("#row_jawaban").show();
                    $soal = data[0];
                    if($soal[0]["show_jawaban"] == 1){
                        $jwb = $soal[0]["jawaban"];
                        $jwb_str = "SALAH";
                        if($jwb == 1){
                            $jwb_str = "BENAR";
                        }
                        $("#pertanyaan").html($soal[0]["urutan_soal"] + ". " + $soal[0]["pertanyaan"]);
                        $("#jawaban_benar").show();
                        $("#jawaban_benar").html($jwb_str);
                        $("#row_soal").hide();
                        $("#row_jawaban").hide();
                    }else {
                        $("#jawaban_benar").hide();
                        $("#jawaban_benar").html("");
                        if ($("#tid").val() != $soal[0]["id"]) {
                            $("#tid").val($soal[0]["id"]);
                            $("#pertanyaan").html($soal[0]["urutan_soal"] + ". " + $soal[0]["pertanyaan"]);
                            if (data[1] != "None") {
                                $("#tjawab").val(data[1]);
                                if (data[1] == 1) {
                                    $("#btn_benar").addClass("btn-success");
                                } else {
                                    $("#btn_salah").addClass("btn-danger");
                                }
                                $("#btn_salah").attr('disabled', 'disabled');
                                $("#btn_benar").attr('disabled', 'disabled');
                                $("#btn_kunci").addClass("btn-warning");
                            } else {
                                $("#tjawab").val("");
                                $("#btn_kunci").removeClass("btn-warning");
                                $("#btn_benar").removeClass("btn-success");
                                $("#btn_benar").addClass("btn-default");
                                $("#btn_salah").removeClass("btn-danger");
                                $("#btn_salah").addClass("btn-default");
                                $("#btn_salah").removeAttr('disabled');
                                $("#btn_benar").removeAttr('disabled');
                            }
                        }
                    }
                } else {
                    $("#pertanyaan").html("Silahkan Menunggu Soal");
                    $("#jawaban_benar").html("");
                    $("#jawaban_benar").hide();
                    $("#row_soal").hide();
                    $("#row_jawaban").hide();
                    $("#tid").val("");
                    $("#tjawab").val("");
                }
            },
            error: function(){

            }
        });
    }
    setInterval(check_new_question, 2000);

</script>

</body>
</html>
