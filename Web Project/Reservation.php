<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="Sst.css">
    <title>Celestial</title>
</head>

<body>
<?php

// Function to handle form submission
function handleFormSubmission() {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['Envoyer'])) {
        // Get form data
        $data['fname'] = isset($_POST['fname']) ? $_POST['fname'] : '';
        $data['lname'] = isset($_POST['lname']) ? $_POST['lname'] : '';
        $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
        $data['Numero'] = isset($_POST['Numero']) ? $_POST['Numero'] : '';
        $data['date'] = isset($_POST['date']) ? $_POST['date'] : '';
        $data['tpp'] = isset($_POST['tpp']) ? $_POST['tpp'] : '';
        $data['Events'] = isset($_POST['Events']) ? $_POST['Events'] : '';
        $data['nbr'] = isset($_POST['nbr']) ? $_POST['nbr'] : '';

        // Validate form data
        if (empty($data['fname']) || empty($data['lname']) || empty($data['email']) || empty($data['date']) || empty($data['tpp'])) {
            die('<p>Please fill in all the required fields!</p>');
        }

        // Process form data (write to file)
        saveReservation($data); // Save reservation data
    }
}

// Function to save reservation data to a file
function saveReservation($data) {
    // Serialize data
    $serializedData = serialize($data);

    // Write serialized data to a file
    $filename = 'reservations.txt';
    $file = fopen($filename, 'a');
    fwrite($file, $serializedData . PHP_EOL);
    fclose($file);

    // Display success message
    echo "<p>Your reservation has been saved successfully!</p>";
}

// Call function to handle form submission
handleFormSubmission();

?>
<section class="header">
    <div class="logo">
        <img src="https://res.cloudinary.com/djvrnblzc/image/upload/v1714912165/u5mi0kzipropxmykuuwt.png" alt="">
    </div>
    <div class="links-container">
        <ul>
            <a href="index.html">Home</a>
            <a href="Reservation.php">Reservations</a>
            <a href="Menu.html">Menu</a>
            <a href="Events.html">Events</a>
            <a href="contact.html">About us</a>
            <a href="soon.html"><img src="https://res.cloudinary.com/djvrnblzc/image/upload/v1714814410/rmyyb4wgrpviqx9qgcvn.png" width="18px" style="padding-top: 8px;"></a>
            <!-- <select name="Menus">
                <option value="Food Menu"><a href="">Food Menu</a></option>
                <option value="Drink Menu"><a href="">Drink Menu</a></option>
                <option value="Vine Menu"><a href="">Vine Menu</a></option>
            </select> -->
        </ul>
    </div>
</section>
<div class="eve-titles" >
    <h2>Celestial</h2>
    <h2 class="orange" style="font-size:xx-large;" >RESERVE NOW!!!</h2>
</div>
<div class="res">
    <div id = "label" >
        <div>
            <img src="https://res.cloudinary.com/djvrnblzc/image/upload/v1714809352/ywqc6u1dpgdct6oi9i1v.png" alt="">
        </div><br>
        <h3>DETAILS</h3>
        <p style="text-align: center;">
            Use this form to make a reservation in our restaurant... <BR>
            For more information contact us...</p>
    </div>
    <div id="form" style="background-color: #F0D2D4;">
        <h2>Reserve your table :</h2>
        <form action="" method="post" >
            <h3>Reservation Request</h3>
            <p>Please fill out this form to make a reservation request with us</p>
            <span>First Name :</span>
            <input type="text" name="fname" placeholder="Name">
            <span>Last Name :</span>
            <input type="text" name="lname" placeholder="last name">
            <span>Email :</span>
            <input type="email" name="email" placeholder="Email">
            <span> Phone Number:</span>
            <input type="Text" name="PhoneNumber" placeholder="Phone Number">
            <span>Date :</span>
            <?php 
            $date = getdate();
            $j = $date['mday'] ; $m = $date['mon'] ; $y = $date['year'];
            echo "<input type='date' name='date' min = '$y-$m-$j'> ";
            ?>
            <div>
                <span>Number of persons:</span>
                <select name="nbr">
                    <option value="" disabled selected hidden>Please Choose...</option>
                    <option value="2">2 People</option>
                    <option value="3">3 People</option>
                    <option value="4">4 People</option>
                    <option value="5">5 People</option>
                    <option value="6">6 People</option>
                    <option value="7">7 People</option>
                    <option value="8">8 People</option>
                    <option value="9">9 People</option>
                    <option value="10">10 People</option>
                </select>
                <span>Events :</span>
                <select name="Events">
                    <option value="1">Nothing Special </option>
                    <option value="2">Meeting </option>
                    <option value="3">Pool Party </option>
                    <option value="4">Engagement Party </option>
                    <option value="5">Eid Party </option>
                    <option value="6">Birthday Party </option>
                </select>
            </div>
            <div>
                <span>Type of payment  :</span>
                <input type="radio" name="tpp" value="Cash"><span> cash</span>
                <input type="radio" name="tpp" value="card"><span> card</span>
            </div>
            <div>
                <center>
                    <input type="checkbox"> <span id="s"> Sign me up to receive dining offers and news by email. </span><br>
                    <input type="checkbox"> <span id="s"> Yes, I want to get text updates and reminders about my reservations.* </span><br>
                </center>
            </div>
            <input type="submit" name ="Envoyer">
        </form>
    </div>
</div>
<center>
    <div class="pied">
        <p>Restaurant Management System - Keerthi - Nikhitha - Aishwarya</p>
    </div>
</center>
</body>
</html>