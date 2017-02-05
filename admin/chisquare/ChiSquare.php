<?php
include_once("IChiSquare.php");
class ChiSquare extends IChiSquare
{
	public function doX2($cell1,$cell2,$cell3,$cell4)
	{
		$this->cell1=$cell1;
		$this->cell2=$cell2;
		$this->cell3=$cell3;
		$this->cell4=$cell4;
		$this->templateMethod();
		$this->bundleArray();
		return $this->bundle;	
	}
	
	protected function rowColTotals()
	{			
		//Row and Column totals
		$this->col1total=$this->cell1 + $this->cell3;
		$this->col2total=$this->cell2 + $this->cell4;
		$this->row1total=$this->cell1 + $this->cell2;
		$this->row2total=$this->cell3 + $this->cell4;
		$this->totalAll=$this->cell1 + $this->cell2 + $this->cell3 + $this->cell4;
	}
	
	protected function expectedFrequencies()	
	{
		//Expected (e) frequencies
		$this->e1=($this->col1total/$this->totalAll) * $this->row1total;
		$this->e2=($this->col2total/$this->totalAll) * $this->row1total;
		$this->e3=($this->col1total/$this->totalAll) * $this->row2total;
		$this->e4=($this->col2total/$this->totalAll) * $this->row2total;
	}
	
	protected function calculateX2()	
	{
		//Calculate Chi Square
		$x1=pow(($this->cell1 - $this->e1),2)/$this->e1;
		$x2=pow(($this->cell2 - $this->e2),2)/$this->e2;
		$x3=pow(($this->cell3 - $this->e3),2)/$this->e3;
		$x4=pow(($this->cell4 - $this->e4),2)/$this->e4;
		$this->chiSquare=$x1+$x2+$x3+$x4;
	}
	protected function calcProb()	
	{
		//Calculate probability
		switch($this->chiSquare)
		{
			case $this->chiSquare >= 6.64:
			$this->p="Significant at .01 level of probability.";
			break;
			
			case $this->chiSquare >=3.84:
			$this->p="Significant at .05 level of probability.";
			break;
			
			default:
			$this->p="Not significant at .05 or .01 level";
		}
	}
	
	protected function bundleArray()
	{
		$this->bundle=array(
		"col1t"=>$this->col1total,
		"col2t"=>$this->col2total,
		"row1t"=>$this->row1total,
		"row2t"=>$this->row2total,
		"total"=>$this->totalAll,
		"x2"=>$this->chiSquare,
		"prob"=>$this->p
		);
	}
}
?>