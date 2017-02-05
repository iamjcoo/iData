<?php
abstract class IChiSquare
{
	abstract protected function rowColTotals();
	abstract protected function expectedFrequencies();
	abstract protected function calculateX2();
	abstract protected function calcProb();
	abstract protected function bundleArray();
	protected $cell1;
	protected $cell2;
	protected $cell3;
	protected $cell4;
	protected $col1total;
	protected $col2total;
	protected $row1total;
	protected $row2total;
	protected $totalAll;
	protected $e1;
	protected $e2;
	protected $e3;
	protected $e4;
	protected $chiSquare;
	protected $bundle=array();
	protected $p;
	
	public function templateMethod()
	{
		$this->rowColTotals();
		$this->expectedFrequencies();
		$this->calculateX2();
		$this->calcProb();	
	}
}

?>