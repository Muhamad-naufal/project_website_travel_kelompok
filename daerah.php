<?php
session_start();
include "public/config/connection.php"
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>Daerah</title>
    <?php
    include "public/layouts/head.php";
    ?>
</head>

<body>
    <div class="page">
        <header class="section page-header">
            <!-- RD Navbar-->
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-corporate" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="106px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
                    <?php
                    include "public/layouts/header.php";
                    ?>
                    <div class="rd-navbar-main-outer">
                        <div class="rd-navbar-main">
                            <div class="rd-navbar-nav-wrap">
                                <!-- RD Navbar Nav-->
                                <ul class="rd-navbar-nav">
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="index.php">Home</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="about.php">About</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="kategori.php">Kategori</a>
                                    </li>
                                    <li class="rd-nav-item active"><a class="rd-nav-link" href="daerah.php">Daerah</a>
                                    </li>
                                    <?php
                                    if (isset($_SESSION["username"])) { ?>
                                        <li class="dropdown rd-nav-item">
                                            <a href="#" class="dropdown-toggle rd-nav-link" data-toggle="dropdown">
                                                <?php echo $_SESSION["username"] ?>
                                                <b class="caret"></b>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="logout.php">Logout</a></li>
                                            </ul>
                                        </li>
                                    <?php } else { ?>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="login.php">Login</a>
                                        </li>
                                    <?php }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <!-- Breadcrumbs -->
        <section class="breadcrumbs-custom-inset">
            <div class="breadcrumbs-custom context-dark bg-overlay-60">
                <div class="container">
                    <h2 class="breadcrumbs-custom-title">Daerah</h2>
                    <ul class="breadcrumbs-custom-path">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Daerah</li>
                    </ul>
                </div>
                <div class="box-position" style="background-image: url(public/assets/images/salak.jpg);"></div>
            </div>
        </section>
        <!-- Why choose us-->

        <section class="section section-sm">
            <div class="container">
                <h3 class="title-block find-car oh"><span class="d-inline-block wow slideInUp">Daerah</span></h3>
                <div class="w-50 mx-auto animated slideInDown mb-5 mt-5" style="position: relative;">
                    <form action="search_daerah.php" method="get">
                        <input class="form-control rounded-pill w-100" name="pencarian" type="text" placeholder="Cari Daerah.." style="border-radius: 16px;">
                        <button type="submit" class="btn btn-primary btn-sm py-2 px-4" style="position: absolute; top: 0; right: 0; border-radius: 16px;"><i class="bi-search"></i></button>
                    </form>
                </div>
                <div class="row row-30 justify-content-center box-ordered">
                    <?php
                    include "public/config/connection.php";
                    $query1 = mysqli_query($connect, "SELECT d.*, t.id, t.gambar
                    FROM daerah AS d
                    JOIN (
                        SELECT id_daerah, MIN(id) AS id
                        FROM traveling
                        GROUP BY id_daerah
                    ) AS t_min ON t_min.id_daerah = d.id_nama_daerah
                    JOIN traveling AS t ON t.id = t_min.id 
                    ORDER BY d.id_nama_daerah;");
                    while ($data2 = mysqli_fetch_array($query1)) {
                    ?>
                        <div class="col-sm-6 col-md-5 col-lg-3">
                            <!-- Team Modern-->
                            <article class="team-modern">
                                <div class="team-modern-header"><a class="team-modern-figure" href="detail_daerah.php?id_nama_daerah=<?php echo $data2['id_nama_daerah'] ?>"><img class="img-circles" src="admin/pages/travel/<?php echo $data2['gambar'] ?>" alt="" style="max-width: 118px !important; height:118px !important" /></a>
                                    <svg x=" 0px" y="0px" width="270px" height="70px" viewbox="0 0 270 70" enable-background="new 0 0 270 70" xml:space="preserve">
                                        <g>
                                            <path fill="#161616" d="M202.085,0C193.477,28.912,166.708,50,135,50S76.523,28.912,67.915,0H0v70h270V0H202.085z"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="team-modern-caption">
                                    <h6 class="team-modern-name"><a href="detail_daerah.php?id_nama_daerah=<?php echo $data2['id_nama_daerah'] ?>"><?php echo $data2['nama_daerah'] ?></a></h6>
                                </div>
                            </article>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <?php
        include "public/layouts/footer.php";
        ?>

    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="public/assets/js/core.min.js"></script>
    <script src="public/assets/js/script.js"></script>
</body>

</html>