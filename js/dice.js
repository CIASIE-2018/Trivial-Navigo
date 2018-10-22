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