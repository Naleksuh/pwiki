<?php

# Redirect to .com if on .net
if(isset($_SERVER['HTTP_HOST']) && substr_compare($_SERVER['HTTP_HOST'], '.net', -4, 4) === 0) {
	header('HTTP/1.0 301 Moved Permanently');
	header('Location: https://theportalwiki.com'.$_SERVER['REQUEST_URI']);
	die();
}

# ----- DEBUG SETTINGS
#set_time_limit(0);
#error_reporting(E_ALL);
#ini_set('display_errors', 1);
#$wgShowExceptionDetails = true;
# ----- END DEBUG SETTINGS

# Read only mode
#$wgReadOnly = 'Upgrading.';

# This file was automatically generated by the MediaWiki installer.
# If you make manual changes, please keep track in case you need to
# recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# If you customize your file layout, set $IP to the directory that contains
# the other MediaWiki files. It will be used as a base to locate files.
if( defined( 'MW_INSTALL_PATH' ) ) {
	$IP = MW_INSTALL_PATH;
} else {
	$IP = dirname( __FILE__ );
}

$path = array( $IP, "$IP/includes", "$IP/languages" );
set_include_path( implode( PATH_SEPARATOR, $path ) . PATH_SEPARATOR . get_include_path() );

require_once( "$IP/includes/DefaultSettings.php" );

if ( $wgCommandLineMode ) {
	if ( isset( $_SERVER ) && array_key_exists( 'REQUEST_METHOD', $_SERVER ) ) {
		die( "This script must be run from the command line\n" );
	}
}
## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename         = "Portal Wiki";
$wgServer           = 'https://theportalwiki.com';

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath       = "/w";
$wgArticlePath      = "/wiki/$1";
$wgScriptExtension  = ".php";

## The relative URL path to the skins directory
$wgStylePath        = "$wgScriptPath/skins";

## UPO means: this is also a user preference option

$wgEnableEmail      = true;
$wgEnableUserEmail  = true; # UPO

$wgEmergencyContact = "portal2wiki@gmail.com";
$wgPasswordSender = "portal2wiki@gmail.com";

$wgEnotifUserTalk = true; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype           = "mysql";
$wgDBserver         = "pwiki-mariadb";
# Other database settings are defined in mediawiki-secrets.php

# MySQL specific settings
$wgDBprefix         = "p2_";

# MySQL table options to use during installation or update
$wgDBTableOptions   = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Experimental charset support for MySQL 4.1/5.0.
$wgDBmysql5 = true;

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads	= true;
$wgUseImageMagick	= true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "en_US.utf8";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
# $wgHashedUploadDirectory = false;

## If you have the appropriate support software installed
## you can enable inline LaTeX equations:
$wgUseTeX           = false;

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
$wgCacheDirectory        = "/home/pwiki/www-private/cache/wgCacheDirectory";
$wgUseFileCache          = true;
$wgShowIPinHeader        = false;
$wgFileCacheDirectory    = "/home/pwiki/www-private/cache/wgFileCacheDirectory";
#$wgEnableSidebarCache    = true;
$wgParserCacheExpireTime = 25920000;
$wgParserCacheType       = CACHE_DB;
$wgJobRunRate            = 0;
$wgDisableCounters       = true;

$wgMaxArticleSize = 8192;

$wgLocalInterwiki   = strtolower($wgSitename);

$wgLanguageCode = "en";

# $wgSecretKey is defined in mediawiki-secrets.php

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = 'vector';

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgEnableCreativeCommonsRdf = true;
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "https://creativecommons.org/licenses/by/4.0/";
$wgRightsText = "Attribution 4.0 International (CC BY 4.0)";
$wgRightsIcon = "/w/images/cc.png";
# $wgRightsCode = "[license_code]"; # Not yet used

$wgDiff = '/usr/bin/diff';
$wgDiff3 = '/usr/bin/diff3';

# When you make changes to this configuration file, this will make
# sure that cached pages are cleared.
$wgCacheEpoch = max( $wgCacheEpoch, gmdate( 'YmdHis', @filemtime( __FILE__ ) ) );
 
