<?php

namespace trivial\views;

class CamembertView{

  public function render() {
    $html = <<<END
    <div class="container">
      <div id="geo"> </div>
      <div id="diver"> </div>
      <div id="hist"> </div>
      <div id="sport"> </div>
      <div id="info"> </div>
      <div id="perso"> </div>
    </div>

    <style>
    .container{
      width : 600px;
      height : 70px;
      display : flex;
      flex-direction: row;
      flex-wrap : wrap;
    }
      #geo{
        width: 0;
        height: 0;
        border-left: 50px solid transparent;
        border-right: 50px solid transparent;
        border-top: 66.6px solid blue;
        border-radius: 50%;
      }
      #diver{
        width: 0;
        height: 0;
        border-left: 50px solid transparent;
        border-right: 50px solid transparent;
        border-top: 66.6px solid pink;
        border-radius: 50%;
      }
      #hist{
        width: 0;
        height: 0;
        border-left: 50px solid transparent;
        border-right: 50px solid transparent;
        border-top: 66.6px solid yellow;
        border-radius: 50%;
      }
      #sport{
        width: 0;
        height: 0;
        border-left: 50px solid transparent;
        border-right: 50px solid transparent;
        border-top: 66.6px solid orange;
        border-radius: 50%;
      }
      #info{
        width: 0;
        height: 0;
        border-left: 50px solid transparent;
        border-right: 50px solid transparent;
        border-top: 66.6px solid green;
        border-radius: 50%;
      }
      #perso{
        width: 0;
        height: 0;
        border-left: 50px solid transparent;
        border-right: 50px solid transparent;
        border-top: 66.6px solid purple;
        border-radius: 50%;
      }
    </style>

END;
    return $html;
  }

}
