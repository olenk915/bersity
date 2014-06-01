<?php
/*
Template Name: My Board Page
*/
?>
<?php ob_start(); if ( !is_user_logged_in() ) { wp_redirect( home_url() ); exit; }?>
<?php get_header(); ?> 
<?php /* image tag **************** <?php bloginfo('template_url');?>"/images/" *********************** */;
global $current_user;
get_currentuserinfo();
$current_user_id = $current_user->ID
?>

<script src="<?php bloginfo('template_url')?>/js/jquery.easing-1.3.pack.js"></script>
<script src="<?php bloginfo('template_url')?>/js/jquery.mousewheel-3.0.4.pack.js"></script>
<script src="<?php bloginfo('template_url')?>/js/vendor/jquery.ui.widget.js"></script>
<script src="<?php bloginfo('template_url')?>/js/jquery.iframe-transport.js"></script>
<script src="<?php bloginfo('template_url')?>/js/jquery.fileupload.js"></script>
<script src="<?php bloginfo('template_url')?>/js/jquery.fancybox-1.3.4.js"></script>
<script type="text/javascript">
	jQuery('script').each(function(){
		if(jQuery(this).attr('src') && jQuery(this).attr('src').search('plupload')>-1){
			jQuery(this).remove();
		}
	});
</script>
<input type="hidden" id="usrid" value="<?php echo $current_user_id;?>"/>
<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/jquery.fileupload-ui.css">
<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/jquery.fancybox-1.3.4.css">
<div id="content">
	<div class="inner_template_container">
          <h2 class="big_title">My Board</h2>
          <div class="caption_inner"><p>How to upload photos in your bulletin board?<br /> <br/>First, click on a dotted box in the bulletin board. After, click on the <!--<span style="background-color:#34A2D8;">-->Upload photo!<!--</span>--> tab below to upload a photo from your computer.</p></div>
          <div class="uploader_main">          		
          		<div class="upload_image_section"><label class="filebutton">Upload photo!<span><input size="20" id="fileupload" type="file" name="files[]" multiple></span></label></div>
          </div>
  		<div class="broad_sec">
        	<div class="icon_div">
            <div class="icon_link link_div1"><img src="<?php bloginfo('template_url');?>/new_images/broad_img1.png" alt="img1" /></div>
            <div class="icon_link link_div2"><img src="<?php bloginfo('template_url');?>/new_images/broad_img2.png" alt="img2" /></div>
            <div class="icon_link link_div3"><img src="<?php bloginfo('template_url');?>/new_images/broad_img3.png" alt="img3" /></div>
            <div class="icon_link link_div4"><img src="<?php bloginfo('template_url');?>/new_images/broad_img4.png" alt="img4" /></div>
            <div class="icon_link link_div5"><img src="<?php bloginfo('template_url');?>/new_images/broad_img5.png" alt="img5" /></div>
            <div class="icon_link link_div6"><img src="<?php bloginfo('template_url');?>/new_images/broad_img6.png" alt="img6" /></div>
            <div class="icon_link link_div7"><a href="<?php bloginfo('url');?>/groups/"><img src="<?php bloginfo('template_url');?>/new_images/broad_img7.png" alt="img7" /></a></div>
            <div class="icon_link link_div8"><img src="<?php bloginfo('template_url');?>/new_images/broad_img8.png" alt="img8" /></div>
            <div class="icon_link link_div9"><img src="<?php bloginfo('template_url');?>/new_images/broad_img9.png" alt="img9" /></div>
            <div class="icon_link link_div10"><a href="<?php bloginfo('url');?>/videos/"><img src="<?php bloginfo('template_url');?>/new_images/broad_img10.png" alt="img10" /></a></div>
            <div class="icon_link link_div11"><img src="<?php bloginfo('template_url');?>/new_images/broad_img11.png" alt="img11" /></div>
            <div class="icon_link link_div12"><img src="<?php bloginfo('template_url');?>/new_images/broad_img12.png" alt="img12" /></div>
            <div class="icon_link link_div13"><img src="<?php bloginfo('template_url');?>/new_images/broad_img13.png" alt="img13" /></div>
            <div class="icon_link link_div14"><img src="<?php bloginfo('template_url');?>/new_images/broad_img14.png" alt="img14" /></div>
            <div class="icon_link link_div15"><img src="<?php bloginfo('template_url');?>/new_images/broad_img15.png" alt="img15" /></div>
            <div class="icon_link link_div16"><a href="<?php bloginfo('url');?>/featured-artists/"><img src="<?php bloginfo('template_url');?>/new_images/broad_img16.png" alt="img16" /></a></div>
            </div>
            
            <div class="dot_box_div">
			<?php
			$conn= mysql_connect('localhost','bandver5_truepro','#K%MubqZ@$hc');
			mysql_select_db('bandver5_mar23bandvers',$conn);
			for($i=0; $i<10;$i++){
				$squery = "select * from `wp_myboard_images` where `albumNumber`='".$i."' and `userid`='".$current_user_id."'";
				$a = mysql_query($squery,$conn);
				$j=0;
				$imp = '';
				while($b = mysql_fetch_array($a)){
					$j = $b['id'];
					$imp = $b['imagepath'];
				}
				?><div class="upload_link<?php echo ($i+1);?> fupld <?php if($i==0){echo 'active';}?>"><span><?php
				if($j>0){
					$x = explode(',',$imp);
					for($y=0;$y<(count($x)-1);$y++){
						?><a href="<?php bloginfo('template_url');?>/server/php/files/<?php echo $x[$y];?>" title="" rel="example_group<?php echo $i;?>"><img src="<?php bloginfo('template_url');?>/server/php/files/thumbnail/<?php echo $x[$y];?>" alt=""></a><?php
					}?>
					<script type="text/javascript">
					jQuery("a[rel=example_group<?php echo $i;?>]").fancybox({
						'transitionIn'		: 'none',
						'transitionOut'		: 'none'
					});	
					</script>
				<?php
				}else{
					?><a href="javascript:void(0);"><img src="<?php bloginfo('template_url');?>/new_images/img1.jpg" alt="img_ex" /></a><?php
				}
				?></span>
				</div>
				<?php
			}
			?>
            </div>
  		</div>
  		<p class="tag_line" align="center">Share this with friends and family in your board</p>
  			  <?php the_content(); ?>

        <div class="uploader_main_2">
          		<div class="social_sec">
                <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://bandversity.com/my-board/">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                	<div class="fb-like" data-href="http://bandversity.com/my-board/" data-send="true" data-width="450" data-show-faces="true"></div>
                </div>          		
          </div>
       
        </div>
