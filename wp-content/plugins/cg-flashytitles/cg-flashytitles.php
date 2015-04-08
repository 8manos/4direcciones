<?php

/*
Plugin Name: CG-FlashyTitles 1
Plugin URI: http://www.chait.net/index.php?p=310
Description: A quick drop-in implementation of <a href="http://www.mikeindustries.com/sifr/">sIFR 2.0 Flash-based</a> nice graphical titles.  Please <a href="http://www.chait.net/index.php?p=48" title="Support CHAITGEAR">find a way to support CHAITGEAR!</a>
Author: David Chait
Author URI: http://www.chait.net
Version: 1.4.3
*/ 

if (!function_exists('isNewerWP'))
{
	function isNewerWP()
	{
		global $testedNewerWP, $menu;
		if (isset($testedNewerWP))
			return($testedNewerWP);
		//echo 'testing wp version';
		//print_r($menu[0]);
		$testedNewerWP = !is_numeric($menu[0][1]);
		//echo 'wp version is newer: '.($testedNewerWP?'true':'false');
		return $testedNewerWP;
	}
	
	function safeAddMenu($parent, $page_title, $menu_title, $access_level, $file, $function = '') {
		if (isNewerWP()) {
			if (is_numeric($access_level))
				$access_level = 'level_'.$access_level; // this is the quick hack THEY proscribe...
		}
		if ( $parent!='top' && function_exists('add_submenu_page') )
		{
			if (empty($parent)) $parent = 'plugins.php';
			if ($parent=='options') $parent = 'options-general.php';
			add_submenu_page($parent, $page_title, $menu_title, $access_level, $file, $function);
		}
		else { // old way, top-level...
			add_menu_page($page_title, $menu_title, $access_level, $file, $function);
		}
	}
}

if (!function_exists('reqURI'))
{
	function reqURI()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
		   $path = $_SERVER['REQUEST_URI'];
		} else if (!empty($_SERVER['SCRIPT_NAME'])) {
		   $path = $_SERVER['SCRIPT_NAME'];
		}
		if (isset($_SERVER['PATH_INFO'])) {
		   $pathinfo = $_SERVER['PATH_INFO'];
		} else {
		   $pathinfo = '';
		}
		return $path.$pathinfo;
	}
}

