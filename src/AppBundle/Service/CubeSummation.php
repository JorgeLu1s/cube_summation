<?php

namespace AppBundle\Service;

use AppBundle\Entity\Cube;

class CubeSummation
{
    private $output = array();
    private $operations = array();
    private $dimention = array();
    private $iterations;
    private $cube;
    private $content;

    public function cubeSummation($content){
        $this->setValues($content);

        for ($i=0; $i < $this->iterations; $i++){
            $this->createCube($this->dimention[$i], $this->operations[$i]);
        }

        return $this->output;
    }

    public function setValues($content){
        $data = explode("\n", $content);
        $j = 2;
        $k = 0;
        $operation = array();
        $iterations = $data[0];

        for ($i=0; $i < $iterations; $i++){
            if ($i == 0){
                $dimOp = explode(" ", $data[1]);
                $dimention = $dimOp[0];
                $nOperations = $dimOp[1] + $j;
                $k = $j;

                for ($k; $k < $nOperations; $k++){
                    array_push($operation, $data[$k]);
                }
            }else{
                $dimOp = explode(" ", $data[$j]);
                $dimention = $dimOp[0];
                $nOperations = $dimOp[1] + $j;

                for ($k=$j+1; $k <= $nOperations; $k++){
                    array_push($operation, $data[$k]);
                }
            }

            $j = $nOperations;
            $this->dimention[$i] = $dimention;
            $this->operations[$i] = $operation;
            $this->iterations = $iterations;

            $operation = array();
        }

        return "ok";
    }

    private function createCube($dimention, $operations){
        $this->cube = new Cube($dimention);
        $n = sizeof($operations);

        for ($i=0; $i < $n; $i++){
            $this->cubeOperations($operations[$i]);
        }
    }

    private function cubeOperations($operation){
        $array = explode(" ", $operation);

        switch($array[0]){
        case 'UPDATE':
            $this->cube->update($array[1], $array[2], $array[3], $array[4]);
            break;
        case 'QUERY':
            array_push($this->output, $this->cube->query($array[1], $array[2], $array[3], $array[4], $array[5], $array[6]));
            break;
        }
    }

    public function output(){
        $size = sizeof($this->output);

        for ($i=0; $i < $size; $i++){
            echo $this->output[$i]."<br>";
        }
    }
}
