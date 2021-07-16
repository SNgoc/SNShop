<?php
function Paginarion($number, $page, $addition){
	if ($number >1){
		echo '<ul class="pagination">';			
		if($page>1){
			echo '<li class="page-item"><a class="page-link" href="?page='.($page-1).$addition.'">Previous</a></li>';
		}

		$avaiablePage = [1,$page-1,$page,$page+1,$number]; //mảng gồm trang đầu, trang cuối, trang hiện tại và 2 trang kế trang hiện tại 
		$isFirst = $isLast = false; // 2 biến này để kiếm tra có dấu ... trước và sau trang hiện tại chưa
		for($i=0; $i<$number; $i++){
			if(!in_array($i+1,$avaiablePage)){ //nếu không có trong mảng thì ra khỏi vòng for
				if(!$isFirst && $page >3){//nếu chưa có dấu ... và số trang phải lớn hơn 3
					echo'<li class="page-item"><a class="page-link" href="?page='.($page-2).$addition.'">...</a></li>';
					$isFirst = true; //xác nhận đã có dấu ...
				}
				if(!$isLast && $i >$page){//nếu chưa có dấu ... và số trang phải lớn hơn 3
					echo'<li class="page-item"><a class="page-link" href="?page='.($page+2).$addition.'">...</a></li>';
					$isLast = true; //xác nhận đã có dấu ...
				}
				continue;
			}
			if($page==$i+1){
				echo'<li class="page-item active"><a class="page-link" href="#">'.($i+1).'</a></li>';
			}else{
				echo'<li class="page-item"><a class="page-link" href="?page='.($i+1).$addition.'">'.($i+1).'</a></li>';
			}		
		}
		if($page<$number){
			echo '<li class="page-item"><a class="page-link" href="?page='.($page+1).$addition.'">Next</a></li>';
		}
		echo '</ul>';    			
	
	}
}

function PaginarionRv($number, $page, $addition, $id){
	if ($number >1){
		echo '<ul class="pagination">';			
		if($page>1){
			echo '<li class="page-item"><a class="page-link" href="?id='.$id.'&page='.($page-1).$addition.'#tab2">Previous</a></li>';
		}

		$avaiablePage = [1,$page-1,$page,$page+1,$number]; //mảng gồm trang đầu, trang cuối, trang hiện tại và 2 trang kế trang hiện tại 
		$isFirst = $isLast = false; // 2 biến này để kiếm tra có dấu ... trước và sau trang hiện tại chưa
		for($i=0; $i<$number; $i++){
			if(!in_array($i+1,$avaiablePage)){ //nếu không có trong mảng thì ra khỏi vòng for
				if(!$isFirst && $page >3){//nếu chưa có dấu ... và số trang phải lớn hơn 3
					echo'<li class="page-item"><a class="page-link" href="?id='.$id.'&page='.($page-2).$addition.'#tab2">...</a></li>';
					$isFirst = true; //xác nhận đã có dấu ...
				}
				if(!$isLast && $i >$page){//nếu chưa có dấu ... và số trang phải lớn hơn 3
					echo'<li class="page-item"><a class="page-link" href="?id='.$id.'&page='.($page+2).$addition.'#tab2">...</a></li>';
					$isLast = true; //xác nhận đã có dấu ...
				}
				continue;
			}
			if($page==$i+1){
				echo'<li class="page-item active"><a class="page-link" href="#">'.($i+1).'</a></li>';
			}else{
				echo'<li class="page-item"><a class="page-link" href="?id='.$id.'&page='.($i+1).$addition.'#tab2">'.($i+1).'</a></li>';
			}		
		}
		if($page<$number){
			echo '<li class="page-item"><a class="page-link" href="?id='.$id.'&page='.($page+1).$addition.'#tab2">Next</a></li>';
		}
		echo '</ul>';    			
	
	}
}