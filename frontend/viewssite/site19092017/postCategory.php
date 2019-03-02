<?php

/* @var $this yii\web\View */

use yii\bootstrap\Nav;
$this->title = 'My Blog';
?>
<div class="site-index">


	
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
						echo '<p><a class="btn btn-default" href="'.Yii::$app->homeUrl.'/site/post-single?id='.$post->id.'">readmore &raquo;</a></p>';
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
					$items[]=['label' => $category->name , 'url' => Yii::$app->homeUrl.'/site/post-category?id='.$category->id];
				}
				echo Nav::widget([
					'items' => $items,
				]);
			?>
		</div>
	</div>

</div>
