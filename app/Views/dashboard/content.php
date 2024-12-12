<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <a href="<?php echo site_url("home/jenis_usaha") ?>">
                  <span class="info-box-text">Jenis Usaha</span>
                </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
              <a href="<?php echo site_url("home/data_umkm") ?>">
                <span class="info-box-text">Data UMKM</span>
              </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
              <a href="<?php echo site_url("home/data_kriteria") ?>">
                <span class="info-box-text">Data Criteria</span>
              </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
              <a href="<?php echo site_url("home/data_bobot") ?>">
                <span class="info-box-text">Data Bobot</span>
              </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Nama Jenis Usaha UMKM</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Usaha UMKM</th>
                        <th>Nama Pimpinan</th>
                        <th>Jalan</th>
                        <th>Pusat</th>
                        <th>Jenis Usaha</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data_umkm as $umkm) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $umkm->nama_umkm; ?></td>
                            <td><?= $umkm->pimpinan; ?></td>
                            <td><?= $umkm->jalan; ?></td>
                            <td><?= $umkm->pusat; ?></td>
                            <td><?= $umkm->jenis_umkm; ?></td>
                            <td>
                                <a href="<?= site_url('home/hapus_umkm/' . $umkm->id_umkm); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </a>
                            </td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="<?php echo site_url("home/data_umkm")?>" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="<?php echo site_url("home/data_umkm")?>" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->