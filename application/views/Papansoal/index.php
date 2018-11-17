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
            font-size:20pt;
        }
    </style>
</head>

<body>

<section id="container" >
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <?php include($_SERVER['DOCUMENT_ROOT'] . $this->config->item('htdoc_folder') . 'application/views/headbar_peserta.php'); ?>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <!--sidebar end-->

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="">
        <section class="wrapper site-min-height">
            <div class="col-md-8 col-md-offset-2 white-bg margin-up-md" style="text-align: center">
                <?php if(sizeof($active_question) > 0){ ?>
                    <h1><?=$active_question[0]->pertanyaan?></h1>
                    <div class="row" style="margin-top: 50px;">
                        <input type="hidden" value="<?=$active_question[0]->id?>" id="tid" name="tid" />
                        <input type="hidden" value="<?=$jawaban?>" id="tjawab" name="tjawab" />
                        <button id="btn_benar" onclick="click_benar(this)" class="btn col-sm-3 col-sm-offset-2 btn-default waves-effect btnjawab">BENAR</button>
                        <button id="btn_salah" onclick="click_salah(this)" class="btn col-sm-3 col-sm-offset-2 btn-default waves-effect btnjawab">SALAH</button>
                    </div>
                    <div class="row" style="margin-top: 30px;">
                        <h4>Jika sudah yakin dengan jawaban Anda, segera kunci jawaban Anda</h4>
                        <div class="row">
                            <button id="btn_kunci" onclick="lock(this)" class="btn col-sm-8 col-sm-offset-2 btn-default waves-effect btnjawab">KUNCI JAWABAN</button>
                        </div>
                        <h5 style="color:red;">*Jawaban Terkunci apabila tombol berwarna kuning</h5>
                    </div>
                <?php }else {?>
                    <h1>Silahkan Menunggu Soal</h1>
                <?php } ?>
            </div>
        </section>
    </section>

    <!--main content end-->

</section>
<?php include($_SERVER['DOCUMENT_ROOT'] . $this->config->item('htdoc_folder') . 'application/views/footer.php'); ?>

<script type="text/javascript">
    $(window).load(function(){
        if("<?=$jawaban?>" != "None"){
            if(<?=$jawaban?> == 1){
                $("#btn_benar").addClass("btn-success");
            }else{
                $("#btn_salah").addClass("btn-danger");
            }
            $("#btn_salah").attr('disabled','disabled');
            $("#btn_benar").attr('disabled','disabled');
            $("#btn_kunci").addClass("btn-warning");
        }
    });

    $(document).ready(function(){
        $("#menu_gelombang").addClass('active');
        $("#sub_menu_master_data").css("display", "block");
        $("#err_msg").addClass('text-center');
        $(".sldown").slideDown("slow");
        $(".slup").slideUp("slow");
        $(".slfadein").fadeIn("slow");
        $(".slhide").hide();
        $(".slshow").show();
    });

    function click_benar(e){
        $(e).removeClass("btn-default");
        $(e).addClass("btn-success");
        $("#btn_salah").removeClass("btn-danger");
        $("#btn_salah").addClass("btn-default");
        $("#tjawab").val(1);
    }

    function click_salah(e){
        $(e).removeClass("btn-default");
        $(e).addClass("btn-danger");
        $("#btn_benar").removeClass("btn-success");
        $("#btn_benar").addClass("btn-default");
        $("#tjawab").val(0);
    }

    function lock(e){
        if($("#tjawab").val() != "" && !$("#btn_kunci").hasClass("btn-warning")){
            $("#btn_salah").attr('disabled','disabled');
            $("#btn_benar").attr('disabled','disabled');
            $(e).addClass("btn-warning");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . index_page() . "/Jawabpertanyaan/submit_jawaban"; ?>",
                dataType: "json",
                data: {soal_id: $("#tid").val(), jawaban: $("#tjawab").val()},
                success: function(data) {
                    if(!data[0]){
                        $("#btn_kunci").removeClass("btn-warning");
                        $("#btn_benar").removeClass("btn-success");
                        $("#btn_benar").addClass("btn-default");
                        $("#btn_salah").removeClass("btn-danger");
                        $("#btn_salah").addClass("btn-default");
                        $("#btn_salah").removeAttr('disabled');
                        $("#btn_benar").removeAttr('disabled');
                        $("#tjawab").val("");
                    }
                },
                error: function(){
                    $("#btn_kunci").removeClass("btn-warning");
                    $("#btn_benar").removeClass("btn-success");
                    $("#btn_benar").addClass("btn-default");
                    $("#btn_salah").removeClass("btn-danger");
                    $("#btn_salah").addClass("btn-default");
                    $("#btn_salah").removeAttr('disabled');
                    $("#btn_benar").removeAttr('disabled');
                    $("#tjawab").val("");
                }
            });
        }
    }

    function explode(){
        alert("Boom!");
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . index_page() . "/Papansoal/get_question_now"; ?>",
            dataType: "json",
            data: {soal_id: $("#tid").val(), jawaban: $("#tjawab").val()},
            success: function(data) {
                if(!data[0]){
                    $("#btn_kunci").removeClass("btn-warning");
                    $("#btn_benar").removeClass("btn-success");
                    $("#btn_benar").addClass("btn-default");
                    $("#btn_salah").removeClass("btn-danger");
                    $("#btn_salah").addClass("btn-default");
                    $("#btn_salah").removeAttr('disabled');
                    $("#btn_benar").removeAttr('disabled');
                    $("#tjawab").val("");
                }
            },
            error: function(){
                $("#btn_kunci").removeClass("btn-warning");
                $("#btn_benar").removeClass("btn-success");
                $("#btn_benar").addClass("btn-default");
                $("#btn_salah").removeClass("btn-danger");
                $("#btn_salah").addClass("btn-default");
                $("#btn_salah").removeAttr('disabled');
                $("#btn_benar").removeAttr('disabled');
                $("#tjawab").val("");
            }
        });
    }
//    setTimeout(explode, 5000);

</script>

</body>
</html>
