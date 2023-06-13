<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#">TaskWise</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">

        <?php
        
        if (isset($_SESSION['user'])) {
          $username = $_SESSION['user']['username'];
          $id = $_SESSION['user']['id'];
          echo '
                      <li class="nav-item">
                      <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="projetos.php">Projetos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="registrarProjeto.php">Registrar Projeto</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="creditos.php">Créditos</a>
                  </li>
                      <li class="nav-item">
                      <span class="nav-link">Logged in as ' . $username . '</span>
                    </li>
                    <form style="margin-block-end: 0;" action="backend/logout.php" method="post">
                    <button class="btn btn-primary" type="submit" name="logout-submit">Logout</button>
                  </form>';
        } else {
          echo '<li class="nav-item">
                      <a class="nav-link" href="index.php">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="register.php">Register</a>
                    </li>';
        }
        ?>

      </ul>
    </div>
  </div>
</nav>