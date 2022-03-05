<?php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); ?>



<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Showrooms
            <span class="pull-right">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addshowroom"><i class="fas fa-plus-circle"></i> Add Showroom</button>
            </span>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-borderless table-hover" id="supTable">
            <thead class="table-dark">
                <tr>
                    <th>Map</th>
                    <th>Info</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cq = mysqli_query($conn, "SELECT * FROM SHOWROOM");
                while ($cqrow = mysqli_fetch_array($cq)) {
                ?>
                    <tr>
                        <td>
                            <div style="width: 100%">
                                <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?php echo $cqrow['latitude'] . "," . $cqrow['longtitude']; ?>+(<?php echo urlencode($cqrow['name']); ?>)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                                    <a href="http://www.gps.ie/">truck gps</a>
                                </iframe>
                            </div>
                        </td>
                        <td>
                            <b><?php echo $cqrow['name']; ?></b><br>
                            Address: <?php echo $cqrow['address']; ?><br>
                            Contact info: <?php echo $cqrow['phone']; ?>
                        </td>

                        <td>

                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $cqrow['showroom_id']; ?>"><i class="fas fa-trash-alt"></i> Delete</button>
                            <?php include('showroom_button.php'); ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>
</div>
<?php include 'add_showroom_modal.php'; ?>