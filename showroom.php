<div class="w3-container">
    <div class="w3-margin-top">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Showrooms

                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table width="100%" class="table table-striped table-bordered table-hover" id="cusTable">
                    <thead>
                        <tr>
                            <th>Map</th>
                            <th>Info</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cq = mysqli_query($conn, "select * from SHOWROOM");
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


                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>