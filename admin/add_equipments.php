<?php
include 'koneksi.php';
 session_start();
  if($_SESSION['status']!="login"){
    header("location:index.php?pesan=belum_login");
  }
?>
<?php
if (isset($_POST['Submit'])) {
        //$nama = $_POST['nama'];
        $judul = $_POST['judul'];
        $kategori = $_POST['kategori'];
        $foto = $_POST['foto'];
        $jumlah = $_POST['jumlah'];
        $kondisi = $_POST['kondisi'];
        $lemari = $_POST['lemari'];
        $checkName = "SELECT * FROM produk WHERE nama = '$judul'";
        $run = mysqli_query($conn, $checkName);
        $data = mysqli_fetch_array($run);
        $result = "INSERT INTO produk(nama,jumlah,kondisi,kategori_id,media_id,lemari) VALUES('$judul','$jumlah','$kondisi','$kategori','$foto','$lemari')";
        if ($data[0] > 0) {
                ?>
            <script>alert('Name already added. Input a different name')
            window.location = "equipments.php";
            </script>   
               <?php
               exit();
            } else {
            mysqli_query($conn,$result);
            header("location:equipments.php");
            }
        }
            ?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Inventory</title>
    <!-- Custom CSS -->
    <link href="../assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="../assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
    <link href="../dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <?php include 'include/header.php';  ?>
        <?php include 'include/left_nav.php';  ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Equipments</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Equipments</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <h5 class="card-header">Tambahkan Perlengkapan</h5>
                            <div class="card-body">
                                <div class="col-12 col-md-12">
                                   <form action="add_equipments.php" method="post">
                                        <div class="form-group">
                                            <label for="judul">Nama Perlengkapan</label>
                                            <input type="text" class="form-control" name="judul" placeholder="Masukkan Nama Perlengkapan">
                                    </div>
                                    <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <select class="form-control" name="kategori">
                                           <option value="">Pilih kategori Perlengkapan</option>
                                        <?php
                                          $sumber = mysqli_query($conn, "SELECT * FROM `kategori`;");
                                          while ($res=mysqli_fetch_array($sumber)) {
                                            echo "<option value=\"".$res['nama']."\">".$res['nama']."</option>";
                                          }
                                        ?>
                                        </select>
                                      </div>
                                      <div class="col-md-6">
                                        <select class="form-control" name="lemari">
                                           <option value="">Pilih kategori Tempat</option>
                                        <?php
                                          $sumber = mysqli_query($conn, "SELECT * FROM `lemari`;");
                                          while ($res=mysqli_fetch_array($sumber)) {
                                            echo "<option value=\"".$res['id']."\">".$res['nama']."</option>";
                                          }
                                        ?>
                                        </select>
                                      </div>
                                    <!-- <div class="col-md-6">
                                        <select class="form-control" name="foto">
                                          <option value="">Pilih kategori Foto</option>
                                        <?php
                                          $sumber = mysqli_query($conn, "SELECT * FROM `media`;");
                                          while ($res=mysqli_fetch_array($sumber)) {
                                            echo "<option value=\"".$res['file_name']."\">".$res['file_name']."</option>";
                                          }
                                        ?>
                                        </select>
                                      </div> -->
                                  </div>
                                  <div class="form-group mt-3">
                                   <div class="row">
                                     <div class="col-md-4">
                                       <div class="input-group">
                                         <span class="input-group-addon">
                                          <i class="glyphicon glyphicon-shopping-cart"></i>
                                         </span>
                                         <input type="number" class="form-control" name="jumlah" placeholder="Jumlah Perlengkapan">
                                      </div>
                                  </div>
                                  <div class="col-md-8">
                    <select class="form-control" name="kondisi">
                      <option value="">Pilih Kondisi Barang</option>
                      <option value="rusak">Rusak</option>
                      <option value="bagus">Bagus</option>
                    </select>
                              </div>
                              

                          </div>
                          <button class="btn btn-info mt-3" type="submit" name="Submit">Tambahkan Produk</button>
                                   </form>
                            </div>                            
                        </div>                        
                    </div>
                </div>                
           
                 <!-- BEGIN MODAL -->
                <div class="modal none-border" id="my-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Add Event</strong></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Add Category -->
                <div class="modal fade none-border" id="add-new-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Add</strong> a category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Category Name</label>
                                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Choose Category Color</label>
                                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                <option value="success">Success</option>
                                                <option value="danger">Danger</option>
                                                <option value="info">Info</option>
                                                <option value="primary">Primary</option>
                                                <option value="warning">Warning</option>
                                                <option value="inverse">Inverse</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center">
               <!--  All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>. -->
            </footer>
           </div>
        </div>
        <script src="js/Chart.min.js"></script>
    <script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Rusak', 'Baik', 'Dipinjam', 'Total'],
        datasets: [{
            label: 'Details',
            data: [12, 19, 3, 5],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../dist/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="../dist/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="../assets/libs/moment/min/moment.min.js"></script>
    <script src="../assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="../dist/js/pages/calendar/cal-init.js"></script>

</body>

</html>