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
                        <div class="row" style="border-bottom: 1px solid gray;">
                            <div class="col-sm-6">
                                <h3>Wil. 1</h3>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                <h3><?=$total_score[0]?></h3>
                            </div>
                        </div>
                        <?php for($i=0;$i<sizeof($score[0]);$i++){?>
                            <div class="row row_nama" style="">
                                <div class="col-sm-1"> <?=$i+1?> </div>
                                <div class="col-sm-8"> <?=$score[0][$i]->nama?> </div>
                                <div class="col-sm-2"> <?=$score[0][$i]->score?> </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="border-bottom: 1px solid gray;">
                            <div class="col-sm-6">
                                <h3>Wil. 2</h3>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                <h3><?=$total_score[1]?></h3>
                            </div>
                        </div>
                        <?php for($i=0;$i<sizeof($score[1]);$i++){?>
                            <div class="row row_nama">
                                <div class="col-sm-1"> <?=$i+1?> </div>
                                <div class="col-sm-8"> <?=$score[1][$i]->nama?> </div>
                                <div class="col-sm-2"> <?=$score[1][$i]->score?> </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="border-bottom: 1px solid gray;">
                            <div class="col-sm-6">
                                <h3>Wil. 3</h3>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                <h3><?=$total_score[2]?></h3>
                            </div>
                        </div>
                        <?php for($i=0;$i<sizeof($score[2]);$i++){?>
                            <div class="row row_nama">
                                <div class="col-sm-1"> <?=$i+1?> </div>
                                <div class="col-sm-8"> <?=$score[2][$i]->nama?> </div>
                                <div class="col-sm-2"> <?=$score[2][$i]->score?> </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="border-bottom: 1px solid gray;">
                            <div class="col-sm-6">
                                <h3>Wil. 4</h3>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                <h3><?=$total_score[3]?></h3>
                            </div>
                        </div>
                        <?php for($i=0;$i<sizeof($score[3]);$i++){?>
                            <div class="row row_nama">
                                <div class="col-sm-1"> <?=$i+1?> </div>
                                <div class="col-sm-8"> <?=$score[3][$i]->nama?> </div>
                                <div class="col-sm-2"> <?=$score[3][$i]->score?> </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="border-bottom: 1px solid gray;">
                            <div class="col-sm-6">
                                <h3>Wil. 5</h3>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                <h3><?=$total_score[4]?></h3>
                            </div>
                        </div>
                        <?php for($i=0;$i<sizeof($score[4]);$i++){?>
                            <div class="row row_nama">
                                <div class="col-sm-1"> <?=$i+1?> </div>
                                <div class="col-sm-8"> <?=$score[4][$i]->nama?> </div>
                                <div class="col-sm-2"> <?=$score[4][$i]->score?> </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 col-sm-offset-1">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="border-bottom: 1px solid gray;">
                            <div class="col-sm-6">
                                <h3>Wil. 6</h3>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                <h3><?=$total_score[5]?></h3>
                            </div>
                        </div>
                        <?php for($i=0;$i<sizeof($score[5]);$i++){?>
                            <div class="row row_nama">
                                <div class="col-sm-1"> <?=$i+1?> </div>
                                <div class="col-sm-8"> <?=$score[5][$i]->nama?> </div>
                                <div class="col-sm-2"> <?=$score[5][$i]->score?> </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="border-bottom: 1px solid gray;">
                            <div class="col-sm-6">
                                <h3>Wil. 7</h3>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                <h3><?=$total_score[6]?></h3>
                            </div>
                        </div>
                        <?php for($i=0;$i<sizeof($score[6]);$i++){?>
                            <div class="row row_nama">
                                <div class="col-sm-1"> <?=$i+1?> </div>
                                <div class="col-sm-8"> <?=$score[6][$i]->nama?> </div>
                                <div class="col-sm-2"> <?=$score[6][$i]->score?> </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="border-bottom: 1px solid gray;">
                            <div class="col-sm-6">
                                <h3>Wil. 8</h3>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                <h3><?=$total_score[7]?></h3>
                            </div>
                        </div>
                        <?php for($i=0;$i<sizeof($score[7]);$i++){?>
                            <div class="row row_nama">
                                <div class="col-sm-1"> <?=$i+1?> </div>
                                <div class="col-sm-8"> <?=$score[7][$i]->nama?> </div>
                                <div class="col-sm-2"> <?=$score[7][$i]->score?> </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="border-bottom: 1px solid gray;">
                            <div class="col-sm-6">
                                <h3>Wil. 9</h3>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                <h3><?=$total_score[8]?></h3>
                            </div>
                        </div>
                        <?php for($i=0;$i<sizeof($score[8]);$i++){?>
                            <div class="row row_nama">
                                <div class="col-sm-1"> <?=$i+1?> </div>
                                <div class="col-sm-8"> <?=$score[8][$i]->nama?> </div>
                                <div class="col-sm-2"> <?=$score[8][$i]->score?> </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="white-bg margin-up-md">
                        <div class="row" style="border-bottom: 1px solid gray;">
                            <div class="col-sm-6">
                                <h3>Wil. 10</h3>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                <h3><?=$total_score[9]?></h3>
                            </div>
                        </div>
                        <?php for($i=0;$i<sizeof($score[9]);$i++){?>
                            <div class="row row_nama">
                                <div class="col-sm-1"> <?=$i+1?> </div>
                                <div class="col-sm-8"> <?=$score[9][$i]->nama?> </div>
                                <div class="col-sm-2"> <?=$score[9][$i]->score?> </div>
                            </div>
                        <?php } ?>
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
</script>

</body>
</html>
