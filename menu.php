<?php
session_start(); // Make sure to start the session if it's not started already
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="index.php">Yummy Restaurant Group Limited</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="topNavBar">
            <form class="d-flex ms-auto my-3 my-lg-0">
                <div class="input-group">


                </div>
            </form>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-fill"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>
<!-- top navigation bar -->
<!-- offcanvas -->
<div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">

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
                    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                        Interface
                    </div>
                </li>
                <li>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Supplier'): ?>
                    <a href="#" class="nav-link disabled px-3" id="Purchase">
                        <?php else: ?></a>
                    <a href="PurchaseSystem.php" class="nav-link px-3" id="Purchase">
                        <?php endif; ?>
                        <span class="me-2"><i class="bi bi-cart-fill"></i></span>
                        <span>Purchase Management</span>
                    </a>
                </li>
                <li>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Purchase Manager'): ?>
                    <a href="#" class="nav-link disabled px-3" id="Supplier">
                        <?php else: ?></a>
                    <a href="Supplier.php" class="nav-link px-3" id="Supplier">
                        <?php endif; ?>
                        <span class="me-2"><i class="bi bi-truck"></i></span>
                        <span>Supplier</span>

                    </a>
                </li>

                <li class="my-4">
                    <hr class="dropdown-divider bg-light" />
                </li>


            </ul>
        </nav>
    </div>
</div>
  