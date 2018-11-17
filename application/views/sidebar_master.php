<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <h5 class="centered"><?php echo strtoupper($_SESSION['nama']);?></h5>
            <li class="sub-menu">
                <a href="<?= base_url();?><?= index_page();?>/Dashboard" id="menu_dashboard" >
                    <i class="fa fa-clock-o"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="<?= base_url();?><?= index_page();?>/Controlsoal" id="menu_control" >
                    <i class="fa fa-clock-o"></i>
                    <span>Control Soal</span>
                </a>
            </li>
            <?php if ($_SESSION['role_id'] == 1) {?>
                <li class="sub-menu">
                    <a class="" href="#" id="menu_bt">
                        <i class="fa fa-pencil"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="sub" id="sub_menu_master_data">
                        <li class="" id="menu_peserta"><a  href="<?= base_url();?><?= index_page();?>/MasterPeserta" >Master Peserta</a></li>
                        <li id="menu_gelombang"><a  href="<?= base_url();?><?= index_page();?>/Mastergelombang" >Master Gelombang</a></li>
                        <li id="menu_pertanyaan"><a  href="<?= base_url();?><?= index_page();?>/Masterpertanyaan" >Master Pertanyaan</a></li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->