# MANUAL ADDITIONS TO LOCALSETTINGS

  # Load Vector skin. MediaWiki 1.24+ requires manual listing of skins.
  if(function_exists('wfLoadSkin')) {
    # MediaWiki 1.25+
    wfLoadSkin( 'Vector' );
  } else if (file_exists("$IP/skins/Vector/Vector.php")) {
    # MediaWiki 1.24
    require_once("$IP/skins/Vector/Vector.php");
  }

  require_once( '/home/pwiki/www-private/mediawiki-secrets.php' );

  # Set time listed in signatures to UTC:
  $wgLocaltimezone = 'UTC';
  
  # Set interface time offset from wgLocaltimezone
  $wgLocalTZoffset = null;
 
  # Recognise the steam:// protocol for external links
  $wgUrlProtocols[] = 'steam:';
  
  # Enable <nowiki>{{DISPLAYTITLE}}</nowiki> to use any title:
  $wgAllowDisplayTitle = 	true;
  $wgRestrictDisplayTitle =	false;

  # Maximum amount of virtual memory available to shell processes under linux, in KB.
  $wgMaxShellMemory = 131072;

  # Enable subpages in certain namespaces (necessary for translation switching)
  $wgNamespacesWithSubpages[NS_MAIN]     = true;
  $wgNamespacesWithSubpages[NS_CATEGORY] = true;
  $wgNamespacesWithSubpages[NS_PROJECT]  = true;
  $wgNamespacesWithSubpages[NS_HELP]     = true;

  $wgUploadDirectory = "{$IP}/images";

  $wgUploadPath = 'https://i1.theportalwiki.net/img';
  $wgLoadScript = 'https://i2.theportalwiki.net/js.png';
  $wgStylePath = 'https://i2.theportalwiki.net/w/skins';
  $wgLogo = 'https://i2.theportalwiki.net/img/3/3b/Wiki_logo.png';

  # Namespace aliases
  $wgNamespaceAliases['P'] = NS_PROJECT;
  $wgNamespaceAliases['PW'] = NS_PROJECT;
   
  # Group permissions
  $wgGroupPermissions['*']['createpage'] = false;
  $wgGroupPermissions['*']['createtalk'] = false;
  $wgGroupPermissions['*']['edit'] = false;
  $wgGroupPermissions['*']['writeapi'] = false;
  
  $wgGroupPermissions['user']['move'] = true;
  $wgGroupPermissions['user']['move-rootuserpages'] = false;
  $wgGroupPermissions['user']['move-subpages'] = true;
  $wgGroupPermissions['user']['reupload-shared'] = false;
  
  $wgGroupPermissions['autoconfirmed']['skipcaptcha'] = true;
  
  $wgGroupPermissions['Moderators'] = $wgGroupPermissions['user'];
  $wgGroupPermissions['Moderators']['move'] = true;
  $wgGroupPermissions['Moderators']['move-subpages'] = true;
  $wgGroupPermissions['Moderators']['movefile'] = true;
  $wgGroupPermissions['Moderators']['block'] = true;
  $wgGroupPermissions['Moderators']['browsearchive'] = true;
  $wgGroupPermissions['Moderators']['delete'] = true;
  $wgGroupPermissions['Moderators']['deletedhistory'] = true;
  $wgGroupPermissions['Moderators']['editusercss'] = true;
  $wgGroupPermissions['Moderators']['edituserjs'] = true;
  $wgGroupPermissions['Moderators']['editusercssjs'] = true;
  $wgGroupPermissions['Moderators']['patrol'] = true;
  $wgGroupPermissions['Moderators']['protect'] = true;
  $wgGroupPermissions['Moderators']['undelete'] = true;
  $wgGroupPermissions['Moderators']['autopatrol'] = true;
  $wgGroupPermissions['Moderators']['nominornewtalk'] = true;
  $wgGroupPermissions['Moderators']['suppressredirect'] = true;
  $wgGroupPermissions['Moderators']['skipcaptcha'] = true;
  $wgGroupPermissions['Moderators']['editprotected'] = true;
  $wgGroupPermissions['Moderators']['editsemiprotected'] = true;
  
  $wgGroupPermissions['bot'] = $wgGroupPermissions['Moderators'];
  $wgGroupPermissions['bot']['bot'] = true;
  $wgGroupPermissions['bot']['apihighlimits'] = true;
  $wgGroupPermissions['bot']['noratelimit'] = true;
  
  $wgGroupPermissions['sysop'] = $wgGroupPermissions['Moderators'];
  $wgGroupPermissions['sysop']['blockemail'] = true;
  $wgGroupPermissions['sysop']['editinterface'] = true;
  $wgGroupPermissions['sysop']['import'] = true;
  $wgGroupPermissions['sysop']['importupload'] = true;
  $wgGroupPermissions['sysop']['move-rootuserpages'] = true;
  $wgGroupPermissions['sysop']['rollback'] = true;
  $wgGroupPermissions['sysop']['markbotedits'] = true;
  $wgGroupPermissions['sysop']['noratelimit'] = true;
  $wgGroupPermissions['sysop']['unwatchedpages'] = true;
  $wgGroupPermissions['sysop']['ipblock-exempt'] = true;
  
  $wgGroupPermissions['bureaucrat'] = $wgGroupPermissions['sysop'];
  $wgGroupPermissions['bureaucrat']['userrights'] = true;
  $wgGroupPermissions['bureaucrat']['usermerge'] = true;
  
  # Altering autoconfirmed permissions.
  $wgAutoConfirmCount = 10;
  $wgAutoConfirmAge = 4;
  
  # Allow user script files (e.g. User:Name/vector.css)
  $wgAllowUserJs = true;
  $wgAllowUserCss = true;

  # Disable skin selection.
  $wgHiddenPrefs[] = 'skin';

  # Allow these extra file types for uploads
  $wgFileExtensions = array('png', 'jpg', 'jpeg', 'gif', 'ogg', 'wav', 'txt', 'mp3', 'psd', 'ogv', 'avi', 'flac', 'mpg', 'mp4', 'm4a', 'm4r', 'mkv', 'ttf', 'otf', 'eot', '7z', 'dem', 'cfg', 'diff' );

  # MIME type checking
  $wgVerifyMimeType = false;

  # Vector skin features.
  # TODO: Add https://www.mediawiki.org/wiki/Extension:CollapsibleVector to make these work.
  $wgVectorUseSimpleSearch = true;
  $wgVectorFeatures['collapsibletabs']['user'] = true;
  $wgVectorFeatures['collapsiblenav']['global'] = false;
  $wgVectorFeatures['collapsiblenav']['user'] = true;


  # Extra footer links
  #$wgHooks['SkinTemplateOutputPageBeforeExec'][] = '_footer_onionlink';
  #function _footer_onionlink( $sk, &$tpl ) {
  #    // FIXME: This should not be hardcoded, see https://www.mediawiki.org/wiki/Manual:Footer
  #    // However, that thing doesn't work for external links, so hardcoded it is.
  #    $tpl->set( 'onionlink', '<strong>Tor</strong>: <a href="http://3sls53hbzad3ortd.onion/" rel="nofollow">3sls53hbzad3ortd.onion</a>' );
  #    $tpl->data['footerlinks']['places'][] = 'onionlink';
  #    return true;
  #}


