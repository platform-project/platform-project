<?php
/** Bikol Central (Bikol Central)
 *
 * See MessagesQqq.php for message documentation incl. usage of parameters
 * To improve a translation please visit http://translatewiki.net
 *
 * @ingroup Language
 * @file
 *
 * @author Filipinayzd
 * @author Steven*fung
 * @author Urhixidur
 */

$namespaceNames = array(
	NS_MEDIA            => 'Medio',
	NS_SPECIAL          => 'Espesyal',
	NS_TALK             => 'Olay',
	NS_USER             => 'Paragamit',
	NS_USER_TALK        => 'Olay_kan_paragamit',
	NS_PROJECT_TALK     => 'Olay_sa_$1',
	NS_FILE             => 'Ladawan',
	NS_FILE_TALK        => 'Olay_sa_ladawan',
	NS_MEDIAWIKI        => 'MediaWiki',
	NS_MEDIAWIKI_TALK   => 'Olay_sa_MediaWiki',
	NS_TEMPLATE         => 'Plantilya',
	NS_TEMPLATE_TALK    => 'Olay_sa_plantilya',
	NS_HELP             => 'Tabang',
	NS_HELP_TALK        => 'Olay_sa_tabang',
	NS_CATEGORY         => 'Kategorya',
	NS_CATEGORY_TALK    => 'Olay_sa_kategorya',
);

$magicWords = array(
	'currentmonth'          => array( '1', 'BULANNGONYAN', 'CURRENTMONTH', 'CURRENTMONTH2' ),
	'currentmonthname'      => array( '1', 'NGARANBULANNGONYAN', 'CURRENTMONTHNAME' ),
	'currentday'            => array( '1', 'ALDAWNGONYAN', 'CURRENTDAY' ),
	'currentyear'           => array( '1', 'TAONNGONYAN', 'CURRENTYEAR' ),
	'currenttime'           => array( '1', 'PANAHONNGONYAN', 'CURRENTTIME' ),
	'currenthour'           => array( '1', 'ORASNGONYAN', 'CURRENTHOUR' ),
	'localmonth'            => array( '1', 'LOKALBULAN', 'LOCALMONTH', 'LOCALMONTH2' ),
	'localmonthname'        => array( '1', 'NGARANLOKALBULAN', 'LOCALMONTHNAME' ),
	'localday'              => array( '1', 'LOKALALDAW', 'LOCALDAY' ),
	'localday2'             => array( '1', 'LOKALALDAW2', 'LOCALDAY2' ),
	'localdayname'          => array( '1', 'NGARANLOKALALDAW', 'LOCALDAYNAME' ),
	'localyear'             => array( '1', 'LOKALTAON', 'LOCALYEAR' ),
	'localtime'             => array( '1', 'LOKALPANAHON', 'LOCALTIME' ),
	'localhour'             => array( '1', 'LOKALORAS', 'LOCALHOUR' ),
	'numberofpages'         => array( '1', 'NUMEROKANPAHINA', 'NUMBEROFPAGES' ),
	'numberofarticles'      => array( '1', 'NUMEROKANARTIKULO', 'NUMBEROFARTICLES' ),
	'numberoffiles'         => array( '1', 'NUMEROKANDOKUMENTO', 'NUMBEROFFILES' ),
	'numberofusers'         => array( '1', 'NUMEROKANPARAGAMIT', 'NUMBEROFUSERS' ),
	'numberofedits'         => array( '1', 'NUMEROKANLIGWAT', 'NUMBEROFEDITS' ),
	'pagename'              => array( '1', 'NGARANKANPAHINA', 'PAGENAME' ),
	'pagenamee'             => array( '1', 'KAGNGARANKANPAHINA', 'PAGENAMEE' ),
	'namespace'             => array( '1', 'NGARANESPASYO', 'NAMESPACE' ),
	'namespacee'            => array( '1', 'KAGNGARANESPASYO', 'NAMESPACEE' ),
	'talkspace'             => array( '1', 'OLAYESPASYO', 'TALKSPACE' ),
	'talkspacee'            => array( '1', 'KAGOLAYESPASYO', 'TALKSPACEE' ),
	'fullpagename'          => array( '1', 'TODONGNGARANKANPAHINA', 'FULLPAGENAME' ),
	'fullpagenamee'         => array( '1', 'KAGNGARANKANTODONGNGARANKANPAHINA', 'FULLPAGENAMEE' ),
	'talkpagename'          => array( '1', 'NGARANKANPAHINANINOLAY', 'TALKPAGENAME' ),
	'talkpagenamee'         => array( '1', 'KAGNGARANKANPAHINANINOLAY', 'TALKPAGENAMEE' ),
	'msg'                   => array( '0', 'MSH', 'MSG:' ),
	'img_right'             => array( '1', 'too', 'right' ),
	'img_left'              => array( '1', 'wala', 'left' ),
	'img_none'              => array( '1', 'may??', 'none' ),
	'img_center'            => array( '1', 'sentro', 'tang??', 'center', 'centre' ),
	'img_framed'            => array( '1', 'nakakawadro', 'kwadro', 'framed', 'enframed', 'frame' ),
	'img_frameless'         => array( '1', 'daing kwadro', 'frameless' ),
	'img_page'              => array( '1', 'pahina=$1', 'pahina $1', 'page=$1', 'page $1' ),
	'localurl'              => array( '0', 'LOKALURL', 'LOCALURL:' ),
	'localurle'             => array( '0', 'LOKALURLE', 'LOCALURLE:' ),
	'currentweek'           => array( '1', 'SEMANANGONYAN', 'CURRENTWEEK' ),
	'localweek'             => array( '1', 'LOKALSEMANA', 'LOCALWEEK' ),
	'plural'                => array( '0', 'DAKOL:', 'PLURAL:' ),
	'fullurl'               => array( '0', 'TODONGURL:', 'FULLURL:' ),
	'fullurle'              => array( '0', 'TODONGURLE:', 'FULLURLE:' ),
	'language'              => array( '0', '#TATARAMON', '#LANGUAGE:' ),
	'contentlanguage'       => array( '1', 'TATARAMONKANLAOG', 'TATARAMONLAOG', 'CONTENTLANGUAGE', 'CONTENTLANG' ),
	'numberofadmins'        => array( '1', 'NUMEROKANTAGAMATO', 'NUMBEROFADMINS' ),
	'padleft'               => array( '0', 'PADWALA', 'PADLEFT' ),
	'padright'              => array( '0', 'PADTOO', 'PADRIGHT' ),
	'filepath'              => array( '0', 'FILEDALAN', 'FILEPATH:' ),
	'hiddencat'             => array( '1', '__NAKATAGONGKAT__', '__HIDDENCAT__' ),
	'pagesincategory'       => array( '1', 'PAHINASAKATEGORYA', 'PAHINASAKAT', 'PAGESINCATEGORY', 'PAGESINCAT' ),
	'pagesize'              => array( '1', 'PAHINASOKOL', 'PAGESIZE' ),
);

$specialPageAliases = array(
	'Upload'                    => array( 'Ikarga' ),
	'Search'                    => array( 'Hanapon' ),
);

