
    <?php
        $orderno = $order->order_number;
        $order_date = $order->created_at;
        $fname = $order->first_name;
        $phone= $order->phone_number;
        $lname= $order->last_name;
        $address= $order->address;
        $post= $order->post_code;
        $note= $order->notes;
        $paystatus= $order->payment_status;
        $paymethod= $order->payment_method;
        $status = $order->status;
        $gtotal = $order->grand_total;
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ITExam Support | Inovice No. <?= $orderno ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container pt-5">
    <div class="row">
        <div class="col-8 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="http://localhost:8000/images/logo.png" width="100">
                        </div>
                        <div class="col-md-8 text-right p1">
                            <p class="font-weight-bold mb-1">ORDER NO: #<?= $orderno ?></p>
                            <p class="text-muted">ORDER DATE: <?= $order_date ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center m-auto">
                            <form action="{{ route('create-payment') }}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-info" value="Pay Now">
                            </form>
                            <button class="btn btn-danger ml-2"><?= $status; ?></button>
                        </div>
                    </div>
                    <hr class="">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Billing Information</p>
                            <p class="mb-1"><b>Name:</b> <?= $fname ?> <?= $lname?></p>
                            <span><b>Phone:</b> <?= $phone ?></span>
                            <p class="mb-1"><b>Address:</b> <?= $address ?></p>
                        </div>
                        <div class="col-md-6 text-right p2">
                            <p class="font-weight-bold mb-4">Payment Details</p>
                            <p class="mb-1"><span class="text-muted">NAME: </span> <?= $fname ?> <?= $lname?></p>
                            <p class="mb-1"><span class="text-muted">Payment Status: </span> @if($paystatus == 0) <strong class="text-danger">Not Paid</strong> @elseif($paystatus == 1) <strong class="text-success">Paid</strong></p>@endif
                            <p class="mb-1"><span class="text-muted">PHONE: </span> <?= $phone ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">#</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Product Name</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Unit Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; 
                                      $subtotal = 0;
                                      foreach($order_details as $ordD){
                                        $subtotal = $subtotal + ($ordD->price * $ordD->quantity);
                                      }
                                ?>
                                @foreach($order_details as $ord)
                                  <?php $price = $ord->price * $ord->quantity; ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td>{{$ord->product->name}}</td>
                                        <td>{{$ord->quantity}}</td>
                                        <td>{{$ord->price}}</td>
                                        <td><?= $price ?></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row flex-row-reverse bg-dark text-white p-2 m-0">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Grand Total</div>
                            <div class="h2 font-weight-light">BDT <?php echo $gtotal; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mt-5 mb-5 text-center text-info small">by : <a class="" target="_blank" href="/">ITExam Support</a></div>

</div>

<style>
@media only screen and (max-width: 767px) {
  .p1{
    text-align: center !important;
    margin-top: 20px;
  }
  .p2{
    text-align: left !important;
    margin-top: 30px;
  }
}
</style>

</body>
</html>

<?php 

Session::forget('order_number');

?>