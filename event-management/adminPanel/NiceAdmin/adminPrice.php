<!-- <form action="" class="regFormOut">
  <div class="refFormHeading">Register</div>
  <input type="text" class="regInput" placeholder="Username">
  <input type="text" class="regInput" placeholder="Phone Number">
  <input type="email" class="regInput" placeholder="E-mail">
  <input type="password" class="regInput" placeholder="Password">
  <div class="regForTerms">
    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
    <span>I agree to the </span><a href="#">Terms</a>
  </div>
  <button class="regFormSubmit">Create Accout</button>
</form> -->
<?php
include_once('../../connect.php');
$dislkeSQL = "SELECT * FROM price";
$dislikedQuery = mysqli_query($conn, $dislkeSQL);
$priceResult = mysqli_fetch_assoc($dislikedQuery);
?>
<div class="regFormOut">
  <div class="refFormHeading">Pricing</div>
  <!-- <div id="form"> -->
  <!-- <div class="part1"> -->
  <div class="regInputOut">
    Basic Pass Price
    <input type="text" placeholder="Basic Pass Price" class="regInput" id="fname" value="<?php echo $priceResult['fPrice']; ?>" required>
  </div>
  <div class="regInputOut">
    Standard Pass Price
    <input type="text" placeholder="Standard Pass Price" class="regInput" id="mname" value="<?php echo $priceResult['sPrice']; ?>" required>
  </div>
  <div class="regInputOut">
    Premium Pass Price
    <input type="text" placeholder="Premium Pass Price" class="regInput" id="lname" value="<?php echo $priceResult['tPrice']; ?>" required>
  </div>
  <!-- </div> -->
  <!-- </div> -->
  <!-- <div class="button"> -->
  <button type="button" id="adminUserRegSubmit" onclick="adminUserRegForm()" class="regFormSubmit">Update Price</button>
  <!-- </div> -->
</div>