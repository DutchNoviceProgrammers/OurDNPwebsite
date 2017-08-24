<?php include('contactproces/proces.php');?>
<link type="text/css" rel="stylesheet" href="css/contact.css">
<link type = "text/css" rel="stylesheet" href="css/style.css">
<div class="container">  
	<nav>
          <ul id = "menu">
            <li class="current"><a href = "index.html">Home</a></li>
            <li><a href = "about.html">Over ons</a></li>
            <li><a href = "course.html">Tutorials</a>
              <ul class = 'hidden'>
                <li><a href = "#">HTML / HTML5</a></li><li>
                  <a href = "#">CSS / CSS3</a></li><li>
                  <a href = "#">JAVASCRIPT</a></li><li>
                  <a href = "#">JAVA</a></li>
              </ul>
            </li>
            <li><a href = "contact.php">Contact</a></li>
          </ul>
        </nav>
  <form id="contact" action="" method="post">
    <h3>Quick Contact</h3>
    <h4>Contact us today, and get reply with in 24 hours!</h4>
    <fieldset>
      <input placeholder="Your name" type="text" name="name" value="<?= $name ?>" tabindex="1" autofocus>
	  <span class="error"><?= $name_error ?></span>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" type="text" name="email" value="<?= $email ?>" tabindex="2" >
	  <span class="error"><?= $email_error ?></span>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number" type="text" name="phone" value="<?= $phone ?>" tabindex="3" >
	  <span class="error"><?= $phone_error ?></span>
    </fieldset>
    <fieldset>
      <input placeholder="Your Web Site starts with http://" type="text" name="url" value="<?= $url ?>" tabindex="4" >
	  <span class="error"><?= $url_error ?></span>
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your Message Here...." type="text" name="message" value="<?= $message ?>" tabindex="5" ></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
 
  
</div>
