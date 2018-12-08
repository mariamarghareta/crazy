<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Monitoring</title>

    <?php include 'header.php' ?>
    <style type="text/css">
        .row_nama{
            font-size:16pt;
            margin-top: 15px;
        }
    </style>
</head>

<body>

<section id="container" >
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <?php include('headbar.php');?>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <?php include 'sidebar_master.php' ?>
    <!--sidebar end-->

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <div class="row">
                <div class="col-sm-2 col-sm-offset-1">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="">
                            <div class="col-sm-12" style="border-bottom: 1px solid gray;font-size: 35pt;text-align: center">
                                <b>Wilayah 1</b>
                            </div>
                            <div class="col-sm-12" style="text-align: center;font-size: 50pt">
                                <div id="score_1"><?=$total_score[0]?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="">
                            <div class="col-sm-12" style="border-bottom: 1px solid gray;font-size: 35pt;text-align: center">
                                <b>Wilayah 2</b>
                            </div>
                            <div class="col-sm-12" style="text-align: center;font-size: 50pt">
                                <div id="score_2"><?=$total_score[1]?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="">
                            <div class="col-sm-12" style="border-bottom: 1px solid gray;font-size: 35pt;text-align: center">
                                <b>Wilayah 3</b>
                            </div>
                            <div class="col-sm-12" style="text-align: center;font-size: 50pt">
                                <div id="score_3"><?=$total_score[2]?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="">
                            <div class="col-sm-12" style="border-bottom: 1px solid gray;font-size: 35pt;text-align: center">
                                <b>Wilayah 4</b>
                            </div>
                            <div class="col-sm-12" style="text-align: center;font-size: 50pt">
                                <div id="score_4"><?=$total_score[3]?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="">
                            <div class="col-sm-12" style="border-bottom: 1px solid gray;font-size: 35pt;text-align: center">
                                <b>Wilayah 5</b>
                            </div>
                            <div class="col-sm-12" style="text-align: center;font-size: 50pt">
                                <div id="score_5"><?=$total_score[4]?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 col-sm-offset-1">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="">
                            <div class="col-sm-12" style="border-bottom: 1px solid gray;font-size: 35pt;text-align: center">
                                <b>Wilayah 6</b>
                            </div>
                            <div class="col-sm-12" style="text-align: center;font-size: 50pt">
                                <div id="score_6"><?=$total_score[5]?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="">
                            <div class="col-sm-12" style="border-bottom: 1px solid gray;font-size: 35pt;text-align: center">
                                <b>Wilayah 7</b>
                            </div>
                            <div class="col-sm-12" style="text-align: center;font-size: 50pt">
                                <div id="score_7"><?=$total_score[6]?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="">
                            <div class="col-sm-12" style="border-bottom: 1px solid gray;font-size: 35pt;text-align: center">
                                <b>Wilayah 8</b>
                            </div>
                            <div class="col-sm-12" style="text-align: center;font-size: 50pt">
                                <div id="score_8"><?=$total_score[7]?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="">
                            <div class="col-sm-12" style="border-bottom: 1px solid gray;font-size: 35pt;text-align: center">
                                <b>Wilayah 9</b>
                            </div>
                            <div class="col-sm-12" style="text-align: center;font-size: 50pt">
                                <div id="score_9"><?=$total_score[8]?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="">
                            <div class="col-sm-12" style="border-bottom: 1px solid gray;font-size: 35pt;text-align: center">
                                <b>Wilayah 10</b>
                            </div>
                            <div class="col-sm-12" style="text-align: center;font-size: 50pt">
                                <div id="score_10"><?=$total_score[9]?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <!--main content end-->

</section>

<?php include 'footer.php' ?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#menu_dashboard").addClass('active');
        $("#err_msg").addClass('text-center');
        $(".sldown").slideDown("slow");
        $(".slup").slideUp("slow");
        $(".slfadein").fadeIn("slow");
        $(".slhide").hide();
        $(".slshow").show();
    });
    function check_score(){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . index_page() . "/Dashboard/get_score_now"; ?>",
            dataType: "json",
            data: {},
            success: function(data) {
                for($i=0;$i<(data).length;$i++){
                    $("#score_" + ($i+1)).html(data[$i]);
                }
            },
            error: function(){
            }
        });
    }
    setInterval(check_score, 2000);
</script>

</body>
</html>
