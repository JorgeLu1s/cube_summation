<?php

namespace AppBundle\Entity;

class Cube{
  var $cube;
  var $n;

  function __construct($size){
    $this->n = $size;
    if(1 <= $this->n && $this->n <= 100){

      for ($x = 0; $x <= $size; $x++){
        for ($y = 0; $y <= $size; $y++){
          for ($z = 0; $z <= $size; $z++){
            $this->cube[$x][$y][$z] = 0;
          }
        }
      }
    }else{
      echo "Invalid value to create the cube";
    }
  }

  public function update($x, $y, $z, $w){
    if (!(1 <= $x && $z <= $this->n && 1 <= $y && $y <= $this->n && 1 <= $z && $z <= $this->n)){
      return "Invalid coordinates to update";
    }

    if (!(pow(-10, 9) <= $w && $w <= pow(10, 9))){
      return "Invalid value";
    }

    $this->cube[$x][$y][$z] = $w;
    return "ok";
  }

  public function query($x1, $y1, $z1, $x2, $y2, $z2){
    if (!(1 <= $x1 && $x1 <= $x2 && $x2 <= $this->n && 1 <= $y1 && $y1 <= $y2 && $y2 <= $this->n && 1 <= $z1 && $z1 <= $z2 && $z2 <= $this->n)){
      return "Invalid operation";
    }

    $value = 0;

    for($i = $x1; $i <= $x2; $i++){
      for($j = $y1; $j <= $y2; $j++){
        for($k = $z1; $k <= $z2; $k++){
          $value += $this->cube[$i][$j][$k];
        }
      }
    }

    return $value;
  }
}
