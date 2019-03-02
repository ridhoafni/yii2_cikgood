<?php

/* @var $this yii\web\View */

use yii\bootstrap\Nav;
use yii\widgets\LinkPager;

use common\models\Layout;
$this->title = 'Flashsoft';
$warna=Layout::find()->where(['id_layout'=>'1'])->one();
$slide='#'.$warna['warna_slider'];

?>
<!-- Start Slider-->

<?php //foreach($warna as $warna);?>
<div style="margin:-15% -9.2% 3% -9.2%;background-color:<?= $slide ?>;min-height:810px;" class="hidden-xs">
	<!-- Start Corousel -->
	 <div id="myCarousel" class="carousel slide col-md-12" data-ride="carousel" style="margin:0px;">
		<!-- Indicators -->
		<ol class="carousel-indicators">
		  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		  <li data-target="#myCarousel" data-slide-to="1"></li>
		  <li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<!--<div class="item active">
				<img src="?= Yii::$app->homeUrl ?>images/fs.png" alt="Los Angeles" style="width:100%;">
			</div>-->
			<?php 			
				$no=1;
				foreach($sliders as $slider){
					if($no==1)
					{
						echo '<div class="item active">';
						echo '<img src="images/post/'.$slider->foto.'" alt="img" style="width:100%;">';
						echo '</div>';
					}else{
						echo '<div class="item">';
						echo '<img src="images/post/'.$slider->foto.'" alt="img" style="width:100%;">';
						echo '</div>';
					}
					$no++;
				}
			?>
			
		</div>

	  </div>
	<!-- End Corousel -->
	
	<div align="center">
		<div class="col-md-12" align="center" valign="bottom">
			<a href="#blog"><img src="<?= Yii::$app->homeUrl ?>images/down.png" alt="Down" style="width:50px;margin-top:5%;"></a>
		</div>
	</div>
</div>
<!-- End Slider-->

<!-- Start Slider Mobile -->
<div style="margin:-16% -4.5% 3% -9.2%;background-color:<?= $slide ?>;min-height:510px;" class="hidden-md hidden-lg">
	<!-- Start Corousel -->
	 <div id="myCarousel" class="carousel slide col-md-12" data-ride="carousel" style="margin:0px;">
		<!-- Indicators -->
		<ol class="carousel-indicators">
		  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		  <li data-target="#myCarousel" data-slide-to="1"></li>
		  <li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<?php 			
				$no=1;
				foreach($sliders as $slider){
					if($no==1)
					{
						echo '<div class="item active">';
						echo '<img src="images/post/'.$slider->foto.'" alt="img" style="width:100%;">';
						echo '</div>';
					}else{
						echo '<div class="item">';
						echo '<img src="images/post/'.$slider->foto.'" alt="img" style="width:100%;">';
						echo '</div>';
					}
					$no++;
				}
			?>
		<!--ganti ke foreach-->
		  
		<!--ganti ke foreach-->

		</div>

	  </div>
	<!-- End Corousel -->
	
	<div align="center">
		<div class="col-xs-12" align="center" valign="bottom">
			<a href="#blog"><img src="<?= Yii::$app->homeUrl ?>images/down.png" alt="Down" style="width:50px;margin-top:20%;"></a>
		</div>
	</div>
</div>
<!-- End Slider Mobile -->

