  <!-- classes mean : 
                    navbar-expand-lg is about responsivity of the nav element. Here it says "expand on large screen"
                    bg-body-tertiary is about color and position but I don't get it yet  -->

  <header id="header">
    <nav class="navbar navbar-expand-md">
      <!-- classes mean : 
                                        container-fluid : means the container is in full width-->
      <div class="container-fluid">
        <!-- set our "brand" box with the logo of our brand -->
        <a class="navbar-brand" href="">
          <img src="../img/logoAAJA2.svg" alt="Logo AAJA">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/index.php?page=CV">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="../../pages/team.html">Notre équipe</a>
            </li>
            <li class="nav-item">

            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="../catalogue.html">Boutique</a>
            </li>
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Les CVs de notre équipe
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="andrea.html">Andrea Thouvenot</a></li>
                <li><a class="dropdown-item" href="axel.html">Axel Poty</a></li>
                <li><a class="dropdown-item" href="jonathan.html">Jonathan Luscap</a></li>
                <li><a class="dropdown-item" href="augustin.html">Augustin Pech</a></li>
              </ul>
            </li> -->
          </ul>
          <div class="d-flex gap-2">
            <a href="/index.php?page=contact" class="btn btn-light">Contactez nous</a>
            <!-- <a href="AAJA HTML-CSS/pages/intranet.html" class="btn btn-primary ml-2">Sign in</a> -->
            <a href="" class="btn btn-primary ml-2">Sign in</a>
          </div>
          <!-- search bar is not a feature yet
                                <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                              </form> -->
        </div>
      </div>
    </nav>
  </header>