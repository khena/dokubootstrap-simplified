<?php
/**
 * DokuWiki Twitter Boostrap Template
 *
 * @link     https://github.com/ryanwmoore/dokutwitterbootstrap
 * @author   Ryan Moore <rwmoore07@gmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
@require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */

$showTools = !tpl_getConf('hideTools') || ( tpl_getConf('hideTools') && $_SERVER['REMOTE_USER'] );

?><!DOCTYPE html>
<html lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>">
<head>
    <meta charset="UTF-8" />
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><![endif]-->
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>
    <link href="<?php echo tpl_getMediaFile(array("css/modifications.css")); ?>" rel="stylesheet">
	<link href="<?php echo tpl_getMediaFile(array("css/dokuwikicompatibility.css")); ?>" rel="stylesheet">
	<link href="<?php echo tpl_getMediaFile(array("css/bootstrap-yeti.css")); ?>" rel="stylesheet">
	
</head>

<body data-spy="scroll" data-target=".sidebar">
    <?php /* with these Conditional Comments you can better address IE issues in CSS files,
             precede CSS rules by #IE6 for IE6, #IE7 for IE7 and #IE8 for IE8 (div closes at the bottom) */ ?>
    <!--[if IE 6 ]><div id="IE6"><![endif]--><!--[if IE 7 ]><div id="IE7"><![endif]--><!--[if IE 8 ]><div id="IE8"><![endif]-->

    <?php 
	/* 	The "dokuwiki__top" id is needed somewhere at the top, because that's where the "back to top" button/link links to 
    	classes mode_<action> are added to make it possible to e.g. style a page differently if it's in edit mode,
        See http://www.dokuwiki.org/devel:action_modes for a list of action modes 
     	.dokuwiki should always be in one of the surrounding elements (e.g. plugins and templates depend on it) */ ?>
	<div id="dokuwiki__site">
		<div id="dokuwiki__top" class="dokuwiki site mode_<?php echo $ACT ?>"></div>
    	<nav class="navbar navbar-inverse navbar-fixed-top">
    		<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="./"><?php echo $conf['title']; ?></a>
 				</div>
           		<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<?php _tpl_userinfo(); ?>
						</li>
						<li>
							<div class="navbar-form form-group" role="Search">
								<?php _tpl_output_search_bar(); ?>
							</div>
						</li>
					</ul>
				</div>
           	</div> <!-- container -->
		</nav> <!-- navbar -->
		<nav class="nav navbar navbar-default" id="second_top_nav">
			<div class="container">
           		<ul class="nav navbar-nav navbar-left">
					<?php tpl_includeFile('nav.html');?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class"dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Page Options<b class="caret"></b></a>
           				<?php _tpl_output_page_tools($showTools, 'li'); ?>
					</li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Tools<b class="caret"></b></a>
	   					<?php _tpl_output_tools_twitter_bootstrap($conf['useacl'] && $showTools); ?>
					</li>
           		</ul>
			</div> <!-- container -->
		</nav> <!-- navbar -->

	    <?php html_msgarea() /* occasional error and info messages on top of the page */ ?>
    	<?php tpl_includeFile('header.html') ?>

        <div class="container">
        <!-- ********** SIDE BAR for TOCIFY ********** -->
        	<div class="row">
				<!-- Make side bar 3 "md's" wide -->
            	<div class="col-md-3">
             		<?php _tpl_toc_to_twitter_bootstrap(); ?> 
            	</div>
            	<div class="col-md-8" id="dokuwiki__content">
                	<div class="page">
						<?php tpl_flush(); ?>
						<?php tpl_content(false); ?>
						<div class="clearer"></div>
                    </div>
				</div>
			</div><!-- row -->
        </div><!-- container -->

        <div class="clearer"></div>
        <hr class="a11y" />

		<!-- ********** FOOTER ********** -->
		<footer>
			<div class="clearer"></div>
			<div class="container"></div>
				<div class="row">
        			<div class="col-md-4 col-md-offset-6 text-muted">
            	  		<?php tpl_pageinfo() /* 'Last modified' etc */ ?>
              			<?php tpl_license('button') /* content license, parameters: img=*badge|button|0, imgonly=*0|1, return=*0|1 */ ?>
	     	       	  	<?php tpl_includeFile('footer.html') ?>
    	    		</div>
				</div>
			</div>
		</footer>

    </div><!-- dokuwiki__site -->

    <div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
    <!--[if ( IE 6 | IE 7 | IE 8 ) ]></div><![endif]-->

   <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
	
    <!-- load any scripts that may require a newer jQuery library than DokuWiki provides. -->
    <script src="<?php echo tpl_getMediaFile(array("js/bootstrap.min.js")); ?>"></script>
	<script src="<?php echo tpl_getMediaFile(array("js/change_dokuwiki_structure.js")); ?>"></script>
    <!-- restore jQuery for DokuWiki -->
    <!-- <script src="<?php //echo tpl_getMediaFile(array("js/restore_dokuwikis_jquery.js")); ?>"></script> -->
</body>
</html>