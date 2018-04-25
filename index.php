<!DOCTYPE html>
<html lang="es">
<?php include('vistas/layouts/htmlheader.php'); ?>
<body class="skin-blue sidebar-mini sidebar-collapse">
  <div class="wrapper">
    <?php include('vistas/layouts/mainheader.php'); ?>
    <?php include('vistas/layouts/sidebar.php'); ?>
    <div class="content-wrapper" >
      <section class="content" id="contenido">

                  <section class="content-header">
                      <h1>
                          Dashboard
                          <small>Control panel</small>
                      </h1>
                      <ol class="breadcrumb">
                          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                          <li class="active">Dashboard</li>
                      </ol>
                  </section>

                  <!-- Main content -->
                  <section class="content">
                      <!-- Small boxes (Stat box) -->
                      <div class="row">
                          <div class="col-lg-3 col-xs-6">
                              <!-- small box -->
                              <div class="small-box bg-aqua">
                                  <div class="inner">
                                      <h3>
                                          <?php
                                          require "modelo/conexion.php";
                                          $db = conexion($usuario,$clave);
                                          $count = current($db->query("SELECT COUNT(id)  FROM producto")->fetch());
                                          echo $count;
                                          ?>
                                      </h3>

                                      <p>Productos</p>
                                  </div>
                                  <div class="icon">
                                      <i class="ion ion-bag"></i>
                                  </div>
                                  <a href="/inventario/producto/producto.php" class="ajax-request " >Mas informacion <i class="fa fa-arrow-circle-right"></i></a>
                              </div>
                          </div>
                          <!-- ./col -->
                          <div class="col-lg-3 col-xs-6">
                              <!-- small box -->
                              <div class="small-box bg-green">
                                  <div class="inner">
                                      <h3> <?php
                                          $count = current($db->query("SELECT COUNT(rtn)  FROM proveedor")->fetch());
                                          echo $count;
                                          ?><sup style="font-size: 20px"></sup></h3>

                                      <p>Proveedores</p>
                                  </div>
                                  <div class="icon">
                                      <i class="ion ion-person-add"></i>
                                  </div>
                                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                              </div>
                          </div>
                          <!-- ./col -->
                          <div class="col-lg-3 col-xs-6">
                              <!-- small box -->
                              <div class="small-box bg-yellow">
                                  <div class="inner">
                                      <h3>0<?php
                                    //  $count = current($db->query("SELECT COUNT(rtn)  FROM cliente")->fetch());
                                    //      echo $count;
                                          ?></h3>

                                      <p>Registro de Clientes</p>
                                  </div>
                                  <div class="icon">
                                      <i class="ion ion-person-add"></i>
                                  </div>
                                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                              </div>
                          </div>
                          <!-- ./col -->
                          <div class="col-lg-3 col-xs-6">
                              <!-- small box -->
                              <div class="small-box bg-red">
                                  <div class="inner">
                                      <h3>65</h3>

                                      <p>Unique Visitors</p>
                                  </div>
                                  <div class="icon">
                                      <i class="ion ion-pie-graph"></i>
                                  </div>
                                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                              </div>
                          </div>
                          <!-- ./col -->
                      </div>
                      <!-- /.row -->
                      <!-- Main row -->
                      <div class="row">
                          <!-- Left col -->
                          <section class="col-lg-7 connectedSortable">
                              <!-- Custom tabs (Charts with tabs)-->
                              <div class="nav-tabs-custom">
                                  <!-- Tabs within a box -->
                                  <ul class="nav nav-tabs pull-right">
                                      <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                                      <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                                      <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                                  </ul>
                                  <div class="tab-content no-padding">
                                      <!-- Morris chart - Sales -->
                                      <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                                      <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                                  </div>
                              </div>
                          </section>
                      </div>
             </section>

      </section>
    </div>
    <?php include('vistas/layouts/footer.php'); ?>
  </div>
  <?php include('vistas/layouts/scripts.php'); ?>
</body>
</html>
