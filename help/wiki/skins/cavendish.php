<?php
/**
 * Mozilla cavendish theme
 *
 * Loosely based on the cavendish style by Gabriel Wicke
 *
 * @todo document
 * @package MediaWiki
 * @subpackage Skins
 */


if( !defined( 'MEDIAWIKI' ) )
	die();

/** */
require_once('includes/SkinTemplate.php');

/**
 * Inherit main code from SkinTemplate, set the CSS and template filter.
 * @todo document
 * @package MediaWiki
 * @subpackage Skins
 */
class Skincavendish extends SkinTemplate {
	/** Using cavendish. */
	function initPage( &$out ) {
		SkinTemplate::initPage( $out );
		$this->skinname  = 'cavendish';
		$this->stylename = 'cavendish';
		$this->template  = 'cavendishTemplate';
	}
}
	
class cavendishTemplate extends QuickTemplate {
	/**
	 * Template filter callback for cavendish skin.
	 * Takes an associative array of data set from a SkinTemplate-based
	 * class, and a wrapper for MediaWiki's localization database, and
	 * outputs a formatted page.
	 *
	 * @access private
	 */
	function execute() {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php $this->text('lang') ?>" lang="<?php $this->text('lang') ?>" dir="<?php $this->text('dir') ?>">
<head>
	<meta http-equiv="Content-Type" content="<?php $this->text('mimetype') ?>; charset=<?php $this->text('charset') ?>" />
	<?php $this->html('headlinks') ?>
	<title><?php $this->text('pagetitle') ?></title>
	<style type="text/css" media="screen,projection">/*<![CDATA[*/ @import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/main.css"; /*]]>*/</style>
	<link rel="stylesheet" type="text/css" media="print" href="<?php $this->text('stylepath') ?>/common/commonPrint.css" />
	<?php if($this->data['jsvarurl'  ]) { ?><script type="text/javascript" src="<?php $this->text('jsvarurl'  ) ?>"></script><?php } ?>
	<script type="text/javascript" src="<?php                                   $this->text('stylepath' ) ?>/common/wikibits.js"></script>
	<?php if($this->data['usercss'   ]) { ?><style type="text/css"><?php              $this->html('usercss'   ) ?></style><?php    } ?>
	<?php if($this->data['userjs'    ]) { ?><script type="text/javascript" src="<?php $this->text('userjs'    ) ?>"></script><?php } ?>
	<?php if($this->data['userjsprev']) { ?><script type="text/javascript"><?php      $this->html('userjsprev') ?></script><?php   } ?>
</head>

<body <?php if($this->data['body_ondblclick']) { ?>ondblclick="<?php $this->text('body_ondblclick') ?>"<?php } ?>
      <?php if($this->data['nsclass'        ]) { ?>class="<?php      $this->text('nsclass')         ?>"<?php } ?>>

<div id="internal"></div>
<div id="container">

	<div id="mozilla-org"><a href="http://www.ipbwiki.com/forums/index.php?download=60">Mozilla Skin</a></div>

	<?php if($this->data['sitenotice']) { ?><div id="siteNotice"><?php $this->html('sitenotice') ?></div><?php } ?>
	<div id="header">
		<a name="top" id="contentTop"></a>
		<h1><a
	    href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href'])?>"
	    title="<?php $this->msg('mainpage') ?>"><?php $this->text('title') ?></a></h1>
		<ul>
		   	<?php foreach($this->data['content_actions'] as $key => $action) {
		       ?><li
		       <?php if($action['class']) { ?>class="<?php echo htmlspecialchars($action['class']) ?>"<?php } ?>
		       ><a href="<?php echo htmlspecialchars($action['href']) ?>"><?php
		       echo htmlspecialchars($action['text']) ?></a></li><?php
		     } ?>
		</ul>
		<form name="searchform" action="<?php $this->text('searchaction') ?>" id="search">
			<div>
			<label for="q"><?php $this->msg('search') ?></label>
			<input id="q" name="search" type="text"
			<?php if($this->haveMsg('accesskey-search')) {
	          ?>accesskey="<?php $this->msg('accesskey-search') ?>"<?php }
	        if( isset( $this->data['search'] ) ) {
	          ?> value="<?php $this->text('search') ?>"<?php } ?> />
			<input type="submit" name="go" class="searchButton" id="searchGoButton"
	        value="<?php $this->msg('go') ?>"
	        />&nbsp;<input type="submit" name="fulltext"
	        class="searchButton"
	        value="<?php $this->msg('search') ?>" />
	       </div>
		</form>
	</div>

	<div id="mBody">
	
		<div id="side">
			<ul id="nav">
				<li><span><?php $this->msg('personaltools') ?></span>
					<ul>
					<?php foreach($this->data['personal_urls'] as $key => $item) {
				       ?><li id="pt-<?php echo htmlspecialchars($key) ?>"><a href="<?php
				       echo htmlspecialchars($item['href']) ?>"<?php
		 		      if(!empty($item['class'])) { ?> class="<?php
				       echo htmlspecialchars($item['class']) ?>"<?php } ?>><?php
				       echo htmlspecialchars($item['text']) ?></a></li><?php
				    } ?>
					</ul>
				</li>
				<?php foreach ($this->data['sidebar'] as $bar => $cont) { ?>
				<li><span><?php $out = wfMsg( $bar ); if (wfEmptyMsg($bar, $out)) echo $bar; else echo $out; ?></span>
						<ul>
			<?php 			foreach($cont as $key => $val) { ?>
							<li id="<?php echo htmlspecialchars($val['id']) ?>"<?php
								if ( $val['active'] ) { ?> class="active" <?php }
							?>><a href="<?php echo htmlspecialchars($val['href']) ?>"><?php echo htmlspecialchars($val['text']) ?></a></li>
			<?php			} ?>
						</ul>
					</li>
				<?php } ?>
				<li><span><?php $this->msg('toolbox') ?></span>
					<ul>
					  <?php if($this->data['notspecialpage']) { foreach( array( 'whatlinkshere', 'recentchangeslinked' ) as $special ) { ?>
					  <li id="t-<?php echo $special?>"><a href="<?php
					    echo htmlspecialchars($this->data['nav_urls'][$special]['href']) 
					    ?>"><?php echo $this->msg($special) ?></a></li>
					  <?php } } ?>
				      <?php if($this->data['feeds']) { ?><li id="feedlinks"><?php foreach($this->data['feeds'] as $key => $feed) {
				        ?><span id="feed-<?php echo htmlspecialchars($key) ?>"><a href="<?php
				        echo htmlspecialchars($feed['href']) ?>"><?php echo htmlspecialchars($feed['text'])?></a>&nbsp;</span>
				        <?php } ?></li><?php } ?>
				      <?php foreach( array('contributions', 'emailuser', 'upload', 'specialpages') as $special ) { ?>
				      <?php if($this->data['nav_urls'][$special]) {?><li id="t-<?php echo $special ?>"><a href="<?php
				        echo htmlspecialchars($this->data['nav_urls'][$special]['href'])
				        ?>"><?php $this->msg($special) ?></a></li><?php } ?>
				      <?php } ?>
					</ul>
				</li>
				<?php if( $this->data['language_urls'] ) { ?>
					<li><span><?php $this->msg('otherlanguages') ?></span>
						<ul>
						<?php foreach($this->data['language_urls'] as $langlink) { ?>
							<li>
							<a href="<?php echo htmlspecialchars($langlink['href'])
							?>"><?php echo $langlink['text'] ?></a>
							</li>
						<?php } ?>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</div><!-- end of SIDE div -->
		
		<div id="mainContent">
			
			<h1><?php $this->text('title') ?></h1>
			<h3 id="siteSub"><?php $this->msg('tagline') ?></h3>
			<div id="contentSub"><?php $this->html('subtitle') ?></div>
			<?php if($this->data['undelete']) { ?><div id="contentSub"><?php     $this->html('undelete') ?></div><?php } ?>
			<?php if($this->data['newtalk'] ) { ?><div class="usermessage"><?php $this->html('newtalk')  ?></div><?php } ?>
			<!-- start content -->
			<?php $this->html('bodytext') ?>
			<?php if($this->data['catlinks']) { ?><div id="catlinks"><?php       $this->html('catlinks') ?></div><?php } ?>
			<!-- end content -->

		</div><!-- end of MAINCONTENT div -->	
	
	</div><!-- end of MBODY div -->

	<div id="footer"><table><tr><td align="left" width="1%" nowrap="nowrap">
		<?php if($this->data['copyrightico']) { ?><div id="f-copyrightico"><?php $this->html('copyrightico') ?></div><?php } ?></td><td align="center">
		<?php if($this->data['lastmod'   ]) { ?><span id="f-lastmod"><?php    $this->html('lastmod')    ?></span><?php } ?>
		<?php if($this->data['viewcount' ]) { ?><span id="f-viewcount"><?php  $this->html('viewcount')  ?> </span><?php } ?>
		<ul id="f-list">
			<?php if($this->data['credits'   ]) { ?><li id="f-credits"><?php    $this->html('credits')    ?></li><?php } ?>
			<?php if($this->data['copyright' ]) { ?><li id="f-copyright"><?php  $this->html('copyright')  ?></li><?php } ?>
			<?php if($this->data['about'     ]) { ?><li id="f-about"><?php      $this->html('about')      ?></li><?php } ?>
			<?php if($this->data['disclaimer']) { ?><li id="f-disclaimer"><?php $this->html('disclaimer') ?></li><?php } ?>
		</ul></td><td align="right" width="1%" nowrap="nowrap"><?php if($this->data['poweredbyico']) { ?><div id="f-poweredbyico"><?php $this->html('poweredbyico') ?></div><?php } ?></td></tr></table>
	</div><!-- end of the FOOTER div -->
</div><!-- end of the CONTAINER div -->

<?php $this->html('reporttime') ?>

</body>
</html>
<?php
	}
}

?>
