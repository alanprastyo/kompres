<ul class="nav nav-list">

    <br>
    <br/>

    <li>
        <a href="<?php echo base_url(); ?>pemandu/dashboard">
            <i class="menu-icon fa fa-tachometer dashboard"></i>
            <span class="menu-text"> Beranda </span>
        </a>
    </li>


    <li>
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-desktop"></i>
            <span class="menu-text">Pemesanan </span>

            <b class="arrow icon-angle-down"></b>
        </a>

        <ul class="submenu">
            <li>
                <a href="<?php echo base_url(); ?>pemandu/dashboard/list_pemesanan">
                    <i class="icon-double-angle-right"></i>
                    List Pemesanan
                </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>pemandu/dashboard/promo_wisata_baru">
                    <i class="icon-double-angle-right"></i>
                    Approve Pemesanan
                </a>
            </li>
        </ul>
    </li>
   

    <li>
        <a href="<?php echo base_url(); ?>pemandu/dashboard/profile">
            <i class="menu-icon fa fa-user"></i>
            <span class="menu-text"> Profile </span>
        </a>
    </li>


</ul>
