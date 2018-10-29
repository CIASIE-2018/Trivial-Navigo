let used=false;
let dice = document.getElementById("dice");
let contdice=document.getElementById("contdice");

        dice.onclick = function(){
          console.log(contdice);
          if(!used){
          used=true;
          let number = Math.floor(Math.random() * Math.floor(6))+1;

          while (dice.firstChild) {
            dice.removeChild(dice.firstChild);
          }
          let link=document.createElement('a');
          link.setAttribute("id", "gauche");
          link.setAttribute("href", document.location.href+'/'+number+'/g');
          contdice.prepend(link);
          link=document.createElement('a');
          link.setAttribute("id", "droite");
          link.setAttribute("href", document.location.href+'/'+number+'/d');
          contdice.append(link);
          for(var i =1; i<=number;i++){
            let div = document.createElement("div");
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
        }
        };