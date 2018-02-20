<?php

namespace App\Libs;

class Pagination {

	public $totalRecords;
	public $postPerPage;
	public $totalPages;
	public $curPage;

	public $numLink = 1;
	

		
	public function __construct($numRow, $curPage){
		$this->totalRecords = $numRow;
		$this->curPage = $curPage;

	}

	public function setPostPerPage($num) {
		$this->postPerPage = $num;
	}

	public function setNumLink($num){
		$this->numLink = $num;
	}

	public function pagHotProduct(){ 
		$this->totalPages = ceil($this->totalRecords / $this->postPerPage);

		$totalPages = $this->totalPages;
		$curPage = $this->curPage;

		$start = null;
		$end = null;
			
		if($curPage === 1 ) {
			$start = 1;
			$end = $start + $this->numLink;
		} else {
			$start = $curPage - $this->numLink;
			$end = $curPage + $this->numLink;
		}

		if($curPage === $totalPages) {
			$start = $totalPages - $this->numLink ;
			$end  = $totalPages;
		}

		if($curPage > 1  ) : ?>
			<div class="pag-item float-left">
				<a href="<?= DOMAIN.'Product/showHot'; ?> " class='link-inside' > First </a>
			</div>
		<?php endif; ?> <?php 

		for ($i=$start; $i <= $end ; $i++) : ?> 
			<?php 
				if($i > $totalPages) {
					break; 
				}
			?>

		<?php  if($i === $curPage) :?> 
			<div class="pag-item pag-active float-left">
				<a href="<?= DOMAIN.'Product/showHot/'.$i; ?>" class="link-inside">
					<?=  $i; ?>
				</a>
			</div>
		<?php else : ?>
			<div class="pag-item  float-left">
				<a href="<?= DOMAIN.'Product/showHot/'.$i; ?>" class="link-inside">
					<?=  $i; ?>
				</a>
			</div>
		<?php endif; ?>
		<?php endfor; 
		
		if($curPage < $totalPages) : ?>
			<div class='pag-item float-left'>
				<a href="<?= DOMAIN.'Product/showHot/'. $totalPages; ?>" class="link-inside">
					Last
				</a>
			</div>
		<?php endif; 
	}
		

}