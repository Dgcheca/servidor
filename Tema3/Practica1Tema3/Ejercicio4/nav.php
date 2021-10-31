<div class="sidebar">
    <!--Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="home.php" class="simple-text logo-normal">
                <p>PORTAL</p>
            </a>
        </div>
        <ul class="nav">
            <li>
                <a href="alumnos.php">
                    <i class="tim-icons icon-single-02"></i>
                    <p>Alumnos</p>
                </a>
            </li>
            <li>
                <a href="cursos.php">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>Cursos</p>
                </a>
            </li>
        </ul>
    </div>
</div>

    <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <h1>IES JAROSO</h1>
            </div>
            <div>

            </div>
            <div>
                <ul class="nav">

                    <li class="nav-item">
                        <p class="nav-link"><?= $_SESSION['usuario']?></p>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php" name="logout">
                            <p>Logout</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    