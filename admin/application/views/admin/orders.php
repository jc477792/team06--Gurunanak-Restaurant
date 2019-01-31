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
                                    <h2><i class="fa fa-list"></i><span class="break"></span>Orders</h2>
                                    <div class="panel-actions">  <a href="" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>  </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                        <thead>
                                            <tr>
                                                  <th>Order Number</th>
                                                <th>
                                                    Dish Name
                                                </th>
                                               
                                                
                                                <th>
                                                   Quantity
                                                </th>
                                                <th>
                                                    Price
                                                </th>
                                                <th>
                                                    Total
                                                </th>
                                                 <th>
                                                    Customer
                                                </th>
                                                <th>
                                                   Datetime
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($orders as $row) {
                                                if (!$row['is_old']) {
                                                    ?>
                                                    <tr>
                                                         <td>
                                                           <?php echo $row["orderGroup"]; ?>
                                                        </td>
                                                        <td>
                                                            <ol>
                                                           <?php foreach($row["menu"] as $m){
                                                               echo "<li> ".$m['name']." </li>";
                                                           } ?>
                                                                </ol>
                                                        </td>
                                                      
                                                        
                                                        <td>
                                                            <ul>
                                                           <?php foreach($row["menu"] as $m){
                                                               echo "<li> ".$m['quantity']." </li>";
                                                           } ?>
                                                                </ul>
                                                        </td>
                                                        <td>
                                                          
                                                              <ul>
                                                           <?php foreach($row["menu"] as $m){
                                                               echo "<li> ".$m['price']." </li>";
                                                           } ?>
                                                              </ul>
                                                        
                                                        </td>
                                                      <td>
                                                            <ul>
                                                           <?php foreach($row["menu"] as $m){
                                                               echo "<li> ".$m['total']." </li>";
                                                           } ?>
                                                                </ul>
                                                        </td>
                                                          <td>
                                                            <?php echo $row["customers"]; ?>
                                                        </td>
                                                        <td><?php echo $row['date']?></td>
                                                        
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
                            <div class="panel panel-default">
                                <div class="panel-heading" data-original-title>
                                    <h2><i class="fa fa-list"></i><span class="break"></span>Old Orders</h2>
                                    <div class="panel-actions">  <a href="" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>  </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                        <thead>
                                            <tr>
                                                <th>Order Number</th>
                                                <th>
                                                    Dish Name
                                                </th>
                                                
                                                
                                               <th>
                                                   Quantity
                                                </th>
                                                <th>
                                                    Price
                                                </th>
                                                <th>
                                                    Total
                                                </th>
                                                <th>
                                                    Customer
                                                </th>
                                                <th>
                                                   Datetime
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                         <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($orders as $row) {
                                                if ($row['is_old']) {
                                                    ?>
                                                    <tr>
                                                         <td>
                                                           <?php echo $row["orderGroup"]; ?>
                                                        </td>
                                                        <td>
                                                            <ol>
                                                           <?php foreach($row["menu"] as $m){
                                                               echo "<li> ".$m['name']." </li>";
                                                           } ?>
                                                                </ol>
                                                        </td>
                                                        
                                                        <td>
                                                            <ul>
                                                           <?php foreach($row["menu"] as $m){
                                                               echo "<li> ".$m['quantity']." </li>";
                                                           } ?>
                                                                </ul>
                                                        </td>
                                                        
                                                        <td>
                                                          <ul>
                                                           <?php foreach($row["menu"] as $m){
                                                               echo "<li> ".$m['price']." </li>";
                                                           } ?>
                                                                </ul>
                                                        </td>
                                                      <td>
                                                            <ul>
                                                           <?php foreach($row["menu"] as $m){
                                                               echo "<li> ".$m['total']." </li>";
                                                           } ?>
                                                                </ul>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["customers"]; ?>
                                                        </td>
                                                        
                                                        <td><?php echo $row['date']?></td>
                                                        
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
