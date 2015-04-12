<!DOCTYPE html>
<html>
<head>
  <title>Change Password</title>
  <link rel="stylesheet" type="text/css" href="css/foundation.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" type="text/css" href="css/signup.css">
  <style type="text/css">
  body {
    background: rgba(19, 35, 47, 0.9);
  }
  label {
  position: absolute;
  transform: translateY(6px);
  left: 13px;
  /*color: rgba(255, 255, 255, 0.5);*/
  color: black;
  transition: all 0.25s ease;
  -webkit-backface-visibility: hidden;
  pointer-events: none;
  font-size: 22px; }
  label .req {
    margin: 2px;
    color: #1ab188; }

label.active {
  transform: translateY(50px);
  left: 2px;
  font-size: 14px; }
  label.active .req {
    opacity: 0; }

label.highlight {
  color: #ffffff; }

input, textarea {
  font-size: 22px;
  display: block;
  width: 100%;
  height: 100%;
  padding: 5px 10px;
  background: rgba(19, 35, 47, 0.9);
  background-image: none;
  border: 1px solid #a0b3b0;
  color: #ffffff;
  border-radius: 0;
  transition: border-color .25s ease, box-shadow .25s ease; }
  input:focus, textarea:focus {
    outline: 0;
    border-color: #1ab188; }
  </style>
</head>
<body>
<nav class="top-bar" data-topbar-role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="#"><img src="img/logo.png" style="max-height: 45px; width: auto">Itinerate</a></h1>
    </li>
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <ul class="right">
      <li><a href="places.php">Places</a></li>
      <li class="active"><a href="changepassword.php">Change Password</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </section>
</nav>

<div class="container">
  <div class="form">
      
      
        <div id="signup">   
          <h1>Change password</h1>
          
          <form action="changepassword.php" method="post">       
          <div class="field-wrap" >
            <label>
              Old password<span class="req">*</span>
            </label>
            <input type="password" id="old-password" name="old-password" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              New password<span class="req">*</span>
            </label>
            <input type="password" id="new-password" name="new-password" required autocomplete="off"/>
          </div>

            <div class="field-wrap" >
            <label>
              Confirm password<span class="req">*</span>
            </label>
            <input type="password" id="new-password-again" name="new-password-again" required autocomplete="off"/>
          </div>
          <div>

          
          <button type="submit" id="changepass-submit" class="button button-block"/>Change password</button>
          
          </form>

        </div>
  </div> <!-- /form -->
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/foundation.topbar.js"></script>
<script type="text/javascript" src="js/changepass.js"></script>
</body>
</html>