<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Room</title>
    <link rel="stylesheet" href="server.css">
</head>
<body>
    <div class="container" id="container">
        <div class="heading">Server Room</div>
        <div class="box-container">
            <div class="box">
              <img class="candidate" src="candidate.png" alt="">
              <h3>Akhilesh Yadav</h3>
              <!-- <img class="logo" src="candidate logo.png" alt=""> -->
              <div class="count" id="box1">
                0
              </div>
            </div>
            <div class="box">
              <img class="candidate" src="candidate.png" alt="">
              <h3>Kushagra Prajapati</h3>
              <!-- <img class="logo" src="candidate logo.png" alt=""> -->
              <div class="count" id="box2">
                0
              </div>
            </div>
      
            <div class="box">
              <img class="candidate" src="candidate.png" alt="">
              <h3>Kushagra Prajapati</h3>
              <!-- <img class="logo" src="candidate logo.png" alt=""> -->
              <div class="count" id="box3">
                0
              </div>
            </div>
            <div class="box">
              <img class="candidate" src="candidate.png" alt="">
              <h3>Kushagra Prajapati</h3>
              <!-- <img class="logo" src="candidate logo.png" alt=""> -->
              <div class="count" id="box4">
                0
              </div>
            </div>
            <div class="box">
              <img class="candidate" src="candidate.png" alt="">
              <h3>Kushagra Prajapati</h3>
              <!-- <img class="logo" src="candidate logo.png" alt=""> -->
              <div class="count" id="box5">
                0
              </div>
            </div>
            <div class="box">
              <img class="candidate" src="candidate.png" alt="">
              <h3>Kushagra Prajapati</h3>
              <!-- <img class="logo" src="candidate logo.png" alt=""> -->
              <div class="count" id="box6">
                0
              </div>
            </div>
        </div>
        <div class="resetButton">
            <button id="resetButton">Reset</button>
        </div>
    </div>
    <!-- <script src="server.js"></script> -->
    <script>
      function displayCounts() {
        var box1 = document.getElementById('box1');
        var box2 = document.getElementById('box2');
        var box3 = document.getElementById('box3');
        var box4 = document.getElementById('box4');
        var box5 = document.getElementById('box5');
        var box6 = document.getElementById('box6');
            
        var count1 = localStorage.getItem('btn1');
        var count2 = localStorage.getItem('btn2');
        var count3 = localStorage.getItem('btn3');
        var count4 = localStorage.getItem('btn4');
        var count5 = localStorage.getItem('btn5');
        var count6 = localStorage.getItem('btn6');
            
        box1.textContent = count1 ? count1 : '0';
        box2.textContent = count2 ? count2 : '0';
        box3.textContent = count3 ? count3 : '0';
        box4.textContent = count4 ? count4 : '0';
        box5.textContent = count5 ? count5 : '0';
        box6.textContent = count6 ? count6 : '0';
      }
      function resetCounts() {
        localStorage.removeItem('btn1');
        localStorage.removeItem('btn2');
        localStorage.removeItem('btn3');
        localStorage.removeItem('btn4');
        localStorage.removeItem('btn5');
        localStorage.removeItem('btn6');
            // localStorage.setItem('button1', '0');
            // localStorage.setItem('button2', '0');
            // localStorage.setItem('button3', '0');
        displayCounts();
      }
      function pass(){
        var a = window.prompt();
        if(a==8934){
          resetCounts();
        }
        else{
          window.prompt("wrong password");
        }
      }
      window.onload = function() {
        displayCounts();
        var resetButton = document.getElementById('resetButton');
        resetButton.addEventListener('click', pass);
      };
    </script>
</body>
</html>