// temp Fix for YOUR IIS, which doesn't set REQUEST_URI properly...
if (!isset($_SERVER['REQUEST_URI']) || empty($_SERVER['REQUEST_URI'])) {
	$_SERVER['REQUEST_URI'] = reqURI();
	if (isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']))
		$_SERVER['REQUEST_URI'] .= '?' . $_SERVER['QUERY_STRING'];
}

// -------------------------------------------


$REQUESTED = $_SERVER['REQUEST_URI'];
if ($truncoff = strpos($REQUESTED, '&'))
	$REQUESTED = substr($REQUESTED, 0, $truncoff);
	
if (!isset($sifrAdmin)) $sifrAdmin = 0;
if (!isset($sifrLoaded)) $sifrLoaded = 0;
$sifrLoaded++;
if ($sifrLoaded>1) return;

$sifrBasedir = dirname(__FILE__).'/';
global $siteurl;
if (empty($siteurl)) $siteurl = get_settings('siteurl');
$sifrurl = $siteurl.'/'.'wp-content/plugins/sifr/';
$sifrpath = $sifrBasedir.'sifr/';

// DEBUG// DEBUG// DEBUG// DEBUG// DEBUG// DEBUG
//echo "LOADED:$sifrLoaded<br/>";
// DEBUG// DEBUG// DEBUG// DEBUG// DEBUG// DEBUG

if ( strstr($_SERVER['REQUEST_URI'], 'wp-admin') )
{
//	echo "<br><b>REQUESTED: $REQUESTED</b><br>";
//	echo 'REQUEST_URI'.$_SERVER['REQUEST_URI'].'<br>';
//	echo 'SCRIPT_NAME'.$_SERVER['SCRIPT_NAME'].'<br>';
//	echo 'SCRIPT_URL'.getenv('SCRIPT_URL').'<br>';
//	die();
	$sifrAdmin++;		
	function cgsifr_add_menu()
	{
//	echo "<br><b>REQUESTED: $REQUESTED</b><br>";
//	echo 'REQUEST_URI'.$_SERVER['REQUEST_URI'].'<br>';
//	echo 'SCRIPT_NAME'.$_SERVER['SCRIPT_NAME'].'<br>';
//	echo 'SCRIPT_URL'.getenv('SCRIPT_URL').'<br>';
		//echo serialize($_SERVER);		
		safeAddMenu('top', 'CG-FlashyTitles', 'FlashyTitles', 5, __FILE__, 'cgsifr_admin_panel');
	}
	add_action('admin_menu', 'cgsifr_add_menu');

	if ( strstr($REQUESTED, 'plugins.php')  // under admin interface?
	||	 is_plugin_page()  ) return;
}



class sifrObject
{
	var $selector;
	var $font;
	var $ctext;
	var $clink;
	var $chover;
	var $cback;
	var $padtop;
	var $padright;
	var $padbottom;
	var $padleft;
	var $flash;
	var $case;
	var $wmode;
	var $css_letterspacing;
	var $css_fontsize;
	var $css_inline;
	var $enabled;
	
	function sifrObject()
	{
		$defaultFlash = '';
		
		$this->selector = '';
		$this->font = '';
		$this->ctext = '000000';
		$this->clink = '000066';
		$this->chover = '0044AA';
		$this->cback = 'FFFFFF';
		$this->padtop = 0;
		$this->padright = 0;
		$this->padbottom = 0;
		$this->padleft = 0;
		$this->flash = $defaultFlash;	//'underline=true&textalign=center&offsetLeft=5&offsetTop=5'
		$this->case = ''; 				// 'upper','lower'
		$this->wmode = '';				// 'opaque','transparent'
		$this->css_letterspacing = 0;
		$this->css_fontsize = 0;
		$this->css_inline = null;
		$this->enabled = true;
	}
}


//=============================================================
$sifrRep = null;
$sifrDataFile = $sifrBasedir.'../cg-flashytitles.dat';
//die($sifrDataFile);
if (file_exists($sifrDataFile))
{
//			$data = file_get_contents($sifrDataFile);
	$fp = @fopen($sifrDataFile, 'r');
	if ($fp)
	{
		$data = fread($fp, filesize($sifrDataFile));
		fclose($fp);
	}
	$sifrRep = unserialize($data);
}

$sifrSampleFile = ABSPATH.'wp-content/cg-flashytitles-sample.txt';
if (file_exists($sifrSampleFile))
{
//			$data = file_get_contents($sifrDataFile);
	$fp = @fopen($sifrSampleFile, 'r');
	if ($fp)
	{
		$sifrSampleText = fread($fp, filesize($sifrSampleFile));
		fclose($fp);
	}
}
if (empty($sifrSampleText))
	$sifrSampleText = "Quick brown!";

//=============================================================
$sifrFontArray = null;
function get_sifr_font_list()
{
	global $sifrpath;
	global $sifrFontArray;

	if (empty($sifrFontArray))
	{
		$swffonts = null;
		// Files in wp-content/plugins directory
		//echo "looking for fonts in $sifrpath";
		$fonts_path = $sifrpath; //.'fonts/';
		if (is_dir($fonts_path))
		{
			$sifr_dir = opendir($fonts_path);
			if (!$sifr_dir) return(null);
			
			while(($file = readdir($sifr_dir)) !== false)
			{
				if ( preg_match('|^\.+$|', $file) ) continue;
				if ( is_dir($fonts_path . $file) ) continue; // skip subdirectories for now.
				if ( preg_match('|\.swf$|', $file) ) 
					$swffonts[] = $file;
			}
			
			closedir($sifr_dir);
		}
		
		$sifrFontArray = $swffonts;
	}
		
	return($sifrFontArray);
}

//=============================================================
function sifr_font_dropdown($fieldname, $font)
{
	$fonts = get_sifr_font_list();

	for ($k=0; $k<count($fonts); $k++)
		if ($fonts[$k] == $font)
			break;
	if ($k>=count($fonts)) $k = 0;
	
	echo "<select name='$fieldname' size='1'>\n";		
			
	$i = 0;
	if (!empty($fonts))
	foreach ($fonts as $swf)
	{
		if (empty($swf)) continue;
		echo "<option value='$swf'";
		if ($i == $k) echo " selected";
		echo ">$swf</option>\n";
		$i++;
	}
	echo "</select>\n";
}

//=============================================================
function sifr_font_samples()
{
	global $sifrSampleText;
	
	$fonts = get_sifr_font_list();

	echo '<div id="zeitgeist">';
	echo '<table>';
	if (!empty($fonts))
	foreach ($fonts as $swf)
	{
		if (empty($swf)) continue;
		echo '<tr><td width="200">'.$swf.'</td></tr>'."\n";
		echo '<tr class="fex"><td width="200" class="sample_'.str_replace('.','_',$swf).'">'.$sifrSampleText.'</td></tr>'."\n";
	}
	echo "</table>\n";
	echo "</div>\n";
}

//=============================================================
/* Dynamically create the "decoy" styles used to hide the browser text before it is replaced... */
function inlined_sifr_header()
{
	global $sifrurl, $sifrpath;
	global $sifrRep, $sifrDataFile;
	global $sifrAdmin;
	//echo "<!--\n";
	if ($sifrAdmin)
	{
	?>
		<link rel="stylesheet" href="<?php echo $sifrurl.'sIFR-screen.css';?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo $sifrurl.'sIFR-print.css';?>" type="text/css" media="print" />
		<style type="text/css" media="screen">
			th { background: #aabbdd; }
			th.inbtn, td.inbtn { background: white; }
			.fex td,.rodd td,.reven td { height: 50px; vertical-align: middle; border-bottom: 1px solid #aabbdd;}
			td input {font: normal 100% "Courier New", courier, monospace; }
			.rhead { color: blue; text-align: right; padding-right: 8px; }
			.lhead { color: blue; text-align: left; padding-left: 4px; }
			.clearboth { clear: both; }
	<?php
		$fonts = get_sifr_font_list();
		if (!empty($fonts))
		foreach ($fonts as $swf)
		{
			echo ".sIFR-hasFlash ";
			echo ".sample_".str_replace('.','_',$swf);
			echo " { ";
				echo "visibility: hidden; ";
				echo "font-size: 18px; ";
			echo "}\n";
		}
	?>
		</style>
		<script src="<?php echo $sifrurl.'sifr.js';?>" type="text/javascript"></script>
	<?php
	}
	else
	{	
		if (!empty($sifrRep))
		{
	?>
		<link rel="stylesheet" href="<?php echo $sifrurl.'sIFR-screen.css';?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo $sifrurl.'sIFR-print.css';?>" type="text/css" media="print" />
		<style type="text/css" media="screen">
	<?php
			foreach ($sifrRep as $sir)
			if ($sir->enabled)
			{
				echo ".sIFR-hasFlash ";
				echo $sir->selector;
				echo " { ";
					echo "visibility: hidden; ";
					if (!empty($sir->css_letterspacing))
						echo "letter-spacing: ".$sir->css_letterspacing."px; ";
					if (!empty($sir->css_fontsize))
						echo "font-size: ".$sir->css_fontsize."px; ";
					if ($sir->css_inline)
						echo "display: inline;";
				echo "}\n";
			}
	?>
		</style>
		<script src="<?php echo $sifrurl.'sifr.js';?>" type="text/javascript"></script>
	<?php
		}
	}
	//echo "-->\n";
}


//=============================================================
function inlined_sifr_footer()
{
	global $sifrurl, $sifrpath;
	global $sifrRep, $sifrDataFile;
	global $sifrAdmin;
	if ($sifrAdmin)
	{
		
		$fonts = get_sifr_font_list();
		if (!empty($fonts))
		{
		?>
			<script type="text/javascript">
			//<![CDATA[
			/* Replacement calls. Please see documentation for more information. */
			
			if(typeof sIFR == "function"){
		<?php
			foreach ($fonts as $swf)
			{
				echo "sIFR.replaceElement(";
					echo '".sample_'.str_replace('.','_',$swf).'", ';
					echo '"'.$sifrurl.$swf.'", ';
					echo '"#000000", "#000000", "#000000", "#FFFFFF", ';
					echo '0, 0, 0, 0, ';
					echo 'null, null, null';
				echo ");\n";
			}
		?>	
			};
			
			//]]>
			</script>
		<?php
		}			
	}
	else
	{	
		if (!empty($sifrRep))
		{
		?>
			<script type="text/javascript">
			//<![CDATA[
			/* Replacement calls. Please see documentation for more information. */
			
			if(typeof sIFR == "function"){
		<?php
			foreach ($sifrRep as $sir)
			if ($sir->enabled)
			{
				echo "sIFR.replaceElement(";
					echo '"'.$sir->selector.'", ';
					echo '"'.$sifrurl.$sir->font.'", ';
					echo '"#'.$sir->ctext.'", ';
					echo '"#'.$sir->clink.'", ';
					echo '"#'.$sir->chover.'", ';
					echo '"#'.$sir->cback.'", ';
					echo intval($sir->padtop).', ';
					echo intval($sir->padright).', ';
					echo intval($sir->padbottom).', ';
					echo intval($sir->padleft).', ';
					echo '"'.$sir->flash.'", ';
					echo '"'.$sir->case.'", ';
					echo '"'.$sir->wmode.'"';
				echo ");\n";
			}
		?>	
			};
			
			//]]>
			</script>
		<?php
		}			
	}
}

//=============================================================
function cgsifr_admin_panel()
{
	global $sifrRep, $sifrDataFile;
	global $sifrSampleText;
//	if (!isset($user_level) && function_exists('get_currentuserinfo'))
//		get_currentuserinfo(); // cache away in case hasn't been yet...
//	if ($user_level<4) die("You need a higher access level.");

	$si_result = null;
	$findvars = array('si_action', 'si_result', 'si_item',
						'si_selector', 'si_font',
						'si_ctext',"si_clink","si_chover","si_cback",
						"si_padtop","si_padright","si_padbottom","si_padleft",
						"si_flash","si_case","si_wmode",
						"si_cssspace","si_csssize","si_cssinline",
						"si_enabled",
						'si_continue', 'si_cancel');
	
	for ($i=0; $i<count($findvars); $i += 1)
	{
		$avar = $findvars[$i];
		if (isset($$avar)) continue;
		if (!empty($_POST[$avar]))
			$$avar = $_POST[$avar];
		elseif (!empty($_GET[$avar]))
			$$avar = $_GET[$avar];
		else
			$$avar = '';
	}

	if ($si_cancel) $si_action = 'cancel';
	if ($si_action=='cancel')
	{
		$si_action='';
		$si_result = "Cancelled.";
	}
	
	$si_item = intval($si_item);
	
	$si_padtop = intval($si_padtop);
	$si_padright = intval($si_padright);
	$si_padbottom = intval($si_padbottom);
	$si_padleft = intval($si_padleft);
	$si_cssspace = intval($si_cssspace);
	$si_csssize = intval($si_csssize);
	$si_cssinline = ($si_cssinline?true:false);
	$si_enabled = ($si_enabled?true:false);
	
	if ($si_action=='doedit' || $si_action=='dodelete')
	{
		if ($si_action=='doedit')
		{
			$newRep = new sifrObject;
			$newRep->selector = $si_selector;
			$newRep->font = $si_font;
			$newRep->ctext = $si_ctext;
			$newRep->clink = $si_clink;
			$newRep->chover = $si_chover;
			$newRep->cback = $si_cback;
			$newRep->padtop = intval($si_padtop);
			$newRep->padright = intval($si_padright);
			$newRep->padbottom = intval($si_padbottom);
			$newRep->padleft = intval($si_padleft);
			$newRep->flash = $si_flash;
			$newRep->case = $si_case;
			$newRep->wmode = $si_wmode;
			$newRep->css_letterspacing = $si_cssspace;
			$newRep->css_fontsize = $si_csssize;
			$newRep->css_inline = $si_cssinline;
			$newRep->enabled = $si_enabled;
			if ($si_item==-1) //new, add to array.
				$si_item = count($sifrRep); // end of array.
			$sifrRep[$si_item] = $newRep;
			$si_result = "FlashyTitle <b>[$newRep->selector]</b> saved.";
		}
		else // dodelete
		{
			$newReps = null;
			if (!empty($sifrRep))
			foreach($sifrRep as $index=>$sir)
			{
				if ($index!=$si_item)
					$newReps[] = $sir; // to get the array nice in order.
				else
					$si_result = "FlashyTitle <b>[$sir->selector]</b> deleted.";
			}
			$sifrRep = $newReps; // overwrite old array...
		}
		
		$fp = @fopen($sifrDataFile, 'w');
		if ($fp)
		{
			$data = serialize($sifrRep);
			$size = fwrite($fp, $data, strlen($data));
			if (!$size)
				$si_result = "Unable to write to file ($sifrDataFile).";
			fclose($fp);
		}
		else
			$si_result = "Unable to open file ($sifrDataFile).";

		if ($si_continue && $si_action=='doedit')
			$si_action = 'edit';
		else
			unset($si_action);
	}
	else
	if ($si_item<0 || $si_item>count($sifrRep))
	{
		$si_item = 0;
		$si_action=''; // kill the action...
	}
		
	if ($si_action)
		$actName = ucfirst($si_action);
?>
<div class="wrap">
	<h2><?php if ($actName) echo "<strong>[$actName]</strong>";?> CG-FlashyTitles</h2>
<?php
//=========================== EDIT ITEM ===============================
	if ($si_action=='add' || $si_action=='edit')
	{
		$sir = null;
		if ($si_action=='edit')
			$sir = &$sifrRep[$si_item];
		else
			$si_item = -1;
		if (!$sir)
			$sir = new sifrObject; // gets all out defaults...
		sifr_font_samples();
?>
	<form name="edititem" action="<?php echo $REQUESTED; ?>" method="post">
		<input type="hidden" name="si_action" value="doedit" />
		<input type="hidden" name="si_item" value="<?php echo $si_item;?>" />
		<table>
			<tr><th width="100">Option</th><th width="200">Setting</th></tr>
			
			<tr><td class="rhead">Enabled</td><td><input type="text" name="si_enabled" size="2" value="<?php echo $sir->enabled?'1':'0';?>"/></td></tr>
			<tr><td class="rhead">CSS Selector</td><td><input type="text" name="si_selector" size="40" value="<?php echo $sir->selector;?>"/></td></tr>
			<tr><td class="rhead">sIFR Font</td><td><?php sifr_font_dropdown("si_font", $sir->font); ?></td></tr>
			
			<tr><td colspan="2"><br/><em>Colors (specify as 6-digit HEX, like <code>F0BB88</code>)</em></td></tr>
			<tr><td class="rhead">Text</td><td><input type="text" name="si_ctext" size="10" value="<?php echo $sir->ctext;?>" /></td></tr>
			<tr><td class="rhead">Link</td><td><input type="text" name="si_clink" size="10" value="<?php echo $sir->clink;?>" /></td></tr>
			<tr><td class="rhead">Hover</td><td><input type="text" name="si_chover" size="10" value="<?php echo $sir->chover;?>" /></td></tr>
			<tr><td class="rhead">Background</td><td><input type="text" name="si_cback" size="10" value="<?php echo $sir->cback;?>" /></td></tr>
			
			<tr><td colspan="2"><br/><em>Padding (used to help 'fit' in place of original title)</em></td></tr>
			<tr><td class="rhead">Top</td>
			<td><input type="text" name="si_padtop" size="5" value="<?php echo intval($sir->padtop);?>" />&nbsp;
				<input type="text" name="si_padbottom" size="5" value="<?php echo intval($sir->padbottom);?>" />
				<span class="lhead">Bottom</span>
			</td></tr>
			<tr><td class="rhead">Left</td>
			<td><input type="text" name="si_padleft" size="5" value="<?php echo intval($sir->padleft);?>" />&nbsp;
				<input type="text" name="si_padright" size="5" value="<?php echo intval($sir->padright);?>" />
				<span class="lhead">Right</span>
			</td></tr>

			<tr><td colspan="2"><br/><em>Tweaks (other adjustments to sIFR output)</em></td></tr>
			<tr><td class="rhead">Flash Args<br/>&nbsp;</td><td><input type="text" name="si_flash" size="40" value="<?php echo $sir->flash;?>" />
			<br/><small>Like: <em>underline=true&textalign=center&offsetLeft=5&offsetTop=5</em></small></td></tr>
			<tr><td class="rhead">Case Shift<br/>&nbsp;</td><td><input type="text" name="si_case" value="<?php echo $sir->case;?>" />
			<br/><small>blank | <em>upper | lower</em></small></td></tr>
			<tr><td class="rhead">Background<br/>&nbsp;</td><td><input type="text" name="si_wmode" value="<?php echo $sir->wmode;?>" />
			<br/><small>blank | <em>opaque | transparent</em></small></td></tr>
			
			<tr><td colspan="2"><br/><em>CSS Overrides (in pixels; to additionally help match sizings)</em></td></tr>
			<tr><td class="rhead">letter-spacing</td><td><input type="text" name="si_cssspace" size="5" value="<?php echo intval($sir->css_letterspacing);?>" /></td></tr>
			<tr><td class="rhead">font-size</td><td><input type="text" name="si_csssize" size="5" value="<?php echo intval($sir->css_fontsize);?>" /></td></tr>
			<tr><td class="rhead">display inline</td><td><input type="text" name="si_cssinline" size="2" value="<?php echo ($sir->css_inline ? 1 : ''); ?>" /></td></tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
		<td><input type="submit" name="submit" value="Save Changes" class="search" /></td>
		<td>
			<input type="submit" name="si_continue" value="Apply & Continue" class="search" />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="submit" name="si_cancel" value="Cancel <?php echo $actName;?>" class="search" />
		</td>
		</tr>
		</table>
	</form>
</div>
<?php
	}
	else
// ========================= DELETE ITEM ===============================
	if ($si_action=='delete')
	{
		$sir = &$sifrRep[$si_item];
		//if (!$sir) // this should NEVER happen...
		echo '<table><tr><th width="250">CSS</th><th width="150">Font</th><th width="300">Sample</th></tr>';
			echo '<tr class="rodd">';
				echo '<td align="center">'.$sir->selector.'</td><td align="center">'.$sir->font.'</td>';
				echo '<td class="sample_'.str_replace('.','_',$sir->font).'">'.$sifrSampleText.'</td>';
			echo '</tr>';
		echo "</table>";
?>
		<h3>Are you sure you want to delete [<?php echo $sir->selector;?>]?</h3>
		<table><tr>
			<td width="50"><form name="dodelete" action="<?php echo $REQUESTED; ?>" method="post">
				<input type="hidden" name="si_action" value="dodelete" />
				<input type="hidden" name="si_item" value="<? echo intval($si_item);?>" />
				<input type="submit" name="submit" value="&nbsp;Yes&nbsp;" class="search" />
			</form>
			</td>
			<td width="50"><form name="canceledit" action="<?php echo $REQUESTED; ?>" method="post">
				<input type="hidden" name="si_action" value="cancel" />
				<input type="submit" name="submit" value="&nbsp;NO!&nbsp;" class="search" />
			</form>
			</td>
		</tr></table>
	</div>
<?php
	}
	else // just view
// ======================= HOME PANEL ===================================
	{
// !!!TBD need to add enable/disable to the class, saving, etc.
		if (empty($sifrRep))
			echo "<p>No FlashyTitles defined.</p>";
		else
		{
?>
			<table>
				<tr> <th>&nbsp;</th> <th>&nbsp;</th> <th width="250">CSS Selector</th> <th width="150">Font</th> <th width="300">Sample</th> </tr>
<?php		foreach($sifrRep as $index=>$sir)	{		?>	
				<tr class="<?php echo $index%2 ? "rodd" : "reven";?>">
					<td class="inbtn">
						<form name="si_del" action="<?php echo $REQUESTED; ?>" method="post" class="si_inputinline">
							<input type="hidden" name="si_action" value="delete" />
							<input type="hidden" name="si_item" value="<?php echo intval($index); ?>" />
							<input type="submit" name="submit" value="X" class="si_button" title="Delete This" />
						</form>
					</td>
					<td class="inbtn">
						<form name="si_ed" action="<?php echo $REQUESTED; ?>" method="post" class="si_inputinline">
							<input type="hidden" name="si_action" value="edit" />
							<input type="hidden" name="si_item" value="<?php echo intval($index); ?>" />
							<input type="submit" name="submit" value="EDIT" class="si_button" title="Edit This" />
						</form>
					</td>
					<td align="center"><?php echo $sir->selector;?></td>
					<td align="center"><?php echo $sir->font;?></td>
					<td class="sample_<?php echo str_replace('.','_',$sir->font);?>"><?php echo $sifrSampleText;?></td>
				</tr>
<?php		}			?>
			</table>
<?php	}				?>
			<br/>
			<form name="addsifr" action="<?php echo $REQUESTED; ?>" method="post">
				<input type="hidden" name="si_action" value="add" />
				<input type="submit" name="submit" value="Add New sIFR FlashyTitle" class="search" />
			</form>
		</div>
<?php
	}
	if ($si_result)
		echo '<div class="wrap"><em>'.$si_result.'</em></div>';
	echo '<div class=".clearboth">';
}


//=============================================================
if ( !strstr($REQUESTED, 'wp-admin') ) // not in admin pages...
{
	if (function_exists('inlined_sifr_header') && function_exists('inlined_sifr_footer'))
	{
		add_action('wp_head', 'inlined_sifr_header');
		add_action('wp_footer', 'inlined_sifr_footer');
	}
}
else
if ( strstr($REQUESTED, 'cg-flashytitles.php') ) // in our admin page...
{
	if (function_exists('inlined_sifr_header') && function_exists('inlined_sifr_footer'))
	{
		add_action('admin_head', 'inlined_sifr_header');
		add_action('admin_footer', 'inlined_sifr_footer');
	}
}
?>