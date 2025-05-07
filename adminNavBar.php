<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container bg-dark">
          <a class="navbar-brand h1 mb-0" href="adminDashboard.php">
            <img class="me-3"  src="Resources/Img/ng.jpg" height="25">    
              Admin Dashboard</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">

        <li class="nav-item me-5">
          <a class="nav-link active" aria-current="page" href="adminUser.php">User Management</a>
        </li>

        <li class="nav-item me-5">
          <a class="nav-link active" aria-current="page" href="adminProduct.php">Product Management</a>
        </li>

        <li class="nav-item me-5">
          <a class="nav-link active" aria-current="page" href="adminStock.php">Stock Management</a>
        </li>

        <li class="nav-item me-5">
          <a class="nav-link active" aria-current="page" href="adminReport.php">Reports</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" onclick="signOut();">Sign Out</a>
        </li>
       
      </ul>
      
    </div>
  </div>
</nav>