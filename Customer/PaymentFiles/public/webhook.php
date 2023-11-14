<?php
require_once '../secret.php';
require_once '../../../vendor/autoload.php';
// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys
\Stripe\Stripe::setApiKey($stripeSecretKey);

// You can find your endpoint's secret in your webhook settings
$endpoint_secret = 'whsec_048667089b005000b0404f6a20bb3230006014726c76836ab4cc91a732be13b3';

$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
$event = null;

try {
  $event = \Stripe\Webhook::constructEvent(
    $payload, $sig_header, $endpoint_secret
  );
} catch(\UnexpectedValueException $e) {
  // Invalid payload
  http_response_code(400);
  logError('Invalid payload: ' . $e->getMessage());
  exit();
} catch(\Stripe\Exception\SignatureVerificationException $e) {
  // Invalid signature
  http_response_code(400);
  logError('Invalid signature: ' . $e->getMessage());
  exit();
}

function fulfill_order($line_items,$invoice) {
  ob_start();
  $metadata = $line_items->data[0]->price->product->metadata;
    // You can access specific metadata fields like this
  $booking_reference = $metadata->booking_reference;
  $courtID = $metadata->selectedCourtId;
  $courtName = $metadata->selectedCourtName;
  $date = $metadata->date;
  $startTime = $metadata->startTime;
  $endTime = $metadata->endTime;
  $hours = $metadata->hours;
  $price = $metadata->price;
  $status = $metadata->status;
  $username = $metadata->username;
  $emailUser = $metadata->email;
  $dayName = $metadata->dayName;
  $phonenumber = null;
var_dump($line_items);
$output = ob_get_clean();
logError($output);
  $conn = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

  // Check the connection
  if (!$conn) {
    logError('Connection failed: ' . mysqli_connect_error());
    return;
  }
    $sql = "SELECT phonenumber FROM customer WHERE username = '" . $username . "'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_array($result)) {
    $phonenumber = $row["phonenumber"];
        }

    $sql = "INSERT INTO booking (booking_reference, name, email, phonenumber, day, date, start_time, end_time, hours, courtID, courtName, price, status, receipt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
  $stmt = $conn->prepare($sql);

  $stmt->bind_param("ssssssssssssss", $booking_reference, $username, $emailUser, $phonenumber, $dayName, $date, $startTime, $endTime, $hours, $courtID, $courtName, $price, $status, $invoice->invoice_pdf);

  // Execute the statement
  if ($stmt->execute()) {
    echo "Booking successful!";
    // Format date and time for SQL

    // Format date and time for SQL END TIME
   // $formattedDateTime = date('Y-m-d H:i:s', strtotime("$date $startTime"));

   $dateTimeStart = $date . ' ' . $startTime;
   $createEventSql = "CREATE EVENT start_$booking_reference
                      ON SCHEDULE AT '$dateTimeStart'
                      DO
                        UPDATE booking SET status = 'using'
                        WHERE booking_reference = '$booking_reference'";


    // Execute the event creation SQL
    if (mysqli_query($conn, $createEventSql)) {
        echo "Event created!";
    } else {
        logError('Failed to create event: ' . mysqli_error($conn));
    }

    // Format date and time for SQL END TIME
   // $formattedDateTime = date('Y-m-d H:i:s', strtotime("$date $endTime"));

   $dateTimeStart = $date . ' ' . $endTime;
   $createEventSql = "CREATE EVENT end_$booking_reference
                      ON SCHEDULE AT '$dateTimeStart'
                      DO
                        UPDATE booking SET status = 'passed'
                        WHERE booking_reference = '$booking_reference'";

    // Execute the event creation SQL
    if (mysqli_query($conn, $createEventSql)) {
        echo "Event created!";
    } else {
        logError('Failed to create event: ' . mysqli_error($conn));
    }

  } else {
    logError('Booking insertion failed: ' . $stmt->error);
  }

  // Close the statement and connection
  $stmt->close();
  $conn->close();
 

}

// Handle the checkout.session.completed event
if ($event->type == 'checkout.session.completed') {
  // Retrieve the session. If you require line items in the response, you may include them by expanding line_items.
  $session = \Stripe\Checkout\Session::retrieve([
    'id' => $event->data->object->id,
    'expand' => ['line_items.data.price.product','payment_intent'],

  ]);
  $invoice = \Stripe\Invoice::retrieve($session->payment_intent->invoice);

  $line_items = $session->line_items;
  // Fulfill the purchase...
  fulfill_order($line_items,$invoice);
  
}

http_response_code(200);

function logError($message) {
  $logFile = __DIR__ . '/error_log.txt';
  error_log(date('[Y-m-d H:i:s]') . ' ' . $message . PHP_EOL, 3, $logFile);
}
?>
