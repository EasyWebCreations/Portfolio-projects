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
<div class="regFormOut">
  <div class="refFormHeading">Register</div>
  <!-- <div id="form"> -->
  <!-- <div class="part1"> -->
  <div class="regInputOut">
    First Name
    <input type="text" placeholder="First Name" class="regInput" name="fname" id="fname" required>
  </div>
  <div class="regInputOut">
    Middle Name
    <input type="text" placeholder="Middle Name" class="regInput" name="mname" id="mname" required>
  </div>
  <div class="regInputOut">
    Last Name
    <input type="text" placeholder="Last Name" class="regInput" name="lname" id="lname" required>
  </div>
  <div class="regInputOut">
    Phone No.(Whatsapp)
    <input type="mobile" placeholder="Phone No.(Whatsapp)" class="regInput" name="whatsmobile" id="phone" pattern="[6789][0-9]{9}" required>
  </div>
  <!-- <div class="part2"> -->
  <div class="regInputOut">
    Calling No
    <input type="tel" placeholder="Calling No" class="regInput" name="call" id="call">
  </div>
  <div class="regInputOut">
    Email
    <input type="email" placeholder="Email" class="regInput" name="email" id="email" required>
  </div>
  <div class="regInputOut">
    Gender <select name="gender" class="regInput" id="gender" required>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
  </div>
  <div class="regInputOut">
    Marital Status <select name="marital" class="regInput" id="marital" required>
      <option value="unmarried">Unmarried</option>
      <option value="married">Married</option>
      <option value="single">Single</option>
    </select>
  </div>
  <div class="regForTerms">
    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
    <span>I agree to the </span><a href="#">Terms</a>
  </div>
  <!-- </div> -->
  <!-- </div> -->
  <!-- <div class="button"> -->
  <button type="button" id="adminUserRegSubmit" onclick="adminUserRegForm()" class="regFormSubmit">Create Accout</button>
  <!-- </div> -->
</div>