<!doctype html>
<html lang="en">
  <head>
  	 <?php $this->load->view('layout/header'); ?>
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">OX Corporation</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="layers"></span>
                  Currencies <span class="sr-only">(current)</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>

        
      </div>
    </div>
	<?php $this->load->view('layout/footer'); ?>
  </body>
</html>