</div>
<script>
/*jslint unparam: true */
/*global window, $ */
var ind = 0;
jQuery('.fupld').click(function(){
	 ind = jQuery(this).index();
	 jQuery('.fupld').removeClass('active');
	 jQuery(this).addClass('active');
});
var imgpaths='';
var u = '<?php bloginfo('template_url');?>/server/php/';
jQuery(function () {
    jQuery('#fileupload').fileupload({
        url: u,
        dataType: 'json',
        done: function (e, data) {
            jQuery.each(data.result.files, function (index, file) {
                //jQuery('<p/>').text(file.name).appendTo('.upload_link1.active');
				jQuery('.fupld.active').append('<span><a rel="example_group'+ind+'" title="" href="'+u+'files/'+file.name+'"><img alt="" src="'+u+'files/thumbnail/'+file.name+'" /></a></span>');
				imgpaths+=file.name+',';
            });
        },
		start:function(e){
			jQuery('.fupld.active').html('');
			imgpaths='';
		},
		stop:function(e){
			jQuery("a[rel=example_group"+ind+"]").fancybox({
					'transitionIn'		: 'none',
					'transitionOut'		: 'none'
			});	
			jQuery.ajax({
				url:'<?php bloginfo('template_url');?>/myboardimages.php',
				type:'POST',
				data:{'usrid':jQuery('#usrid').val(),'album':ind,'imgpth':imgpaths}
			});
		}
    });
});
</script>
<?php get_footer(); ?>
