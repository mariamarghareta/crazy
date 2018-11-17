<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Master Peserta</title>

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
            <div class="col-md-12 white-bg margin-up-md">
                <div class="margin-down-lg ">
                    <div class="col-sm-8 page-title">Master Peserta</div>
                    <div class="col-sm-4 right-align"><a href="<?php echo base_url() . index_page(); ?>/MasterPeserta/create" class="btn btn-success btn-sm"><i class="fa fa-plus"></i><span> TAMBAH DATA</span></a></div>
                </div>
                <table
                    id="table"
                    data-toggle="true"
                    data-show-columns="false"
                    data-height="500">
                    <thead>
                    <tr>
                        <th data-field="nama" data-sortable="true">Nama</th>
                        <th data-field="username" data-sortable="true">Username</th>
                        <th data-field="wilayah_id" data-sortable="true">Wilayah</th>
                        <th data-field="role_name" data-sortable="true">Role</th>
                        <th data-field="action"
                            data-align="center"
                            data-formatter="actionFormatter">Aksi</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </section>
    </section>

    <!--main content end-->

</section>
<?php include($_SERVER['DOCUMENT_ROOT'] . $this->config->item('htdoc_folder') . 'application/views/footer.php'); ?>

<script type="text/javascript">
    $(window).load(function(){
        var data = <?php echo $arr;?>;
        $(function() {
            $('#table').bootstrapTable({
                data: data,
            });
        });
    });

    $(document).ready(function(){
        $("#menu_peserta").addClass('active');
        $("#sub_menu_master_data").css("display", "block");
        $("#err_msg").addClass('text-center');
        $(".sldown").slideDown("slow");
        $(".slup").slideUp("slow");
        $(".slfadein").fadeIn("slow");
        $(".slhide").hide();
        $(".slshow").show();
    });

    function actionFormatter(value, row) {
        return [
            '<a href="<?php echo base_url() . index_page(); ?>/MasterPeserta/Show/' + row['id'] + '" class="btn btn-default waves-effect">Lihat</a>',
            '<a href="<?php echo base_url() . index_page(); ?>/MasterPeserta/update/' + row['id'] + '" class="btn btn-default waves-effect">Ubah</a>',
            '<a href="<?php echo base_url() . index_page(); ?>/MasterPeserta/delete/' + row['id'] + '" class="btn btn-danger waves-effect">Hapus</a>',
        ].join('');
    }
</script>

</body>
</html>
