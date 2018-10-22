<?php

namespace trivial\views;

class DiceView{

  public function render() {
    $html = <<<END
      <div id="dice"> </div>

      <script>
        var dice = document.getElementById("dice");
        dice.onclick = function(){
          var number = Math.floor(Math.random() * Math.floor(6))+1;

          while (dice.firstChild) {
            dice.removeChild(dice.firstChild);
          }

          for(var i =1; i<=number;i++){
            var div = document.createElement("div");
            dice.appendChild(div);
            switch (number) {
              case 1 :
                div.setAttribute("class","point un");
                break;
              case 2 :
                div.setAttribute("class","point deux"+i);
                break;
              case 3 :
                div.setAttribute("class","point trois"+i);
                break;
              case 4 :
                div.setAttribute("class","point quatre");
                break;
              case 5 :
                div.setAttribute("class","point cinq"+i);
                break;
              case 6 :
                div.setAttribute("class","point six");
                break;
            }
          }

        };
      </script>

      <style>
        #dice{
          cursor: pointer;
          height : 50px;
          width : 50px;
          border : solid 2px;
          border-radius : 7px;
          display : flex;
          flex-direction: row;
          flex-wrap : wrap;
          justify-content : center;
        }

        .un{
          margin : auto;
        }
        .deux1{
          margin-top : 5px;
          margin-bottom : 5px;
          margin-right : 15px;
          margin-left : 0px;
        }
        .deux2{
          margin-top : 5px;
          margin-bottom : 5px;
          margin-right : 0px;
          margin-left : 15px;
        }
        .trois1{
          margin-top : 2px;
          margin-bottom : 2px;
          margin-right : 20px;
          margin-left : 0px;
        }
        .trois2{
            margin-right : 5px;
            margin-left : 5px;
        }
        .trois3{
          margin-top : 2px;
          margin-bottom : 2px;
          margin-right : 0px;
          margin-left : 20px;
        }
        .quatre{
          margin : 5px;
        }
        .cinq1, .cinq2, .cinq4, .cinq5{
          margin-top : 2px;
          margin-bottom : 2px;
          margin-right : 5px;
          margin-left : 5px;
        }
        .cinq3{
          margin-right : 10px;
          margin-left : 10px;
        }
        .six{
          margin : 2px;
        }

        .point{
          height : 9px;
          width : 9px;
          border : solid 2px;
          border-radius : 7px;
          background-color : black;
        }
      </style>
END;

    return $html;
    }
  }

?>
