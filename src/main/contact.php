<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
    <title>Red Velvet KH - Contact Us!</title>
</head>
  
<body>

<!-- Header -->
<?php include("header.php")?>

<section class="conts">
    <h1 style="text-align: center;">Contact us!</h1>
    <article>
    <div class="contact-items">
        <div class="social-items">
            <article>
                <h2>Socials</h2>
                <img src="../../assets/social icons (bigger).png" usemap="#social-big" width="100px">
            </article>
            <article>
                <h2>Email</h2>
                <p>redvelvetkh@gmail.com</p>
            </article>
            <article>
                <h2>Hours</h2>
                <p>All week <br>
                    8 AM - 7 AM
                </p>
            </article>
            <article>
                <h2>Inquire</h2>
                <div>
                    <a data-toggle="modal" data-target="#inquirychat" class="inquiry-btn">
                    <img src="../../assets/speech-bubble.png">
                    </a>
                </div>
            </article>
        </div>
        <div class="map-item">
            <h2>Find us!</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d977.3149531038537!2d104.90955972942434!3d11.53321092261028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310950e600c864c9%3A0xd1fd773c694fcda!2s!5e0!3m2!1sen!2skh!4v1674215271139!5m2!1sen!2skh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </article>
    </div>
</section>

</body>

<!-- Footer -->
<?php include('footer.php') ?>

<!-- Inquiry Button -->
<div class="modal fade" id="inquirychat" tabindex="-1" role="dialog" aria-labelledby="bannertopModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="inquiry-modal">
              <h2 class="mb-4"> Have a question?</h2>
              <form class="inq-form" method="post" action="../../inquiry-send.php">
                <br>
                <div>
                  <label for="name">Name:</label>
                  <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <br>
                <div>
                  <label for="email">Email:</label>
                  <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <br>
                <div class="mb-4">
                  <label for="subject">Subject:</label>
                  <input type="text" id="subject" name="subject" placeholder="Enter message subject" required>
                </div>
                <textarea id="message" name="message" rows="5" cols="50" maxlength="1000" placeholder="Enter your message (max 1000 characters)" required></textarea>
                <button type="submit" name="send" class="btn">Submit</button>
              </form>
            </div>
        </div>
    </div>
</div>

<map name="social-big">
    <area shape="rect" coords="0,3,40,43" href="https://web.facebook.com/RedVelvetKH">
    <area shape="rect" coords="57,2,99,43" href="https://instagram.com/redvelvetkh?igshid=ZmZhODViOGI=">
</map>

</html>

