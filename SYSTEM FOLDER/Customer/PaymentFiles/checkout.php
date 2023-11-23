<?php
session_start();

function calculatePrice($conn, $startTime, $endTime, $hours, $dayOfWeek) {
  // Initialize the total price
  $totalPrice = 0;

  // SQL query to fetch the relevant price data from the court_rate table
  // $sql = "SELECT price, price_minutes FROM court_rate WHERE '$startTime' >= start_time AND end_time >= '$endTime' AND day_of_week = '$dayOfWeek'";
  // $sql = "SELECT price, price_minutes, start_time, end_time FROM court_rate WHERE day_of_week = '$dayOfWeek' AND ('$startTime' <= end_time AND '$endTime' >= start_time)";
  $sql = "SELECT price, price_minutes, start_time, end_time FROM court_rate WHERE day_of_week = '$dayOfWeek' AND ('$startTime' <= end_time AND '$endTime' >= start_time)";
  $result = mysqli_query($conn, $sql);

  //echo "Debug SQL Query: " . $sql . "<br>";

  // Loop through the results and calculate the total price
  while ($row = $result->fetch_assoc()) {
      $price = $row['price'];
      $pricePerMin = $row['price_minutes'];
      $slotStartTime = new DateTime($row['start_time']);
      $slotEndTime = new DateTime($row['end_time']);

      // Calculate the overlap between the user input and the time slot
      $overlapStart = max(new DateTime($startTime), $slotStartTime);
      $overlapEnd = min(new DateTime($endTime), $slotEndTime);

      // Calculate the hours and minutes for the overlap
      $overlapHours = $overlapStart->diff($overlapEnd)->h;
      $overlapMinutes = $overlapStart->diff($overlapEnd)->i;

      // Calculate the price for the overlap
      $timeSlotPrice = ($price * $overlapHours) + ($pricePerMin * $overlapMinutes);

      // Add this time slot's price to the total
      $totalPrice += $timeSlotPrice;
  }
  //echo "Total Price:".$totalPrice;
  return $totalPrice;
}


function generateUniqueID()
{
    $timestamp = time();
    $randomNumber = mt_rand(1000, 9999);
    $uniqueID = $timestamp . $randomNumber;
    return $uniqueID;
}

function translateDayOfWeek($dayOfWeek) {
    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    
    // Ensure the input is within a valid range
    if ($dayOfWeek >= 1 && $dayOfWeek <= 7) {
        return $days[$dayOfWeek - 1]; // Subtract 1 because array is 0-indexed
    } else {
        return 'Invalid Day';
    }
}



if($_SERVER['REQUEST_METHOD'] === "POST"){
  require_once '../../vendor/autoload.php';
  require_once 'secret.php';
  require_once '../dbconnect.php';

  // Retrieve the JSON payload from the POST request
  $jsonPayload = file_get_contents("php://input");
  
  // Decode the JSON payload
  $data = json_decode($jsonPayload, true);
  // var_dump($data);
  
  // Check if decoding was successful
  if ($data === null) {
      http_response_code(400);
      echo json_encode(['error' => 'Failed to decode JSON payload']);
      exit;
  }
  
  // Access the individual values from the decoded JSON data
  $selectedCourtID = $data['selectedCourtID'];
  $selectedCourtName = $data['selectedCourtName'];
  $date = $data['date'];
  $userInputTime = $data['userInputTime'];
  $hours = $data['hours'];
  $status = 'booked';
  $booking_reference = generateUniqueID();
  
  
      // Calculate the day of the week (1 for Monday, 2 for Tuesday, etc.)
    $dayOfWeek = date('N', strtotime($date));

    // Translate $dayOfWeek tothe day of the week (1 for Monday, 2 for Tuesday, etc.)
    $dayName = translateDayOfWeek($dayOfWeek);
  
    $startTime = date('H:i:s', strtotime($userInputTime));
  
    $endTimeStamp = strtotime($startTime) + ($hours * 3600); // Add the number of hours in seconds
    $endTime = date('H:i:s', $endTimeStamp);
  
    $price = calculatePrice($conn, $startTime, $endTime, $hours, $dayOfWeek);
  
  
  $YOUR_DOMAIN = 'http://localhost:80';
  
    $stripe = new \Stripe\StripeClient($stripeSecretKey);
    $checkout_session = $stripe->checkout->sessions->create([
      'ui_mode' => 'embedded',
      'customer_email' => $_SESSION['email'],
      'line_items' => [[
          'price_data' => [
              'currency' => 'myr',
              'unit_amount' => $price * 100,
              'product_data' => [
                  'name' => "Badminton Court booking at: " . $selectedCourtID,
                  'metadata' => [
                      'booking_reference' => $booking_reference,
                      'selectedCourtId' => $selectedCourtID,
                      'selectedCourtName' => $selectedCourtName,
                      'date' => $date,
                      'startTime' => $startTime,
                      'endTime' => $endTime,
                      'hours' => $hours,
                      'price' => $price,
                      'status' => $status,
                      'dayName' => $dayName,
                      'username' => $_SESSION['username'],
                      'email' => $_SESSION['email'],
                  ]
              ]
          ],
          'quantity' => 1,
      ]],
      'payment_method_types' => ['card'],
      'mode' => 'payment',
      'invoice_creation' => ['enabled' => true],
      'return_url' => $YOUR_DOMAIN . '/PROJECT_G01_38/Customer/PaymentFiles/Checkoutpage/return.html?session_id={CHECKOUT_SESSION_ID}',
  ]);
   
      echo json_encode(array('clientSecret' => $checkout_session->client_secret));
}


  