<div class="site-index" id="layanan2">

	
	<!-- Start Layanan-->
	<div class="row"  id="layanan">
		<div class="col-lg-12 col-md-12">
			<div class="col-md-4 panel panel-danger" align="center"  style="margin:0%; padding:0%;">
				<img src="<?= Yii::$app->homeUrl ?>images/project.png" alt="SMD" style="width:140px;padding:2%;">
				<div class="panel-heading" style="height:210px;background:<?= $slide?>;color:#ffffff;">
					<h3>Pembuatan Aplikasi</h3>
					<p>Jasa pembuatan aplikasi untuk keperluan bisnis/organisasi/komunitas</p>
					<div class="col-md-8" style="margin:0 0 0 20%;">
						<ul style="text-align:left;">
							<li>Website</li>
							<li>Sistem Informasi</li>
							<li>Aplikasi Android</li>
						</ul>
						<br>
					</div>
				</div>
			</div>
			<div class="col-md-4 panel panel-danger" align="center" style="margin:0%; padding:0%;">
				<img src="<?= Yii::$app->homeUrl ?>images/product.png" alt="SMD" style="width:140px;padding:2%;">
				<div class="panel-heading" style="height:210px;background:<?= $slide?>;color:#ffffff;">
					<h3>Produk</h3>
					<p>Produk Flashsoft yang selalu dikembangkan untuk memenuhi kebutuhan pengguna</p>
					<div class="col-md-6" style="margin:0 0 0 20%;">
						<ul style="text-align:left;">
							<li>Display(SMD)</li>
							<li>eMenu</li>
							<li>Beda Warna</li>
							<li>Helowot</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-4 panel panel-danger" align="center" style="margin:0%; padding:0%;">
				<img src="<?= Yii::$app->homeUrl ?>images/class.png" alt="eMenu" style="width:140px;padding:2%;">
				<div class="panel-heading" style="height:210px;background:<?= $slide?>;color:#ffffff;">
					<h3>Class Programming</h3>
					<p>Class Programming adalah tempat bimbingan belajar terkait programming</p>
					<div class="col-md-6" style="margin:0 0 0 25%;">
						<ul style="text-align:left;">
							<li>Web Dasar</li>
							<li>Web Lanjut</li>
							<li>Android</li>
							<li>Java Dasar</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Layanan-->	

	<div class="row"  id="blog">
		
		<div class="col-lg-9">
			<div>
				<?php
					foreach($models as $post)
					{
						echo '<div class="row">';
						echo '<h2>'.$post->title.'</h2>';
							echo '<div class="col-md-4">';
							// echo '<img src="'.Yii::$app->homeUrl.'images/emenu/3.jpg" alt="eMenu" style="width:100%;">';
							echo '<img src="images/post/'.$post->foto2.'" alt="eMenu" style="width:100%;">';
							echo '</div>';
							echo '<div class="col-md-8">';
								echo '<p>'.substr($post->content,0,300).'...</p>';
								echo '<p><small>Posted by '.$post->user->username.' at '.date('F j, Y, g:i a',$post->create_time).'</small></p>';
								echo '<p><a class="btn btn-default" href="'.Yii::$app->homeUrl.'site/post-single?id='.$post->id.'">readmore &raquo;</a></p>';
							echo '</div>';
						echo '</div>';
					}
					echo LinkPager::widget([
						'pagination' => $pages,
					]);
				?>
			 </div>

		</div>
		
		<div class="col-lg-3">
			<h2>Kategori</h2>
			<?php
				$items=[];
				foreach($categories as $category)
				{
					$items[]=['label' => $category->name , 'url' => Yii::$app->homeUrl.'/site/post-category?id=1'];
				}
				echo Nav::widget([
					'items' => $items,
				]);
			?>
			<h2>Instagram</h2>
			<?php
				media('flash_soft');
				function media($user_id)
				{				
			    	
                    $url="https://www.instagram.com/".$user_id."/media/";
			    	$ch = curl_init();
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_URL, $url);
                
                    $data = curl_exec($ch);
                    curl_close($ch);
                    
                    $s = $data;
                    
					$data = json_decode($s, true);

					echo '
						<div class="row" style="margin:1%;" valign="center">
							<a href="https://www.instagram.com/'.$data['items'][0]['user']['username'].'" target="_blank">
								<img src="'.$data['items'][0]['user']['profile_picture'].'" width="10%" style="float:left;margin:2px;">
								<h3 style="float:left;margin:2px;" >
									<small> '.$data['items'][0]['user']['username'].'</small>
								</h3>
							</a>
						</div>
					';
					
					for($i=0;$i<count($data['items']);$i++)
					{
						echo '<a href="#detail.php?url='.$data['items'][$i]['link'].'" target="_blank"><img src="'.$data['items'][$i]['images']['thumbnail']['url'].'" width="31%" style="padding:0.5%;margin:1%;"  class="btn-danger"></a>';
					}
					
				
				}
			?>
		</div>
	</div>

</div>
