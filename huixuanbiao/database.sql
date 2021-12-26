-- MySQL dump 10.16  Distrib 10.1.44-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: open_hxb
-- ------------------------------------------------------
-- Server version	10.1.44-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `hxb_comments`
--

DROP TABLE IF EXISTS `hxb_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hxb_comments` (
  `coid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned DEFAULT '0',
  `created` int(10) unsigned DEFAULT '0',
  `author` varchar(200) DEFAULT NULL,
  `authorId` int(10) unsigned DEFAULT '0',
  `ownerId` int(10) unsigned DEFAULT '0',
  `mail` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `ip` varchar(64) DEFAULT NULL,
  `agent` varchar(200) DEFAULT NULL,
  `text` mediumtext,
  `type` varchar(16) DEFAULT 'comment',
  `status` varchar(16) DEFAULT 'approved',
  `parent` int(10) unsigned DEFAULT '0',
  `authorImg` varchar(500) DEFAULT NULL,
  `openid` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`coid`),
  KEY `cid` (`cid`),
  KEY `created` (`created`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hxb_comments`
--

LOCK TABLES `hxb_comments` WRITE;
/*!40000 ALTER TABLE `hxb_comments` DISABLE KEYS */;
INSERT INTO `hxb_comments` VALUES (1,1,1640014009,'一座堤',0,1,'di@yizuodi.cn','https://hxb.yizuodi.cn','127.0.0.1','Typecho 1.1/17.10.30','欢迎使用 回旋镖 ！','comment','approved',0,NULL,NULL),(2,1,1640017748,'普通用户',2,1,'demo@mail2.sysu.edu.cn',NULL,'120.236.174.165','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36','非常高兴能够使用！','comment','approved',1,NULL,NULL);
/*!40000 ALTER TABLE `hxb_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hxb_contents`
--

DROP TABLE IF EXISTS `hxb_contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hxb_contents` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `created` int(10) unsigned DEFAULT '0',
  `modified` int(10) unsigned DEFAULT '0',
  `text` longtext,
  `order` int(10) unsigned DEFAULT '0',
  `authorId` int(10) unsigned DEFAULT '0',
  `template` varchar(32) DEFAULT NULL,
  `type` varchar(16) DEFAULT 'post',
  `status` varchar(16) DEFAULT 'publish',
  `password` varchar(32) DEFAULT NULL,
  `commentsNum` int(10) unsigned DEFAULT '0',
  `allowComment` char(1) DEFAULT '0',
  `allowPing` char(1) DEFAULT '0',
  `allowFeed` char(1) DEFAULT '0',
  `parent` int(10) unsigned DEFAULT '0',
  `views` int(10) DEFAULT '0',
  `likes` int(11) DEFAULT '0',
  PRIMARY KEY (`cid`),
  UNIQUE KEY `slug` (`slug`),
  KEY `created` (`created`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hxb_contents`
--

LOCK TABLES `hxb_contents` WRITE;
/*!40000 ALTER TABLE `hxb_contents` DISABLE KEYS */;
INSERT INTO `hxb_contents` VALUES (1,'欢迎使用回旋镖','start',1640013960,1640014855,'<!--markdown-->如果您看到这条消息,表示您的 回旋镖主站 已经部署成功.',0,1,NULL,'post','publish',NULL,2,'1','1','1',0,2,0),(3,'这是一条招领消息','3',1640017792,1640017792,'<!--markdown-->如你所见，“回旋镖”这款失物招领应用有“寻物”与“招领”两个分类。',0,2,NULL,'post','publish',NULL,0,'1','0','0',0,1,0);
/*!40000 ALTER TABLE `hxb_contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hxb_fields`
--

DROP TABLE IF EXISTS `hxb_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hxb_fields` (
  `cid` int(10) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` varchar(8) DEFAULT 'str',
  `str_value` mediumtext,
  `int_value` int(10) DEFAULT '0',
  `float_value` float DEFAULT '0',
  PRIMARY KEY (`cid`,`name`),
  KEY `int_value` (`int_value`),
  KEY `float_value` (`float_value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hxb_fields`
--

LOCK TABLES `hxb_fields` WRITE;
/*!40000 ALTER TABLE `hxb_fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `hxb_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hxb_metas`
--

DROP TABLE IF EXISTS `hxb_metas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hxb_metas` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `type` varchar(32) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `order` int(10) unsigned DEFAULT '0',
  `parent` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`mid`),
  KEY `slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hxb_metas`
--

LOCK TABLES `hxb_metas` WRITE;
/*!40000 ALTER TABLE `hxb_metas` DISABLE KEYS */;
INSERT INTO `hxb_metas` VALUES (1,'寻物','Lost','category',NULL,1,1,0),(2,'招领','Found','category',NULL,1,2,0);
/*!40000 ALTER TABLE `hxb_metas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hxb_options`
--

DROP TABLE IF EXISTS `hxb_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hxb_options` (
  `name` varchar(32) NOT NULL,
  `user` int(10) unsigned NOT NULL DEFAULT '0',
  `value` mediumtext,
  PRIMARY KEY (`name`,`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hxb_options`
--

LOCK TABLES `hxb_options` WRITE;
/*!40000 ALTER TABLE `hxb_options` DISABLE KEYS */;
INSERT INTO `hxb_options` VALUES ('theme',0,'huixuanbiao'),('theme:huixuanbiao',0,'a:1:{s:7:\"logoUrl\";N;}'),('timezone',0,'28800'),('lang',0,NULL),('charset',0,'UTF-8'),('contentType',0,'text/html'),('gzip',0,'0'),('generator',0,'Typecho 1.1/17.10.30'),('title',0,'回旋镖'),('description',0,NULL),('keywords',0,NULL),('rewrite',0,'1'),('frontPage',0,'recent'),('frontArchive',0,'0'),('commentsRequireMail',0,'1'),('commentsWhitelist',0,'0'),('commentsRequireURL',0,'0'),('commentsRequireModeration',0,'0'),('plugins',0,'a:2:{s:9:\"activated\";a:2:{s:4:\"Rdog\";a:1:{s:7:\"handles\";a:5:{s:24:\"Widget_Register:register\";a:1:{i:0;a:2:{i:0;s:11:\"Rdog_Plugin\";i:1;s:5:\"zhuce\";}}s:30:\"Widget_Register:finishRegister\";a:1:{i:0;a:2:{i:0;s:11:\"Rdog_Plugin\";i:1;s:8:\"zhucewan\";}}s:31:\"Widget_Contents_Post_Edit:write\";a:1:{i:0;a:2:{i:0;s:11:\"Rdog_Plugin\";i:1;s:4:\"fabu\";}}s:39:\"Widget_Contents_Post_Edit:finishPublish\";a:1:{i:0;a:2:{i:0;s:11:\"Rdog_Plugin\";i:1;s:7:\"fabuwan\";}}s:20:\"admin/footer.php:end\";a:1:{i:0;a:2:{i:0;s:11:\"Rdog_Plugin\";i:1;s:8:\"footerjs\";}}}}s:7:\"Restful\";a:1:{s:7:\"handles\";a:1:{s:23:\"Widget_Feedback:comment\";a:1:{i:0;a:2:{i:0;s:14:\"Restful_Plugin\";i:1;s:7:\"comment\";}}}}}s:7:\"handles\";a:6:{s:24:\"Widget_Register:register\";a:1:{i:1;a:2:{i:0;s:11:\"Rdog_Plugin\";i:1;s:5:\"zhuce\";}}s:30:\"Widget_Register:finishRegister\";a:1:{i:1;a:2:{i:0;s:11:\"Rdog_Plugin\";i:1;s:8:\"zhucewan\";}}s:31:\"Widget_Contents_Post_Edit:write\";a:1:{i:1;a:2:{i:0;s:11:\"Rdog_Plugin\";i:1;s:4:\"fabu\";}}s:39:\"Widget_Contents_Post_Edit:finishPublish\";a:1:{i:1;a:2:{i:0;s:11:\"Rdog_Plugin\";i:1;s:7:\"fabuwan\";}}s:20:\"admin/footer.php:end\";a:1:{i:1;a:2:{i:0;s:11:\"Rdog_Plugin\";i:1;s:8:\"footerjs\";}}s:23:\"Widget_Feedback:comment\";a:1:{i:0;a:2:{i:0;s:14:\"Restful_Plugin\";i:1;s:7:\"comment\";}}}}'),('commentDateFormat',0,'F jS, Y \\a\\t h:i a'),('siteUrl',0,'https://open.hxb.yizuodi.cn'),('defaultCategory',0,'1'),('allowRegister',0,'1'),('defaultAllowComment',0,'1'),('defaultAllowPing',0,'1'),('defaultAllowFeed',0,'1'),('pageSize',0,'5'),('postsListSize',0,'10'),('commentsListSize',0,'10'),('commentsHTMLTagAllowed',0,'<img src=\"\">'),('postDateFormat',0,'Y-m-d'),('feedFullText',0,'1'),('editorSize',0,'350'),('autoSave',0,'0'),('markdown',0,'1'),('xmlrpcMarkdown',0,'0'),('commentsMaxNestingLevels',0,'5'),('commentsPostTimeout',0,'2592000'),('commentsUrlNofollow',0,'1'),('commentsShowUrl',0,'0'),('commentsMarkdown',0,'0'),('commentsPageBreak',0,'1'),('commentsThreaded',0,'1'),('commentsPageSize',0,'10'),('commentsPageDisplay',0,'first'),('commentsOrder',0,'ASC'),('commentsCheckReferer',0,'1'),('commentsAutoClose',0,'0'),('commentsPostIntervalEnable',0,'1'),('commentsPostInterval',0,'30'),('commentsShowCommentOnly',0,'0'),('commentsAvatar',0,'0'),('commentsAvatarRating',0,'G'),('commentsAntiSpam',0,'1'),('routingTable',0,'a:38:{i:0;a:37:{s:5:\"index\";a:6:{s:3:\"url\";s:1:\"/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:8:\"|^[/]?$|\";s:6:\"format\";s:1:\"/\";s:6:\"params\";a:0:{}}s:7:\"archive\";a:6:{s:3:\"url\";s:6:\"/blog/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:13:\"|^/blog[/]?$|\";s:6:\"format\";s:6:\"/blog/\";s:6:\"params\";a:0:{}}s:2:\"do\";a:6:{s:3:\"url\";s:22:\"/action/[action:alpha]\";s:6:\"widget\";s:9:\"Widget_Do\";s:6:\"action\";s:6:\"action\";s:4:\"regx\";s:32:\"|^/action/([_0-9a-zA-Z-]+)[/]?$|\";s:6:\"format\";s:10:\"/action/%s\";s:6:\"params\";a:1:{i:0;s:6:\"action\";}}s:4:\"post\";a:6:{s:3:\"url\";s:23:\"/message/[cid:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:25:\"|^/message/([0-9]+)[/]?$|\";s:6:\"format\";s:12:\"/message/%s/\";s:6:\"params\";a:1:{i:0;s:3:\"cid\";}}s:10:\"attachment\";a:6:{s:3:\"url\";s:26:\"/attachment/[cid:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:28:\"|^/attachment/([0-9]+)[/]?$|\";s:6:\"format\";s:15:\"/attachment/%s/\";s:6:\"params\";a:1:{i:0;s:3:\"cid\";}}s:8:\"category\";a:6:{s:3:\"url\";s:8:\"/[slug]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:16:\"|^/([^/]+)[/]?$|\";s:6:\"format\";s:4:\"/%s/\";s:6:\"params\";a:1:{i:0;s:4:\"slug\";}}s:3:\"tag\";a:6:{s:3:\"url\";s:12:\"/tag/[slug]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:20:\"|^/tag/([^/]+)[/]?$|\";s:6:\"format\";s:8:\"/tag/%s/\";s:6:\"params\";a:1:{i:0;s:4:\"slug\";}}s:6:\"author\";a:6:{s:3:\"url\";s:22:\"/author/[uid:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:24:\"|^/author/([0-9]+)[/]?$|\";s:6:\"format\";s:11:\"/author/%s/\";s:6:\"params\";a:1:{i:0;s:3:\"uid\";}}s:6:\"search\";a:6:{s:3:\"url\";s:19:\"/search/[keywords]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:23:\"|^/search/([^/]+)[/]?$|\";s:6:\"format\";s:11:\"/search/%s/\";s:6:\"params\";a:1:{i:0;s:8:\"keywords\";}}s:10:\"index_page\";a:6:{s:3:\"url\";s:21:\"/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:22:\"|^/page/([0-9]+)[/]?$|\";s:6:\"format\";s:9:\"/page/%s/\";s:6:\"params\";a:1:{i:0;s:4:\"page\";}}s:12:\"archive_page\";a:6:{s:3:\"url\";s:26:\"/blog/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:27:\"|^/blog/page/([0-9]+)[/]?$|\";s:6:\"format\";s:14:\"/blog/page/%s/\";s:6:\"params\";a:1:{i:0;s:4:\"page\";}}s:13:\"category_page\";a:6:{s:3:\"url\";s:23:\"/[slug]/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:25:\"|^/([^/]+)/([0-9]+)[/]?$|\";s:6:\"format\";s:7:\"/%s/%s/\";s:6:\"params\";a:2:{i:0;s:4:\"slug\";i:1;s:4:\"page\";}}s:8:\"tag_page\";a:6:{s:3:\"url\";s:27:\"/tag/[slug]/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:29:\"|^/tag/([^/]+)/([0-9]+)[/]?$|\";s:6:\"format\";s:11:\"/tag/%s/%s/\";s:6:\"params\";a:2:{i:0;s:4:\"slug\";i:1;s:4:\"page\";}}s:11:\"author_page\";a:6:{s:3:\"url\";s:37:\"/author/[uid:digital]/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:33:\"|^/author/([0-9]+)/([0-9]+)[/]?$|\";s:6:\"format\";s:14:\"/author/%s/%s/\";s:6:\"params\";a:2:{i:0;s:3:\"uid\";i:1;s:4:\"page\";}}s:11:\"search_page\";a:6:{s:3:\"url\";s:34:\"/search/[keywords]/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:32:\"|^/search/([^/]+)/([0-9]+)[/]?$|\";s:6:\"format\";s:14:\"/search/%s/%s/\";s:6:\"params\";a:2:{i:0;s:8:\"keywords\";i:1;s:4:\"page\";}}s:12:\"archive_year\";a:6:{s:3:\"url\";s:18:\"/[year:digital:4]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:19:\"|^/([0-9]{4})[/]?$|\";s:6:\"format\";s:4:\"/%s/\";s:6:\"params\";a:1:{i:0;s:4:\"year\";}}s:13:\"archive_month\";a:6:{s:3:\"url\";s:36:\"/[year:digital:4]/[month:digital:2]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:30:\"|^/([0-9]{4})/([0-9]{2})[/]?$|\";s:6:\"format\";s:7:\"/%s/%s/\";s:6:\"params\";a:2:{i:0;s:4:\"year\";i:1;s:5:\"month\";}}s:11:\"archive_day\";a:6:{s:3:\"url\";s:52:\"/[year:digital:4]/[month:digital:2]/[day:digital:2]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:41:\"|^/([0-9]{4})/([0-9]{2})/([0-9]{2})[/]?$|\";s:6:\"format\";s:10:\"/%s/%s/%s/\";s:6:\"params\";a:3:{i:0;s:4:\"year\";i:1;s:5:\"month\";i:2;s:3:\"day\";}}s:17:\"archive_year_page\";a:6:{s:3:\"url\";s:38:\"/[year:digital:4]/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:33:\"|^/([0-9]{4})/page/([0-9]+)[/]?$|\";s:6:\"format\";s:12:\"/%s/page/%s/\";s:6:\"params\";a:2:{i:0;s:4:\"year\";i:1;s:4:\"page\";}}s:18:\"archive_month_page\";a:6:{s:3:\"url\";s:56:\"/[year:digital:4]/[month:digital:2]/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:44:\"|^/([0-9]{4})/([0-9]{2})/page/([0-9]+)[/]?$|\";s:6:\"format\";s:15:\"/%s/%s/page/%s/\";s:6:\"params\";a:3:{i:0;s:4:\"year\";i:1;s:5:\"month\";i:2;s:4:\"page\";}}s:16:\"archive_day_page\";a:6:{s:3:\"url\";s:72:\"/[year:digital:4]/[month:digital:2]/[day:digital:2]/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:55:\"|^/([0-9]{4})/([0-9]{2})/([0-9]{2})/page/([0-9]+)[/]?$|\";s:6:\"format\";s:18:\"/%s/%s/%s/page/%s/\";s:6:\"params\";a:4:{i:0;s:4:\"year\";i:1;s:5:\"month\";i:2;s:3:\"day\";i:3;s:4:\"page\";}}s:12:\"comment_page\";a:6:{s:3:\"url\";s:53:\"[permalink:string]/comment-page-[commentPage:digital]\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:36:\"|^(.+)/comment\\-page\\-([0-9]+)[/]?$|\";s:6:\"format\";s:18:\"%s/comment-page-%s\";s:6:\"params\";a:2:{i:0;s:9:\"permalink\";i:1;s:11:\"commentPage\";}}s:4:\"feed\";a:6:{s:3:\"url\";s:20:\"/feed[feed:string:0]\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:4:\"feed\";s:4:\"regx\";s:17:\"|^/feed(.*)[/]?$|\";s:6:\"format\";s:7:\"/feed%s\";s:6:\"params\";a:1:{i:0;s:4:\"feed\";}}s:8:\"feedback\";a:6:{s:3:\"url\";s:31:\"[permalink:string]/[type:alpha]\";s:6:\"widget\";s:15:\"Widget_Feedback\";s:6:\"action\";s:6:\"action\";s:4:\"regx\";s:29:\"|^(.+)/([_0-9a-zA-Z-]+)[/]?$|\";s:6:\"format\";s:5:\"%s/%s\";s:6:\"params\";a:2:{i:0;s:9:\"permalink\";i:1;s:4:\"type\";}}s:4:\"page\";a:6:{s:3:\"url\";s:12:\"/[slug].html\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:22:\"|^/([^/]+)\\.html[/]?$|\";s:6:\"format\";s:8:\"/%s.html\";s:6:\"params\";a:1:{i:0;s:4:\"slug\";}}s:10:\"rest_posts\";a:6:{s:3:\"url\";s:10:\"/api/posts\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:11:\"postsAction\";s:4:\"regx\";s:18:\"|^/api/posts[/]?$|\";s:6:\"format\";s:10:\"/api/posts\";s:6:\"params\";a:0:{}}s:10:\"rest_pages\";a:6:{s:3:\"url\";s:10:\"/api/pages\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:11:\"pagesAction\";s:4:\"regx\";s:18:\"|^/api/pages[/]?$|\";s:6:\"format\";s:10:\"/api/pages\";s:6:\"params\";a:0:{}}s:15:\"rest_categories\";a:6:{s:3:\"url\";s:15:\"/api/categories\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:16:\"categoriesAction\";s:4:\"regx\";s:23:\"|^/api/categories[/]?$|\";s:6:\"format\";s:15:\"/api/categories\";s:6:\"params\";a:0:{}}s:9:\"rest_tags\";a:6:{s:3:\"url\";s:9:\"/api/tags\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:10:\"tagsAction\";s:4:\"regx\";s:17:\"|^/api/tags[/]?$|\";s:6:\"format\";s:9:\"/api/tags\";s:6:\"params\";a:0:{}}s:9:\"rest_post\";a:6:{s:3:\"url\";s:9:\"/api/post\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:10:\"postAction\";s:4:\"regx\";s:17:\"|^/api/post[/]?$|\";s:6:\"format\";s:9:\"/api/post\";s:6:\"params\";a:0:{}}s:19:\"rest_recentComments\";a:6:{s:3:\"url\";s:19:\"/api/recentComments\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:20:\"recentCommentsAction\";s:4:\"regx\";s:27:\"|^/api/recentComments[/]?$|\";s:6:\"format\";s:19:\"/api/recentComments\";s:6:\"params\";a:0:{}}s:13:\"rest_comments\";a:6:{s:3:\"url\";s:13:\"/api/comments\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:14:\"commentsAction\";s:4:\"regx\";s:21:\"|^/api/comments[/]?$|\";s:6:\"format\";s:13:\"/api/comments\";s:6:\"params\";a:0:{}}s:12:\"rest_comment\";a:6:{s:3:\"url\";s:12:\"/api/comment\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:13:\"commentAction\";s:4:\"regx\";s:20:\"|^/api/comment[/]?$|\";s:6:\"format\";s:12:\"/api/comment\";s:6:\"params\";a:0:{}}s:13:\"rest_settings\";a:6:{s:3:\"url\";s:13:\"/api/settings\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:14:\"settingsAction\";s:4:\"regx\";s:21:\"|^/api/settings[/]?$|\";s:6:\"format\";s:13:\"/api/settings\";s:6:\"params\";a:0:{}}s:10:\"rest_users\";a:6:{s:3:\"url\";s:10:\"/api/users\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:11:\"usersAction\";s:4:\"regx\";s:18:\"|^/api/users[/]?$|\";s:6:\"format\";s:10:\"/api/users\";s:6:\"params\";a:0:{}}s:13:\"rest_archives\";a:6:{s:3:\"url\";s:13:\"/api/archives\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:14:\"archivesAction\";s:4:\"regx\";s:21:\"|^/api/archives[/]?$|\";s:6:\"format\";s:13:\"/api/archives\";s:6:\"params\";a:0:{}}s:12:\"rest_upgrade\";a:6:{s:3:\"url\";s:12:\"/api/upgrade\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:13:\"upgradeAction\";s:4:\"regx\";s:20:\"|^/api/upgrade[/]?$|\";s:6:\"format\";s:12:\"/api/upgrade\";s:6:\"params\";a:0:{}}}s:5:\"index\";a:3:{s:3:\"url\";s:1:\"/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:7:\"archive\";a:3:{s:3:\"url\";s:6:\"/blog/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:2:\"do\";a:3:{s:3:\"url\";s:22:\"/action/[action:alpha]\";s:6:\"widget\";s:9:\"Widget_Do\";s:6:\"action\";s:6:\"action\";}s:4:\"post\";a:3:{s:3:\"url\";s:23:\"/message/[cid:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:10:\"attachment\";a:3:{s:3:\"url\";s:26:\"/attachment/[cid:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:8:\"category\";a:3:{s:3:\"url\";s:8:\"/[slug]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:3:\"tag\";a:3:{s:3:\"url\";s:12:\"/tag/[slug]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:6:\"author\";a:3:{s:3:\"url\";s:22:\"/author/[uid:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:6:\"search\";a:3:{s:3:\"url\";s:19:\"/search/[keywords]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:10:\"index_page\";a:3:{s:3:\"url\";s:21:\"/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:12:\"archive_page\";a:3:{s:3:\"url\";s:26:\"/blog/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:13:\"category_page\";a:3:{s:3:\"url\";s:23:\"/[slug]/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:8:\"tag_page\";a:3:{s:3:\"url\";s:27:\"/tag/[slug]/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:11:\"author_page\";a:3:{s:3:\"url\";s:37:\"/author/[uid:digital]/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:11:\"search_page\";a:3:{s:3:\"url\";s:34:\"/search/[keywords]/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:12:\"archive_year\";a:3:{s:3:\"url\";s:18:\"/[year:digital:4]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:13:\"archive_month\";a:3:{s:3:\"url\";s:36:\"/[year:digital:4]/[month:digital:2]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:11:\"archive_day\";a:3:{s:3:\"url\";s:52:\"/[year:digital:4]/[month:digital:2]/[day:digital:2]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:17:\"archive_year_page\";a:3:{s:3:\"url\";s:38:\"/[year:digital:4]/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:18:\"archive_month_page\";a:3:{s:3:\"url\";s:56:\"/[year:digital:4]/[month:digital:2]/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:16:\"archive_day_page\";a:3:{s:3:\"url\";s:72:\"/[year:digital:4]/[month:digital:2]/[day:digital:2]/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:12:\"comment_page\";a:3:{s:3:\"url\";s:53:\"[permalink:string]/comment-page-[commentPage:digital]\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:4:\"feed\";a:3:{s:3:\"url\";s:20:\"/feed[feed:string:0]\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:4:\"feed\";}s:8:\"feedback\";a:3:{s:3:\"url\";s:31:\"[permalink:string]/[type:alpha]\";s:6:\"widget\";s:15:\"Widget_Feedback\";s:6:\"action\";s:6:\"action\";}s:4:\"page\";a:3:{s:3:\"url\";s:12:\"/[slug].html\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:10:\"rest_posts\";a:3:{s:3:\"url\";s:10:\"/api/posts\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:11:\"postsAction\";}s:10:\"rest_pages\";a:3:{s:3:\"url\";s:10:\"/api/pages\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:11:\"pagesAction\";}s:15:\"rest_categories\";a:3:{s:3:\"url\";s:15:\"/api/categories\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:16:\"categoriesAction\";}s:9:\"rest_tags\";a:3:{s:3:\"url\";s:9:\"/api/tags\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:10:\"tagsAction\";}s:9:\"rest_post\";a:3:{s:3:\"url\";s:9:\"/api/post\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:10:\"postAction\";}s:19:\"rest_recentComments\";a:3:{s:3:\"url\";s:19:\"/api/recentComments\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:20:\"recentCommentsAction\";}s:13:\"rest_comments\";a:3:{s:3:\"url\";s:13:\"/api/comments\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:14:\"commentsAction\";}s:12:\"rest_comment\";a:3:{s:3:\"url\";s:12:\"/api/comment\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:13:\"commentAction\";}s:13:\"rest_settings\";a:3:{s:3:\"url\";s:13:\"/api/settings\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:14:\"settingsAction\";}s:10:\"rest_users\";a:3:{s:3:\"url\";s:10:\"/api/users\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:11:\"usersAction\";}s:13:\"rest_archives\";a:3:{s:3:\"url\";s:13:\"/api/archives\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:14:\"archivesAction\";}s:12:\"rest_upgrade\";a:3:{s:3:\"url\";s:12:\"/api/upgrade\";s:6:\"widget\";s:14:\"Restful_Action\";s:6:\"action\";s:13:\"upgradeAction\";}}'),('actionTable',0,'a:0:{}'),('panelTable',0,'a:0:{}'),('attachmentTypes',0,'@image@'),('secret',0,'ce5aLCvd7#@n!#E8ugwKnpBVg75mt9HD'),('installed',0,'1'),('allowXmlRpc',0,'0'),('plugin:Restful',0,'a:15:{s:5:\"posts\";s:1:\"1\";s:5:\"pages\";s:1:\"1\";s:10:\"categories\";s:1:\"1\";s:4:\"tags\";s:1:\"1\";s:4:\"post\";s:1:\"1\";s:14:\"recentComments\";s:1:\"1\";s:8:\"comments\";s:1:\"0\";s:7:\"comment\";s:1:\"1\";s:8:\"settings\";s:1:\"1\";s:5:\"users\";s:1:\"1\";s:8:\"archives\";s:1:\"1\";s:6:\"origin\";s:0:\"\";s:13:\"fieldsPrivacy\";s:0:\"\";s:14:\"allowedOptions\";s:0:\"\";s:8:\"csrfSalt\";s:35:\"05faab567uhgfdtref0c797973a558d4372\";}'),('plugin:Rdog',0,'a:3:{s:8:\"yonghuzu\";s:11:\"contributor\";s:7:\"tuozhan\";a:1:{i:0;s:14:\"contributor-nb\";}s:4:\"tcat\";s:0:\"\";}');
/*!40000 ALTER TABLE `hxb_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hxb_relationships`
--

DROP TABLE IF EXISTS `hxb_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hxb_relationships` (
  `cid` int(10) unsigned NOT NULL,
  `mid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cid`,`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hxb_relationships`
--

LOCK TABLES `hxb_relationships` WRITE;
/*!40000 ALTER TABLE `hxb_relationships` DISABLE KEYS */;
INSERT INTO `hxb_relationships` VALUES (1,1),(3,2);
/*!40000 ALTER TABLE `hxb_relationships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hxb_users`
--

DROP TABLE IF EXISTS `hxb_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hxb_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `mail` varchar(200) DEFAULT NULL,
  `phonenumber` varchar(200) DEFAULT NULL,
  `screenName` varchar(32) DEFAULT NULL,
  `created` int(10) unsigned DEFAULT '0',
  `activated` int(10) unsigned DEFAULT '0',
  `logged` int(10) unsigned DEFAULT '0',
  `group` varchar(16) DEFAULT 'visitor',
  `authgroup` varchar(200) NOT NULL DEFAULT '普通用户',
  `authCode` varchar(64) DEFAULT NULL,
  `wx_id` varchar(200) DEFAULT NULL,
  `school` varchar(200) NOT NULL,
  `partofschool` varchar(200) NOT NULL,
  `url` varchar(200) DEFAULT NULL,
  `wechatpush` int(5) NOT NULL DEFAULT '0',
  `vstatus` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用于标记用户的验证状态，0代表未验证，1代表已通过邮箱验证',
  `useravatar` varchar(1000) NOT NULL DEFAULT 'https://api.hxb.yizuodi.cn/avatar/hxb.png' COMMENT '用户头像地址',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hxb_users`
--

LOCK TABLES `hxb_users` WRITE;
/*!40000 ALTER TABLE `hxb_users` DISABLE KEYS */;
INSERT INTO `hxb_users` VALUES (1,'hxbadmin','$P$Bs7NK8g8JEWVhINaNM4wwHvSoMTVc8.','hxb@yizuodi.cn',NULL,'hxbadmin',1640014009,1640017029,1640015380,'administrator','普通用户','2415e7a7c5ae4cabbcd300aad165fb25',NULL,'','','https://hxb.yizuodi.cn',0,1,'https://api.hxb.yizuodi.cn/avatar/hxb.png'),(2,'demo','$P$BrMP8FdjfEMT4hc7ZyDDurNDEMB1mc.','demo@mail2.sysu.edu.cn','23232','普通用户',1640017609,1640018153,0,'contributor','普通用户','aa0b2b72ef506e25b52760526192e7a3',NULL,'中山大学','广州校区东校园',NULL,0,1,'https://api.hxb.yizuodi.cn/avatar/hxb.png');
/*!40000 ALTER TABLE `hxb_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'open_hxb'
--

--
-- Dumping routines for database 'open_hxb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-21  0:36:16
