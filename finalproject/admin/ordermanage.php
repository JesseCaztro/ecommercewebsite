<div class="container" style="margin-top:98px;background: aliceblue;">
    <div class="table-wrapper">
        <div class="table-title" style="border-radius: 14px;">
            <div class="row">
                <div class="col-sm-4">
                    <h2>Order <b>Details</b></h2>
                </div>
                <div class="col-sm-8">						
                    <a href="" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></a>
                    <a href="#" onclick="window.print()" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Print</span></a>
                </div>
            </div>
        </div>
        
        <table class="table table-striped table-hover text-center" id="NoOrder">
            <thead style="background-color: rgb(111 202 203);">
                <tr>
                    <th>Order Id</th>
                    <th>User Id</th>
                    <th>Address</th>
                    <th>Phone No</th>
                    <th>Amount</th>						
                    <th>Payment Mode</th>
                    <th>Order Date</th>
                    <th>Status</th>						
                    <th>Items</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM `orders`";
                    $result = mysqli_query($conn, $sql);
                    $counter = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $Id = $row['userId'];
                        $orderId = $row['orderId'];
                        $address = $row['address'];
                        $zipCode = $row['zipCode'];
                        $phoneNo = $row['phoneNo'];
                        $amount = $row['amount'];
                        $orderDate = $row['orderDate'];
                        $paymentMode = $row['paymentMode'];

                        if($paymentMode == 0) {
                            $paymentMode = "Cash on Delivery";
                        }
                        else {
                            $paymentMode = "Online";
                        }
                        $orderStatus = $row['orderStatus'];
                        $counter++;
                        
                        echo '<tr>
                                <td>' . $orderId . '</td>
                                <td>' . $Id . '</td>
                                <td data-toggle="tooltip" title="' .$address. '">' . substr($address, 0, 20) . '...</td>
                                <td>' . $phoneNo . '</td>
                                <td>' . $amount . '</td>
                                <td>' . $paymentMode . '</td>
                                <td>' . $orderDate . '</td>
                                <td><a href="#" data-toggle="modal" data-target="#orderStatus' . $orderId . '" class="view"><i class="material-icons">&#xE5C8;</i></a></td>
                                <td><a href="#" data-toggle="modal" data-target="#orderItem' . $orderId . '" class="view" title="View Details"><i class="material-icons">&#xE5C8;</i></a></td>
                            </tr>';
                    }
                    if($counter==0) {
                        ?><script> document.getElementById("NoOrder").innerHTML = '<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%"> You have not Recieve any Order!	</div>';</script> <?php
                    } 
                ?>
            </tbody>
        </table>
    </div>
</div> 

<?php 
    include 'orderItemModal.php';
    include 'orderStatusModal.php';
?>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
