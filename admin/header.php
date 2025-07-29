
<?php
    include 'head.php';
?>

    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <!-- <div class="logo-src">
                  <img src="assets/images/rich_logo.png" alt="">
                </div> -->
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                    <!-- <ul class="header-menu nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon fa fa-database"> </i>
                                Statistics
                            </a>
                        </li>
                        <li class="btn-group nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon fa fa-edit"></i>
                                Projects
                            </a>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li>
                    </ul>   -->
                    </div>
                <!-- <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                                            <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                                            <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                            <button type="button" tabindex="0" class="dropdown-item">Actions</button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <button type="button" tabindex="0" class="dropdown-item">Dividers</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        Alina Mclourd
                                    </div>
                                    <div class="widget-subheading">
                                        VP People Manager
                                    </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                        <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div> -->
            </div>
        </div>        
        
        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Dashboards</li>
                                <li>
                                    <a href="index.php" class="mm-active">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">List Page</li>
                                <!-- <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        Web page
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="banner">
                                                <i class="metismenu-icon"></i>
                                                Banner
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <a href="project">
                                                <i class="metismenu-icon"></i>
                                                Project
                                            </a>
                                        </li>

                                        <li>
                                            <a href="whyus">
                                                <i class="metismenu-icon"></i>
                                                Why Us
                                            </a>
                                        </li>

                                        <li>
                                            <a href="whyinvest">
                                                <i class="metismenu-icon"></i>
                                                Why Invest
                                            </a>
                                        </li>

                                        <li>
                                            <a href="about">
                                                <i class="metismenu-icon"></i>
                                                About Chairman
                                            </a>
                                        </li>
                                    </ul>
                                </li> -->
                                <!-- <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-car"></i>
                                        Components
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="components-tabs.html">
                                                <i class="metismenu-icon">
                                                </i>Tabs
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li> -->
                                <li>
                                    <a href="logo.php">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Logo
                                    </a>
                                </li>
                                <li>
                                    <a href="banner.php">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Banner
                                    </a>
                                </li>
                                <li>
                                    <a href="project.php">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Project
                                    </a>
                                </li>
                                <li>
                                    <a href="whyus.php">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Why Us
                                    </a>
                                </li>
                                <li>
                                    <a href="whyinvest_desc.php">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Why Invest Description
                                    </a>
                                </li>
                                <li>
                                    <a href="whyinvest.php">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Why Invest
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="about.php">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        About Chairman
                                    </a>
                                </li>
                                <li>
                                    <a href="social_media.php">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Social Media
                                    </a>
                                </li>
                                <li>
                                    <a href="web_header.php">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Web Header
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Property</li>
                                <li>
                                    <a href="property.php">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Property List
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Inquiry Data</li>
                                <li>
                                    <a href="property_data.php">
                                        <i class="metismenu-icon pe-7s-mouse">
                                        </i> Inquiry From Property
                                    </a>
                                </li>
                                <li>
                                    <a href="property_list_data.php">
                                        <i class="metismenu-icon pe-7s-eyedropper">
                                        </i>Inquiry From Property List
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="forms-validation.html">
                                        <i class="metismenu-icon pe-7s-pendrive">
                                        </i>Forms Validation
                                    </a>
                                </li> -->
                                <li class="app-sidebar__heading">Charts</li>
                                <!-- <li>
                                    <a href="charts-chartjs.html">
                                        <i class="metismenu-icon pe-7s-graph2">
                                        </i>ChartJS
                                    </a>
                                </li> -->
                                <li>
                                    <a href="logout.php">
                                        <i class="metismenu-icon pe-7s-graph2">
                                        </i>LOGOUT
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>   
                
                <div class="app-main__outer">