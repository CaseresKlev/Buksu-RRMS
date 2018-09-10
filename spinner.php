<!DOCTYPE html>

  <html>

    <head>

      <style type="text/css">

        html{
          background: #808080;
        }
        #precontent{
          text-align: center;
          animation-name: animatebottom;
          animation-duration: 1s;
          position: relative;

        }
          @keyframes animatebottom {
            from{botton: -100px;opacity: 0;}

            to{bottom: 0px;opacity: 1;}
          }
          #spinner{
            width: 120px;
            height: 120px;
            background: transparent;
            border-left: 10px solid blue;
              border-right: 10px solid blue;
                border-top: 10px solid lightgreen;
                  border-bottom: 10px solid lightgreen;
                  position: absolute;
                  left: 50%;
                  top: 50%;
                  margin-left: -60px;
                  margin-top: -60px;
                  border-radius: 50%;
                  animation: loader 1s linear infinite;

          }
                @keyframes loader {

                  0%{
                    opacity: 0.5;
                  }

                  100%{
                    transform: rotate(360deg);
                  }
                }

      </style>
    </head>


    <body onload="myfun()">

      <div id="spinner"></div>

      <div style="display:none;" id="precontent">

        <h1>ANNE BASTUZZAN</h1>
      </div>

      <script type="text/javascript">

      function myfun(){
          var test = setTimeout(loadpage,3000);

      }

      function loadpage(){
        document.getElementById("precontent").style.display = "block";
          document.getElementById("spinner").style.display = "none";
      }


      </script>

    </body>



  </html>