# EXTENSIONS
  if (function_exists('wfLoadExtension')) { wfLoadExtension('ParserFunctions'); } else { require_once( "$IP/extensions/ParserFunctions/ParserFunctions.php" ); }

  #if (function_exists('wfLoadExtension')) { wfLoadExtension('CategoryTree'); } else { require_once( "$IP/extensions/CategoryTree/CategoryTree.php" ); }
  
  if (function_exists('wfLoadExtension')) { wfLoadExtension('UserMerge'); } else { require_once( "$IP/extensions/UserMerge/UserMerge.php" ); }

  if (function_exists('wfLoadExtension')) { wfLoadExtension('WikiEditor'); } else { require_once( "$IP/extensions/WikiEditor/WikiEditor.php" ); }
  $wgDefaultUserOptions['usebetatoolbar'] = 1;
  $wgDefaultUserOptions['usebetatoolbar-cgd'] = 1;
  $wgDefaultUserOptions['wikieditor-preview'] = 1;
  $wgDefaultUserOptions['wikieditor-publish'] = 1;

  if (function_exists('wfLoadExtension')) { wfLoadExtension('CodeEditor'); } else { require_once( "$IP/extensions/CodeEditor/CodeEditor.php" ); }
  if (function_exists('wfLoadExtension')) { wfLoadExtension('Cite'); } else { require_once( "$IP/extensions/Cite/Cite.php" ); }

  if (function_exists('wfLoadExtension')) { wfLoadExtension('RedditThumbnail'); } else { require_once( "$IP/extensions/RedditThumbnail/RedditThumbnail.php" ); }
  $wgRedditThumbnailImage = 'https://i1.theportalwiki.net/img/c/c0/Wiki_logo_highres.png';
  
  if (function_exists('wfLoadExtension')) { wfLoadExtension('ConfirmEdit'); } else { require_once( "$IP/extensions/ConfirmEdit/ConfirmEdit.php" ); }
  require_once("$IP/extensions/ConfirmEdit/QuestyCaptcha.php");
  $wgCaptchaClass = 'QuestyCaptcha';
  # $wgReCaptchaPublicKey and $wgReCaptchaPrivateKey are defined in mediawiki-secrets.php
  $randomHash = substr(sha1(strval(rand())), rand(1, 4), rand(12, 16));
  $randomHashSplitIndex = rand(2, strlen($randomHash) - 2);
  $randomHashPart1 = substr($randomHash, 0, $randomHashSplitIndex);
  $randomJunk = substr(sha1(strval(rand())), rand(1, 4), rand(12, 16));
  $randomHashPart2 = substr($randomHash, $randomHashSplitIndex);
  # $wgGroupPermissions['*']['createaccount'] = false; # Uncomment to disable account creation.
  $wgCaptchaQuestions[] = array( 'question' => '(Anti-spam) Please enter the following characters into the textfield (do not copy/paste, it will not paste the right thing): <span></span><span style="font: monospace;">'.$randomHashPart1.'<span style="display: inline-block; width: 1px; opacity: 0.01;">'.$randomJunk.'</span>'.$randomHashPart2.'</span>', 'answer' => $randomHash );

  if (function_exists('wfLoadExtension')) { wfLoadExtension('EmbedVideo'); } else { require_once( "$IP/extensions/EmbedVideo/EmbedVideo.php" ); }

  if (function_exists('wfLoadExtension')) { wfLoadExtension('LangUtils'); } else { require_once( "$IP/extensions/LangUtils/LangUtils.php" ); }
  $wgAllowedLanguages = array( 
      'ar', 
      'cs', 
      'da', 
      'de', 
      'es', 
      'fi', 
      'fr', 
      'hu', 
      'it', 
      'ja', 
      'ko', 
      'nl', 
      'no', 
      'pl', 
      'pt', 
      'pt-br', 
      'ro', 
      'ru', 
      'sv', 
      # 'tr', No Turkish on Portal Wiki
      'zh-hans', 
      'zh-hant'
  );

  if (function_exists('wfLoadExtension')) { wfLoadExtension('Substring_and_strlen'); } else { require_once( "$IP/extensions/Substring_and_strlen/Substring_and_strlen.php" ); }

  if (function_exists('wfLoadExtension')) { wfLoadExtension('MediawikiPlayer'); } else { require_once( "$IP/extensions/MediawikiPlayer/MediawikiPlayer.php" ); }

  if (function_exists('wfLoadExtension')) { wfLoadExtension('GeeQuBox'); } else { require_once( "$IP/extensions/GeeQuBox/GeeQuBox.php" ); }

  if (function_exists('wfLoadExtension')) { wfLoadExtension('TitleBlacklist'); } else { require_once( "$IP/extensions/TitleBlacklist/TitleBlacklist.php" ); }
  $wgTitleBlacklistSources = array(
          array(
                  'type' => TBLSRC_LOCALPAGE,
                  'src' => 'MediaWiki:Titleblacklist'
          )
  );

  if (function_exists('wfLoadExtension')) { wfLoadExtension('CharInsert'); } else { require_once( "$IP/extensions/CharInsert/CharInsert.php" ); }

  if (function_exists('wfLoadExtension')) { wfLoadExtension('Interwiki'); } else { require_once( "$IP/extensions/Interwiki/Interwiki.php" ); }
  $wgGroupPermissions['*']['interwiki'] = false;
  $wgGroupPermissions['sysop']['interwiki'] = true;

  # No patch exists for current MediaWiki; update please?
  # https://github.com/ThePortalWiki/RevQuery
  # if (function_exists('wfLoadExtension')) { wfLoadExtension('RevQuery'); } else { require_once( "$IP/extensions/RevQuery/RevQuery.php" ); }

  if (function_exists('wfLoadExtension')) { wfLoadExtension('SpamBlacklist'); } else { require_once( "$IP/extensions/SpamBlacklist/SpamBlacklist.php" ); }
  $wgSpamBlacklistFiles = array(
    "$IP/extensions/SpamBlacklist/wikimedia_blacklist"
  );
