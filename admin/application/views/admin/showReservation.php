<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/menu'); ?>



<div class="col-md-10 col-sm-11 main ">


    <div class="row inbox">



        <div class="col-md-12">

            <div class="panel panel-primary">

                <div class="panel-body message">


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading" data-original-title>
                                    <h2><i class="fa fa-list"></i><span class="break"></span>Pending Reservation.</h2>
                                    <div class="panel-actions">  <a href="" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>  </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Booking Reference 
                                                </th>
                                                <th>
                                                    Number of People
                                                </th>
                                                <th>
                                                    Date Time 
                                                </th>
                                                <th>
                                                    Status 
                                                </th>
                                                <th>
                                                    Room Type 
                                                </th>
                                               
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($reservations->result_array() as $row) {
                                                if ($row['status'] == 1) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            REF-<?php echo $row["id"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["number"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["datetime"]; ?>
                                                        </td>
                                                        <td>
                                                            Pending
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($row['room_type'] == 1) {
                                                                echo "Hall";
                                                            }
                                                            if ($row['room_type'] == 2) {
                                                                echo "A/C Hall";
                                                            }
                                                            if ($row['room_type'] == 2) {
                                                                echo "Non A/C Hall";
                                                            }
                                                            ?>
                                                        </td>
                                                        
                                                        <td><a class="glyphicon glyphicon-ok text-success acceptReserv"  data-id='<?php echo $row['id'];?>'></a></td>
                                                        <td><a class="glyphicon glyphicon-remove text-danger declineReserv" data-id='<?php echo $row['id'];?>'></a></td>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-success">
                                <div class="panel-heading" data-original-title>
                                    <h2><i class="fa fa-list"></i><span class="break"></span>Accepted Reservation.</h2>
                                    <div class="panel-actions">  <a href="" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>  </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Booking Reference 
                                                </th>
                                                <th>
                                                    Number of People
                                                </th>
                                                <th>
                                                    Date Time 
                                                </th>
                                                <th>
                                                    Status 
                                                </th>
                                                <th>
                                                    Room Type 
                                                </th>
                                                <th>
                                                    Comment 
                                                </th>
                                                <th>Updated</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($reservations->result_array() as $row) {
                                                if ($row['status'] == 2) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            REF-<?php echo $row["id"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["number"]; ?>
                                                        </td>
                                                        <td>
        <?php echo $row["datetime"]; ?>
                                                        </td>
                                                        <td>
                                                            <span class="text-success"> Accepted</span>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($row['room_type'] == 1) {
                                                                echo "Hall";
                                                            }
                                                            if ($row['room_type'] == 2) {
                                                                echo "A/C Hall";
                                                            }
                                                            if ($row['room_type'] == 2) {
                                                                echo "Non A/C Hall";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
        <?php echo $row["comment"]; ?>
                                                        </td>
                                                        <td>
        <?php echo $row["updated"]; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="panel panel-danger">
                                <div class="panel-heading" data-original-title>
                                    <h2><i class="fa fa-list"></i><span class="break"></span>Declined Reservation.</h2>
                                    <div class="panel-actions">  <a href="" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>  </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Booking Reference 
                                                </th>
                                                <th>
                                                    Number of People
                                                </th>
                                                <th>
                                                    Date Time 
                                                </th>
                                                <th>
                                                    Status 
                                                </th>
                                                <th>
                                                    Room Type 
                                                </th>
                                                <th>
                                                    Comment 
                                                </th>
                                                <th>Updated</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
$i = 1;
foreach ($reservations->result_array() as $row) {
    if ($row['status'] == 3) {
        ?>
 <tr>
                                                        <td>
                                                            REF-<?php echo $row["id"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["number"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["datetime"]; ?>
                                                        </td>
                                                        <td>
                                                            <span class="text-danger">Declined</span>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($row['room_type'] == 1) {
                                                                echo "Hall";
                                                            }
                                                            if ($row['room_type'] == 2) {
                                                                echo "A/C Hall";
                                                            }
                                                            if ($row['room_type'] == 2) {
                                                                echo "Non A/C Hall";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["comment"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["updated"]; ?>
                                                        </td>
                                                    </tr>
                                                   
        <?php
        $i++;
    }
}
?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/col--> 

                    </div>


                </div>

            </div>	

        </div>	

    </div><!--/.col-->	

</div><!--/row-->



</div>
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Cancel Reservation</h4>
            </div>
            <form method="post" action='<?php echo base_url('admin/declineReservation') ?>'>
            <div class="modal-body">
                
                <input type="hidden" id="modal_id" name="id" value="">
                <div class="form-group">
    <label for="exampleTextarea">Comment</label>
    <textarea class="form-control" row="5" name="comment" id="comment"></textarea>
  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" id="declineBtn">
            </div></form>
                
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>
<script>
    $(function () {
            $('.acceptReserv').on("click",function(e){
                 console.log("accept");
                 var id=$(e.target).data('id');
                 if(id){
                 window.location="<?php echo base_url();?>admin/acceptReservation?id="+id;
             }
                
            });
             $('.declineReserv').on("click",function(e){
                 console.log("cancel");
                  var id=$(e.target).data('id');
                 if(id){
                     $('#modal_id').val(id);
                     $("#myModal").modal("show");
                     $("#myModal").on('hidden.bs.modal',function(){
                          $('#modal_id').val("");
                          $('#comment').val("");
                         
                     });
                 }
             });
           
        });
    </script>

