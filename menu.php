<?php
session_start(); // Make sure to start the session if it's not started already
?>
<script src="js/jquery-3.5.1.js"></script>
<script src="./js/jquery.dataTables.min.js"></script>
<script src="./js/dataTables.bootstrap5.min.js"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="index.php">Game Addiction Database</a>
        <button class="btn btn-outline-light borderless">POST</button>
        <button class="btn btn-outline-light borderless">CONTRACT</button>
        <button class="btn btn-outline-light borderless">ABOUT</button>
        <div class="change-fontsize">
            <span class="fontSizebtn" title="Font Size: Smaller" onclick="changeFontSize(1);">A</span>
            <span class="fontSizebtn vivid" title="Font Size: Normal" onclick="changeFontSize(2);">A</span>
            <span class="fontSizebtn" title="Font Size: Larger" onclick="changeFontSize(3);">A</span>
        </div>



            <ul class="navbar-nav" id="top">
                <?php
                // Check if user_logged_in cookie is set
                if(isset($_COOKIE['user_logged_in'])):
                    ?>
                    <form class="d-flex ms-auto my-3 my-lg-0 search-form" action="search.php" method="GET">
                        <span class="fa fa-search search-icon"></span>
                        <input type="text" name="query" class="form-control search-input me-2" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary mr-2" href="SingUp.php">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-secondary" href="Login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>


        </div>
    </div>
</nav>
<!-- top navigation bar -->
<!-- offcanvas -->
<div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav" >

                <li>
                    <a href="index.php" class="nav-link px-3 active">
                        <span class="me-2"><i class="bi bi-house"></i></span>
                        <span>Home</span>
                    </a>
                </li>
                <li class="my-4">
                    <hr class="dropdown-divider bg-light" />
                </li>

                <li>
                        <a href="PurchaseSystem.php" class="nav-link px-3" >
                            <span class="me-2"><i class="bi bi-newspaper"></i></span>
                            <span>POST</span>
                        </a>
                </li>
                <li>
                        <a href="Supplier.php" class="nav-link px-3" id="CONTRACT">
                            <span class="me-2"><i class="bi bi-telephone-fill"></i></span>
                            <span>CONTACT</span>
                        </a>
                </li>
                <li>
                        <a href="Supplier.php" class="nav-link px-3" id="ABOUT">
                            <span class="me-2"><i class="bi bi-question-circle"></i></span>
                            <span>ABOUT</span>
                        </a>
                </li>
                <li>
                    <div class="change-fontsize">
                        <span class="fontSizebtn" title="Font Size: Smaller" onclick="changeFontSize(1);">A</span>
                        <span class="fontSizebtn vivid" title="Font Size: Normal" onclick="changeFontSize(2);">A</span>
                        <span class="fontSizebtn" title="Font Size: Larger" onclick="changeFontSize(3);">A</span>
                    </div>
                </li>
                <li class="my-4">
                <?php
                // Check if user_logged_in cookie is set
                if(isset($_COOKIE['user_logged_in'])):
                    ?>
                    <form class="d-flex ms-auto my-3 my-lg-0 search-form" action="search.php" method="GET">
                        <span class="fa fa-search search-icon"></span>
                        <input type="text" name="query" class="form-control search-input me-2" id="small-search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="AdminIndex.php">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary mr-2" href="SingUp.php">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-secondary" href="Login.php">Login</a>
                    </li>
                <?php endif; ?>
                </li>
                <li class="my-4">
                    <hr class="dropdown-divider bg-light" />
                </li>
            </ul>
        </nav>
    </div>
</div>