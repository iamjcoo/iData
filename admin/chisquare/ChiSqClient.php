<?php
include_once('ChiSquare.php');
class ChiSqClient{
	private $x2;
	private $stats;
	private $members;
	private $matrix1;
	private $matrix2;
	private $matrix3;
	private $matrix4;
	
	public function __construct()
	{
		$this->makeMatrix();
		$this->calcX2();
		$this->makeTable();
	}
	private function makeMatrix()
	{
				$this->matrix1=34;
				$this->matrix2=0;
				$this->matrix3=322;
				$this->matrix4=58;
	}
	
	private function calcX2()
	{
		$this->x2=new ChiSquare();
		$this->stats=$this->x2->doX2($this->matrix1,$this->matrix2,$this->matrix3,$this->matrix4);
	}
	
	private function makeTable()
	{
		$c1=$this->stats["col1t"];
		$c2=$this->stats["col2t"];
		$r1=$this->stats["row1t"];
		$r2=$this->stats["row2t"];
		$total=$this->stats["total"];
		$chi2= $this->stats["x2"];
		$p1=$this->stats["prob"];
		

	echo $chi2;
	}
}
$worker=new ChiSqClient();
?>