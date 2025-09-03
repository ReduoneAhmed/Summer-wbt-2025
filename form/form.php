<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Required Information</title>
    <link rel="stylesheet" type="text/css" href="../form/styles.css">
    <style>
        .error {color: red;}
        .form-group {margin-bottom: 12px;}
    </style>
</head>
<body>
<?php
$fnameErr = $lnameErr = $companyErr = $emailErr = $addressErr = $zipErr = $amountErr = "";
$fname = $lname = $company = $email = $address = $city = $state = $zip = $country = $donation = "";

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $fnameErr = "First name is required";
    } else {
        $fname = test_input($_POST["fname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
            $fnameErr = "Only letters are allowed"; 
        }
    }

    if (empty($_POST["lname"])) {
        $lnameErr = "Last name is required";
    } else {
        $lname = test_input($_POST["lname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
            $lnameErr = "Only letters are allowed";
        }
    }

    if (!empty($_POST["company"])) {
        $company = test_input($_POST["company"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$company)) {
            $companyErr = "Only letters are allowed";
        }
    }

    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = test_input($_POST["address"]);
    }

    if (empty($_POST["zip"])) {
        $zipErr = "Zip code required";
    } else {
        $zip = test_input($_POST["zip"]);
        if (!preg_match("/^[0-9]{4,10}$/",$zip)) {
            $zipErr = "Invalid zip code";
        }
    }

    // Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Donation Amount
    if (empty($_POST["amount"])) {
        $amountErr = "Please select donation amount";
    } else {
        $donation = test_input($_POST["amount"]);
    }
}
?>
<br>
<strong>> 1 Donation </strong> > 2 Confirmation >Thank You
<h3>Donor Information</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  <div class="form-group">
    <label><strong>First Name*</strong></label>
    <input type="text" name="fname" value="<?php echo $fname;?>">
    <span class="error"><?php echo $fnameErr;?></span>
  </div>

  <div class="form-group">
    <label><strong>Last Name*</strong></label>
    <input type="text" name="lname" value="<?php echo $lname;?>">
    <span class="error"><?php echo $lnameErr;?></span>
  </div>

  <div class="form-group">
    <label><strong>Company</strong></label>
    <input type="text" name="company" value="<?php echo $company;?>">
    <span class="error"><?php echo $companyErr;?></span>
  </div>

  <div class="form-group">
    <label><strong>Address 1*</strong></label>
    <input type="text" name="address" value="<?php echo $address;?>">
    <span class="error"><?php echo $addressErr;?></span>
  </div>

  <div class="form-group">
    <label><strong>Address 2</strong></label>
      <input type="text" name="address2" 
     value="<?php echo isset($_POST['address2']) ? $_POST['address2'] : ''; ?>">
    </div>

  <div class="form-group">
    <label><strong>City</strong></label>
    <input type="text" name="city" 
      value="<?php echo isset($_POST['city']) ? $_POST['city'] : ''; ?>">
  </div>

  <div class="form-group">
    <label><strong>State*</strong></label>
      <select name="state">
        <option value="">Select</option>
        <option <?php if(isset($_POST['state']) && $_POST['state']=="NY") echo "selected"; ?>>NY</option>
         <option <?php if(isset($_POST['state']) && $_POST['state']=="London") echo "selected"; ?>>London</option>
        <option <?php if(isset($_POST['state']) && $_POST['state']=="Toronto") echo "selected"; ?>>Toronto</option>
    </select>
  </div>

  <div class="form-group">
    <label><strong>Zip Code*</strong></label>
    <input type="text" name="zip" value="<?php echo $zip;?>">
    <span class="error"><?php echo $zipErr;?></span>
  </div>

  <div class="form-group">
    <label><strong>Country*</strong></label>
     <select name="country">
        <option value="">Select</option>
        <option <?php if(isset($_POST['country']) && $_POST['country']=="USA") 
          echo "selected"; ?>>USA</option>
         <option <?php if(isset($_POST['country']) && $_POST['country']=="UK")
           echo "selected"; ?>>UK</option>
        <option <?php if(isset($_POST['country']) && $_POST['country']=="Canada") 
          echo "selected"; ?>>Canada</option>
    </select>
  </div>

  <div class="form-group">
    <label><strong>Phone</strong></label>
    <input type="text" name="phone" 
    value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>">
  </div>

  <div class="form-group">
    <label><strong>Fax</strong></label>
    <input type="text" name="fax"
     value="<?php echo isset($_POST['fax']) ? $_POST['fax'] : ''; ?>">
  </div>

  <div class="form-group">
    <label><strong>Email*</strong></label>
    <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error"><?php echo $emailErr;?></span>
  </div>

  <div class="form-group">
      <label><strong>Donation Amount*</strong></label><br>
    <input type="radio" name="amount" value="50" 
    <?php if($donation=="50") echo "checked";?>> $50
       <input type="radio" name="amount" value="100" 
    <?php if($donation=="100") echo "checked";?>> $100
    <input type="radio" name="amount" value="250"
     <?php if($donation=="250") echo "checked";?>> $250
       <input type="radio" name="amount" value="other" 
     <?php if($donation=="other") echo "checked";?>> Other
    <span class="error"><?php echo $amountErr;?></span>
  </div>

  <div class="form-group">
    <label><strong>Other Amount</strong></label>
    <input type="text" name="otherAmount"
     value="<?php echo isset($_POST['otherAmount']) ? $_POST['otherAmount'] : ''; ?>">
  </div>

  <div class="form-group">
    <label><input type="checkbox" name="recurring" 
    <?php if(!empty($_POST['recurring'])) echo "checked"; ?>> I am interested in giving on a regular basis</label>
  </div>

  <div class="form-group">
    <label>Monthly Credit Card $</label>
     <input type="text" name="monthly" value="<?php echo isset($_POST['monthly']) ? $_POST['monthly'] : ''; ?>">
    For <input type="text" name="months" value="<?php echo isset($_POST['months']) ? $_POST['months'] : ''; ?>"> Months
  </div>

  <h3>Honorarium and Memorial Donation Information</h3>
  <div class="form-group">
    <input type="radio" name="honor" value="honor" <?php if(isset($_POST['honor']) && $_POST['honor']=="honor")
      
      echo "checked"; ?>> To Honor
    <input type="radio" name="honor" value="memory" <?php if(isset($_POST['honor']) && $_POST['honor']=="memory")
      
  echo "checked"; ?>> In Memory of
  </div>

  <div class="form-group">
    <label>Name</label>
    <input type="text" name="honorName"
     value="<?php echo isset($_POST['honorName']) ? $_POST['honorName'] : ''; ?>">
  </div>

  <div class="form-group">
    <label>Acknowledge Donation To</label>
    <input type="text" name="ackname" 
    value="<?php echo isset($_POST['ackname']) ? $_POST['ackname'] : ''; ?>">
  </div>

  <div class="form-group">
    <label>Address</label>
    <input type="text" name="ackaddr" 
    value="<?php echo isset($_POST['ackaddr']) ? $_POST['ackaddr'] : ''; ?>">
  </div>

  <div class="form-group">
    <label>City</label>
    <input type="text" name="ackcity" 
    value="<?php echo isset($_POST['ackcity']) ? $_POST['ackcity'] : ''; ?>">
  </div>

  <div class="form-group">
    <label>State</label>
    <select name="ackstate">
        <option value="">Select a State</option>
        <option <?php if(isset($_POST['ackstate']) && $_POST['ackstate']=="NY") 
           echo "selected"; ?>>NY</option>
        <option <?php if(isset($_POST['ackstate']) && $_POST['ackstate']=="CA")   
        echo "selected"; ?>>CA</option>
        <option <?php if(isset($_POST['ackstate']) && $_POST['ackstate']=="England") 
              echo "selected"; ?>>England</option>
    </select>
  </div>

  <div class="form-group">
    <label>Zip</label>
    <input type="text" name="ackzip" value="<?php echo isset($_POST['ackzip']) ? $_POST['ackzip'] : ''; ?>">
  </div>

  <h3>Additional Information</h3>
  <div class="form-group">
    <label>Name</label>
    <input type="text" name="pubname" value="<?php echo isset($_POST['pubname']) ? $_POST['pubname'] : ''; ?>">
  </div>

  <div class="form-group">
    <label><input type="checkbox" name="anonymous" <?php if(!empty($_POST['anonymous'])) echo "checked"; ?>> I would like my gift to remain anonymous.</label><br>
    <label><input type="checkbox" name="match" <?php if(!empty($_POST['match'])) echo "checked"; ?>> My employer offers a matching gift program.</label><br>
    <label><input type="checkbox" name="noletter" <?php if(!empty($_POST['noletter'])) echo "checked"; ?>> Please save cost of acknowledgment letter.</label>
  </div>

  <div class="form-group">
    <label>Comments</label>
    <textarea name="comments" rows="4" cols="40"><?php echo isset($_POST['comments']) ? $_POST['comments'] : ''; ?></textarea>
  </div>

  <div class="form-group">
    <label><b>How may we contact you?</b></label><br>
    <input type="checkbox" name="contact[]" value="Email"
     <?php if(!empty($_POST['contact']) && in_array("Email",$_POST['contact'])) echo "checked"; ?>> Email
    <input type="checkbox" name="contact[]" value="Postal Mail" 
    <?php if(!empty($_POST['contact']) && in_array("Postal Mail",$_POST['contact'])) echo "checked"; ?>> Postal Mail
    <input type="checkbox" name="contact[]" value="Telephone" 
    <?php if(!empty($_POST['contact']) && in_array("Telephone",$_POST['contact'])) echo "checked"; ?>> Telephone
    <input type="checkbox" name="contact[]" value="Fax" 
    <?php if(!empty($_POST['contact']) && in_array("Fax",$_POST['contact'])) echo "checked"; ?>> Fax
  </div>

  <div class="form-group">
    <label><b>I would like to receive newsletters by:</b></label><br>
    <input type="checkbox" name="newsletter[]" value="Email"
     <?php if(!empty($_POST['newsletter']) && in_array("Email",$_POST['newsletter'])) echo "checked"; ?>> Email
    <input type="checkbox" name="newsletter[]" value="Postal Mail"
     <?php if(!empty($_POST['newsletter']) && in_array("Postal Mail",$_POST['newsletter'])) echo "checked"; ?>> Postal Mail
  </div>

  <div class="form-group">
    <label><input type="checkbox" name="volunteer" 
    <?php if(!empty($_POST['volunteer'])) 
      echo "checked"; ?>> I would like information about volunteering</label>
  </div>

  <div class="form-group">
    <input type="submit" value="Register">
    <input type="reset">
  </div>

  <h4>Donate online with confidence. You are on a secure server.</h4>
  <h4>If you have any problems or questions, please contact support.</h4>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !$fnameErr && !$lnameErr && !$emailErr && !$addressErr && !$zipErr && !$amountErr) {
    echo "<h2>Your Input:</h2>";
    echo "Name: $fname $lname<br>";
    echo "Email: $email<br>";
    echo "Company: $company<br>";
    echo "Address: $address, $city, $state, $zip, $country<br>";
    echo "Donation: $donation<br>";
}
?>
</body>
</html>
