<h3 class="text-center text-sucess">All Payments</h3>
<table class="table table-bordered mt-5 bg-warning">
<thread class="bg-secondary">
    <?php
    $get_payments="Select * from `user_payments`";
    $result=mysqli_query($con,$get_payments);
    $row_count=mysqli_num_rows($result);

if($row_count==0){
    echo"<h2 class='bg-danger text-center mt-5'>No payments recieved</h2>";
}else{
    echo "<tr class='text-center'>
    <th>no.</th>
    <th>Invoice</th>
    <th>Amount</th>
    <th>Payment mode</th>
    <th>Order date</th>
    <th>Delete</th>
</tr>
</thread>
<tbody class='bg-secondary text-light'>
    </tbody>";

    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $payment_id=$row_data['payment_id'];
        $amount=$row_data['amount'];
        $invoice_number=$row_data['invoice_number'];
        $payment_mode=$row_data['payment_mode'];
        $date=$row_data['date'];
        $number++;

        echo "<tr>
        <td>$number</td>
        <td>$invoice_number</td>
        <td>$amount</td>
        <td>$payment_mode</td>
        <td>$date</td>
        <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";
    }
}
   ?>
        
</table>