$messages = array(
# User preference toggles
'tog-underline'               => 'Kur??tan an mga tak??d:',
'tog-highlightbroken'         => 'Pakarahay??n an mga raot na tak??d <a href="" klase="b??go">arog kaini</a> (panribay: arog kaini<a href="" klase="panlaog">?</a>).',
'tog-justify'                 => 'Pantay??n an mga talodt??d',
'tog-hideminor'               => 'Tag??on an mga sarad??t na paghir?? sa nakaka??gi pa san??ng pagbab??g??',
'tog-extendwatchlist'         => 'Palakbang??n an lista kan pigbabantayan tangarig mahiling an gabos na angay na pagbab??go',
'tog-usenewrc'                => 'Paorog??n an kaaging pagbab??go (JavaScript)',
'tog-numberheadings'          => 'Tolos na pagb??lang sa mga pamayoh??n',
'tog-showtoolbar'             => 'Ipahil??ng an toolbar nin paghir?? (JavaScript)',
'tog-editondblclick'          => 'Hirah??n sa dobleng paglagat??k an mga pahina (JavaScript)',
'tog-editsection'             => 'Tog??tan an paghir?? kan seksyon sa pa??gi kan mga tak??d na [hir??]',
'tog-editsectiononrightclick' => 'Togotan an paghir?? kan seksyon sa pag-lagatik sa wal?? sa mga titulo nin seksyon (JavaScript)',
'tog-showtoc'                 => 'Ipahil??ng an indise kan mga laog (para sa mga pahinang igwang sobra sa 3 pamayohan)',
'tog-rememberpassword'        => 'Giromdom??n an mga pagla??g ko sa kompyuter na in??',
'tog-editwidth'               => 'Nasa pinakahalakb??ng na sokol an kahon nin paghir??',
'tog-watchcreations'          => 'Id??gang an mga pahinang ginig??bo ko sa pigbabantayan ko',
'tog-watchdefault'            => 'Id??gang an mga pahinang pigh??hir?? ko sa pigbabantayan ko',
'tog-watchmoves'              => 'Id??gang an mga pahinang piglil??pat ko sa pigbabantayan ko',
'tog-watchdeletion'           => 'Id??gang an mga pahinang pigpap??r?? ko sa pigbabantayan ko',
'tog-minordefault'            => 'Markah??n an gabos na paghir?? nin sadit na paghir??',
'tog-previewontop'            => 'Ipahil??ng an pat??naw b??go an kahon nin paghir??',
'tog-previewonfirst'          => 'Ipahil??ng an pat??naw sa enot na paghir??',
'tog-nocache'                 => 'Pog??lon an pag-abang nin mga pahina',
'tog-enotifwatchlistpages'    => 'E-koreohan ako pag pigribayan an pahinang pigbabantayan ko',
'tog-enotifusertalkpages'     => 'E-koreohan ako pag pigrib??yan an pahina kan sak??ng olay',
'tog-enotifminoredits'        => 'E-koreohan man giraray ako para sa saradit na paghir?? kan mga pahina',
'tog-enotifrevealaddr'        => 'Ibuny??g an adres kan sakuyang e-koreo sa mga surat na pag-abiso',
'tog-shownumberswatching'     => 'Ipahil??ng an bilang kan nagbabantay na mga par??gamit',
'tog-fancysig'                => 'Mga b??gong pirma (may?? nin tolos na pantakod)',
'tog-externaleditor'          => 'Gam??ton m??na an panluwas na editor',
'tog-externaldiff'            => 'Gam??ton m??na an diff na panluw??s',
'tog-showjumplinks'           => 'Maka-"luks?? sa" mga tak??d na pangab??t',
'tog-uselivepreview'          => 'Gam??ton an pat??naw na direkto (JavaScript) (Experimental)',
'tog-forceeditsummary'        => 'Ipaar??m sakuy?? kun malaog sa sum??riong blanko nin paghir??',
'tog-watchlisthideown'        => 'Tagoon an mga saradit na paghir?? sa pigbabantayan',
'tog-watchlisthidebots'       => 'Tagoon an mga paghir?? kan bot sa pigbabantayan',
'tog-watchlisthideminor'      => 'Tagoon an mga sarad??t na paghir?? sa pigbabantayan',
'tog-nolangconversion'        => 'Pog??lon an pagr??bay nin mga lain-lain',
'tog-ccmeonemails'            => 'Padarah??n ako nin mga kopya kan e-koreo na pigpadara ko sa ibang mga par??gamit',
'tog-diffonly'                => 'Dai ipahil??ng an mga laog nin pahina sa bab?? kan kaib',
'tog-showhiddencats'          => 'Ipahiling an mga nakatagong kategorya',

'underline-always'  => 'Pirmi',
'underline-never'   => 'Nungka',
'underline-default' => 'Browser na normal',

# Dates
'sunday'        => 'Domingo',
'monday'        => 'Lunes',
'tuesday'       => 'Martes',
'wednesday'     => 'Miyerkoles',
'thursday'      => 'Huwebes',
'friday'        => 'Biyernes',
'saturday'      => 'Sabado',
'sun'           => 'Dom',
'mon'           => 'Lun',
'tue'           => 'Mar',
'wed'           => 'Miy',
'thu'           => 'Huw',
'fri'           => 'Biy',
'sat'           => 'Sab',
'january'       => 'Enero',
'february'      => 'Pebrero',
'march'         => 'Marso',
'april'         => 'Abril',
'may_long'      => 'Mayo',
'june'          => 'Hunyo',
'july'          => 'Hulyo',
'august'        => 'Agosto',
'september'     => 'Setiembre',
'october'       => 'Oktobre',
'november'      => 'Nobiembre',
'december'      => 'Deciembre',
'january-gen'   => 'Enero',
'february-gen'  => 'Pebrero',
'march-gen'     => 'Marso',
'april-gen'     => 'Abril',
'may-gen'       => 'Mayo',
'june-gen'      => 'Hunyo',
'july-gen'      => 'Hulyo',
'august-gen'    => 'Agosto',
'september-gen' => 'Setiembre',
'october-gen'   => 'Oktobre',
'november-gen'  => 'Nobiembre',
'december-gen'  => 'Deciembre',
'jan'           => 'Ene',
'feb'           => 'Peb',
'mar'           => 'Mar',
'apr'           => 'Abr',
'may'           => 'May',
'jun'           => 'Hun',
'jul'           => 'Hul',
'aug'           => 'Ago',
'sep'           => 'Set',
'oct'           => 'Okt',
'nov'           => 'Nob',
'dec'           => 'Dis',

# Categories related messages
'pagecategories'                 => '{{PLURAL:$1|Kategorya|Mga kategorya}}',
'category_header'                => 'Mga artikulo sa kategoryang "$1"',
'subcategories'                  => 'Mga sub-kategorya',
'category-media-header'          => 'Media sa kategoryang "$1"',
'category-empty'                 => "''May?? nin laog an kategoryang ini sa ngonyan.''",
'hidden-categories'              => '{{PLURAL:$1|Nakatagong kategorya|Mga nakatagong kategorya}}',
'hidden-category-category'       => 'Mga nakatagong kategorya',
'category-subcat-count-limited'  => 'Igwa nin {{PLURAL:$1|sub-kategorya|$1 mga sub-kategorya}} an artikulong ini.',
'category-article-count'         => '{{PLURAL:$2|An mga minasunod na pahina sana an laog kan kategoryang ini|An mga minasunod na {{PLURAL:$1|pahina|$1 pahina}} an yaon sa kategoryang ini, sa $2 gabos.}}',
'category-article-count-limited' => 'Yaon sa presenteng kategorya an mga minasunod na {{PLURAL:$1|pahina|$1 pahina}}.',
'listingcontinuesabbrev'         => 'sun??d',

'mainpagetext'      => "'''Instalado na an MediaWiki.'''",
'mainpagedocfooter' => "Konsultar??n tab?? an [http://meta.wikimedia.org/wiki/Help:Contents User's Guide] para sa impormasyon sa paggamit nin progama kaining wiki.

== Pagpopoon ==

* [http://www.mediawiki.org/wiki/Manual:Configuration_settings Configuration settings list]
* [http://www.mediawiki.org/wiki/Manual:FAQ MediaWiki FAQ]
* [https://lists.wikimedia.org/mailman/listinfo/mediawiki-announce MediaWiki release mailing list]",

'about'         => 'Manonongod',
'article'       => 'Laog na pahina',
'newwindow'     => '(minabukas sa b??gong bintan??)',
'cancel'        => 'Pondoh??n',
'moredotdotdot' => 'Dakol pa...',
'mypage'        => 'An sak??ng pahina',
'mytalk'        => 'An sak??ng olay',
'anontalk'      => 'Olay para sa IP na ini',
'navigation'    => 'Nabigasyon',
'and'           => '&#32;asin',

# Cologne Blue skin
'qbfind'         => 'Han??pon',
'qbbrowse'       => 'Maghalungk??t',
'qbedit'         => 'Hirah??n',
'qbpageoptions'  => 'Ining pahina',
'qbpageinfo'     => 'Konteksto',
'qbmyoptions'    => 'Mga pahina ko',
'qbspecialpages' => 'Espesyal na mga pahina',
'faq'            => 'HD',
'faqpage'        => 'Project:HD',

# Vector skin
'vector-action-delete'  => 'par??on',
'vector-action-move'    => 'Ibaly??',
'vector-namespace-main' => 'Pahina',
'vector-view-create'    => 'Magg??bo',
'vector-view-edit'      => 'Liwat??n',
'vector-view-view'      => 'Bas??hon',

'errorpagetitle'    => 'Sal??',
'returnto'          => 'Magbwelta sa $1.',
'tagline'           => 'Hal?? sa {{SITENAME}}',
'help'              => 'Tabang',
'search'            => 'Han??pon',
'searchbutton'      => 'Han??pon',
'go'                => 'Duman??n',
'searcharticle'     => 'Duman??n',
'history'           => 'Uusip??n nin pahina',
'history_short'     => 'Uusip??n',
'updatedmarker'     => 'nab??go poon kan huri kong pagdalaw',
'info_short'        => 'Impormasyon',
'printableversion'  => 'Naipiprentang bersyon',
'permalink'         => 'Permanenteng takod',
'print'             => 'Iprenta',
'edit'              => 'Liwat??n',
'create'            => 'Maggibo',
'editthispage'      => 'Hirah??n ining pahina',
'create-this-page'  => 'Gibohon ining pahina',
'delete'            => 'Paraon',
'deletethispage'    => 'Paraon ining pahina',
'undelete_short'    => 'Bawion an pagpar?? {{PLURAL:$1|paghir??|$1 mga paghir??}}',
'protect'           => 'Protehiran',
'protect_change'    => 'rib??yan an proteksyon',
'protectthispage'   => 'Protehiran ining pahina',
'unprotect'         => 'bawion an pagprotehir',
'unprotectthispage' => 'Bawion an proteksyon kaining pahina',
'newpage'           => 'B??gong pahina',
'talkpage'          => 'Pag-olayan ining pahina',
'talkpagelinktext'  => 'Pag-olay??n',
'specialpage'       => 'Espesyal na Pahina',
'personaltools'     => 'Mga gamit na personal',
'postcomment'       => 'Magkomento',
'articlepage'       => 'Hiling??n an pahina kan laog',
'talk'              => 'Or??lay',
'views'             => 'Mga hil??ng',
'toolbox'           => 'Kagamitan',
'userpage'          => 'Hiling??n an pahina kan par??gamit',
'projectpage'       => 'Hiling??n an pahina kan proyekto',
'imagepage'         => 'Hiling??n an pahina kan ladawan',
'mediawikipage'     => 'Hiling??n an pahina kan mensahe',
'templatepage'      => 'Hiling??n an pahina kan templato',
'viewhelppage'      => 'Hiling??n an pahina kan tabang',
'categorypage'      => 'Hiling??n an pahina kan kategorya',
'viewtalkpage'      => 'Hiling??n an or??lay',
'otherlanguages'    => 'Sa ibang mga tataramon',
'redirectedfrom'    => '(Piglikay hal?? sa $1)',
'redirectpagesub'   => 'Ilik??y an pahina',
'lastmodifiedat'    => 'Huring pigmodipikar an pahinang ini $2 kan $1.',
'viewcount'         => 'Binukas??n ining pahina nin {{PLURAL:$1|sarong beses|nin $1 beses}}.',
'protectedpage'     => 'Protektadong pahina',
'jumpto'            => 'Maglukso sa:',
'jumptonavigation'  => 'nabigasyon',
'jumptosearch'      => 'han??pon',

# All link text and link target definitions of links into project namespace that get used by other message strings, with the exception of user group pages (see grouppage) and the disambiguation template definition (see disambiguations).
'aboutsite'            => 'Manonongod sa {{SITENAME}}',
'aboutpage'            => 'Project:Manonongod',
'copyright'            => 'Makukua an laog sa $1.',
'copyrightpage'        => '{{ns:project}}:Mga derechos nin par??surat',
'currentevents'        => 'Mga panyayari sa ngonyan',
'currentevents-url'    => 'Project:Mga panyayari sa ngonyan',
'disclaimers'          => 'Mga renunsya',
'disclaimerpage'       => 'Project:Heneral na renunsya',
'edithelp'             => 'Paghir?? kan pagtabang',
'edithelppage'         => 'Help:Pagliwat',
'helppage'             => 'Help:Mga laog',
'mainpage'             => 'Pangenot na Pahina',
'mainpage-description' => 'Pangenot na Pahina',
'policy-url'           => 'Project:Palak??w',
'portal'               => 'Portal kan komunidad',
'portal-url'           => 'Project:Portal kan Komunidad',
'privacy'              => 'Palakaw nin pribasidad',
'privacypage'          => 'Project:Palakaw nin pribasidad',

'badaccess'        => 'Salang permiso',
'badaccess-group0' => 'Dai ka tinotogotan na gibohon an aksyon na saimong hinahagad.',
'badaccess-groups' => 'An aksyon na saimong hinahagad limitado sa mga par??gamit sa sar?? sa mga grupong $1.',

'versionrequired'     => 'Kaipuhan an bersyon $1 kan MediaWiki',
'versionrequiredtext' => 'Kaipuhan an bersyon $1 kan MediaWiki sa paggamit kan pahinang ini. Hil??ng??n an [[Special:Version|Bersyon kan pahina]].',

'ok'                      => 'Sige',
'retrievedfrom'           => 'Pigkua sa "$1"',
'youhavenewmessages'      => 'Igwa ka nin $1 ($2).',
'newmessageslink'         => 'mga b??gong mensahe',
'newmessagesdifflink'     => 'huring pagb??go',
'youhavenewmessagesmulti' => 'Igwa ka nin mga b??gong mensahe sa $1',
'editsection'             => 'liwat??n',
'editold'                 => 'Liwat??n',
'viewsourceold'           => 'hiling??n an ginik??nan',
'editlink'                => 'liwat??n',
'viewsourcelink'          => 'hiling??n an toltolan',
'editsectionhint'         => 'Liwat??n an seksyon: $1',
'toc'                     => 'Mga laog',
'showtoc'                 => 'ipahil??ng',
'hidetoc'                 => 'tag??on',
'thisisdeleted'           => 'Hiling??n o isul??t an $1?',
'viewdeleted'             => 'Hiling??n an $1?',
'restorelink'             => '{{PLURAL:$1|sarong pinarang paghir??|$1 na pinarang paghir??}}',
'feedlinks'               => 'Hungit:',
'feed-invalid'            => 'Bawal na tipo nin hungit na subkripsyon.',
'feed-unavailable'        => 'May?? an mga sindikasyon na hungit',
'site-rss-feed'           => '$1 Hungit nin RSS',
'site-atom-feed'          => '$1 Hungit nin Atomo',
'page-rss-feed'           => '"$1" Hungit na RSS',
'page-atom-feed'          => '"$1" Hungit na Atomo',
'feed-atom'               => 'Atomo',
'red-link-title'          => '$1 (dai pa naisusurat)',

# Short words for each namespace, by default used in the namespace tab in monobook
'nstab-main'      => 'Pahina',
'nstab-user'      => 'Pahina nin paragamit',
'nstab-media'     => 'Pahina kan media',
'nstab-special'   => 'Espesyal',
'nstab-project'   => 'Pahina kan proyekto',
'nstab-image'     => 'File',
'nstab-mediawiki' => 'Mensahe',
'nstab-template'  => 'Templato',
'nstab-help'      => 'Pahina kan tabang',
'nstab-category'  => 'Kategorya',

# Main script and global functions
'nosuchaction'      => 'Mayong siring na aksyon',
'nosuchactiontext'  => 'An gibo na pin??l?? nin URL dai bisto kan wiki',
'nosuchspecialpage' => 'Mayong siring na espesyal na p??hina',
'nospecialpagetext' => '<strong>Dai pwede an pahinang espesyal na pinil?? mo.</strong>

Pwede mong mahiling an lista nin mga marhay na pahina sa [[Special:SpecialPages|{{int:specialpages}}]].',

# General errors
'error'                => 'Sal??',
'databaseerror'        => 'Sal?? sa base nin datos',
'dberrortext'          => 'May sal?? sa hapot na sintaksis kan base nin datos.
Pwedeng may sal?? digdi.
An huring probar na hap??t iyo:
<blockquote><tt>$1</tt></blockquote>
hale sa aksy??n "<tt>$2</tt>".
AnSQL ko nagbalik nin sal?? na"<tt>$3: $4</tt>".',
'dberrortextcl'        => 'May sal?? sa hap??t nin sintaksis kan base nin datos.
Ini an huring probar na hap??t:
"$1"
sa aksy??n na "$2".
AnSQL ko nagbalik nin sal?? na"$3: $4"',
'laggedslavemode'      => 'Patanid: An pahina pwedeng dai nin pagbab??go sa ngonyan.',
'readonly'             => 'Kandado an base nin datos',
'enterlockreason'      => 'Magkaag tab?? nin rason sa pagkandado, asin ikalkulo kun nuarin bubukas??n an kandado',
'readonlytext'         => 'Sarado m??na an base nin datos sa mga b??gong entrada asin iba pang mga pagribay, pwede gayod sa rutinang pagmantenir kan base nin datos, despues, mabalik na ini sa normal.

Ini an eksplikasyon kan tagamat?? na nagkandado kaini: $1',
'missingarticle-rev'   => '(pagb??go#: $1)',
'missingarticle-diff'  => '(Kaibh??n: $1, $2)',
'readonly_lag'         => 'Enseguidang nakandado an base nin datos mientras makaabot an base nin datos na esklabo saiyang amo.',
'internalerror'        => 'Panlaog na sal??',
'internalerror_info'   => 'Panlaog na sal??: $1',
'filecopyerror'        => 'Dai naarog an mga file na "$1" hasta "$2".',
'filerenameerror'      => 'Dai nat??wan nin b??gong ngaran an file na "$1" sa "$2".',
'filedeleteerror'      => 'Dai napar?? an file na "$1".',
'directorycreateerror' => 'Dai nagibo an direktorya na "$1".',
'filenotfound'         => 'Dai nahanap an file na "$1".',
'fileexistserror'      => 'Dai maisurat sa file na "$1": igwa nang file na arog kaini',
'unexpected'           => 'Dai pighuhun?? na bal??r: "$1"="$2".',
'formerror'            => 'Sal??: dai pwedeng isumitir an porma',
'badarticleerror'      => 'Dai pwedeng gibohon ini sa ining p??hina.',
'cannotdelete'         => 'Dai napar?? an pahina o file na napil??. (Pwede na napar?? na ini kan ibang paragamit.)',
'badtitle'             => 'Sal?? an titulo',
'badtitletext'         => 'Dai pwede an hinagad na titulo nin pahina, o mayong laog, o sarong titulong pan-ibang tatar??mon o pan-ibang wiki na sala an pagkatak??d. Pwedengigwa ining sar?? o iba pang mga karakter na dai pwedeng gamiton sa mga titulo.',
'perfcached'           => 'Nakaabang an minasunod na mga datos, asin pwede ser na mga lum?? na.',
'perfcachedts'         => 'Nakaabang an nagsusunod na mga datos, asin huring nab??go sa $1.',
'querypage-no-updates' => 'Pigpopogol m??na an mga pagbab??go sa pahinang ini. Dai m??na mabab??go an mga datos digdi.',
'wrong_wfQuery_params' => 'Sal?? na par??metro sa wfQuery()<br />
Acci??n: $1<br />
Hap??t: $2',
'viewsource'           => 'Hiling??n an ginikanan',
'viewsourcefor'        => 'para sa $1',
'protectedpagetext'    => 'An pahinang ini pigsar?? tangarig pogolon an paghir??.',
'viewsourcetext'       => 'Pwede mong hiling??n asin ar??gon an ginikanan kan pahinang ini:',
'protectedinterface'   => 'An pahinang ini nagtatao nin interface para sa software, asin sarado tangarig mapondo an pag-abuso.',
'editinginterface'     => "'''Patanid:''' An pighihira mong pahina piggagamit para sa tekstong interface kan software. An mga pagbab??go sa pahinang ini makakaapektar sa hitsura kan interface nin par??gamit kan mga ibang par??gamit.",
'sqlhidden'            => '(nakatag?? an hap??t nin SQL)',
'cascadeprotected'     => 'Pinoprotehir??n ining p??hina sa mga paghir??, ta sar?? ini sa mga minasunod na {{PLURAL:$1|p??hina|mga p??hina}} na pinoprotehiran kan opsy??n na "katarata" na nakabuk??:
$2',
'namespaceprotected'   => "May?? kang permisong maghir?? kan mga p??hina sa '''$1''' ngaran-espacio.",
'customcssjsprotected' => 'May?? kang permiso na maghir?? kaining p??hina, hul?? ta igwa ining mga puesta na personal kan ibang paragamit.',
'ns-specialprotected'  => 'An mga p??hinang nasa {{ns:special}} na ngaran-espacio dai pwedeng hirah??n.',

# Virus scanner
'virus-badscanner'     => "Sal??ng konfigurasyon: dai aram an virus scanner: ''$1''",
'virus-unknownscanner' => 'dai aram an antivirus:',

# Login and logout pages
'logouttext'                 => "'''Nakaluwas ka na.'''

Pwede mo pang gamiton an {{SITENAME}} na dai nagpapabisto, o pwede ka giraray lumaog
bilang pareho o ibang par??gamit. Giromdomon tab?? na an ibang mga p??hina pwedeng mahiling pa na garo nakalaog ka pa, hasta limpyar??n mo an abang kan ''browser'' mo.",
'welcomecreation'            => "== Maogmang Pagdagos, $1! ==

Nagibo na an ''account'' mo. Giromdomon tabi na ribay??n an saimong mga kab??tan sa {{SITENAME}}.",
'yourname'                   => 'Pangaran kan paragamit:',
'yourpassword'               => 'Sekretong panlaog:',
'yourpasswordagain'          => 'Itat??k giraray an sekretong panlaog:',
'remembermypassword'         => 'Giromdomon an paglaog ko sa kompyuter na ini',
'yourdomainname'             => "An saimong ''domain'':",
'externaldberror'            => "Igwang nin salang panluwas pantunay kan base nin datos o dai ka pigtotogotan na b??gohon an saimong panluwas na ''account''.",
'login'                      => 'Maglaog',
'nav-login-createaccount'    => 'Maglaog / maggibo nin account',
'loginprompt'                => 'Kaipuhan may cookies ka para makalaog sa {{SITENAME}}.',
'userlogin'                  => 'Maglaog / maggibo nin account',
'logout'                     => 'Magluwas',
'userlogout'                 => 'Magluw??s',
'notloggedin'                => 'May?? sa laog',
'nologin'                    => "Igwa ka nin entrada? '''$1'''.",
'nologinlink'                => 'Maggibo nin account',
'createaccount'              => 'Maggibo nin account',
'gotaccount'                 => "Igwa ka na nin account? '''$1'''.",
'gotaccountlink'             => 'Maglaog',
'createaccountmail'          => 'sa e-koreo',
'badretype'                  => 'Dai parehas an pigtat??k mong mga sekretong panlaog.',
'userexists'                 => 'Piggagamit na kan iba an pangaran. Magpili tab?? nin iba.',
'loginerror'                 => 'Sal?? an paglaog',
'createaccounterror'         => 'Da?? magg??bo an account: $1.',
'nocookiesnew'               => 'Nagibo na an account kan par??gamit, alagad dai ka pa nakalaog. Naggagamit nin cookies an {{SITENAME}} para magpalaog sa mga par??gamit. Nakapondo an cookies mo. Paandaron tab?? ini, dangan, maglaog gamit an b??go mong pangaran asin sekretong panlaog.',
'nocookieslogin'             => 'Naggagamit nin mga cookies an {{SITENAME}} para magpalaog nin mga paragamit. Nakapondo an mga cookies mo. Paandaron tabi ini asin probaran giraray.',
'noname'                     => 'Dai ka pa nagkaag nin pwedeng gamiton na pangaran.',
'loginsuccesstitle'          => 'Matriumpo an paglaog',
'loginsuccess'               => "'''Nakalaog ka na sa {{SITENAME}} \"\$1\".'''",
'nosuchuser'                 => 'Mayong paragamit sa pangaran na "$1". Reparohon an pigsurat mo, o maggibo nin b??gong account.',
'nosuchusershort'            => 'Mayong paragamit sa nagngangaran na "<nowiki>$1</nowiki>". Reparohon an pigsurat mo.',
'nouserspecified'            => 'Kaipuhan mong kaagan nin pangaran.',
'wrongpassword'              => 'Sal?? an pigtat??k na sekretong panlaog. Probaran giraray tab??.',
'wrongpasswordempty'         => 'Mayong pigkaag na sekretong panlaog. Probaran giraray tab??.',
'passwordtooshort'           => 'Sal?? o hal??poton an saimong sekretong panlaog. Igwa dapat ining dai mabab?? sa {{PLURAL:$1|1 karakter|$1 karakter}} asin iba man sa pinil?? mong pangaran.',
'mailmypassword'             => 'Ipadara sa e-koreo an sekretong panlaog',
'passwordremindertitle'      => 'Panpa??si nin sekretong panlaog hal?? sa {{SITENAME}}',
'passwordremindertext'       => 'Sarong paragamit (pwedeng ika, hal?? sa IP na $1)
an naghagad nin b??gong sekretong panlaog para sa {{SITENAME}} ($4).
"$3" na an b??gong sekretong panlaog ni "$2".
Kaipuhan maglaog ka asin ibaly?? an saimong sekretong panlaog.

Kun ibang tawo an naghagad kaini o kun nagiromd??man mo na an saimong sekretong panlaog asin hab?? mo nang ribayan ini, dai mo na pagintiendehon ining mensahe. Ipadagos na an paggamit kan dating sekretong panlaog.',
'noemail'                    => 'Mayong e-koreo na nakarehistro sa par??gamit na "$1".',
'passwordsent'               => 'Igwang b??gong sekretong panlaog na pigpadar?? sa e-koreong nakarehistro ki "$1".
Maglaog tab?? giraray pagnakua mo na ini.',
'blocked-mailpassword'       => 'Pigbagatan sa paghir?? an saimong IP, asin pigpopogolan na magamit an pagbawi kan sekretong panlaog tangarig maibitaran an pagabuso.',
'eauthentsent'               => 'May ipinadarang e-koreong kompirmasyon sa piniling adres nin e-koreo.
B??go pa magpadara nin iba pang e-koreo sa account na ini, kaipuhan tabing sunodon an mga instruksyon na nasa e-koreo, tangarig makompirmar na talagang saimo ining account.',
'throttled-mailpassword'     => 'May pinadara nang paisi nin sekretong panlaog, sa huring
$1 na oras. Para pogolan an mga pagabuso, sarong paisi sana an ipapadara sa laog nin
$1 na oras.',
'mailerror'                  => 'Sal?? an pagpadar?? nin e-koreo: $1',
'acct_creation_throttle_hit' => 'Pasensya, nakagibo ka na nin $1 accounts. Dai ka na makakagibo pa.',
'emailauthenticated'         => "An saimong ''e''-surat pinatunayan sa $1.",
'emailnotauthenticated'      => "Dai pa napatunayan an saimong ''e''-surat. Mayong ipapadarang ''e''-surat para sa ano man na minasunod na gamit.",
'noemailprefs'               => "Magpil?? tab?? nin ''e''-surat tangarig magandar ining mga gamit.",
'emailconfirmlink'           => "Kompirmaron tab?? an saimong ''e''-surat",
'invalidemailaddress'        => "Dai matogotan ining ''e''-surat ta garo sal?? an ''format'' kaini. Magkaag tab?? nin tam?? o dai pagkaagan.",
'accountcreated'             => "Nagibo na an ''account''.",
'accountcreatedtext'         => "Ginibo na an ''account'' para ki $1.",
'loginlanguagelabel'         => 'Tataramon: $1',

# Password reset dialog
'resetpass'                 => "Ipwesto giraray an sekretong panlaog kan ''account''",
'resetpass_announce'        => "Nakalaog ka na may kodang temporaryong ''e''-sinurat. Para matapos an paglaog, kaipuhan mong magpwesto nin b??gong sekretong panlaog digdi:",
'resetpass_text'            => '<!-- Magdugang nin teksto digdi -->',
'resetpass_header'          => 'Ibaly?? an sekretong panlaog',
'oldpassword'               => 'Lumang sekretong panlaog:',
'newpassword'               => 'B??gong sekretong panlaog:',
'retypenew'                 => 'Itat??k giraray an b??gong panlaog:',
'resetpass_submit'          => 'Ipwesto an sekretong panlaog dangan maglaog',
'resetpass_success'         => 'Naribayan na an saimong sekretong panlaog! Pigpapadagos ka na...',
'resetpass_forbidden'       => 'Dai pwedeng ribayan an mga sekretong panlaog sa ining wiki',
'resetpass-submit-loggedin' => 'Ribayan an sekretong panlaog',
'resetpass-wrong-oldpass'   => 'Sal??ng temporaryo o presenteng sekretong panlaog.
Matriumpo mo nang nailaog an sekretong panlaog o nakua an b??gong temporaryong sekretong panlaog.',
'resetpass-temp-password'   => 'Temporaryong sekretong panlaog:',

# Edit page toolbar
'bold_sample'     => 'Tekstong mah??bog',
'bold_tip'        => 'Mah??bog na teksto',
'italic_sample'   => 'Tekstong It??liko',
'italic_tip'      => 'Tekstong patagil??d',
'link_sample'     => 'Titulo nin takod',
'link_tip'        => 'Panlaog na takod',
'extlink_sample'  => 'http://www.example.com t??tulong nakatakod',
'extlink_tip'     => 'Panluwas na takod (giromdomon an http:// na prefiho)',
'headline_sample' => 'Tekstong pamayohan',
'headline_tip'    => 'Tangga ika-2 na pamayohan',
'math_sample'     => 'Isali??t an pormula digdi',
'math_tip'        => 'P??rmulang matem??tika (LaTeX)',
'nowiki_sample'   => "Isaliot digdi an tekstong dai na-''format''",
'nowiki_tip'      => "Dai pagindiendehon pag-''format'' kan wiki",
'image_sample'    => 'Halimbawa.jpg',
'image_tip'       => 'Nakaturay na file',
'media_sample'    => 'Halimbawa.ogg',
'media_tip'       => 'Takod nin file',
'sig_tip'         => 'Pirma mo na may tat??k nin oras',
'hr_tip'          => 'Pabalagbag na linya (use sparingly)',

# Edit pages
'summary'                    => 'Sumada:',
'subject'                    => 'Tema/pamayohan:',
'minoredit'                  => 'Sadit na paghir?? ini',
'watchthis'                  => 'Bantayan an pahinang ini',
'savearticle'                => 'Itag??ma an pahina',
'preview'                    => 'T??naw??n',
'showpreview'                => 'Hiling??n an pat??naw',
'showlivepreview'            => 'Pat??naw na direkto',
'showdiff'                   => 'Hiling??n an mga pagbab??go',
'anoneditwarning'            => "'''Patanid:''' Dai ka nakalaog. Masusurat an saimong IP sa uusip??n kan pagbab??go kan pahinang ini.",
'missingsummary'             => "'''Paisi:''' Dai ka nagkaag nin sum??d kan paghir??. Kun pindot??n mo giraray an Itagama, maitatagama an hir?? mo na may?? kaini.",
'missingcommenttext'         => 'Paki l??gan nin komento sa ibab??.',
'missingcommentheader'       => "'''Paisi:''' Dai ka nagkaag nin tema/pamayohan para sa ining komentaryo. Kun pindoton mo giraray an Itagama, maitatagama an hira mo na may?? ini.",
'summary-preview'            => 'Pat??naw nin sumada:',
'subject-preview'            => 'Pat??naw nin tema/pamayohan:',
'blockedtitle'               => 'Pigb??gat an par??gamit',
'blockedtext'                => "'''Pigbagat an pangaran o IP mo.'''

Si $1 an nagbagat. Ini an itinaong ras??n, ''$2''.

* Pagpoon kan pagbagat: $8
* Pagpas?? kan pagbagat: $6
* Piniling bagaton: $7

Pwede mong suratan si $1 o an iba pang [[{{MediaWiki:Grouppage-sysop}}|administrador]] para pagoralayan an manonongod sa pagbagat.
Dai mo pwedeng gamiton an ' e-koreohan an paragamit ' kun mayong tamang e-surat sa  [[Special:Preferences|mga kab??tan kan account]] mo asin dai ka pigbagat sa paggamit kaini.
$3 an presente mong IP, asin #$5 an ID nin pigbagat. Ikaag tab?? an arin man o pareho sain man na hap??t.",
'autoblockedtext'            => "Enseguidang pigbagat an IP mo ta ginamit ini kan ibang par??gamit, na binagat ni \$1.
Ini an ras??n:

:''\$2''

* Pagpoon kan pagbagat: \$8
* Pagpas?? kan pagbagat: \$6

Pwedeng mong suratan si \$1 o an iba pang mga
[[{{MediaWiki:Grouppage-sysop}}|administrador]] para pagolayan an manonongod sa pagbagat.

Giromdomon tab?? na pwede mo sanang gamiton an \"''e''-suratan ining par??gamit\" na gamit kun igwa kang tamang ''e''-surat na nakarehistro saimong [[Special:Preferences|mga kab??tan nin par??gamit]] asin dai ka pigbabagat sa paggamit kaini.

\$5 an pigbagat na ID. Ikaag tab?? ining ID sa gabos na paghapot mo.",
'blockednoreason'            => 'mayong itinaong rason',
'blockedoriginalsource'      => "An ginikanan kan '''$1''' mahihiling sa ibab??:",
'blockededitsource'          => "An teksto kan '''mga hira mo''' sa '''$1''' mahihiling sa bab??:",
'whitelistedittitle'         => 'Kaipuhan an paglaog tangarig makahir??',
'whitelistedittext'          => 'Kaipuhan mong $1 tangarig makahir?? nin mga p??hina.',
'confirmedittext'            => "Kaipuhan mong kompirmaron an saimong ''e''-surat. Ipwesto tab?? asin patunayan an saimong ''e''-surat sa [[Special:Preferences|mga kab??tan kan par??gamit]].",
'nosuchsectiontitle'         => 'Mayong siring na seksy??n',
'nosuchsectiontext'          => 'Mayo man an seksy??n an pighihira mo.',
'loginreqtitle'              => 'Kaipuhan Maglaog',
'loginreqlink'               => 'maglaog',
'loginreqpagetext'           => 'Kaipuhan kang $1 tangarig makahil??ng nin ibang pahina.',
'accmailtitle'               => 'Napadar?? na an sekretong panlaog.',
'accmailtext'                => 'An sekretong panlaog ni "$1" naipadar?? na sa $2.',
'newarticle'                 => '(B??go)',
'newarticletext'             => 'Sinunod mo an takod sa pahinang may?? pa man.
Tangarig magibo an pahina, magpoon pagsurat sa kahon sa bab??
(hiling??n an [[{{MediaWiki:Helppage}}|pahina nin tabang]] para sa iba pang impormasyon).
Kun dai tinuyong nakaabot ka digdi, pindoton sana an back sa browser mo.',
'anontalkpagetext'           => "----''Ini an pahina kan olay kan sarong par??gamit na dai bisto na dai pa naggibo nin account o dai naggagamit kaini. Entonces, piggagamit mi an numero nin IP tangarig mabisto siya. Ining IP pwede gamiton kan manlain-lain na mga par??gamit. Kun ika sarong para??gamit na dai bisto asin konbensido ka sa pigsasabi ka ining mga komento bak?? man dapit saimo,  [[Special:UserLogin|maggibo nin'' account ''o maglaog]] tab?? tangarig maibitaran an pagkaribong saimo asin sa ibang mga par??gamit na dai bisto.''",
'noarticletext'              => 'Mayo man na teksto sa p??hinang ini, pwede mong [[Special:Search/{{PAGENAME}}|han??pon ining titulo nin p??hina]] sa ibang mga p??hina o [{{fullurl:{{FULLPAGENAME}}|action=edit}} hirahon ining p??hina].',
'clearyourcache'             => "'''Pagiromdom:''' Pagkatapos kan pagtagama, pwede ser na kaipuhan mong lawigawan an abang kan ''browser'' para mahiling mo an mga pagbab??go. '''Mozilla / Firefox / Safari:''' doonan an ''shift'' an ''Shift'' sabay an pagpindot sa ''Reload'', o pindoton an ''Ctrl-Shift-R'' (''Cmd-Shift-R'' sa Apple Mac); '''IE:''' doonan (dai halion an muro) an ''Ctrl'' mientras sabay an pagpindot sa  ''Refresh'', o pindoton an ''Ctrl-F5''; '''Konqueror:''': pindoton sana ''Reload'', o pindoton  an ''F5''; '''Opera''' pwede ser na kaipuhan na hal??on an gabos na laog kan abang sa ''Tools???Preferences''.",
'usercssyoucanpreview'       => "'''Tip:''' Gamiton an 'Show preview' para testingon an b??gong CSS bago magtagama.",
'userjsyoucanpreview'        => "'''Tip:''' Gamiton an 'Show preview' para testingon an b??gong JS bago magtagama.",
'usercsspreview'             => "'''Giromdomon tab?? na pigpapat??naw sana saimo an CSS nin par??gamit, dai pa ini nakatagama!'''",
'userjspreview'              => "'''Giromdomon tabi na pigtetest/pighihiling mo sana an patanaw kan saimong JavaScript nin paragamit, dai pa ini naitagama!'''",
'userinvalidcssjstitle'      => "'''Patanid:''' Mayong ''skin'' na \"\$1\". Giromdomon tab?? na an .css asin .js na mga p??hina naggagamit nin titulong nakasurat sa sadit na letras, halimbawa {{ns:user}}:Foo/monobook.css bakong {{ns:user}}:Foo/Monobook.css.",
'updated'                    => '(Bin??go)',
'note'                       => "'''Paisi:'''",
'previewnote'                => "'''Pat??naw sana ini; dai pa naitagama an mga pagbab??go!'''",
'previewconflict'            => 'Mahihil??ng sa pat??naw na ini an tekstong nasa itaas na lugar nin paghir?? arog sa maipapahiling kun ini an itatagama mo.',
'session_fail_preview'       => "'''Despensa! Dai mi naipadagos an paghir?? mo huli sa pagkawara nin datos kan sesyon.
Probaran tab?? giraray. Kun dai man giraray magibo, probaran na magluwas dangan maglaog giraray.'''",
'session_fail_preview_html'  => "'''Despensa! Dai mi naipadagos an paghir?? mo nin huli sa kaw??ran kan datos kan sesyon.'''

''Huli ta ining wiki may HTML na nakaandar, pigtago an pat??naw bilang paglikay kontra sa mga atake sa JavaScript.''

'''Kun talagang boot mong hirah??n ini, probaran giraray. Kun dai pa giraray magibo, magluwas dangan maglaog giraray. '''",
'token_suffix_mismatch'      => "'''Dai pigtogotan an paghir?? mo ta sinabrit kan client mo an punctuation characters.
Dai pigtogotan ining paghir?? tangarig maibitaran na maraot an teksto kan pahina.
Nanyayari nanggad ini kun naggagamit ka nin bakong marah??y asin dai bistong web-based proxy service.'''",
'editing'                    => 'Pigliliwat an $1',
'editingsection'             => 'Pighihira an $1 (seksyon)',
'editingcomment'             => 'Pighihira an $1 (komento)',
'editconflict'               => 'Komplikto sa paghihira: $1',
'explainconflict'            => "May ibang par??gamit na nagb??go kaining pahina kan pagpoon mong paghir?? kaini.
Nahihil??ng ang pahina kan teksto sa parteng itaas kan teksto.
An mga pagbab??go mo nahihil??ng sa parteng ibab?? kan teksto.
Kaipuhan mong isalak an mga pagbab??go mo sa presenteng teksto.
An teksto na nasa parteng itaas '''sana''' an maitatagama sa pagpindot mo kan \"{{int:savearticle}}\".",
'yourtext'                   => 'Saimong teksto',
'storedversion'              => 'Itinagamang bersyon',
'nonunicodebrowser'          => "'''PATANID: An browser mo bakong unicode complaint. Igwang temporariong sistema na nakaandar para makahir?? ka kan mga pahina: mahihiling an mga karakter na non-ASCII sa kahon nin paghir?? bilang mga kodang hexadecimal.'''",
'editingold'                 => "'''PATANID: Pighihir?? mo an pas?? nang pagpakarah??y kaining pahina.
Kun itatagama mo ini, mawawar?? an mga pagbab??gong nagibo poon kan pagpakarah??y kaini.'''",
'yourdiff'                   => 'Mga kaibah??n',
'copyrightwarning'           => "Giromdomon tab?? na an gabos na kontribusyon sa {{SITENAME}} pigkokonsiderar na $2 (hiling??n an $1 para sa mga detalye). Kun hab?? mong mahir?? an saimomg sinurat na mayong pakim??no, dai tab?? iyan isumiter digdi.<br />
Pigpropromesa mo man samuy?? na ika an kagsurat kaini, o kinopya mo ini sa dominiong panpubliko o sarong parehong libreng rekurso (hiling??n an $1 para sa mga detalye).
'''DAI TAB?? MAGSUMITIR NIN MGA GIBONG IPINAPANGALAD NA KOPYAHON NIN MAYONG PERMISO!'''",
'copyrightwarning2'          => "Giromdomon tab?? na an gabos na kontribusyon sa {{SITENAME}} pwedeng hirah??n, b??gohon o halion kan ibang mga par??gamit. Kun hab?? mong mahir?? an saimomg sinurat na mayong pakim??no, pues, dai tab?? isumitir iyan digdi.<br />
Pigpapangak?? mo man samuy?? na ika an nagsurat kaini, o pigkopya mo ini sa dominiong panpubliko o sarong parehong libreng rekurso (hilingon an $1 para sa mga detalye). '''DAI TAB?? MAGSUMITIR NIN MGA GIBONG IPINAPANGALAD NA KOPYAHON NIN MAYONG PERMISO!'''",
'longpagewarning'            => "'''PATANID: $1 na kilobytes na kalab?? an pahinang ini; an ibang mga browser pwedeng magkaproblema sa paghir?? nin mga pahinang haros o sobra sa 32 kb.
Paki bang?? ini sa saradit na seksyon.'''",
'longpageerror'              => "'''SAL??: $1 na kilobytes na kalab?? an pahinang isinumitir mo, na mas halab?? sa hanggan nin $2 na kilobytes. Dai pwede ining itagama.'''",
'readonlywarning'            => "'''PATANID: Nakakandado an base nin datos para sa pagmantinir, pues, dai mo m??na pwede na itagama an mga paghir?? mo. Pwede mo pa man na arogon dangan ipaskil ang teksto sa sarong dokumento arog kan MS Word asbp. asin itagama ini para sa atyan.'''",
'protectedpagewarning'       => "'''PATANID:  Nakakandado ining pahina tangarig an mga par??gamit na may priblehiyo nin ''sysop'' sana an pwedeng maghira kaini.'''",
'semiprotectedpagewarning'   => "'''Paisi:''' An pahinang ini isinara tangarig mga rehistradong par??gamit sana an makahira kaini.",
'cascadeprotectedwarning'    => "'''Patanid:''' Nakakandado an pahinang ini tangarig an mga par??gamit na igwang pribilehyo nin sysop sana an pwedeng maghir?? kaini, huli ta kabali ini sa mga kataratang protektado na {{PLURAL:$1|pahina|mga pahina}}:",
'templatesused'              => 'Mga templato na piggamit sa pahinang ini:',
'templatesusedpreview'       => 'Mga templato na piggamit sa pat??naw na ini:',
'templatesusedsection'       => 'Mga templato na piggamit sa seksyon na ini:',
'template-protected'         => '(protektado)',
'template-semiprotected'     => '(semi-protektado)',
'edittools'                  => '<!-- An teksto digdi mahihiling sa bab?? kan mga pormang pighihir?? asin pigkakarga. -->',
'nocreatetitle'              => 'Limitado an paggibo nin pahina',
'nocreatetext'               => 'Igwang pagpogol sa paggibo nin b??gong pahina sa site na ini.
Pwede kang bumalik dangan maghir?? nin presenteng pahina, o [[Special:UserLogin|maglaog o magbukas nin account]].',
'nocreate-loggedin'          => 'May?? ka nin permiso na maggibo nin mga b??gong pahina sa wiki na ini.',
'permissionserrors'          => 'Mga sal??ng Permiso',
'permissionserrorstext'      => 'May?? ka nin permiso na gibohon yan, sa minasunod na {{PLURAL:$1|rason|mga rason}}:',
'recreate-moveddeleted-warn' => "'''Patanid: Piggig??bo mo giraray an pahina na pigpar?? na dati pa.'''

Dapat mong isipon kun kaipuhan na ipadagos an paghir?? kaining pahina.
An paghal?? kan historial para sa pahinang ini yaon digdi para sa saimong kombenyensya:",
'edit-conflict'              => 'Igwang iregularidad sa pagliwat.',
'edit-already-exists'        => 'Dai maggibo an b??gong pahina.
Igwa na kaini.',

# "Undo" feature
'undo-success' => 'Pwedeng bawion an paghir??. Sosogon tab?? an pagkakaiba sa bab?? tangarig maberipik??r kun ini an boot mong gibohon, dangan itagama an mga pagbab??go sa bab?? tangarig tapuson an pagbaw?? sa paghir??.',
'undo-failure' => 'Dai napogol an paghir?? ta igwa pang ibang paghir?? sa tahaw na nagkokomplikto.',
'undo-summary' => 'Bawion an pagpakarah??y na $1 ni [[Special:Contributions/$2|$2]] ([[User talk:$2|Pag-ol??yan]])',

# Account creation failure
'cantcreateaccounttitle' => 'Dai makagibo nin account',
'cantcreateaccount-text' => "An pagbukas nin account hal?? sa IP na ('''$1''') bin??gat ni [[User:$3|$3]].

''$2'' an rason na pigtao ni $3",

# History pages
'viewpagelogs'           => 'Hiling??n an mga usip para sa pahinang ini',
'nohistory'              => 'Mayong paghir?? nin uusip??n sa pahinang ini.',
'currentrev'             => 'Sa ngonyan na pagpakarh??y',
'revisionasof'           => 'Pagpakarh??y sa $1',
'revision-info'          => 'An pagpakarh??y sa $1 ni $2',
'previousrevision'       => '???Orog na lumang pagpakarhay',
'nextrevision'           => 'Mas b??gong pagpakarh??y???',
'currentrevisionlink'    => 'Sa ngonyan na pagpakarh??y',
'cur'                    => 'ngonyan',
'next'                   => 'sunod',
'last'                   => 'huri',
'page_first'             => 'enot',
'page_last'              => 'huri',
'histlegend'             => 'Kaib na pinili: markah??n an mga kahon kan mga bersyon tangarig makomparar asin pindoton an enter o butones bab??.<br />
Legend: (ngonyan) = kaibh??n sa ngonyan na bersyon,
(huri) = kaibh??n sa huring bersyon, S = sarad??t na paghir??.',
'history-fieldset-title' => 'Rinsayon an uusipon',
'histfirst'              => 'Pinakaenot',
'histlast'               => 'Pinakah??ri',
'historysize'            => '($1 bytes)',
'historyempty'           => '(mayong laog)',

# Revision feed
'history-feed-title'          => 'Uusip??n kan pagpakarah??y',
'history-feed-description'    => 'Uusip??n kan pagpakarah??y para sa pahinang ini sa wiki',
'history-feed-item-nocomment' => '$1 sa $2',
'history-feed-empty'          => 'May?? man an hin??gad na pahina.
Pwedeng pigpar?? na ini sa wiki, o tin??wan nin b??gong pangaran.
Probaran tab?? an [[Special:Search|pighahanap sa wiki]] para sa mga pahinang dap??t.',

# Revision deletion
'rev-deleted-comment'         => '(hinal?? an komento)',
'rev-deleted-user'            => '(hinal?? an par??gamit)',
'rev-deleted-event'           => '(hinal?? an ingreso)',
'rev-deleted-text-permission' => 'Ining pagpakarah??y nin pahina pighal?? na sa mga archibong panpubliko.
Pwedeng igwang mga detalye sa [{{fullurl:{{#Special:Log}}/suppress|page={{FULLPAGENAMEE}}}} historial kan pagpar??].',
'rev-deleted-text-view'       => 'Ining pagpakarah??y nin pahina pighal?? na sa mga archibong panpubliko.
Pwede mo ining hiling??n bilang sarong tagamat?? kaining site;
Pwedeng igwang mga detalye sa [{{fullurl:{{#Special:Log}}/suppress|page={{FULLPAGENAMEE}}}} historial kan pagpar??].',
'rev-delundel'                => 'ipahil??ng/tagoon',
'revisiondelete'              => 'Paraon/bawion an mga pagpakarah??y',
'revdelete-nooldid-title'     => 'Mayong tunggit pagpakarah??y',
'revdelete-nooldid-text'      => 'Dai ka nagpili nin target na pagpakarhay o mga pagpakarhay tangarig magamit ini.',
'revdelete-selected'          => "'''{{PLURAL:$2|Selected revision|Selected revisions}} kan [[:$1]]'''",
'revdelete-text'              => "'''An mga pagpakarhay asin mga panyayari na pigpar?? mahihiling pa sa historya asin mga historial kan p??hina, pero an ibang parte kan mga laog kaini dai na ipapahiling sa publiko.'''

An ibang mga administrador sa ining wiki pwede pang maghiling kan mga nakatagong laog asin pwede pa nindang baw??on an pagpar?? kaini sa paggamit kan parehong ''interface'', kun may?? pang mga ibang restriksy??n.",
'revdelete-legend'            => 'Ipwesto an mga restriksy??n',
'revdelete-hide-text'         => 'Tagoon an teksto kan pagpakarah??y',
'revdelete-hide-image'        => 'Tagoon an laog kan file',
'revdelete-hide-name'         => 'Tagoon an aksyon asin target',
'revdelete-hide-comment'      => 'Tagoon an komento sa paghir??',
'revdelete-hide-user'         => 'Tagoon an pangaran kan editor/IP',
'revdelete-hide-restricted'   => 'Ibali sa mga restriksy??n na ini an mga sysops asin iba pa',
'revdelete-suppress'          => 'Dai ipahil??ng an mga datos sa mga sysops asin sa mga iba pa',
'revdelete-unsuppress'        => 'Hal??on an mga restriksy??n sa mga ibinal??k na pagpakarhay',
'revdelete-log'               => 'Rason:',
'revdelete-submit'            => 'Ib??lang sa piniling pagpakarhay',
'revdelete-logentry'          => 'pigribayan an bisibilidad nin panyayari kan $1 [[$1]]',
'logdelete-logentry'          => 'Pigribayan an bisibilidad nin panyayari kan [[$1]]',
'revdelete-success'           => "'''Nakapwesto na an bisibilidad kan pagpakarhay.'''",
'logdelete-success'           => "'''Nakapuesto na an katal??an kan nangyari.'''",
'revdelete-uname'             => 'paragamit',

# Merge log
'revertmerge' => 'Suway??n',

# Diffs
'history-title'           => 'Uusip??n nin pagpakarh??y kan "$1"',
'difference'              => '(Kaibhan kan mga pagpakarhay)',
'lineno'                  => 'Linya $1:',
'compareselectedversions' => 'Ikomparar an mga piniling bersyon',
'editundo'                => 'ibalik',
'diff-multi'              => '({{PLURAL:$1|One intermediate revision|$1 intermediate revisions}} dai ipinahihiling.)',

# Search results
'searchresults'             => 'Hanapon an mga resulta',
'searchresults-title'       => 'Han??pon an resulta para sa "$1"',
'searchresulttext'          => 'Para sa iba pang impormasyon manonongod sa paghanap sa {{SITENAME}}, hilingon tab?? an [[{{MediaWiki:Helppage}}|{{int:help}}]].',
'searchsubtitle'            => "Hinanap mo an '''[[:$1]]'''",
'searchsubtitleinvalid'     => "Hinanap mo an '''$1'''",
'toomanymatches'            => 'Kadakol-dakol na angay an ipigbalik, probaran an ibang kahaputan',
'titlematches'              => 'Angay an t??tulo kan art??kulo',
'notitlematches'            => 'Mayong angay na t??tulo nin pahina',
'textmatches'               => 'Angay an teksto nin p??hina',
'notextmatches'             => 'Mayong ??ngay na teksto nin p??hina',
'prevn'                     => 'dating {{PLURAL:$1|$1}}',
'nextn'                     => 'sunod na {{PLURAL:$1|$1}}',
'viewprevnext'              => 'Hiling??n ($1 {{int:pipe-separator}} $2) ($3)',
'searchhelp-url'            => 'Help:Mga laog',
'search-result-size'        => '$1 ({{PLURAL:$2|1 tatar??mon|$2 mga tatar??mon}})',
'search-suggest'            => 'An boot mo: $1',
'search-interwiki-more'     => '(dakol pa)',
'search-mwsuggest-enabled'  => 'igwang mga suhestyon',
'search-mwsuggest-disabled' => 'mayong suhestyon',
'searchall'                 => 'gabos',
'showingresults'            => "Pigpapahiling sa bab?? sagkod sa {{PLURAL:$1|'''1''' resulta|'''$1''' mga resulta}} poon sa #'''$2'''.",
'showingresultsnum'         => "Pigpapahiling sa bab?? {{PLURAL:$3|'''1''' resulta|'''$3''' mga resulta}} poon sa #'''$2'''.",
'nonefound'                 => "'''Pagiromdom''': An mga prakasong paghanap pirmeng kawsa kan paghanap kan mga tataramon na kom??n arog kan \"may\" asin \"sa\", huli ta an mga ini dai naka??ndise, o sa pagpili kan sobra sa sarong tataramon (an mga p??hina sana na igw?? kan gabos na pighahanap na tataramon an maipapahiling sa resulta).",
'powersearch'               => 'Pinaor??g na pagh??nap',
'powersearch-field'         => 'Han??pon an',
'searchdisabled'            => 'Pigpopogolan m??na an paghanap sa {{SITENAME}}. Mientras tanto, pwede ka man maghanap sa Google. Giromdomon tab?? na an mga indise kan laog ninda sa {{SITENAME}} pwede ser na lum?? na.',

# Quickbar
'qbsettings'               => 'Quickbar',
'qbsettings-none'          => 'May??',
'qbsettings-fixedleft'     => 'Nakatak??d sa wal??',
'qbsettings-fixedright'    => 'Nakatak??d sa t??o',
'qbsettings-floatingleft'  => 'Nagl??lat??w sa wal??',
'qbsettings-floatingright' => 'Nagl??lat??w sa t??o',

# Preferences page
'preferences'               => 'Mga kab??tan',
'mypreferences'             => 'Mga kab??tan ko',
'prefs-edits'               => 'Bilang kan mga hir??:',
'prefsnologin'              => 'Dai nakalaog',
'prefsnologintext'          => 'Ika dapat si [[Special:UserLogin|nakalaog]] para makapwesto nin mga kab??tan nin par??gamit.',
'changepassword'            => 'Ribayan an sekretong panlaog',
'prefs-skin'                => "''Skin''",
'skin-preview'              => 'T??nawon',
'prefs-math'                => 'Mat',
'datedefault'               => 'Mayong kab??tan',
'prefs-datetime'            => 'Petsa asin oras',
'prefs-personal'            => 'Pambisto nin par??gamit',
'prefs-rc'                  => 'Mga kaaagi pa sanang pagribay',
'prefs-watchlist'           => 'Pigbabantayan',
'prefs-watchlist-days'      => 'M??ximong n??mero nin mga aldaw na ipapahiling sa lista nin mga pigbabantayan:',
'prefs-watchlist-edits'     => 'M??ximong n??mero nin pagbab??go na ipapahiling sa pinadakulang lista nin pigbabantayan:',
'prefs-misc'                => 'Lain',
'saveprefs'                 => 'Itagama',
'resetprefs'                => 'Ipwesto giraray',
'prefs-editing'             => 'Pighihira',
'rows'                      => 'Mga hilera:',
'columns'                   => 'Mga taytay:',
'searchresultshead'         => 'Han??pon',
'resultsperpage'            => 'Mga tam?? kada pahina:',
'contextlines'              => 'Mga linya kada tam??:',
'contextchars'              => 'Konteksto kada linya:',
'stub-threshold'            => 'Kasagkoran kan <a href="#" class="stub">takod kan tamb??</a> pigpopormato:',
'recentchangesdays'         => 'Mga ald??w na ipapahil??ng sa mga nakaka??gi pa san??ng pagbab??g??:',
'recentchangescount'        => 'Bilang nin mga paghir?? na ipapahil??ng sa mga nakaka??gi pa san??ng pagbab??g??:',
'savedprefs'                => 'Itinagama na an mga kab??tan mo.',
'timezonelegend'            => 'Zona nin oras',
'localtime'                 => 'Lokal na oras',
'servertime'                => "Oras kan ''server''",
'guesstimezone'             => "Bugtakan an ''browser''",
'allowemail'                => "Togotan an mga ''e''-surat hal?? sa ibang mga par??gamit",
'defaultns'                 => 'Maghil??ng m??na sa ining mga ngaran-espacio:',
'default'                   => 'pwestong normal',
'prefs-files'               => 'Mga dokumento',
'youremail'                 => 'E-koreo:',
'username'                  => 'Pangaran kan par??gamit:',
'uid'                       => 'ID kan par??gamit:',
'prefs-memberingroups'      => 'Miembro kan {{PLURAL:$1|grupo|grupos}}:',
'yourrealname'              => 'Totoong pangaran:',
'yourlanguage'              => 'Tataramon:',
'yourvariant'               => 'Bariante:',
'yournick'                  => 'Gah??:',
'badsig'                    => 'Dai pwede an b??gong pirmang ini; is??sog an mga HTML na tak??d.',
'badsiglength'              => 'Halab??on an gah??; kaipuhan dai mabab?? sa $1 na mga karakter.',
'gender-male'               => 'Lalaki',
'gender-female'             => 'Babai',
'email'                     => 'E-koreo',
'prefs-help-realname'       => 'Opsyonal an totoong pangaran asin kun itatao mo ini, gagamiton ini yangarig an mga sinurat mo maatribuir saimo.',
'prefs-help-email'          => 'Opsyonal an e-koreo, alagad pwede ka na masosog kan iba sa paagi kan saimong pahina o pahina nin olay na dai kinakaipuhan na ipabisto an identidad mo.',
'prefs-help-email-required' => 'Kaipuhan an e-koreo.',

# User rights
'userrights'               => 'Pagmaneho kan mga derecho nin paragamit',
'userrights-lookup-user'   => 'Magman??ho kan mga grupo nin par??gamit',
'userrights-user-editname' => 'Ilaog an pangaran kan par??gamit:',
'editusergroup'            => 'Hirah??n an mga Grupo kan Par??gamit',
'editinguser'              => "Pighihira an par??gamit na '''[[User:$1|$1]]''' ([[User talk:$1|{{int:talkpagelinktext}}]]{{int:pipe-separator}}[[Special:Contributions/$1|{{int:contribslink}}]])",
'userrights-editusergroup' => 'Hirah??n an mga grupo kan par??gamit',
'saveusergroups'           => 'Itagama an mga Grupo nin P??ragamit',
'userrights-groupsmember'  => 'Myembro kan:',
'userrights-reason'        => 'Rason:',

# Groups
'group'               => 'Grupo:',
'group-autoconfirmed' => 'Paragamit na sadiring nagkonpirma',
'group-bot'           => 'Mga bots',
'group-sysop'         => 'Mga sysop',
'group-bureaucrat'    => 'Mga bureaucrat',
'group-all'           => '(gabos)',

'group-autoconfirmed-member' => 'Enseguidang nakonpirmar na par??gamit',
'group-sysop-member'         => 'Opsys',
'group-bureaucrat-member'    => 'Bureaucrat',

'grouppage-autoconfirmed' => '{{ns:project}}:Mga enseguidang nakonpirmar na par??gamit',
'grouppage-bot'           => '{{ns:project}}:Mga bot',
'grouppage-sysop'         => '{{ns:project}}:Mga tagamat??',
'grouppage-bureaucrat'    => '{{ns:project}}:Mga bureaucrat',

# User rights log
'rightslog'      => 'Usip nin derechos nin paragamit',
'rightslogtext'  => 'Ini an historial kan mga pagbab??go sa mga derecho nin par??gamit.',
'rightslogentry' => 'Rinibayab an pagkamyembro ni $1 sa $2 sagkod sa $3',
'rightsnone'     => '(may??)',

# Associated actions - in the sentence "You do not have permission to X"
'action-edit' => 'liwat??n ining pahina',

# Recent changes
'nchanges'                          => '$1 {{PLURAL:$1|pagbab??go|mga pagbab??go}}',
'recentchanges'                     => 'Mga nakaka??gi pa san??ng pagbab??g??',
'recentchangestext'                 => 'Hanapon an mga pinahuring pagbab??go sa wiki digdi sa p??hinang ini.',
'recentchanges-feed-description'    => 'Han??pon an mga pinakahuring pagbab??go sa wiki sa hungit na ini.',
'rcnote'                            => "Mahihiling sa bab?? an {{PLURAL:$1| '''1''' pagbab??go|'''$1''' pagbab??go}} sa huring {{PLURAL:$2|na aldaw|'''$2''' na aldaw}}, sa $3.",
'rcnotefrom'                        => "Mahihiling sa bab?? an mga pagbab??go poon kan '''$2''' (hasta '''$1''' ipinapahiling).",
'rclistfrom'                        => 'Ipahil??ng an mga pagbab??go poon sa $1',
'rcshowhideminor'                   => '$1 saradit na pagligwat',
'rcshowhidebots'                    => '$1 mga bot',
'rcshowhideliu'                     => '$1 mga nakad??gos na paragamit',
'rcshowhideanons'                   => '$1 mga dai bistong paragamit',
'rcshowhidepatr'                    => '$1 pigbabantayan na mga pagliwat',
'rcshowhidemine'                    => '$1 mga pagliwat ko',
'rclinks'                           => 'Ipahil??ng an $1 huring pagbab??go sa ultimong $2 aldaw<br />$3',
'diff'                              => 'ib??',
'hist'                              => 'usip',
'hide'                              => 'Tag??on',
'show'                              => 'Ipahil??ng',
'minoreditletter'                   => 's',
'newpageletter'                     => 'B',
'boteditletter'                     => 'b',
'number_of_watching_users_pageview' => '[$1 nagbabantay na par??gamit]',
'rc_categories'                     => 'Limitado sa mga kategorya (suhayon nin "|")',
'rc_categories_any'                 => 'Daw?? ar??n',
'newsectionsummary'                 => '/* $1 */ b??gong seksyon',

# Recent changes linked
'recentchangeslinked'          => 'Mga angay na pagbab??go',
'recentchangeslinked-feed'     => 'Mga angay na pagbab??go',
'recentchangeslinked-toolbox'  => 'Mga angay na pagbab??go',
'recentchangeslinked-title'    => 'Mga pagbab??gong angay sa "$1"',
'recentchangeslinked-noresult' => 'Warang mga pagbabago sa mga pahinang nakatakod sa itinaong pagkalawig.',
'recentchangeslinked-summary'  => "Ini an lista nin mga pagsangli na ginibo pa sana sa mga pahinang nakatakod hal?? sa sarong espesyal na pahina (o sa mga myembro nin sarong espesyal na kategorya).
'''Maitom''' an mga pahinang [[Special:Pigbabantayan|pigbabantayan mo]].",

# Upload
'upload'                      => 'Ikarg?? an file',
'uploadbtn'                   => 'Ikarg?? an file',
'reuploaddesc'                => 'Magbalik sa pormulario kan pagkarga.',
'uploadnologin'               => 'Dai nakalaog',
'uploadnologintext'           => "Kaipuhan ika si [[Special:UserLogin|nakadagos]]
para makakarga nin mga ''file''.",
'upload_directory_read_only'  => 'An directoriong pagkarga na ($1) dai puedeng suratan kan serbidor nin web.',
'uploaderror'                 => 'Sal?? an pagkarga',
'uploadtext'                  => "Gamiton tab?? an pormulario sa bab?? para magkarga nin mga ''file'', para maghiling o maghanap kan mga ladawan na dating kinarga magduman tabi sa [[Special:FileList|lista nin mga pigkargang ''file'']], an mga kinarga asin mga pinar?? nakalista man sa [[Special:Log/upload|historial nin pagkarga]].

Kun boot mong ikaag an ladawan sa p??hina, gamiton tab?? an takod arog kan
'''<nowiki>[[</nowiki>{{ns:file}}<nowiki>:File.jpg]]</nowiki>''',
'''<nowiki>[[</nowiki>{{ns:file}}<nowiki>:File.png|alt text]]</nowiki>''' o
'''<nowiki>[[</nowiki>{{ns:media}}<nowiki>:File.ogg]]</nowiki>''' para sa direktong pagtakod sa ''file''.",
'uploadlog'                   => 'historial nin pagkarga',
'uploadlogpage'               => 'Ikarga an usip',
'uploadlogpagetext'           => "Mahihiling sa bab?? an lista kan mga pinakahuring ''file'' na kinarga.",
'filename'                    => 'Pangaran kan dokumento',
'filedesc'                    => 'Kagabsan',
'fileuploadsummary'           => 'Kagabsan:',
'filestatus'                  => 'Estatutong derechos nin paragamit:',
'filesource'                  => 'Ginikanan',
'uploadedfiles'               => "Mga ''file'' na ikinarg??",
'ignorewarning'               => 'Dai pagintiendehon an mga patanid asin itagama pa man an file',
'ignorewarnings'              => 'Paliman-limanon an mga tanid',
'minlength1'                  => "An pangaran kan mga ''file'' dapat na dai mabab?? sa sarong letra.",
'illegalfilename'             => "An ''filename'' na \"\$1\" igwang mga ''character'' na dai pwede sa mga titulo nin p??hina. T??wan tab?? nin b??gong pangaran an ''file'' asin probaran na ikarga giraray.",
'badfilename'                 => "Rinibayan an ''filename'' nin \"\$1\".",
'filetype-badmime'            => "Dai pigtotogotan na ikarga an mga ''file'' na MIME na \"\$1\" tipo.",
'filetype-missing'            => "Mayong ekstensy??n an ''file'' (arog kan \".jpg\").",
'large-file'                  => "Pigrerekomend??r na dapat an mga ''file'' bakong mas dakula sa $1; $2 an sokol kaining ''file''.",
'largefileserver'             => "Mas dakula an ''file'' sa pigtotogotan na sokol kan ''server''.",
'emptyfile'                   => "Garo mayong laog an ''file'' na kinarga mo. Pwede ser na sal?? ining tipo nin ''filename''. Isegurado tab?? kun talagang boot mong ikarga ining ''file''.",
'fileexists'                  => "Igwa nang ''file'' na may parehong pangaran sa ini, sosogon tab?? an '''<tt>[[:$1]]</tt>''' kun dai ka seguradong ribayan ini.
[[$1|thumb]]",
'fileexists-extension'        => "May ''file'' na may parehong pangaran: [[$2|thumb]]
* Pangaran kan pigkakargang ''file'': '''<tt>[[:$1]]</tt>'''
* Pangaran kan yaon nang ''file'': '''<tt>[[:$2]]</tt>'''
Magpili tab?? nin ibang pangaran.",
'fileexists-thumbnail-yes'    => "An ''file'' garo ladawan kan pinasadit ''(thumbnail)''. [[$1|thumb]]
Sosogon tab?? an ''file'' '''<tt>[[:$1]]</tt>'''.
Kun an sinosog na ''file'' iyo an parehong ladawan na nasa dating sokol, dai na kaipuhan magkarga nin iba pang retratito.",
'file-thumbnail-no'           => "An ''filename'' nagpopoon sa '''<tt>$1</tt>'''. Garo ladawan na pinasadit ini ''(thumbnail)''.
Kun igwa ka nin ladawan na may resolusy??n na maximo ikarga tab?? ini, kun dai, b??gohon tab?? an pangaran nin ''file''.",
'fileexists-forbidden'        => "Igwa nang ''file'' na may parehong pangaran; bumalik tabi asin ikarga an ''file'' sa b??gong pangaran [[File:$1|thumb|center|$1]]",
'fileexists-shared-forbidden' => "Igwa nang ''file'' na may parehong pangaran sa repositoryo nin mga bakas na ''file''; bumalik tab?? asin ikarga an ''file'' sa b??gong pangaran. [[File:$1|thumb|center|$1]]",
'successfulupload'            => 'Nakarga na',
'uploadwarning'               => 'Patanid sa pagkarga',
'savefile'                    => "Itagama an ''file''",
'uploadedimage'               => 'Ikinarga "[[$1]]"',
'overwroteimage'              => 'kinarga an bagong bersi??n kan "[[$1]]"',
'uploaddisabled'              => 'Pigpopond?? an mga pagkarg??',
'uploaddisabledtext'          => "Pigpopogolan an pagkarga nin mga ''file'' o sa ining wiki.",
'uploadscripted'              => "Ining ''file'' igwang HTML o kodang eskritura na pwede ser na salang mainterpretar kan ''browser''.",
'uploadvirus'                 => "May virus an ''file''! Mga detalye: $1",
'sourcefilename'              => 'Ginikanan kan pangaran kan dokumento',
'destfilename'                => "''Filename'' kan destinasy??n",
'watchthisupload'             => 'Bantayan ining pahina',
'filewasdeleted'              => "May sarong ''file'' na kapangaran kaini na dating pigkarga tapos pigpar?? man sana. Sosogon muna tab?? an $1 bago ikarga giraray ini.",
'upload-wasdeleted'           => "'''Patanid: Pigkakarga mo an ''file'' na dati nang pigpar??.'''

Isipon tabi kun maninigo an pagkarga giraray kaini.
An historial nin pagpar?? kan ''file'' nakakaag digdi para sa konbenyensya:",
'filename-bad-prefix'         => "An pangaran nin ''file'' na pigkakarga mo nagpopoon sa '''\"\$1\"''', sarong pangaran na dai makapaladawan na normalmente enseguidang pigtatao kan mga kamerang digital. Magpili tab?? nin pangaran nin ''file'' na mas makapaladawan.",

'upload-proto-error'      => 'Salang protocolo',
'upload-proto-error-text' => 'An pagkargang panharayo kaipuhan nin mga URLs na nagpopoon sa  <code>http://</code> o <code>ftp://</code>.',
'upload-file-error'       => 'Panlaog na sal??',
'upload-file-error-text'  => "May panlaog na sal?? kan pagprobar na maggibo nin temporaryong ''file'' sa ''server''.  Apodon tab?? an administrador nin sistema.",
'upload-misc-error'       => 'Dai naaaram na error sa pagkarga',
'upload-misc-error-text'  => 'May salang panyayari na dai aram kan pagkarga.  Sosogon tab?? kun tam?? an URL asin probaran giraray.  Kun an problema nagpeperseguir, apodon tab?? an sarong administrador nin sistema.',

# Some likely curl errors. More could be added from <http://curl.haxx.se/libcurl/c/libcurl-errors.html>
'upload-curl-error6'       => 'Dai naabot an URL',
'upload-curl-error6-text'  => 'Dai nabukas an URL na tinao.  Susugon tabi giraray na an  URL tama asin an sitio bakong raot.',
'upload-curl-error28'      => 'sobra na an pagkalawig kan pagkarga',
'upload-curl-error28-text' => 'Sobrang haloy an pagsimbag kan sitio. Susugon tabi na nagaandar an sitio, maghalat nin muna asin iprobar giraray. Tibaad moot mong magprobar sa panahon na bako masiadong okupado.',

'license'            => 'Paglilisensia',
'license-header'     => 'Paglilisensia',
'nolicense'          => 'Mayong pigpil??',
'license-nopreview'  => '(Mayong pat??naw)',
'upload_source_url'  => ' (sarong tama, na bukas sa publikong URL)',
'upload_source_file' => " (sarong ''file'' sa kompyuter mo)",

# Special:ListFiles
'listfiles_search_for'  => 'Han??pon an pangaran kan retrato:',
'imgfile'               => 'dokumento',
'listfiles'             => 'Lista kan dokumento',
'listfiles_date'        => 'Petsa',
'listfiles_name'        => 'Pangaran',
'listfiles_user'        => 'Par??gamit',
'listfiles_size'        => 'Sukol',
'listfiles_description' => 'Deskripsi??n',

# File description page
'file-anchor-link'          => 'File',
'filehist'                  => 'Uusip??n nin file',
'filehist-help'             => 'Magpindot kan petsa/oras para mahiling an hitsura kan file sa piniling oras.',
'filehist-deleteall'        => 'par??on gabos',
'filehist-deleteone'        => 'par??on ini',
'filehist-revert'           => 'ibalik',
'filehist-current'          => 'ngonyan',
'filehist-datetime'         => 'Petsa/Oras',
'filehist-user'             => 'Paragamit',
'filehist-dimensions'       => 'Mga dimensy??n',
'filehist-filesize'         => 'Sokol nin file',
'filehist-comment'          => 'Komento',
'imagelinks'                => 'Mga tak??d',
'linkstoimage'              => 'An mga minasunod na pahina nakatakod sa dokumentong ini:',
'nolinkstoimage'            => 'Mayong mga pahinang nakatakod sa dokumentong ini.',
'sharedupload'              => "Ining ''file'' sarong bakas na pagkarga asin pwede ser na gamiton kan ibang mga proyekto.",
'uploadnewversion-linktext' => 'Magkarga nin b??gong bersyon kaining file',

# File reversion
'filerevert'                => 'Ibalik an $1',
'filerevert-legend'         => 'Ibalik an dokumento',
'filerevert-intro'          => "Pigbabalik mo an '''[[Media:$1|$1]]''' sa [$4 version as of $3, $2].",
'filerevert-comment'        => 'Komento:',
'filerevert-defaultcomment' => 'Pigbalik sa bersyon sa ngonyan $2, $1',
'filerevert-submit'         => 'Ibalik',
'filerevert-success'        => "'''[[Media:$1|$1]]''' binalik sa [$4 version as of $3, $2].",
'filerevert-badversion'     => "Mayong dating bersy??n na lokal kaining ''file'' na may tat??k nin oras na arog sa tinao.",

# File deletion
'filedelete'             => 'Par??on an $1',
'filedelete-legend'      => 'Par??on an dokumento',
'filedelete-intro'       => "Pigpapar?? mo an '''[[Media:$1|$1]]'''.",
'filedelete-intro-old'   => "Pigpapar?? mo an bersyon kan '''[[Media:$1|$1]]''' sa ngonyan [$4 $3, $2].",
'filedelete-comment'     => 'Rason:',
'filedelete-submit'      => 'Par??on',
'filedelete-success'     => "An '''$1''' pinar?? na.",
'filedelete-success-old' => '<span class="plainlinks">An bersy??n kan \'\'\'[[Media:$1|$1]]\'\'\' na ngonyan na $3, pigpar?? na an $2.</span>',
'filedelete-nofile'      => "Mayo man an '''$1''' sa ining sitio.",
'filedelete-nofile-old'  => "Mayong bersy??n na nakaarchibo kan '''$1''' na igwang kan mga piniling ''character''.",

# MIME search
'mimesearch'         => 'Paghanap kan MIME',
'mimesearch-summary' => "An gamit kaining p??hina sa pagsasar?? kan mga ''file'' segun sa mga tipo nin MIME. Input: contenttype/subtype, e.g. <tt>image/jpeg</tt>.",
'mimetype'           => 'tipo nin MIME:',
'download'           => 'ideskarga',

# Unwatched pages
'unwatchedpages' => 'Dai pigbabantayan na mga pahina',

# List redirects
'listredirects' => 'Lista nin mga paglikay',

# Unused templates
'unusedtemplates'     => 'Mga templatong dai ginamit',
'unusedtemplatestext' => 'Piglilista kaining p??hina an gabos na mga p??hina sa templatong ngaran-espacio na dai nakakaag sa ibang p??hina. Giromdomon tab?? na sosogon an ibang mga takod sa mga templato b??go par??on iyan.',
'unusedtemplateswlh'  => 'ibang mga takod',

# Random page
'randompage'         => 'Daw?? arin na pahina',
'randompage-nopages' => 'Mayong p??hina an ngaran-espacio.',

# Random redirect
'randomredirect'         => 'Random na pagredirekta',
'randomredirect-nopages' => 'Mayong paglikay (redirects) didgi sa ngaran-espacio.',

# Statistics
'statistics'              => 'Mga Estadistiko',
'statistics-header-users' => 'Mga estadistiko nin par??gamit',
'statistics-mostpopular'  => 'mga pinaka pighiling na pahina',

'disambiguations'      => 'Mga pahinang klaripikasyon',
'disambiguationspage'  => 'Template:clarip',
'disambiguations-text' => "An mga nasunod na p??hina nakatakod sa sarong '''p??hina nin klaripikasyon'''.
Imbis, kaipuhan na nakatakod sinda sa maninigong tema.<br />
An p??hina pigkokonsiderar na p??hina nin klaripikasyon kun naggagamit ini nin templatong nakatakod sa [[MediaWiki:Disambiguationspage]]",

'doubleredirects'     => 'Dobleng mga redirekta',
'doubleredirectstext' => 'Piglilista kaining pahina an mga pahinang minalikay sa ibang pahinang paralikay. Kada raya may mga takod sa primero asin segundang likay, buda an destino kan segundong likay, na puro-pirme sarong "tunay " na pahinang destino, na dapat duman nakaturo an primerong likay.',

'brokenredirects'        => 'Putol na mga paglikay',
'brokenredirectstext'    => 'An nagsusunod naglilikay kan takod sa mga pahinang mayo man:',
'brokenredirects-edit'   => 'hirah??n',
'brokenredirects-delete' => 'par??on',

'withoutinterwiki'         => 'Mga pahinang dai nin mga takod sa ibang tataramon',
'withoutinterwiki-summary' => 'An mga nagsusunod na p??hina dai nakatak??d sa mga bersi??n na ibang tataram??n:',
'withoutinterwiki-submit'  => 'Ipahiling',

'fewestrevisions' => 'Mga artikulong may pinakadikit na pagpakarh??y',

# Miscellaneous special pages
'nbytes'                  => '$1 {{PLURAL:$1|byte|mga byte}}',
'ncategories'             => '$1 {{PLURAL:$1|kategorya|mga kategorya}}',
'nlinks'                  => '$1 {{PLURAL:$1|takod|mga takod}}',
'nmembers'                => '$1 {{PLURAL:$1|myembro|mga myembro}}',
'nrevisions'              => '$1 {{PLURAL:$1|pagpakarhay|mga pagpakarhay}}',
'nviews'                  => '$1 {{PLURAL:$1|hiling|mga hiling}}',
'specialpage-empty'       => 'Mayong mga resulta para sa report na ini.',
'lonelypages'             => 'Mga solong pahina',
'lonelypagestext'         => 'An mga minasunod na mga p??hina dai nakatakod sa ibang mga p??hina sa wiki na ini.',
'uncategorizedpages'      => 'Mga dai nakakategoryang p??hina',
'uncategorizedcategories' => 'Mga dai nakakategoryang kategorya',
'uncategorizedimages'     => 'Mga dai nakakategoryang retrato',
'uncategorizedtemplates'  => 'Mga templatong mayong kategorya',
'unusedcategories'        => 'Dai gamit na mga kategorya',
'unusedimages'            => 'Mga dokumentong dai nagamit',
'popularpages'            => 'Mga popular na p??hina',
'wantedcategories'        => 'Mga hinahanap na kategorya',
'wantedpages'             => 'Mga hinahanap na pahina',
'mostlinked'              => 'Pinakapigtatakodan na mga pahina',
'mostlinkedcategories'    => 'Pinakapigtatakodan na mga kategorya',
'mostlinkedtemplates'     => 'An mga pinakanatakodan na templato',
'mostcategories'          => 'Mga artikulong may pinaka dakol na kategorya',
'mostimages'              => 'Pinakapigtatakodan na files',
'mostrevisions'           => 'Mga artikulong may pinakadakol na pagpakarh??y',
'prefixindex'             => 'Mur?? nin prefiho',
'shortpages'              => 'Haral??pot na pahina',
'longpages'               => 'Mga halabang pahina',
'deadendpages'            => 'Mga pahinang mayong luwasan',
'deadendpagestext'        => 'An mga nagsusunod na pahina dai nakatakod sa mga ibang pahina sa ining wiki.',
'protectedpages'          => 'Mga protektadong pahina',
'protectedpagestext'      => 'An mga minasunod na pahina protektado na ibaly?? o hirah??n',
'protectedpagesempty'     => 'Mayong pang p??hina an napoprotehiran kaining mga parametros.',
'listusers'               => 'Lista nin paragamit',
'newpages'                => 'Mga b??gong pahina',
'newpages-username'       => 'Pangaran kan par??gamit:',
'ancientpages'            => 'Mga pinakalumang pahina',
'move'                    => 'Ibaly??',
'movethispage'            => 'Ibaly?? ining pahina',
'unusedimagestext'        => "Giromdomon tab?? na an mga ibang ''site'' pwedeng nakatakod sa ladawan na may direktong URL, pues pwede ser na nakalista pa digdi a pesar na ini piggagamit pa.",
'unusedcategoriestext'    => 'Igwa ining mga pahinang kategoria maski mayo man na iba pang pahina o kategoria an naggagamit kaiyan.',
'notargettitle'           => 'Mayong target',
'notargettext'            => 'Dai ka pa nagpili nin pahina o paragamit na muya mong gibohon an accion na ini.',

# Book sources
'booksources'               => 'Ginikanang libro',
'booksources-search-legend' => 'Maghanap nin mga ginikanang libro',
'booksources-go'            => 'Duman??n',
'booksources-text'          => "Mahihiling sa bab?? an lista kan mga takod sa ibang ''site'' na nagbenbenta nin mga b??go asin nagamit nang libro, asin pwede ser na igwa pang mga ibang impormasyon manonongod sa mga librong pighahanap mo:",

# Special:Log
'specialloguserlabel'  => 'Paragamit:',
'speciallogtitlelabel' => 'Titulo:',
'log'                  => 'Mga usip',
'all-logs-page'        => 'Gabos na usip',
'alllogstext'          => 'Sinalak na hihilngon kan gabos na historial na igwa sa {{SITENAME}}. Kun boot mong pasaditon an seleksyon magpili tab?? nin klase kan historial, ngaran nin par??gamit, o p??hinang naapektaran.',
'logempty'             => 'Mayong angay na bagay sa historial.',
'log-title-wildcard'   => 'Hanapon an mga titulong napopoon sa tekstong ini',

# Special:AllPages
'allpages'          => 'Gabos na pahina',
'alphaindexline'    => '$1 sagkod sa $2',
'nextpage'          => 'Sunod na pahina ($1)',
'prevpage'          => 'Nakaaging pahina ($1)',
'allpagesfrom'      => 'Ipahiling an mga p??hina poon sa:',
'allarticles'       => 'Gabos na mga artikulo',
'allinnamespace'    => 'Gabos na mga p??hina ($1 ngaran-espacio)',
'allnotinnamespace' => 'Gabos na mga p??hina (na wara sa $1 ngaran-espacio)',
'allpagesprev'      => 'Nakaagi',
'allpagesnext'      => 'Sunod',
'allpagessubmit'    => 'Duman??n',
'allpagesprefix'    => 'Ipahiling an mga pahinang may prefiho:',
'allpagesbadtitle'  => "Dai pwede an tinaong titulo kan p??hina o may prefihong para sa ibang tataramon o ibang wiki. Pwede ser na igwa ining sar?? o iba pang mga ''character'' na dai pwedeng gamiton sa mga titulo.",
'allpages-bad-ns'   => 'An {{SITENAME}} mayo man na ngaran-espacio na "$1".',

# Special:Categories
'categories'         => 'Mga Kategorya',
'categoriespagetext' => 'Igwa nin laog ang mga minasunod na kategorya.
[[Special:UnusedCategories|Unused categories]] are not shown here.
Also see [[Special:WantedCategories|wanted categories]].',

# Special:DeletedContributions
'deletedcontributions'       => 'Par??on an mga kontribusyon kan par??gamit',
'deletedcontributions-title' => 'Par??on an mga kontribusyon kan par??gamit',

# Special:LinkSearch
'linksearch'      => 'Mga panluwas na takod',
'linksearch-ok'   => 'Han??pon',
'linksearch-line' => '$1 an nakatakod sa $2',

# Special:ListUsers
'listusersfrom'      => 'Ipahiling an mga paragamit poon sa:',
'listusers-submit'   => 'Ipahiling',
'listusers-noresult' => 'Mayong nakuang par??gamit.',

# Special:Log/newusers
'newuserlog-create-entry' => 'B??gong par??gamit',

# Special:ListGroupRights
'listgrouprights-group'   => 'Grupo',
'listgrouprights-rights'  => 'Derechos',
'listgrouprights-members' => '(lista kan mga kaap??l)',

# E-mail user
'mailnologin'     => 'Mayong direksy??n nin destino',
'mailnologintext' => "Kaipuhan ika si [[Special:UserLogin|nakalaog]]
asin may marhay na ''e''-surat sa saimong [[Special:Preferences|Mga kab??tan]]
para makapadara nin ''e''-surat sa ibang par??gamit.",
'emailuser'       => 'E-koreohan ining paragamit',
'emailpage'       => 'E-suratan an par??gamit',
'emailpagetext'   => "Kun ining p??ragamit nagkaag nin marhay ''e''-surat sa saiyang mga kab??tan, an pormulario sa bab?? mapadara nin sarong mensahe.
An kinaag mong ''e''-surat sa saimong mga kab??tan nin paragamit mahihiling bilang na \"Hali ki\" kan ''e''-surat, para an recipiente pwedeng makasimbag.",
'usermailererror' => 'Error manonongod sa korreong binalik:',
'defemailsubject' => '{{SITENAME}} e-surat',
'noemailtitle'    => "May?? nin ''e''-surat",
'noemailtext'     => 'Dai nagpili nin tama na direccion nin e-surat an paragamit,
o habo magresibo nin e-surat sa ibang paragamit.',
'emailfrom'       => 'Poon',
'emailto'         => 'Hasta:',
'emailsubject'    => 'Tema',
'emailmessage'    => 'Mensahe',
'emailsend'       => 'Ipadara',
'emailccme'       => 'E-suratan ako nin kopya kan mga mensahe ko.',
'emailccsubject'  => 'Kopya kan saimong mensahe sa $1: $2',
'emailsent'       => 'Naipadar?? na an e-surat',
'emailsenttext'   => 'Naipadar?? na su e-surat mo.',

# Watchlist
'watchlist'            => 'Pigbabantayan ko',
'mywatchlist'          => 'Pigbabantayan ko',
'watchlistfor'         => "(para sa '''$1''')",
'nowatchlist'          => 'Mayo ka man na mga bagay saimong lista nin pigbabantayan.',
'watchlistanontext'    => 'Mag $1 tabi para mahiling o maghira nin mga bagay saimong lista nin mga pigbabantayan.',
'watchnologin'         => 'May?? sa laog',
'watchnologintext'     => 'Dapat ika si [[Special:UserLogin|nakalaog]] para puede kang magribay kan saimong lista nin mga pigbabantay??n.',
'addedwatch'           => 'Idinugang sa pigbabantayan',
'addedwatchtext'       => "Ining pahina \"[[:\$1]]\" dinugang sa saimong mga [[Special:Watchlist|Pigbabantayan]].
An mga pagbab??go sa p??hinang ini asin sa mga p??hinang olay na kapadis kaini ililista digdi,
asin an p??hina isusurat nin '''mah??bog''' sa [[Special:RecentChanges|lista nin mga kaaagi pa sanang pagbab??go]] para madal?? ining mahiling.

Kun boot mong hal??on an p??hina sa pigbabantayan mo sa maabot na panahon, pindoton an \"Pabayaan\" ''side bar''.",
'removedwatch'         => 'Pigtanggal sa pigbabantayan',
'removedwatchtext'     => 'An pahinang "[[:$1]]" pigtanggal sa saimong pigbabantayan.',
'watch'                => 'Bantay??n',
'watchthispage'        => 'Bantayan ining pahina',
'unwatch'              => 'Dai pagbantayan',
'unwatchthispage'      => 'Pondohon an pagbantay',
'notanarticle'         => 'Bakong p??hina nin laog',
'watchnochange'        => 'Mayo sa saimong mga pigbabantayan an nahira sa laog nin pinahiling na pagkalawig.',
'watchlist-details'    => '{{PLURAL:$1|$1 p??hina|$1 mga p??hina}} an pigbabantayan dai kabali an mga olay na p??hina.',
'wlheader-enotif'      => "* Nakaandar an paising ''e''-surat.",
'wlheader-showupdated' => "* An mga p??hinang pigb??go poon kan huri mong bisita nakasurat nin '''mah??bog'''",
'watchmethod-recent'   => 'Pigsososog an mga kaaagi pa sanang hir?? sa mga pigbabantayan na p??hina',
'watchmethod-list'     => 'Pigsososog an mga pigbabantayan na p??hina para mahiling an mga kaaagi pa sanan paghir??',
'watchlistcontains'    => 'An saimong lista nin pigbabantayan igwang $1 na {{PLURAL:$1|p??hina|mga p??hina}}.',
'iteminvalidname'      => "May problema sa bagay na '$1', sal?? an pangaran...",
'wlnote'               => "Mahihiling sa bab?? an {{PLURAL:$1|huring pagriribay|mga huring'''$1''' pagriribay}} sa ultimong {{PLURAL:$2|oras|'''$2''' mga oras}}.",
'wlshowlast'           => 'Ipahil??ng an ultimong $1 na oras $2 na aldaw $3',

# Displayed when you click the "watch" button and it is in the process of watching
'watching'   => 'Pigbabantayan...',
'unwatching' => 'Dai pigbabantayan...',

'enotif_mailer'                => '{{SITENAME}} Kartero nin isi',
'enotif_reset'                 => 'Markahan an gabos na mga binisitang pahina',
'enotif_newpagetext'           => 'B??go ining pahina.',
'enotif_impersonal_salutation' => '{{SITENAME}} par??gamit',
'changed'                      => 'pigb??go',
'created'                      => 'piggibo',
'enotif_subject'               => 'An pahinang {{SITENAME}} na $PAGETITLE binago $CHANGEDORCREATED ni $PAGEEDITOR',
'enotif_lastvisited'           => 'Hiling??n an $1 para sa gabos na mga pagb??go poon kan huring bisita.',
'enotif_lastdiff'              => 'Hiling??n an $1 tangarig mahiling an pagb??gong ini.',
'enotif_anon_editor'           => 'dai bistong par??gamit $1',
'enotif_body'                  => 'Nam??m??tan na $WATCHINGUSERNAME,


An p??hinang {{SITENAME}} na $PAGETITLE bin??go $CHANGEDORCREATED sa $PAGEEDITDATE ni $PAGEEDITOR, hiling??n an $PAGETITLE_URL para sa presenteng bersy??n.

$NEWPAGE

Sum??da kan editor: $PAGESUMMARY $PAGEMINOREDIT

Apodon an editor:
\'\'e\'\'-surat: $PAGEEDITOR_EMAIL
wiki: $PAGEEDITOR_WIKI

May?? nang iba pang paisi na ipapadara dapit sa iba pang mga pagbab??go kun dai mo bibisitahon giraray ining p??hina. Pwede mo man na ipwesto giraray an mga patanid para sa saimong mga p??hinang pigbabantayan duman sa saimong lista nin pigbabantayan.

             An maboot na sistema nin paisi kan {{SITENAME}}

--
Para b??gohon an pagpwesto kan saimong mga pigbabantayan, bisitahon an
{{fullurl:{{#special:Watchlist}}/edit}}

Komentaryo asin iba pang tabang:
{{fullurl:{{MediaWiki:Helppage}}}}',

# Delete
'deletepage'            => 'Paraon an pahina',
'confirm'               => 'Kompermaron',
'excontent'             => "Ini an dating laog: '$1'",
'excontentauthor'       => "ini an dating laog: '$1' (asin an unikong kontribuidor si '[[Special:Contributions/$2|$2]]')",
'exbeforeblank'         => "Ini an dating laog bag?? blinankoh??n: '$1'",
'exblank'               => 'mayong laog an p??hina',
'delete-legend'         => 'Paraon',
'historywarning'        => 'Patanid: An pahinang paparaon mo igwa nin uusip??n:',
'confirmdeletetext'     => 'Paparaon mo sa base nin datos ining pahina kasabay an gabos na mga uusip??n kaini.
Konpirmaron tab?? na talagang boot mong gibohon ini, nasasabotan mo an mga resulta, asin an piggigibo mo ini konporme sa
[[{{MediaWiki:Policy-url}}]].',
'actioncomplete'        => 'Nagibo na',
'deletedtext'           => 'Pigpar?? na an "<nowiki>$1</nowiki>" .
Hiling??n tab?? an $2 para mahiling an lista nin mga kaaagi pa sanang pagpar??.',
'deletedarticle'        => 'pigpar?? an "[[$1]]"',
'dellogpage'            => 'Usip nin pagpar??',
'dellogpagetext'        => 'Mahihiling sa bab?? an lista kan mga pinakahuring pagpar??.',
'deletionlog'           => 'Historial nin pagpar??',
'reverted'              => 'Ibinalik sa mas naenot na pagpakarhay',
'deletecomment'         => 'Rason:',
'deleteotherreason'     => 'Iba/dugang na rason:',
'deletereasonotherlist' => 'Ibang rason',

# Rollback
'rollback'         => 'Mga paghihira na pabal??k',
'rollback_short'   => 'pabal??k',
'rollbacklink'     => 'pabalik??n',
'rollbackfailed'   => 'Prakaso an pagbal??k',
'cantrollback'     => 'Dai pwedeng baw??on an hir??; an huring kontribuidor iyo an unikong par??surat kan p??hina.',
'alreadyrolled'    => 'Dai pwedeng ibalik an huring hir?? kan [[:$1]]
ni [[User:$2|$2]] ([[User talk:$2|Olay]]); may ibang par??gamit na naghir?? na o nagbalik na kaini.

Huring hir?? ni [[User:$3|$3]] ([[User talk:$3|Olay]]).',
'editcomment'      => "Ini an nakakaag na komentaryo sa paghir??: \"''\$1''\".",
'revertpage'       => 'Binaw?? na mga paghir?? kan [[Special:Contributions/$2|$2]] ([[User talk:$2|Magtaram]]); pigbalik sa dating bersy??n ni [[User:$1|$1]]',
'rollback-success' => 'Binaw?? na mga paghir?? ni $1; pigbalik sa dating bersy??n ni $2.',
'sessionfailure'   => "Garo may problema sa paglaog mo;
kinansel??r ining aksy??n bilang sarong paglikay kontra sa ''session hijacking''.
Pindot??n tab?? an \"back\" asin ikarga giraray an p??hinang ginikanan mo, dangan probar??n giraray.",

# Protect
'protectlogpage'              => 'Usip nin proteksyon',
'protectlogtext'              => 'May lista sa baba nin mga kandado asin panbawi kan kandado kan mga p??hina. Hilingon an [[Special:ProtectedPages|lista kan mga pigproprotektar??n na mga p??hina]] para mahiling an lista kan mga proteksi??n nin mga p??hina sa ngunyan na nakabuk??.',
'protectedarticle'            => 'protektado "[[$1]]"',
'modifiedarticleprotection'   => 'binago an nibel nin proteksi??n para sa "[[$1]]"',
'unprotectedarticle'          => 'Warang proteksi??n an "[[$1]]"',
'protect-title'               => 'Pigpupuesta an nibel nin proteksi??n sa "$1"',
'prot_1movedto2'              => '[[$1]] piglipat sa [[$2]]',
'protect-legend'              => 'Kompermaron an proteksyon',
'protectcomment'              => 'Rason:',
'protectexpiry'               => 'M??pas??:',
'protect_expiry_invalid'      => 'Dai pwede ining pahanon nin pagpas??.',
'protect_expiry_old'          => 'Nakalihis na an panahon nin pagpas??.',
'protect-text'                => "Pwede mong hiling??n asin b??gohon an tangga nin proteksyon digdi para sa pahina '''<nowiki>$1</nowiki>'''.",
'protect-locked-blocked'      => "Dai mo pwedeng b??gohon an mga tangga kan proteksyon mientras na ika nabab??gat. Ini an mga presenteng pwesto kan p??hina '''$1''':",
'protect-locked-dblock'       => "Dai puedeng ibalyo an mga nibel kan proteksi??n ta may actibong kandado sa base nin datos.
Ini an mga puesta sa ngunyan kaining p??hina '''$1''':",
'protect-locked-access'       => "Mayong permiso an account mo na magb??go kan tangga nin proteksyon.
Uya an ngonyan na mga pwesto kan pahinang '''$1''':",
'protect-cascadeon'           => 'Pigproprotektaran ining pahina sa ngonyan ta sabay ini sa mga nasunod na {{PLURAL:$1|pahina, na may|mga pahina, na may}} proteksyong katarata na nakaandar. Pwede mong b??gohon an tangga nin proteksyon kaining pahina, pero may?? ning epekto sa proteksyong katarata.',
'protect-default'             => '(normal)',
'protect-fallback'            => 'Mangipo kan "$1" na permiso',
'protect-level-autoconfirmed' => 'Bag??ton an mga paragamit na dai nakarehistro',
'protect-level-sysop'         => 'Para sa mga sysop sana',
'protect-summary-cascade'     => 'katarata',
'protect-expiring'            => 'm??pas?? sa $1 (UTC)',
'protect-cascade'             => 'Protektar??n an mga pahinang nakaiba sa pahinang ini (proteksyon katarata)',
'protect-cantedit'            => 'Dai mo mariribayan an mga tangg?? kan proteksyon kaining pahina huli ta may?? ka nin permiso na ligwat??n ini.',
'protect-expiry-options'      => '1ng ora:1 hour,1ng aldaw:1 day,1ng semana:1 week,2ng semana:2 weeks,1ng bulan:1 month,3ng bulan:3 months,6 na bulan:6 months,1ng taon:1 year,daing kasagkoran:infinite',
'restriction-type'            => 'Permiso:',
'restriction-level'           => 'Tangg?? nin restriksyon:',
'minimum-size'                => 'Pinaka sadit na sukol',
'maximum-size'                => 'Pinaka dakula na sukol:',
'pagesize'                    => '(oktetos)',

# Restrictions (nouns)
'restriction-edit'   => 'Hirah??n',
'restriction-move'   => 'Ibaly??',
'restriction-create' => 'Maggibo',
'restriction-upload' => 'Magkarga',

# Restriction levels
'restriction-level-sysop'         => 'protektado',
'restriction-level-autoconfirmed' => 'semi-protektado',
'restriction-level-all'           => 'maski anong nibel',

# Undelete
'undelete'                     => 'Hiling??n ang mga pinarang pahina',
'undeletepage'                 => 'Hiling??n asin ibalik an mga pinarang pahina',
'viewdeletedpage'              => 'Hiling??n an mga pinarang pahina',
'undeletepagetext'             => 'An mga minasunod na p??hina pigpar?? na alagad yaon pa sa archibo asin pwedeng ibalik. Dapat limpiahan an archibo kada periodo.',
'undeleteextrahelp'            => "Kun boot mong ibalik an enterong p??hina, dai markahan an gabos na mga kahon asin pindoton an '''''Restore'''''. Para magpili nin ib??balik, markahan an mga kahon na boot mong ibalik, asin pindoton an '''''Restore'''''. An pagpindot kan '''''Reset''''' makakalimpya nin kampo kan mga kommento
asin an gabos na mga kahon-marka.",
'undeleterevisions'            => '$1 {{PLURAL:$1|na pagriribay|na mga pagriribay}} na nakaarchibo',
'undeletehistory'              => "Kun ibabalik mo an p??hinang ini, an gabos na mga pagribay mabalik sa historial.
Kun igwang piggibong sarong b??gong p??hinang may parehong pangaran antes ka pagpar??, an presenteng pagribay maluwas sa historial, asin an presenteng pagribay kan tunay na p??hina dai enseguidang mariribayan. Giromdomon man tab?? na an mga restriksyon sa mga pagriribay nin ''file'' mawawar?? sa pagbalik.",
'undeleterevdel'               => "Dai madadagos an pagbalik kan pagpar?? kun an resulta kaini mapapar?? kan pagribay an nasa p??hinang pinaka itaas.
Sa mga kasong ini, dapat hal??on an mga marka o dai it??go an mga pinaka b??gong pigpar?? na mga pagribay. Dai ibabalik an mga pagribay kan mga ''file'' na mayo kan permisong hilingon.",
'undeletehistorynoadmin'       => 'Pigpar?? na ining p??hina. Mahihiling an rason sa epitome sa bab??, kasabay sa mga detalye kan mga par??gamit na naghira kaining p??hina bago pigpar??. Sa mga administrador sana maipapahiling an mga pagribay sa mismong tekstong ini.',
'undelete-revision'            => 'Pigpar??ng pagribay ni $3 kan $1 (sa $2):',
'undeleterevision-missing'     => 'Dai pwede o nawawarang pagribay. Pwede ser na sal?? an takod, o
binalik an na pagribay o hinal?? sa archibo.',
'undeletebtn'                  => 'Ibalik',
'undeletereset'                => 'Ipwesto giraray',
'undeletecomment'              => 'Komento:',
'undeletedarticle'             => 'Ibinalik "[[$1]]"',
'undeletedrevisions'           => '$1 na (mga) pagriribay an binal??k',
'undeletedrevisions-files'     => "$1 na (mga) pagribay asin $2 na (mga) binalik na ''file''",
'undeletedfiles'               => "$1 (mga) ''file'' an binalik",
'cannotundelete'               => 'Naprakaso an pagbalik kan pigpar??; pwede ser an binawi an pagpar?? kan p??hina kan ibang par??gamit.',
'undeletedpage'                => "'''binalik na an $1 '''

Ikonsultar an [[Special:Log/delete|historial nin pagpar??]] para mahiling an lista nin mga kaaaging pagpar?? asin pagbalik.",
'undelete-header'              => 'Hilingon an [[Special:Log/delete|historial kan pagpar??]] kan mga kaaagi pa sanang pinarang p??hina.',
'undelete-search-box'          => 'Hanap??n an mga pinarang pahina',
'undelete-search-prefix'       => 'Hiling??n an mga pahinang nagpopoon sa:',
'undelete-search-submit'       => 'Han??pon',
'undelete-no-results'          => 'Mayong nahanap na p??hinang angay sa archibo kan mga pigpar??.',
'undelete-filename-mismatch'   => "Dai pwedeng baw??on an pagpar?? sa ''file'' sa pagkarhay na may tat??k nin oras na $1: dai kapadis an ''filename''",
'undelete-bad-store-key'       => "Dai pwedeng baw??on an pagpar?? nin ''file'' na pagpakarhay na may tat??k nin oras na $1: nawara an ''file'' bago an pagpar??.",
'undelete-cleanup-error'       => "May sal?? pagpar?? kan ''file'' na archibong \"\$1\".",
'undelete-missing-filearchive' => "Dai maibalik an archibo kan ''file'' may na  ID $1 ta may?? ini sa base nin datos. Pwede ser na pigpar?? na ini.",
'undelete-error-short'         => "May sal?? sa pagbalik kan pigparang ''file'': $1",
'undelete-error-long'          => "May mga sal?? na nasabat mientras sa pigbabalik an pigparang ''file'':

$1",

# Namespace form on various pages
'namespace'      => 'Liang-liang:',
'invert'         => 'Pabaliktad??n an pinili',
'blanknamespace' => '(Principal)',

# Contributions
'contributions' => 'Mga kontribusyon kan par??gamit',
'mycontris'     => 'Mga kontribusyon ko',
'contribsub2'   => 'Para sa $1 ($2)',
'nocontribs'    => 'Mayong mga pagbabago na nahanap na kapadis sa ining mga criteria.',
'uctop'         => '(alituktok)',
'month'         => 'Poon bulan (asin mas amay):',
'year'          => 'Poon taon (asin mas amay):',

'sp-contributions-newbies'     => 'Ipahiling an mga kontribusi??n kan mga bagong kuenta sana',
'sp-contributions-newbies-sub' => 'Para sa mga b??gong account',
'sp-contributions-blocklog'    => 'Bag??ton an usip',
'sp-contributions-deleted'     => 'Par??on an mga kontribusyon kan par??gamit',
'sp-contributions-talk'        => 'Pag-olay??n',
'sp-contributions-userrights'  => 'Pagmaneho kan mga derecho nin paragamit',
'sp-contributions-search'      => 'Maghanap nin mga kontribusyon',
'sp-contributions-username'    => 'IP o ngaran kan par??gamit:',
'sp-contributions-submit'      => 'Han??pon',

# What links here
'whatlinkshere'         => 'An nakatakod digdi',
'whatlinkshere-title'   => 'Mga pahinang nakatakod sa $1',
'whatlinkshere-page'    => 'Pahina:',
'linkshere'             => "An mga minasunod na pahina nakatakod sa '''[[:$1]]''':",
'nolinkshere'           => "Mayong pahinang nakatakod sa '''[[:$1]]'''.",
'nolinkshere-ns'        => "Mayong pahina na nakatakod sa '''[[:$1]]''' sa piniling ngaran-espacio.",
'isredirect'            => 'ilikay an pahina',
'istemplate'            => 'kabali',
'whatlinkshere-prev'    => '{{PLURAL:$1|nakaagi|nakaaging $1}}',
'whatlinkshere-next'    => '{{PLURAL:$1|sunod|sunod na $1}}',
'whatlinkshere-links'   => '??? mga takod',
'whatlinkshere-filters' => 'Mga pans??r??',

# Block/unblock
'blockip'                     => 'Bag??ton an paragamit',
'blockiptext'                 => 'Gamiton an pormularyo sa bab?? para bagaton an pagsurat kan sarong espesipikong IP o ngaran nin par??gamit.
Dapat gibohon sana ini para maibitaran vandalismo, asin kompirmi sa [[{{MediaWiki:Policy-url}}|palakaw]].
Magkaag nin espisipikong rason (halimbawa, magtao nin ehemplo kan mga p??hinang rinaot).',
'ipaddress'                   => 'Direksy??n nin IP:',
'ipadressorusername'          => 'direksyon nin IP o gah??:',
'ipbexpiry'                   => 'Pas??:',
'ipbreason'                   => 'Rason:',
'ipbreasonotherlist'          => 'Ibang rason',
'ipbreason-dropdown'          => "*Mga komon na rason sa pagbagat
** Nagkakaag nin salang impormasyon
** Naghahal?? nin mga laog kan p??hina
** Nagkakaag nin mga takod na ''spam'' kan mga panluwas na ''site''
** Nagkakaag nin kalokohan/ringaw sa mga pahina
** Gaw??-gawing makatak??t/makauy??m
** Nag-aabuso nin mga lain-lain na ''account''
** Dai akong ngaran nin par??gamit",
'ipbanononly'                 => 'Bagaton an mga paragamit na anonimo sana',
'ipbcreateaccount'            => 'Pugulon an pagibo nin kuenta.',
'ipbemailban'                 => 'Pugolan ining paragamit na magpadara nin e-surat',
'ipbenableautoblock'          => 'Enseguidang bagaton an huring direccion nin  IP na ginamit kaining paragamit, asin kon ano pang ibang IP na proprobaran nindang gamiton',
'ipbsubmit'                   => 'Bag??ton ining par??gamit',
'ipbother'                    => 'Ibang oras:',
'ipboptions'                  => '2ng oras:2 hours,1ng aldaw:1 day,3ng aldaw:3 days,1ng semana:1 week,2ng semana:2 weeks,1ng bulan:1 month,3ng bulan:3 months,6 na bulan:6 months,1ng taon:1 year,daing kasagkoran:infinite',
'ipbotheroption'              => 'iba',
'ipbotherreason'              => 'Iba/dugang na ras??n:',
'ipbhidename'                 => 'Itago an ngaran in paragamit para dai mahiling sa historial nin pagbagat, nakaandar na lista nin binagat asin lista nin paragamit',
'badipaddress'                => 'Dai pwede ining IP',
'blockipsuccesssub'           => 'Nagibo na an pagbag??t',
'blockipsuccesstext'          => 'Binagat si [[Special:Contributions/$1|$1]].
<br />Hilingon an [[Special:IPBlockList|lista nin mga binagat na IP]] para marepaso an mga binagat.',
'ipb-edit-dropdown'           => 'Hirah??n an mga ras??n sa pagbabag??t',
'ipb-unblock-addr'            => 'Paagihon $1',
'ipb-unblock'                 => 'Bawion an pagbagat nin ngaran nin paragamit o direccion nin IP',
'ipb-blocklist-addr'          => 'Hiling??n an mga presenteng pagbagat ki $1',
'ipb-blocklist'               => 'Hilingon an mga presenteng binagat',
'unblockip'                   => 'Paagihon an par??gamit',
'unblockiptext'               => 'Gamiton an pormulario sa baba para puede giraray suratan an dating binagat na direccion nin IP address o ngaran nin paragamit.',
'ipusubmit'                   => 'Bawion an pagbagat kaining direcc????n',
'unblocked'                   => 'Binawi na an pagbagat ki [[User:$1|$1]]',
'unblocked-id'                => 'Hinali na an bagat na $1',
'ipblocklist'                 => 'Lista nin mga direksyon nin IP asin ngaran nin paragamit na binagat',
'ipblocklist-legend'          => 'Hanapon an sarong binag??t na paragamit',
'ipblocklist-username'        => 'Gah?? o direcci??n nin IP:',
'ipblocklist-submit'          => 'Han??pon',
'blocklistline'               => '$1, $2 binagat $3 ($4)',
'infiniteblock'               => 'daing siring',
'expiringblock'               => 'minapas?? $1 $2',
'anononlyblock'               => 'anon. sana',
'noautoblockblock'            => 'pigpopondo an enseguidang pagbagat',
'createaccountblock'          => 'binagat an paggibo nin kuenta',
'emailblock'                  => 'binag??t an e-surat',
'ipblocklist-empty'           => 'Mayong laog an lista nin mga binagat.',
'ipblocklist-no-results'      => 'Dai nabagat an hinagad na direccion nin IP o ngaran nin paragamit.',
'blocklink'                   => 'bag??ton',
'unblocklink'                 => 'paagihon',
'contribslink'                => 'mga kontrib',
'autoblocker'                 => 'Enseguidang binagat an saimong direccion nin IP ta kaaaging ginamit ini ni "[[User:$1|$1]]". An rason nin pagbagat ni $1: "$2"',
'blocklogpage'                => 'Usip nin pagbagat',
'blocklogentry'               => 'binagat na [[$1]] na may oras nin pagpaso na $2 $3',
'blocklogtext'                => 'Ini an historial kan pagbagat asin pagbawi sa pagbagat nin mga paragamit. An mga enseguidang binagat na direccion nin
IP dai nakalista digdi. Hilingon an [[Special:IPBlockList|IP lista nin mga binagat]] para sa lista nin mga nakaandar na mga pagpangalad buda mga pagbagat.',
'unblocklogentry'             => 'binawi an pagbagat $1',
'block-log-flags-anononly'    => 'Mga paragamit na an??nimo sana',
'block-log-flags-nocreate'    => "pigpopondoh??n an paggibo nin ''account'",
'block-log-flags-noautoblock' => 'pigpopondo an enseguidang pagbagat',
'block-log-flags-noemail'     => 'binag??t an e-surat',
'range_block_disabled'        => 'Pigpopondo an abilidad kan sysop na maggibo nin bagat na hilera.',
'ipb_expiry_invalid'          => 'Dai pwede ini bilang oras kan pagpas??.',
'ipb_already_blocked'         => 'Dating binagat na si "$1"',
'ipb_cant_unblock'            => 'Error: Dai nahanap an ID nin binagat na $1. Puede ser na dati nang binawi an pagbagat kaini.',
'ip_range_invalid'            => 'Dai pwede ining serye nin IP.',
'proxyblocker'                => 'Parabag??t na karibay',
'proxyblockreason'            => 'Binagat an saimong direccion nin IP ta ini sarong bukas na proxy. Apodon tabi an saimong Internet service provider o tech support asin ipaaram sainda ining seriosong problema nin seguridad.',
'proxyblocksuccess'           => 'Tapos.',
'sorbsreason'                 => 'An saimong direccion in IP nakalista na bukas na proxy sa DNSBL na piggagamit kaining sitio.',
'sorbs_create_account_reason' => "An IP mo nakalista bilang buk??s ''proxy'' sa DNSBL na piggagamit kaining ''site''. Dai ka pwedeng maggibo ''account''",

# Developer tools
'lockdb'              => 'Ikandado an base nin datos',
'unlockdb'            => 'Ibuk??s an base nin datos',
'lockconfirm'         => 'Iyo, boot kong ikandado an base kan datos.',
'unlockconfirm'       => 'Iyo, boot kong bukasan an base kan datos.',
'lockbtn'             => 'Isar?? an base nin datos',
'unlockbtn'           => 'Ibuk??s an base nin datos',
'locknoconfirm'       => 'Dai mo pigtsekan an kahon para sa kompirmasyon.',
'lockdbsuccesssub'    => 'Kinandado na an base nin datos',
'unlockdbsuccesssub'  => 'Hinal?? an kandado nin base nin datos',
'lockdbsuccesstext'   => 'Pigkandado na an base kan datos.
<br />Giromdomon na [[Special:UnlockDB|hal??on an kandado]] pagkatapos kan pagmantenir.',
'unlockdbsuccesstext' => 'Pigbukasan na an base nin datos.',
'lockfilenotwritable' => "An ''file'' na kandado kan base nin datos dai nasusuratan. Para makandado o mabukasan an bse nin datos, kaipuhan na nasusuratan ini kan web server.",
'databasenotlocked'   => 'Dai nakakandado an base nin datos.',

# Move page
'move-page-legend'        => 'Ibaly?? an p??hina',
'movepagetext'            => "Matat??wan nin b??gong pangaran an sarong pahina na pigbabalyo an gabos na uusip??n kaini gamit an pormularyo sa bab??.
An dating titulo magigin redirektang pahina sa b??gong titulo.
Dai bab??gohon an mga takod sa dating titulo kan pahina;
seguradohon tab?? na mayong doble o raot na mga redirekta.
Ika an responsable sa pagpaseguro na an mga takod nakatokd?? kun sain dapat.

Giromdomon tab?? na an pahina '''dai''' ibabaly?? kun igwa nang pahina sa b??gong titulo, apwera kun may?? ining laog o sarong redirekta asin uusip??n nin mga dating pagliwat. An boot sabihon kaini, pwede mong ibalik an dating pangaran kan pahina kun sain ini pigribayan nin pangaran kun napasal?? ka, asin dai mo man sosoknongan an presenteng pahina.

'''PATANID!'''
Pwede na dakul?? asin dai seguradong pagb??go ini kan sarong popular na pahina; seguradohon tab?? na aram mo an konsekwensya kaini bago magdagos.",
'movepagetalktext'        => "An kapadis na olay na p??hina enseguidang ibabalyo kasabay kaini '''kun:'''
*Igwa nang may laog na olay na p??hina na may parehong pangaran, o
*Hal??on mo an marka sa kahon sa bab??.

Sa mga kasong iyan, kaipuhan mong ibalyo o isalak an p??hina nin mano-mano kun boot mo.",
'movearticle'             => 'Ibaly?? an pahina:',
'movenologin'             => 'May?? sa laog',
'movenologintext'         => 'Kaipuhan na rehistradong par??gamit ka asin si [[Special:UserLogin|nakalaog]] tangarig makabaly?? ka nin p??hina.',
'movenotallowed'          => 'May?? kang permiso na ibaly?? an mga pahina sa wiki na ini.',
'newtitle'                => 'Sa b??gong titulong:',
'move-watch'              => 'Bantay??n ining pahina',
'movepagebtn'             => 'Ibaly?? an pahina',
'pagemovedsub'            => 'Naibaly?? na',
'movepage-moved'          => '\'\'\'Naihub?? na an "$1" sa "$2"\'\'\'',
'articleexists'           => 'Igwa nang pahina sa parehong pangaran, o dai pwede an pangaran na pigpil?? mo.
Magpil?? tab?? nin ibang pangaran.',
'talkexists'              => "'''Ibinalyo na an mismong pahina, alagad dai naibalyo an pahina nin orolay ta igwa na kaini sa b??gong titulo. Pagsaroon tab?? ining duwa nin mano-mano.'''",
'movedto'                 => 'piglipat sa',
'movetalk'                => 'Ibalyo an pahinang orolayan na nakaasociar',
'1movedto2'               => '[[$1]] piglipat sa [[$2]]',
'1movedto2_redir'         => '[[$1]] pigbaly?? sa [[$2]] sa paagi kan pagredirekta',
'movelogpage'             => 'Ibaly?? an usip',
'movelogpagetext'         => 'Nasa ibaba an lista kan pahinang pigbaly??.',
'movereason'              => 'Rason:',
'revertmove'              => 'ibal??k',
'delete_and_move'         => 'Par??on asin ibaly??',
'delete_and_move_text'    => '==Kaipuhan na par??on==

Igwa nang p??hina na "[[:$1]]". Gusto mong par??on ini tangarig maibaly???',
'delete_and_move_confirm' => 'Iyo, par??on an pahina',
'delete_and_move_reason'  => 'Pinar?? tangarig maibaly??',
'selfmove'                => 'Pareho an p??hinang ginikanan asin destinasyon; dai pwedeng ibaly?? an sarong p??hina sa sadiri.',

# Export
'export'            => 'Iluwas an mga pahina',
'exporttext'        => 'Pwede mong ipadara an teksto asin historya nin paghir?? kan sarong partikular na p??hina o grupo nin mga p??hina na nakapatos sa ibang XML. Pwede ining ipadara sa ibang wiki gamit an MediaWiki sa paagi kan [[Special:Import|pagpadara nin p??hina]].

Para makapadara nin mga p??hina, ilaag an mga titulo sa kahon para sa teksto sa bab??, sarong titulo kada linya, dangan pil??on kun boot mo presenteng bersy??n asin dating bersy??n, na may mga linya kan historya, o an presenteng bersy??n sana na may impormasyon manonongod sa huring hir??.

Sa kaso kan huri, pwede ka man na maggamit nin takod, arog kan [[{{#Special:Export}}/{{MediaWiki:Mainpage}}]] para sa p??hinang "[[{{MediaWiki:Mainpage}}]]".',
'exportcuronly'     => 'Mga presenteng pagpakarhay sana an ibali, bakong an enterong historya',
'exportnohistory'   => "----
'''Paisi:''' Dai pigpatogotan an pagpadara kan enterong historya kan mga p??hina sa paagi kaining forma huli sa mga ras??n dapit sa pagsagibo kaini.",
'export-submit'     => 'Ipaluw??s',
'export-addcattext' => 'Magdugang nin mga pahina sa kategoryang ini:',
'export-addcat'     => 'Magdugang',
'export-download'   => "Hapot??n ku gustong itagama bilang sarong ''file''",

# Namespace 8 related
'allmessages'               => 'Mga mensahe sa sistema',
'allmessagesname'           => 'Pangaran',
'allmessagesdefault'        => 'Tekstong normal',
'allmessagescurrent'        => 'Presenteng teksto',
'allmessagestext'           => 'Ini an lista kan mga mensahe sa sistema sa ngaran-espacio na MediaWiki.
Please visit [http://www.mediawiki.org/wiki/Localisation MediaWiki Localisation] and [http://translatewiki.net translatewiki.net] if you wish to contribute to the generic MediaWiki localisation.',
'allmessagesnotsupportedDB' => "Dai pwedeng gamiton an '''{{ns:special}}:Allmessages''' ta sarado an '''\$wgUseDatabaseMessages'''.",

# Thumbnails
'thumbnail-more'           => 'Padakulaon',
'filemissing'              => "Nawawar?? an ''file''",
'thumbnail_error'          => 'Error sa paggigibo kan retratito: $1',
'djvu_page_error'          => 'luwas sa serye an p??hina kan DjVu',
'djvu_no_xml'              => 'Dai makua an XML para sa DjVu file',
'thumbnail_invalid_params' => 'Dai pwede an mga par??metro kaining retratito',
'thumbnail_dest_directory' => 'Dai makagibo kan destinasyon kan direktoryo',

# Special:Import
'import'                     => 'Ilaog an mga p??hina',
'importinterwiki'            => 'Ipadara an Transwiki',
'import-interwiki-history'   => 'Kopyahon an gabos na mga bersy??n para sa p??hinang ini',
'import-interwiki-submit'    => 'Ipalaog',
'import-interwiki-namespace' => 'Ibaly?? an mga p??hina sa ngaran-espacio:',
'import-comment'             => 'Komento:',
'importtext'                 => "Ipadara tab?? an ''file'' hali sa ginikanan na wiki gamit an Special:Export utility, itagama ini sa saimong disk dangan ikarga iyan digdi.",
'importstart'                => 'Piglalaog an mga p??hina...',
'import-revision-count'      => '$1 {{PLURAL:$1|pagpakarhay|mga pagpakarhay}}',
'importnopages'              => 'Mayong mga p??hinang ipapadara.',
'importfailed'               => 'Bakong matriumpo an pagpadara: $1',
'importunknownsource'        => 'Dai aram an tipo kan gigikanan kan ipapadara',
'importcantopen'             => "Dai mabukasan an pigpadarang ''file''",
'importbadinterwiki'         => 'Sal?? an takod na interwiki',
'importnotext'               => 'Mayong laog o mayong teksto',
'importsuccess'              => 'Matriumpo an pagpadara!',
'importnofile'               => "Mayong ipinadarang ''file'' an naikarga.",

# Import log
'importlogpage'                    => 'Usip nin pagpalaog',
'import-logentry-upload'           => "pigpadara an [[$1]] kan pagkarga nin ''file''",
'import-logentry-upload-detail'    => '$1 mga pagpakarh??y',
'import-logentry-interwiki'        => 'na-transwiki an $1',
'import-logentry-interwiki-detail' => '$1 mga pagpakarh??y hal?? sa $2',

# Tooltip help for the actions
'tooltip-pt-userpage'             => 'An sak??ng pahina',
'tooltip-pt-anonuserpage'         => 'An p??hina nin p??ragamit para sa ip na pighihira mo bilang',
'tooltip-pt-mytalk'               => 'Pahina nin sak??ng olay',
'tooltip-pt-anontalk'             => 'Mga olay manonongod sa mga hira hal?? sa ip na ini',
'tooltip-pt-preferences'          => 'Mga kab??tan ko',
'tooltip-pt-watchlist'            => 'Lista nin mga pahina na pigbabantayan an mga pagbab??go',
'tooltip-pt-mycontris'            => 'Lista kan mga kab??tan ko',
'tooltip-pt-login'                => 'Pigaagda kang maglaog, alagad, bako man ining piriritan.',
'tooltip-pt-anonlogin'            => 'Pig-aagda kang maglaog, alagad, bak?? man ining piriritan.',
'tooltip-pt-logout'               => 'Magluwas',
'tooltip-ca-talk'                 => 'Olay sa pahina nin laog',
'tooltip-ca-edit'                 => 'Pwede mong hirah??n ining pahina. Gamiton tabi an pat??naw na butones bago an pagtagama.',
'tooltip-ca-addsection'           => 'Magdugang nin komento sa or??lay na ini.',
'tooltip-ca-viewsource'           => 'Protektado ining pahina. Pwede mong hiling??n an ginikanan.',
'tooltip-ca-history'              => 'Mga nakaaging bersyon kaining pahina',
'tooltip-ca-protect'              => 'Protektah??n ining pahina',
'tooltip-ca-delete'               => 'Paraon an pahinang ini',
'tooltip-ca-undelete'             => 'Baw??on an mga hir?? na piggibo sa p??hinang ini b??go ini pigpar??',
'tooltip-ca-move'                 => 'Ibalyo an pahinang ini',
'tooltip-ca-watch'                => 'Idugang ining p??hina sa pigbabantayan mo',
'tooltip-ca-unwatch'              => 'Halion ining pahina sa lista nin pigbabantayan mo',
'tooltip-search'                  => 'Han??pon an {{SITENAME}}',
'tooltip-search-go'               => 'Magduman sa pahina na igwa kaining eksaktong pangaran',
'tooltip-search-fulltext'         => 'Han??pon an mga pahina para sa tekstong ini',
'tooltip-p-logo'                  => 'Pangenot na Pahina',
'tooltip-n-mainpage'              => 'Bisitahon an Pangenot na Pahina',
'tooltip-n-mainpage-description'  => 'Dal??won an pangenot na pahina',
'tooltip-n-portal'                => 'Manonongod sa proyekto, an pwede mong gibohon, kun sain mo pwedeng hanapon an mga bagay',
'tooltip-n-currentevents'         => 'Hanapon an mga impormasyon na ginikanan sa mga presenteng panyayari',
'tooltip-n-recentchanges'         => 'An lista nin mga b??gong pagbab??go sa wiki.',
'tooltip-n-randompage'            => 'Magkarga nin b??gong pahina',
'tooltip-n-help'                  => 'An lugar para makatalastas',
'tooltip-t-whatlinkshere'         => 'Lista nin gabos na pahinang wiki na nakatak??d digdi',
'tooltip-t-recentchangeslinked'   => 'Mga kaaaging pagbab??go sa mga pahinang nakatakod digdi',
'tooltip-feed-rss'                => 'Hungit na RSS sa pahinang ini',
'tooltip-feed-atom'               => 'Hungit na atomo sa pahinang ini',
'tooltip-t-contributions'         => 'Hiling??n an lista kan mga kontribusyon kaining paragamit',
'tooltip-t-emailuser'             => 'Padarahan nin e-koreo an paragamit na ini',
'tooltip-t-upload'                => 'Ikarg?? an mga ladawan o media files',
'tooltip-t-specialpages'          => 'Lista kan gabos na mga espesyal na pahina',
'tooltip-t-print'                 => 'Naipiprint na bersyon kaining pahina',
'tooltip-t-permalink'             => 'Permanenteng takod sa bersyon kaining p??hina',
'tooltip-ca-nstab-main'           => 'Hiling??n an pahina nin laog',
'tooltip-ca-nstab-user'           => 'Hiling??n an pahina nin paragamit',
'tooltip-ca-nstab-media'          => "Hiling??n an pahina kan ''media''",
'tooltip-ca-nstab-special'        => 'Pahinang espesyal ini, dai mo ini pwedeng hirah??n',
'tooltip-ca-nstab-project'        => 'Hiling??n an pahina kan proyekto',
'tooltip-ca-nstab-image'          => 'Hiling??n an pahina kan retrato',
'tooltip-ca-nstab-mediawiki'      => "Hiling??n an ''system message''",
'tooltip-ca-nstab-template'       => 'Hiling??n an templato',
'tooltip-ca-nstab-help'           => 'Hiling??n an pahina nin tabang',
'tooltip-ca-nstab-category'       => 'Hiling??n an pahina kan kategorya',
'tooltip-minoredit'               => 'Markah??n ini bilang sadit na pagligwat',
'tooltip-save'                    => 'Itag??ma an saimong mga pagbab??go',
'tooltip-preview'                 => 'T??nawon an saimong mga pagbab??go, gamit??n tab?? ini b??go magtag??ma!',
'tooltip-diff'                    => 'Ipahil??ng an mga pagbab??gong ginibo mo sa teksto.',
'tooltip-compareselectedversions' => 'Hilingon an mga kaibh??n sa duwang piniling bersy??n kaining p??hina.',
'tooltip-watch'                   => 'Idugang ining pahina sa pigbabantayan mo',
'tooltip-recreate'                => 'Gibohon giraray an p??hina maski na napar?? na ini',
'tooltip-upload'                  => 'P??nan an pagkarga',

# Stylesheets
'common.css'   => '/** an CSS na pigbugtak digdi maiaaplikar sa gabos na mga skin */',
'monobook.css' => '/* an CSS na pigbugtak digdi makakaapektar sa mga par??gamit kan Monobook skin */',

# Scripts
'common.js'   => '/* Arin man na JavaScript digdi maikakarga para sa gabos na mga par??gamit sa kada karga kan p??hina. */',
'monobook.js' => '/* Deprecado; gamiton an [[MediaWiki:common.js]] */',

# Metadata
'nodublincore'      => "Pigpopogolan an Dublin Core RDF na metadata para sa ''server'' na ini.",
'nocreativecommons' => "Pigpopogolan an Creative Commons RDF na metadata para sa ''server'' na ini.",
'notacceptable'     => "Dai pwedeng magtao nin datos an ''wiki server'' sa ''format'' na pwedeng basahon kan kompyuter mo.",

# Attribution
'anonymous'        => '(Mga)paragamit na an??nimo kan {{SITENAME}}',
'siteuser'         => 'Paragamit kan {{SITENAME}} na si $1',
'lastmodifiedatby' => 'Ining p??hina huring binago sa $2, $1 ni $3.',
'othercontribs'    => 'Binase ini sa trabaho ni $1.',
'others'           => 'iba pa',
'siteusers'        => '(Mga)paragamit kan {{SITENAME}} na si $1',
'creditspage'      => 'Mga kr??dito nin p??hina',
'nocredits'        => 'Mayong talastas kan kredito para sa ining pahina.',

# Spam protection
'spamprotectiontitle' => "Proteksyon kan ''spam filter''",
'spamprotectiontext'  => "An p??hinang gusto mong itagama pigbagat kan ''spam filter''. Kawsa gayod ini kan sarong takod sa sarong panluwas na 'site'.",
'spamprotectionmatch' => "An minasunod na teksto iyo an nagbukas kan ''spam filter'' mi: $1",
'spambot_username'    => 'paglimpya nin spam sa MediaWiki',
'spam_reverting'      => 'Mabalik sa huring bersion na mayong takod sa $1',
'spam_blanking'       => 'An gabos na mga pahir?? na may takod sa $1, pigblablanko',

# Info page
'infosubtitle'   => 'Impormasy??n kan p??hina',
'numedits'       => 'Bilang kan mga hira (artikulo): $1',
'numtalkedits'   => 'Bilang kan mga hir?? (p??hina kan or??lay): $1',
'numwatchers'    => 'Bilang kan mga par??bantay: $1',
'numauthors'     => 'Bilang kan mga par??surat na ib?? (p??hina): $1',
'numtalkauthors' => 'Bilang kan mga par??surat na ib?? (p??hina kan or??lay): $1',

# Skin names
'skinname-standard' => 'Klasiko',
'skinname-simple'   => 'Simple',
'skinname-modern'   => 'Bago',

# Math options
'mw_math_png'    => 'Ita?? pirmi an PNG',
'mw_math_simple' => 'HTML kun simple sana o PNG kun bak??',
'mw_math_html'   => 'HTML kun posible o PNG kun bak??',
'mw_math_source' => "Pabayaan na bilang TeX (para sa mga ''browser'' na teksto)",
'mw_math_modern' => "Pigrerekomend??r para sa mga modernong ''browser''",
'mw_math_mathml' => 'MathML kun posible (experimental)',

# Math errors
'math_failure'          => 'Nagprakaso an pagat??d-at??d',
'math_unknown_error'    => 'dai aram an sal??',
'math_unknown_function' => 'Dai aram an gamit',
'math_lexing_error'     => 'may sal?? sa analisador l??xico',
'math_syntax_error'     => 'may sal?? sa analisador nin sintaksis',
'math_image_error'      => 'Nagprakaso an konbersyon kan PNG; sosogon tab?? an pagkaag nin latex, dvips, gs, asin ikonbertir',
'math_bad_tmpdir'       => 'Dai masuratan o magibo an direktoryo nin mat temp',
'math_bad_output'       => 'Dai masuratan o magibo an direktoryo kan salida nin math',
'math_notexvc'          => 'May nawawarang texvc na ehekutable; hiling??n tab?? an mat/README para makonpigurar.',

# Patrolling
'markaspatrolleddiff'                 => 'Markah??n na pigpapatrulya',
'markaspatrolledtext'                 => 'Markahan ining pahina na pigpapatrulya',
'markedaspatrolled'                   => 'Minarkah??n na pigpapatruly??',
'markedaspatrolledtext'               => 'Minarkahan bilang pigpapatrulya an piniling pagpakaray.',
'rcpatroldisabled'                    => 'Pigpopogolan an mga Pagpatrulya kan mga Kaaaging Pagbab??go',
'rcpatroldisabledtext'                => 'Pigpopogulan muna an Pagpatrulya kan mga Kaaaging Pagbabago.',
'markedaspatrollederror'              => 'Dai pwedeng markah??n na pigpapatrulya',
'markedaspatrollederrortext'          => 'Kaipuhan mong magpili nin pagpakaray na mamarkahon na pigpapatrulya.',
'markedaspatrollederror-noautopatrol' => 'Dai ka pigtotogotan na markah??n an sadiri mong pabab??go na pigpapatrulya.',

# Patrol log
'patrol-log-page' => 'Bantay??n an historial',
'patrol-log-line' => 'minarkahan an $1 kan $2 na pigpapatrulya $3',
'patrol-log-auto' => '(enseguida)',

# Image deletion
'deletedrevision'                 => 'Pigpar?? an lumang pagribay na $1.',
'filedeleteerror-short'           => "Sal?? sa pagpar?? kan ''file'': $1",
'filedeleteerror-long'            => "May mga nasabat na sal?? mientras na pigpapar?? an ''file'':

$1",
'filedelete-missing'              => "An ''file'' na \"\$1\" dai pwedeng paraon, ta may?? man ini.",
'filedelete-old-unregistered'     => 'An piniling pagpakaray na "$1" wara man sa base nin datos.',
'filedelete-current-unregistered' => "May?? sa base nin datos an piniling ''file'' na \"\$1\".",
'filedelete-archive-read-only'    => 'An direktoryong archibo na "$1" dai nasusuratan kan webserver.',

# Browsing diffs
'previousdiff' => '??? Naka??ging kaibh??n',
'nextdiff'     => 'Sunod na kaibh??n ???',

# Media information
'mediawarning'         => "'''Patanid''': May ''malicious code'' sa ''file'' na ini, kun gigibohon ini pwede ser na maraot an saimong ''system''.",
'imagemaxsize'         => 'Limitaran an mga ladawan sa mga p??hinang deskripsyon kan ladawan sa:',
'thumbsize'            => 'Sokol nin retratito:',
'widthheightpage'      => '$1??$2, $3 mga pahina',
'file-info'            => "(sokol kan ''file'': $1, tipo nin MIME: $2)",
'file-info-size'       => "($1 ?? $2 na pixel, sokol kan ''file'': $3, tipo nin MIME: $4)",
'file-nohires'         => '<small>Mayong mas halangkaw na resolusy??n.</small>',
'svg-long-desc'        => '(file na SVG, haros $1 ?? $2 pixels, sokol kan file: $3)',
'show-big-image'       => 'Todong resolusyon',
'show-big-image-thumb' => '<small>Sokol kan pat??naw: $1 ?? $2  na pixel</small>',

# Special:NewFiles
'newimages'             => 'Galeria nin mga b??gong file',
'imagelisttext'         => "Mahihiling sa baba an lista nin mga  '''$1''' {{PLURAL:$1|file|files}} na linain $2.",
'showhidebots'          => '($1 na bots)',
'noimages'              => 'Mayong mahihiling.',
'ilsubmit'              => 'Han??pon',
'bydate'                => 'sa petsa',
'sp-newimages-showfrom' => 'Hiling??n an mga retratong nagpopoon sa $1',

# Bad image list
'bad_image_list' => 'An pormato iyo an minasunod:

An mga nakalista sana (mga linyang nagpopoon sa *) an pigkokonsiderar.
An enot na takod sa linya seguradong sarong takod sa sarong salang file.
Ano man na takod sa parehong linyang ini pigkokonsiderar na eksepsyon, i.e. mga pahina na may file sa laog nin linya.',

# Metadata
'metadata'          => 'Metadatos',
'metadata-help'     => 'Igwang dugang na impormasyon ining file na pwedeng idinugang hali sa digital camera o scanner na piggamit tangarig magibo ini. Kun namodipikar na file hali sa orihinal nyang kamogtakan, an ibang mga detalye pwedeng dai mahiling sa minodipikar na ladawan.',
'metadata-expand'   => 'Ipahiling an mga pinahalaba na detalye',
'metadata-collapse' => 'Itago an mga pinahalaba na detalye',

# EXIF tags
'exif-imagewidth'       => 'Lakbang',
'exif-imagelength'      => 'Langkaw',
'exif-imagedescription' => 'Titulo kan retrato',
'exif-make'             => 'Tagagibo nin kamera',
'exif-model'            => 'Modelo nin kamera',
'exif-artist'           => 'Par??surat',
'exif-usercomment'      => 'Mga komento kan par??gamit',
'exif-aperturevalue'    => 'Pagkabuk??s',
'exif-brightnessvalue'  => 'Kaliwanagan',
'exif-lightsource'      => 'Ginikanan nin liwanag',
'exif-flash'            => 'Kikil??t',
'exif-flashenergy'      => 'Kakusogan nin kikil??t',
'exif-filesource'       => "Ginikanan nin ''file''",
'exif-contrast'         => 'Kontraste',
'exif-imageuniqueid'    => 'Unikong ID kan ladawan',
'exif-gpstrack'         => 'Direksy??n nin paghir??',
'exif-gpsimgdirection'  => 'Direksy??n nin ladawan',
'exif-gpsdestdistance'  => 'Distansya sa destinasyon',

'exif-unknowndate' => 'Dai aram an petsa',

'exif-componentsconfiguration-0' => 'may?? man ini',

'exif-subjectdistance-value' => '$1 metros',

'exif-meteringmode-0'   => 'Dai aram',
'exif-meteringmode-255' => 'Iba pa',

'exif-lightsource-4'   => 'Kitkil??t',
'exif-lightsource-9'   => 'Magay??n na panah??n',
'exif-lightsource-255' => 'Mga ibang ginikanan nin ilaw',

'exif-focalplaneresolutionunit-2' => 'pulgada',

'exif-scenetype-1' => 'Direktong naretratong ladawan',

'exif-scenecapturetype-2' => 'Retrato',
'exif-scenecapturetype-3' => 'Eksenang banggi',

# Pseudotags used for GPSSpeedRef
'exif-gpsspeed-k' => 'Kilometros kada oras',
'exif-gpsspeed-m' => 'Milya kada oras',

# Pseudotags used for GPSTrackRef, GPSImgDirectionRef and GPSDestBearingRef
'exif-gpsdirection-t' => 'Tunay na direksyon',
'exif-gpsdirection-m' => 'Direksy??n nin batobalani',

# External editor support
'edit-externally'      => 'Hirah??n an file gamit an panluwas na aplikasyon',
'edit-externally-help' => 'Hiling??n an  [http://www.mediawiki.org/wiki/Manual:External_editors setup instructions] para sa iba pang mga impormasyon.',

# 'all' in various places, this might be different for inflected languages
'recentchangesall' => 'gabos',
'imagelistall'     => 'gabos',
'watchlistall2'    => 'gabos',
'namespacesall'    => 'gabos',
'monthsall'        => 'gabos',

# E-mail address confirmation
'confirmemail'            => "Kompirmaron an ''e''-surat",
'confirmemail_noemail'    => "May?? kang pigkaag na marhay na ''e''-surat sa saimong [[Special:Preferences|mga kab??tan nin par??gamit]].",
'confirmemail_text'       => "Kaipuhan an pag-''validate'' kan saimong e-koreo bago ka makagamit nin ''features'' na e-koreo. Pindoton an butones sa bab?? tangarig magpadara nin kompirmasyon sa saimong e-koreo. An surat igwang takod na may koda; ikarga an takod sa browser para makompirmar na valido an saimong e-koreo.",
'confirmemail_pending'    => "May pigpadara nang kompirmasyon sa ''e''-surat mo; kun kagigibo mo pa sana kan saimong ''account'', maghalat ka nin mga dikit na minutos bago ka maghagad giraray nin b??gong ''code''.",
'confirmemail_send'       => 'Magpadar?? nin kompirmasyon',
'confirmemail_sent'       => "Napadar?? na an kompirmasyon sa ''e''-surat.",
'confirmemail_oncreate'   => "May pigpadara nang kompirmasyon sa saimong ''e''-surat.
Dai man kaipuhan ini para makalaog, pero kaipuhan mong itao ini bago
ka makagamit nin ''features'' na basado sa ''e''-surat sa wiki.",
'confirmemail_sendfailed' => "Dai napadar?? an kompirmasyon kan ''e''-surat. Seguradohon tab?? kun igwang sala.

Pigbalik: $1",
'confirmemail_invalid'    => 'Sal?? an k??digo nin konpirmasyon. Puede ser napas?? na an k??digo.',
'confirmemail_needlogin'  => "Kaipuhan tabi $1 ikompirmar an saimong ''e''-surat.",
'confirmemail_success'    => "Nakompirmar na an saimong ''e''-surat. Pwede ka nang maglaog asin mag-ogma sa wiki.",
'confirmemail_loggedin'   => "Nakompirmar na an saimong ''e''-surat.",
'confirmemail_error'      => 'May nasal?? sa pagtagama kan saimong kompirmasyon.',
'confirmemail_subject'    => "kompirmasy??n {{SITENAME}} kan direksy??n nin ''e''-surat",
'confirmemail_body'       => 'May paragamit, pwedeng ika, hal?? sa IP na $1, na nagrehistro nin account na
"$2" na igwang e-koreo sa {{SITENAME}}.

Tangarig makompirmar na talagang saimo ining account asin makagamit nin e-koreo sa {{SITENAME}}, bukas??n ining takod sa saimong browser:

$3

Kun *bak??* ka ini, dai sunod??n an takod. Mapaso sa $4 inning koda nin kompirmasyon.',

# Scary transclusion
'scarytranscludedisabled' => '[Pigpopogolan an transcluding na Interwiki]',
'scarytranscludefailed'   => '[Nabig?? an pagkua kan templato para sa $1; despensa]',
'scarytranscludetoolong'  => '[halabaon an URL; despensa]',

# Trackbacks
'trackbackbox'      => 'Mga trackback sa pahinang ini:<br />
$1',
'trackbackremove'   => '([$1 Par??on])',
'trackbacklink'     => 'Solsogan',
'trackbackdeleteok' => 'Pigpar?? na an solsogan.',

# Delete conflict
'deletedwhileediting' => 'Patanid: Pigpar?? na an pahinang ini antes na nagpoon kan maghir??!',
'confirmrecreate'     => "Si [[User:$1|$1]] ([[User talk:$1|olay]]) pigpar?? ining p??hina pagkatapos mong magpoon kan paghira ta:
: ''$2''
Ikonpirmar tabi na talagang gusto mong gibohon giraray ining pahina.",
'recreate'            => 'Giboh??n giraray',

# action=purge
'confirm_purge_button' => 'Sige',
'confirm-purge-top'    => 'Hal??on an an aliho kaining p??hina?',

# Multipage image navigation
'imgmultipageprev' => '??? nakaaging pahina',
'imgmultipagenext' => 'sunod na pahina ???',
'imgmultigo'       => 'Duman??n!',

# Table pager
'ascending_abbrev'         => 'skt',
'descending_abbrev'        => 'ba',
'table_pager_next'         => 'Sunod na p??hina',
'table_pager_prev'         => 'Nakaaging p??hina',
'table_pager_first'        => 'Enot na p??hina',
'table_pager_last'         => 'Huring p??hina',
'table_pager_limit'        => 'Ipahiling an $1 na aytem kada p??hina',
'table_pager_limit_submit' => 'Duman??n',
'table_pager_empty'        => 'Mayong resulta',

# Auto-summaries
'autosumm-blank'   => 'Pighahal?? an gabos na laog sa p??hina',
'autosumm-replace' => "Pigriribayan an p??hina nin '$1'",
'autoredircomment' => 'Piglilikay sa [[$1]]',
'autosumm-new'     => 'B??gong p??hina: $1',

# Live preview
'livepreview-loading' => 'Pigkakarga???',
'livepreview-ready'   => 'Pigkakarga??? Magpreparar!',
'livepreview-failed'  => 'Dae nakapoon an direktong pat??naw! Probaran tab?? an pat??naw na normal.',
'livepreview-error'   => 'Dai nakakabit: $1 "$2". Hiling??n tab?? an normal na pat??naw.',

# Friendlier slave lag warnings
'lag-warn-normal' => 'An mga pagbaly?? na mas b??go sa $1 na segundo pwedeng dai pa mahiling sa listang ini.',
'lag-warn-high'   => "Nin huli sa ''high database server lag'', an mga pagbab??go na mas b??go sa $1 na segundo pwedeng dai pa ipahiling sa listang ini.",

# Watchlist editor
'watchlistedit-numitems'       => 'An saimong pigbabantayan igwang {{PLURAL:$1|1 titulo|$1 mga titulo}}, apwera kan mga p??hina kan olay.',
'watchlistedit-noitems'        => 'Mayong mga titulo an pigbabantayan mo.',
'watchlistedit-normal-title'   => 'Hirah??n an pigbabantayan',
'watchlistedit-normal-legend'  => 'Halion an mga titulo sa pigbabantayan',
'watchlistedit-normal-explain' => 'Mahihiling sa bab?? an mga titulo na nasa pigbabantayan mo.
Tangarig maghal?? nin titulo, markahan an kahon sa gilid kaini, dangan pindot??n an Tangkas??n an mga Titulo. Pwede mo man na [[Special:Watchlist/raw|hirah??n an b??gong lista]].',
'watchlistedit-normal-submit'  => 'Tangkas??n an mga Titulo',
'watchlistedit-normal-done'    => 'Pigtangkas an {{PLURAL:$1|1 an titulo|$1 mga titulo}} sa saimong pigbabantayan:',
'watchlistedit-raw-title'      => 'Hirah??n an b??gong pigbabantayan',
'watchlistedit-raw-legend'     => 'Hirah??n an b??gong pigbabantayan',
'watchlistedit-raw-explain'    => 'Mahihiling sa bab?? an mga titulo na nasa pigbabantayan mo, asin pwede ining hirah??n sa paagi nin pagdugang sagkod paghal?? sa lista;
sarong titulo kada linya.
Pag tapos na, lagatik??n an B??goh??n an Pigbabantayan.
Pwede mo man [[Special:Watchlist/edit|gamiton an standard editor]].',
'watchlistedit-raw-titles'     => 'Mga titulo:',
'watchlistedit-raw-submit'     => 'B??goh??n an Pigbabantayan',
'watchlistedit-raw-done'       => 'Bin??go na an saimong pigbabantayan.',
'watchlistedit-raw-added'      => '{{PLURAL:$1|1 an titulong|$1 mga titulong}} idinugang:',
'watchlistedit-raw-removed'    => '{{PLURAL:$1|1 an titulong|$1 mga titulong}} hinal??:',

# Watchlist editing tools
'watchlisttools-view' => 'Hiling??n an mga katak??d na pagbab??go',
'watchlisttools-edit' => 'Hiling??n asin ligwat??n an pigbabantayan',
'watchlisttools-raw'  => 'Hirah??n an b??gong pigbabantayan',

# Special:Version
'version' => 'Bersyon',

# Special:SpecialPages
'specialpages'               => 'Mga espesyal na pahina',
'specialpages-group-other'   => 'Iba pang mga espesyal na pahina',
'specialpages-group-login'   => 'Magla??g/ magg??bo',
'specialpages-group-changes' => 'Nakaka??gi pa san??ng mga pagb??go as??n la??g',

# Special:BlankPage
'blankpage'              => 'Blangkong pahina',
'intentionallyblankpage' => 'Pigtuyong blangko an pahinang ini',

# Special:Tags
'tags-edit' => 'liwat??n',

);
