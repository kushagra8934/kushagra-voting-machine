<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Page</title>
    <link rel="stylesheet" href="voting.css">
</head>
<body>
    <div class="container" id="container">
        <div class="heading">Voting Room</div>
        <div class="box-container">
            <div class="box">
              <img class="candidate" src="candidate.png" alt="">
              <h3>Akhilesh Yadav</h3>
              <img class="logo" src="candidate logo.png" alt="">
              <div class="count">
                 <button class="btn" id="btn1" onclick="incrementCount('btn1')">Vote</button>
              </div>
            </div>
            <div class="box">
              <img class="candidate" src="candidate.png" alt="">
              <h3>Kushagra Prajapati</h3>
              <img class="logo" src="candidate logo.png" alt="">
              <div class="count">
                <button class="btn" id="btn2" onclick="incrementCount('btn2')">Vote</button>
              </div>
            </div>
      
            <div class="box">
              <img class="candidate" src="candidate.png" alt="">
              <h3>Kushagra Prajapati</h3>
              <img class="logo" src="candidate logo.png" alt="">
              <div class="count">
                <button class="btn" id="btn3" onclick="incrementCount('btn3')">Vote</button>
              </div>
            </div>
            <div class="box">
              <img class="candidate" src="candidate.png" alt="">
              <h3>Kushagra Prajapati</h3>
              <img class="logo" src="candidate logo.png" alt="">
              <div class="count">
                <button class="btn" id="btn4" onclick="incrementCount('btn4')">Vote</button>
            </div>
            </div>
            <div class="box">
              <img class="candidate" src="candidate.png" alt="">
              <h3>Kushagra Prajapati</h3>
              <img class="logo" src="candidate logo.png" alt="">
              <div class="count">
                <button class="btn" id="btn5" onclick="incrementCount('btn5')">Vote</button>
              </div>
            </div>
            <div class="box">
              <img class="candidate" src="candidate.png" alt="">
              <h3>Kushagra Prajapati</h3>
              <img class="logo" src="candidate logo.png" alt="">
              <div class="count">
                <button class="btn" id="btn6" onclick="incrementCount('btn6')">Vote</button>
            </div>
            </div>
          </div>
          <div class="footer">
            <h3>facing problem??</h3>
            <button onclick="openReport()">Report</button>
          </div>
        </div>
          <div class="report" id="report">
            <img src="questionmark.jpeg" alt="">
            <form action="#">
              <textarea name="myTextBox" cols="50" rows="5">
              What's Your Problem...
              </textarea>
              <br />
              <input type="submit" />
              </form>
          </div>
    </div>
    <div class="popup" id="popup">
      <img src="tick.jpeg" alt="">
      <h2>Thank You!</h2>
      <p>Your Vote has been counted. Thanks!</p>
      <img src="kanoon.jpeg" alt="">
    </div>
    <!-- <script src="voting.js"></script> -->
    <script>
      let popup = document.getElementById("popup");
      let container = document.getElementById("container");
      let report = document.getElementById("report");
      function scrollToTop() {
        window.scrollTo({
          top: 0,
          behavior: "smooth"
        });
      }
      function makeWindowBlank() {
        container.style.opacity = "1";
        container.style.pointerEvents = "auto";
      }
      function incrementCount(buttonId) {
            var count = localStorage.getItem(buttonId);
            if (!count) {
                count = 0;
            }
            count++;
            localStorage.setItem(buttonId, count);
            scrollToTop();
            popup.classList.add("open-popup");
            container.classList.add("hidden-container");
        }
        function openReport(){
          scrollToTop();
          report.classList.add("open-report");
        }
    </script>
</body>
</html>