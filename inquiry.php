<div>
    <a data-toggle="modal" data-target="#inquirychat" class="inquiry-btn">
      <img src="assets/speech-bubble.png">
    </a>
</div>

<div class="modal fade" id="inquirychat" tabindex="-1" role="dialog" aria-labelledby="bannertopModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="inquiry-modal">
              <h2> Have a question?</h2>
              <form class="inq-form">
                <div>
                  <label for="name">Name:</label>
                  <input type="text" id="name" name="name" placeholder="Enter your name">
                </div>
                <br>
                <div>
                  <label for="email">Email:</label>
                  <input type="email" id="email" name="email" placeholder="Enter your email">
                </div>
                <br>
                <textarea id="message" name="message" rows="4" cols="50" placeholder="Enter your message"></textarea>
                <input type="submit" value="Submit" class="btn">
              </form>
            </div>
        </div>
    </div>
</div>