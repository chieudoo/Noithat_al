<?php
	function select_category($data,$parent,$str,$sel=0)
	{
		foreach ($data as $item) {
			if($item['status']==0 && $item['parent']==$parent){
				if($item['id']==$sel && $sel != 0){
					echo "<option value='".$item['id']."' selected='selected'>".$str." ".$item['name']."</option>";
				}else{
					echo "<option value='".$item['id']."'>".$str." ".$item['name']."</option>";
				}
				select_category($data,$item['id'],$str."--",$item['parent']);
			}
		}
	}
	function select_one_cate($data,$parent,$str){
		foreach ($data as $key => $item) {
			if($item['parent'] == $parent){
				if($item['status']==0){
					echo "<option value='".$item['id']."'>".$str." ".$item['name']."</option>";
				}
				select_one_cate($data,$item['id'],$str."--");
			}
		}
	}
	function list_cate($data,$parent,$str){
		$stt=0;
		foreach ($data as $item) {
			$stt++;
			echo "<tr>";
			if($item['parent']==$parent){
				echo "
					<td>".$stt."</td>
					<td>".$str." ".$item['name']."</td>
					<td>";
						if($item['status']==0){
							echo "<span style='color:green'>Xuất</span>";
						}else{
							echo "<span style='color:red'>Ẩn</span>";
						}
					echo 
					"</td>
					<td>
						<a class='btn btn-primary' ng-click='active(\"edit\",".$item['id'].")' data-toggle='modal' href='#modal-id'>
							<i class='fa fa-edit'></i>
						</a>
						<a class='btn btn-danger delete' ng-click='active(\"delete\",".$item['id'].")' onclick='return cek=confirm(\" Are you sure ?\")'>
							<i class='fa fa-trash'></i>
						</a>
					</td>";
					list_cate($data,$item['id'],$str."--");
			}
				
			echo "</tr>";
		}
	}
	function list_product($data){
		$stt=0;
		foreach ($data as $item) {
			$stt++;
			echo "<tr>
				<td>".$stt."</td>
				<td>".$item['masp']."</td>
				<td>".$item['name']."</td>
				<td><img src='".url('assets/image/upload/'.$item['image'])."' style='with:100px;height:100px;' ></td>
				<td>".$item['danhmuc']['name']."</td>";
				if($item['status'] == 0){
					echo "<td><span style='color:green'>Xuất</span></td>";
				}else{
					echo "<td><span style='color:red'>Ẩn</span></td>";
				}
				echo "<td>
						<a class='btn btn-primary' href='".url('wine-chi-tiet-san-pham/'.$item['id'])."'>
							<i class='fa fa-asterisk' title='Chi Tiết'></i>
						</a>
						<a class='btn btn-danger delete' href='".url('wine-xoa-san-pham/'.$item['id'])."'' onclick='return cek=confirm(\" Are you sure ?\")'>
							<i class='fa fa-trash'></i>
						</a>
					</td>";
			echo "</tr>";
		}
	}
	function list_duan($data)
	{
		$stt=0;
		foreach ($data as $item) {
			$stt++;
			echo "<tr>

				<td>".$stt."</td>
				<td>".$item['name']."</td>
				<td><img src='".url('assets/image/upload/'.$item['image'])."' style='with:100px;height:100px;' ></td>";
				if($item['status'] == 0){
					echo "<td><span style='color:green'>Xuất</span></td>";
				}else{
					echo "<td><span style='color:red'>Ẩn</span></td>";
				}
				echo "<td>
						<a class='btn btn-primary' href='".url('wine-chi-tiet-du-an/'.$item['id'])."'>
							<i class='fa fa-asterisk' title='Chi Tiết'></i>
						</a>
						<a class='btn btn-danger' href='".url('wine-xoa-du-an/'.$item['id'])."' onclick='return confirm(\" Are you sure ?\")'>
							<i class='fa fa-trash'></i>
						</a>
					</td>";
			echo "</tr>";
		}
	}
	function list_slide($data)
	{
		$stt=0;
		foreach ($data as $item) {
			$stt++;
			echo "<tr>

				<td>".$stt."</td>
				<td><img src='".url('assets/image/upload/'.$item['image'])."' style='with:150px;height:150px;' ></td>";
				if($item['status'] == 0){
					echo "<td><span style='color:green'>Xuất</span></td>";
				}else{
					echo "<td><span style='color:red'>Ẩn</span></td>";
				}
				echo "<td>
						<a class='btn btn-primary' href='".url('wine-chi-tiet-slide/'.$item['id'])."'>
							<i class='fa fa-asterisk' title='Chi Tiết'></i>
						</a>
						<a class='btn btn-danger' href='".url('wine-xoa-slide/'.$item['id'])."' onclick='return confirm(\" Are you sure ?\")'>
							<i class='fa fa-trash'></i>
						</a>
					</td>";
			echo "</tr>";
		}
	}
	function list_user($data)
	{
		$stt=0;
		foreach ($data as $item) {
			$stt++;
			echo "<tr>
				<td>".$stt."</td>
				<td>".$item['name']."</td>
				<td>".$item['email']."</td>
				<input type='hidden' name='name' ng-model='user.name'>
				<input type='hidden' name='email' ng-model='user.email'>
				<input type='hidden' name='status' ng-model='user.status'>
				<input type='hidden' name='partext' ng-model='user.partext'>";
				if(Auth::user()->id==1){
					echo "<td style='cursor:pointer' ng-click='cStatus(".$item['status'].",".$item['id'].")'>";
						if($item['status']==1){
							echo "<span style='color:green'>Active</span>";
						}else{
							echo "<span style='color:red'>Block</span>";
						}
					echo "</td>";
				}else{
					echo "<td>";
						if($item['status']==1){
							echo "<span style='color:green'>Active</span>";
						}else{
							echo "<span style='color:red'>Block</span>";
						}
					echo "</td>";
				}
				
				if(Auth::user()->id == 1){
					if(Auth::user()->id == $item['id']){
						echo "<td>
						<a class='btn btn-primary' ng-click='active(\"edit\",".$item['id'].")' data-toggle='modal' href='#modal-id'>
							<i class='fa fa-edit'></i>
						</a></td>";
					}else{
						echo "<td>
							<a class='btn btn-primary' ng-click='active(\"edit\",".$item['id'].")' data-toggle='modal' href='#modal-id'>
								<i class='fa fa-edit'></i>
							</a>
							<a class='btn btn-danger' href='".url('wine-xoa-user/'.$item['id'])."' onclick='return confirm(\" Are you sure ?\")'>
								<i class='fa fa-trash'></i>
							</a>
						</td>";
					}
					
				}else{
					if(Auth::user()->id==$item['id']){
						echo "
						<td>
							<a class='btn btn-primary' ng-click='active(\"edit\",".$item['id'].")' data-toggle='modal' href='#modal-id'>
								<i class='fa fa-edit'></i>
							</a>
						</td>";
					}else{
						echo "
						<td>
							<a class='btn btn-primary' disabled ng-click='active(\"edit\",".$item['id'].")' data-toggle='modal' href='#modal-id'>
								<i class='fa fa-edit'></i>
							</a>
						</td>";
					}
				}
			echo "</tr>";
		}
	}

	/*function website*/
	function menu($data,$parent)
	{
		foreach ($data as $item) {
			if($item['status'] == 0 && $item['parent'] == $parent){
				echo "<li><a href='".url('danh-muc/'.$item['id'].'-'.$item['slug']).".html'>".$item['name']."</a>";
					
				echo "</li>";
			}
		}
	}
	function menu_left($data,$id){
		foreach ($data as $item) {
			if($item['status']==0){
				if($item['parent']==$id){
					echo "<li><a data-id='".$item['parent']."' href='".url('danh-muc/'.$item['id'].'-'.$item['slug']).".html'>".$item['name']."</a>";
						echo "<ul>";
						     menu_left($data,$item['id']);
						echo "</ul>";
					echo "</li>";
				}
			}		
		}
	}
	function list_sp($data,$parent)
	{
		foreach ($data as $item) {
			if($item['status']==0){
				echo "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-4'>
			        <div class='sp'>
			            <div class='img'>
			                <img src='".url('assets/image/upload/'.$item['image'])."' class='img-responsive' alt='".$item['name']."'>
			            </div>
			            <p>".$item['name']."</p>
			            <a href='".url('chi-tiet/'.$item['id'].'-'.$item['slug'].'').".html' title='Xem Chi Tiết'><i class='fa fa-hand-o-right'></i></a>
			        </div>
			    </div>";
			}
			
		}
	}
?>