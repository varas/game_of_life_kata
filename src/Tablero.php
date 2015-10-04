<?php

class Tablero
{
    private $celulas;

    public function __construct($celulas)
    {
        $this->celulas = $celulas;
    }

    public function aplicarReglas(array $reglas)
    {
        $nuevasCelulas = $this->celulas;

        foreach ($reglas as $regla) {
            for ($i = 0; $i <= count($this->celulas); $i++) {
                $filaDeCelulas = $this->celulas[$i];

                for ($j = 0; $j <= count($filaDeCelulas); $j++) {
                    $celulaActual = $filaDeCelulas[$j];

                    $celulaResultante = $regla->aplica($celulaActual, $this->vecinos($i, $j));

                    $nuevasCelulas[$i][$j] = $celulaResultante;
                }
            }
        }

        return new static($nuevasCelulas);
    }

    private function vecinos($i, $j)
    {
        $celulasVecinas = [];

        $celulasVecinas = $this->anadirVecino($celulasVecinas, $i - 1, $j);
        $celulasVecinas = $this->anadirVecino($celulasVecinas, $i, $j - 1);
        $celulasVecinas = $this->anadirVecino($celulasVecinas, $i - 1, $j - 1);
        $celulasVecinas = $this->anadirVecino($celulasVecinas, $i + 1, $j);
        $celulasVecinas = $this->anadirVecino($celulasVecinas, $i, $j + 1);
        $celulasVecinas = $this->anadirVecino($celulasVecinas, $i + 1, $j + 1);
        $celulasVecinas = $this->anadirVecino($celulasVecinas, $i - 1, $j + 1);
        $celulasVecinas = $this->anadirVecino($celulasVecinas, $i + 1, $j - 1);
    }

    private function anadirVecino($celulasVecinas, $x_vecina, $y_vecina)
    {
        if ($x_vecina < 0 || $y_vecina < 0) {
            return $celulasVecinas;
        }

        if ($x_vecina > count($this->celulas) || $y_vecina > count($this->celulas[0])) {
            return $celulasVecinas;
        }

        $celula = $this->celulas[$x_vecina][$y_vecina];

        return $celula ?
            $celulasVecinas[] = $celula :
            $celulasVecinas;
    }
}
