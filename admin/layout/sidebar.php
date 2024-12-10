    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
                <span class="app-brand-logo demo">

                </span>
                <span class="app-brand-text demo menu-text fw-bolder ms-2"><img src="../assets/img/backgrounds/download.png" alt="" width="50" height="auto" class=""></span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <!-- <li class="menu-item active">
                <a href="../index.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a> -->
            </li>


            <?php if ($_SESSION['level'] == 1): ?>
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Administrator</span>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-dock-top"></i>
                        <div data-i18n="Account Settings">Master Data</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="data-pengguna.php" class="menu-link">
                                <div data-i18n="Account">Data Pengguna</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="tambah-jurusan.php" class="menu-link">
                                <div data-i18n="Connections">Tambah Jurusan</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="tambah-level.php" class="menu-link">
                                <div data-i18n="Notifications">Tambah Level</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="gelombang.php" class="menu-link">
                                <div data-i18n="Notifications">gelombang</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="jurusan.php" class="menu-link">
                                <div data-i18n="Notifications">Jurusan</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="tambah-user.php" class="menu-link">
                                <div data-i18n="Notifications">tambah-pengguna</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="tambah-data-peserta.php?tambah" class="menu-link">
                                <div data-i18n="Notifications">Tambah Data Peserta</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="data-peserta.php" class="menu-link">
                                <div data-i18n="Notifications">Data Peserta</div>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif ?>
            <!-- Components -->
            <!-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li> -->
            <!-- Cards -->

            <?php if ($_SESSION['level'] == 2 || $_SESSION['level'] == 1): ?>
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Admin APK</span>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-dock-top"></i>
                        <div data-i18n="Account Settings">Data Peserta</div>
                    </a>
                    <ul class="">

                        <li class="menu-item">
                            <a href="data-peserta.php" class="menu-link">
                                <div data-i18n="Notifications">Data Peserta</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="status-peserta.php" class="menu-link">
                                <div data-i18n="Notifications">Status Peserta</div>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif ?>
            <?php if ($_SESSION['level'] == 3 || $_SESSION['level'] == 1): ?>
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">PIC Jurusan</span>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-dock-top"></i>
                        <div data-i18n="Account Settings">Data Peserta</div>
                    </a>
                    <ul class="">
                        <li class="menu-item">
                            <a href="data-peserta.php" class="menu-link">
                                <div data-i18n="Notifications">Data Peserta</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="status-peserta.php" class="menu-link">
                                <div data-i18n="Notifications">Status Peserta</div>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif ?>
            <!-- User interface -->
            <!-- <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-box"></i>
                    <div data-i18n="User interface">User interface</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="ui-accordion.html" class="menu-link">
                            <div data-i18n="Accordion">Accordion</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-alerts.html" class="menu-link">
                            <div data-i18n="Alerts">Alerts</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-badges.html" class="menu-link">
                            <div data-i18n="Badges">Badges</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-buttons.html" class="menu-link">
                            <div data-i18n="Buttons">Buttons</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-carousel.html" class="menu-link">
                            <div data-i18n="Carousel">Carousel</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-collapse.html" class="menu-link">
                            <div data-i18n="Collapse">Collapse</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-dropdowns.html" class="menu-link">
                            <div data-i18n="Dropdowns">Dropdowns</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-footer.html" class="menu-link">
                            <div data-i18n="Footer">Footer</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-list-groups.html" class="menu-link">
                            <div data-i18n="List Groups">List groups</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-modals.html" class="menu-link">
                            <div data-i18n="Modals">Modals</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-navbar.html" class="menu-link">
                            <div data-i18n="Navbar">Navbar</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-offcanvas.html" class="menu-link">
                            <div data-i18n="Offcanvas">Offcanvas</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-pagination-breadcrumbs.html" class="menu-link">
                            <div data-i18n="Pagination &amp; Breadcrumbs">Pagination &amp; Breadcrumbs</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-progress.html" class="menu-link">
                            <div data-i18n="Progress">Progress</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-spinners.html" class="menu-link">
                            <div data-i18n="Spinners">Spinners</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-tabs-pills.html" class="menu-link">
                            <div data-i18n="Tabs &amp; Pills">Tabs &amp; Pills</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-toasts.html" class="menu-link">
                            <div data-i18n="Toasts">Toasts</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-tooltips-popovers.html" class="menu-link">
                            <div data-i18n="Tooltips & Popovers">Tooltips &amp; popovers</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-typography.html" class="menu-link">
                            <div data-i18n="Typography">Typography</div>
                        </a>
                    </li>
                </ul>
            </li> -->

            <!-- Extended components -->


            <li class="menu-item">
                <a href="icons-boxicons.html" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-crown"></i>
                    <div data-i18n="Boxicons">Boxicons</div>
                </a>
            </li>

            <!-- Forms & Tables -->

        </ul>
    </aside>