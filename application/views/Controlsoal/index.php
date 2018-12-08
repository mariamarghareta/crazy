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
            <div class="col-md-12 margin-up-md">
                <div class="w3-container w3-green page-title w3-center w3-padding-16">
                    Master Control Soal
                </div>
                <div class="w3-container w3-white w3-padding-32">
                    <div class="row" style="margin-top: 25px;">
                        <div class="col-sm-12">
                            <h3>Gelombang</h3>
                            <div class="col-sm-6">
                                <select name="gelombang_id" id="gelombang_id" class="form-control">
                                    <?php for($i=0;$i<sizeof($gelombang);$i++){ ?>
                                        <option value="<?=$gelombang[$i]->id?>" <?php if ($gelombang[$i]->active == 1){echo "selected";}?> ><?=$gelombang[$i]->nama?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button onclick="active_gelombang()" class="btn btn-default waves-effect">Active</button>
                            </div>
                            <div class="col-sm-2" id="msg">

                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 25px;">
                        <div class="col-sm-12">
                            <h3>List Soal</h3>
                            <div class="col-sm-12" id="div_list">
                                <?php for($i=0;$i<sizeof($arr_soal);$i++){ ?>
                                    <div class="row <?php if($i % 2 == 0){echo " gray-bg";}?> " style="border-bottom:1px solid lightgray; margin-top: 20px;">
                                        <div class="col-sm-1"><?=$arr_soal[$i]->urutan_soal?></div>
                                        <div class="col-sm-5"><?=$arr_soal[$i]->pertanyaan?></div>
                                        <div class="col-sm-2 <?php if($arr_soal[$i]->jawaban == 1){echo" right";}else{echo" wrong";}?> " ><?php if($arr_soal[$i]->jawaban == 1){echo"Benar";}else{echo"Salah";}?></div>
                                        <div class="col-sm-1 lb_status">
                                            <?php
                                                if($arr_soal[$i]->active == 1 && $arr_soal[$i]->show_jawaban == 0){
                                                    echo "Active";
                                                } else if($arr_soal[$i]->active == 1 && $arr_soal[$i]->show_jawaban == 1){
                                                    echo "Show Answer";
                                                }else if ($arr_soal[$i]->active == 2){
                                                    echo "Done";
                                                }else{
                                                    echo"";
                                                }
                                            ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <?php if($arr_soal[$i]->is_close != 1) {?>
                                            <button onclick="to_active(this,<?php echo $arr_soal[$i]->id; ?>)" class="btn btn-danger waves-effect">Open</button>
                                            <button onclick="to_close(this,<?php echo $arr_soal[$i]->id; ?>)" class="btn btn-primary waves-effect">Close</button>
                                            <button onclick="to_done(this,<?php echo $arr_soal[$i]->id; ?>)" class="btn btn-sucess waves-effect">Done</button>
                                            <button onclick="to_show_answer(this,<?php echo $arr_soal[$i]->id; ?>)" class="btn btn-warning waves-effect">Show Jawaban</button>
                                            <?php } ?>
                                        </div>
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
        $("#menu_gelombang").addClass('active');
        $("#sub_menu_master_data").css("display", "block");
        $("#err_msg").addClass('text-center');
        $(".sldown").slideDown("slow");
        $(".slup").slideUp("slow");
        $(".slfadein").fadeIn("slow");
        $(".slhide").hide();
        $(".slshow").show();
    });

    function to_close(e, $id_soal){
        $gelombang_id = ($("#gelombang_id").val());
        $soal_id = ($id_soal);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . index_page() . "/Masterpertanyaan/close"; ?>",
            dataType: "json",
            data: {soal_id: $soal_id, gelombang_id: $gelombang_id},
            success: function(data) {
                if(data[0]){
                    $(e).parent().parent().find('.lb_status').html('');
                }
            }
        });
    }
    function to_active(e, $id_soal){
        $gelombang_id = ($("#gelombang_id").val());
        $soal_id = ($id_soal);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . index_page() . "/Masterpertanyaan/activate"; ?>",
            dataType: "json",
            data: {soal_id: $soal_id, gelombang_id: $gelombang_id},
            success: function(data) {
                if(data[0]){
                    $(".lb_status").html("");
                    $(e).parent().parent().find('.lb_status').html('Active');
                }
            }
        });
    }
    function to_done(e, $id_soal){
        $gelombang_id = ($("#gelombang_id").val());
        $soal_id = ($id_soal);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . index_page() . "/Masterpertanyaan/done"; ?>",
            dataType: "json",
            data: {soal_id: $soal_id, gelombang_id: $gelombang_id},
            success: function(data) {
                if(data[0]){
                    $(".lb_status").html("");
                    $(e).parent().parent().find('.lb_status').html('Done');
                    $(e).parent().html("");
                }
            }
        });
    }
    function to_show_answer(e, $id_soal){
        $gelombang_id = ($("#gelombang_id").val());
        $soal_id = ($id_soal);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . index_page() . "/Masterpertanyaan/show_answer"; ?>",
            dataType: "json",
            data: {soal_id: $soal_id, gelombang_id: $gelombang_id},
            success: function(data) {
                if(data[0]){
                    $(e).parent().parent().find('.lb_status').html('Show Answer');
                }
            }
        });
    }
    function active_gelombang(){
        $gelombang_id = ($("#gelombang_id").val());
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . index_page() . "/Mastergelombang/activate_gelombang"; ?>",
            dataType: "json",
            data: {gelombang_id: $gelombang_id},
            success: function(data) {
                $("#msg").html(data[0]);
                $str = "";
                for($i=0;$i<(data[1]).length;$i++){
                    $row = "";
                    if($i %2 == 0){
                        row = " gray-bg";
                    }
                    $str += '<div class="row ' + $row +' " style="border-bottom:1px solid lightgray; margin-top: 20px;">';
                    $str += '<div class="col-sm-1">' + data[1][$i]["urutan_soal"] + '</div>';
                    $str += '<div class="col-sm-5">' + data[1][$i]["pertanyaan"] + '</div>';
                    if(data[1][$i]["jawaban"] == 0){
                        $str += '<div class="col-sm-2 wrong">Salah</div>';
                    } else {
                        $str += '<div class="col-sm-2 right">Benar</div>';
                    }
                    if(data[1][$i]["active"] == 1){
                        $str += '<div class="col-sm-1 lb_status">Active</div>';
                    }else {
                        $str += '<div class="col-sm-1 lb_status"></div>';
                    }
                    $str += '<div class="col-sm-3">';
                    if(data[1][$i]["is_close"] != 1){
                        $str += ' <button onclick="to_active(this,' + data[1][$i]["id"] +')" class="btn btn-danger waves-effect">Open</button>';
                        $str += ' <button onclick="to_close(this,' + data[1][$i]["id"] +')" class="btn btn-primary waves-effect">Close</button>';
                        $str += ' <button onclick="to_done(this,' + data[1][$i]["id"] +')" class="btn btn-sucess waves-effect">Done</button>';
                        $str += ' <button onclick="to_show_answer(this,' + data[1][$i]["id"] +')" class="btn btn-warning waves-effect">Show Jawaban</button>';
                    }
                    $str += '</div>';
                    $str += '</div>';
                }
                $("#div_list").html($str);
            }
        });
    }

</script>

</body>
</html>
