let used = false;
let dice = document.getElementById("dice");
let contdice = document.getElementById("contdice");

dice.onclick = function() {
    if (!used) {
        used = true;
        let number = Math.floor(Math.random() * Math.floor(6)) + 1;
        while (dice.firstChild) {
            dice.removeChild(dice.firstChild);
        }
        let link = document.createElement('form');
        link.setAttribute("class", "direction");
        link.setAttribute("method", "post");
        link.setAttribute("action", document.location.href + '/dep');
        link.innerHTML='<input type="hidden" name="dep" value="'+number+'" />'+
                        '<input type="hidden" name="dir" value="g" />'+
                        '<input type="submit" id="gauche" value="" />';
        contdice.prepend(link);

        link = document.createElement('form');
        link.setAttribute("class", "direction");
        link.setAttribute("method", "post");
        link.setAttribute("action", document.location.href + '/dep');
        link.innerHTML='<input type="hidden" name="dep" value="'+number+'" />'+
                        '<input type="hidden" name="dir" value="d" />'+
                        '<input type="submit" id="droite" value="" />';
        contdice.append(link);
        for (var i = 1; i <= number; i++) {
            let div = document.createElement("div");
            dice.appendChild(div);
            switch (number) {
                case 1:
                    div.setAttribute("class", "point un");
                    break;
                case 2:
                    div.setAttribute("class", "point deux" + i);
                    break;
                case 3:
                    div.setAttribute("class", "point trois" + i);
                    break;
                case 4:
                    div.setAttribute("class", "point quatre");
                    break;
                case 5:
                    div.setAttribute("class", "point cinq" + i);
                    break;
                case 6:
                    div.setAttribute("class", "point six");
                    break;
            }
        }
    }
};