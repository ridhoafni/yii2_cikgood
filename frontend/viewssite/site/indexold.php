<?php

/* @var $this yii\web\View */

use yii\bootstrap\Nav;
$this->title = 'Flashsoft';
?>
<div class="site-index">

	<!-- Start Corousel -->
	 <div id="myCarousel" class="carousel slide col-md-10" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
		  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		  <li data-target="#myCarousel" data-slide-to="1"></li>
		  <li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
		  <div class="item active">
			<img src="<?= Yii::$app->homeUrl ?>images/fs.jpg" alt="Los Angeles" style="width:100%;">
		  </div>

		  <div class="item">
			<img src="<?= Yii::$app->homeUrl ?>images/bw.jpg" alt="Chicago" style="width:100%;">
		  </div>
		
		  <div class="item">
			<img src="<?= Yii::$app->homeUrl ?>images/hw.jpg" alt="New york" style="width:100%;">
		  </div>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		  <span class="glyphicon glyphicon-chevron-left"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
		  <span class="glyphicon glyphicon-chevron-right"></span>
		  <span class="sr-only">Next</span>
		</a>
	  </div>
	<!-- Start Corousel -->
	
	<!-- Start Corousel -->
	 <div id="myCarousel2" class="carousel slide col-md-2" data-ride="carousel">
		<small>Display</small>
		<!-- Indicators -->
		<ol class="carousel-indicators">
		  <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
		  <li data-target="#myCarousel2" data-slide-to="1"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
		  <div class="item active">
			<img src="<?= Yii::$app->homeUrl ?>images/smd/1.png" alt="Los Angeles" style="width:100%;">
		  </div>

		  <div class="item">
			<img src="<?= Yii::$app->homeUrl ?>images/smd/2.jpg" alt="Chicago" style="width:100%;">
		  </div>
		
		</div>

		
	  </div>
	<!-- End Corousel -->
	
	<!-- Start Corousel3 -->
	 <div id="myCarousel3" class="carousel slide col-md-2" data-ride="carousel"  style="margin-top:15px;">
		<small>eMenu</small>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
		  <div class="item active">
			<img src="<?= Yii::$app->homeUrl ?>images/emenu/1.jpg" alt="Los Angeles" style="width:100%;">
		  </div>

		  <div class="item">
			<img src="<?= Yii::$app->homeUrl ?>images/emenu/2.jpg" alt="Chicago" style="width:100%;">
		  </div>

		  <div class="item">
			<img src="<?= Yii::$app->homeUrl ?>images/emenu/3.jpg" alt="Chicago" style="width:100%;">
		  </div>

		  <div class="item">
			<img src="<?= Yii::$app->homeUrl ?>images/emenu/4.jpg" alt="Chicago" style="width:100%;">
		  </div>
		
		</div>

		
	  </div>
	<!-- End Corousel3 -->

    <div class="jumbotron">
        <!--<h1>Congratulations!</h1>-->
    </div>

	
	<div class="row">
		<div class="col-lg-9">
			<div>
				<?php
					foreach($posts as $post)
					{
						echo '<div>';
						echo '<h2>'.$post->title.'</h2>';
						echo '<p>'.substr($post->content,0,300).'...</p>';
						echo '<p><small>Posted by '.$post->user->username.' at '.date('F j, Y, g:i a',$post->create_time).'</small></p>';
						echo '<p><a class="btn btn-default" href="'.Yii::$app->homeUrl.'site/post-single?id='.$post->id.'">readmore &raquo;</a></p>';
						echo '</div>';
					}
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
