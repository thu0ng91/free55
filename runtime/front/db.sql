-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 10 月 02 日 15:13
-- 服务器版本: 5.5.16
-- PHP 版本: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `novel`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `realname` varchar(32) DEFAULT NULL,
  `roleid` tinyint(2) DEFAULT NULL,
  `telephone` varchar(32) DEFAULT NULL,
  `qq` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  `lastlogintime` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `loginhits` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

INSERT INTO `admin` (`id`, `username`, `password`, `realname`, `roleid`, `telephone`, `qq`, `email`, `address`, `createtime`, `updatetime`, `lastlogintime`, `status`, `loginhits`) VALUES
(1, 'admin', '90464b75b6cd4a65d6c832389b09a449', '', 1, '', '', '', '', NULL, 1380713128, 1380713128, 1, 12);

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '章节标题',
  `bookid` int(10) NOT NULL COMMENT '章节所属书籍',
  `chapter` smallint(6) DEFAULT NULL COMMENT '所属章节',
  `imgurl` varchar(200) DEFAULT NULL,
  `linkurl` varchar(200) DEFAULT NULL,
  `content` text,
  `tags` varchar(100) DEFAULT NULL,
  `seotitle` varchar(100) DEFAULT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  `recommendlevel` tinyint(2) DEFAULT '0',
  `hits` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- 表的结构 `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '书名',
  `author` varchar(32) DEFAULT NULL COMMENT '作者',
  `cid` int(10) DEFAULT NULL COMMENT '栏目',
  `imgurl` varchar(200) DEFAULT NULL COMMENT '封面图',
  `linkurl` varchar(200) DEFAULT NULL,
  `summary` varchar(500) DEFAULT NULL COMMENT '简介',
  `tags` varchar(100) DEFAULT NULL COMMENT '标签，以逗号分隔',
  `seotitle` varchar(100) DEFAULT NULL COMMENT 'SEO标题',
  `keywords` varchar(100) DEFAULT NULL,
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  `recommendlevel` tinyint(2) DEFAULT '0' COMMENT '后台推荐等级',
  `hits` int(10) DEFAULT NULL COMMENT '点击数',
  `likenum` int(10) DEFAULT NULL COMMENT '用户推荐数',
  `favoritenum` int(11) DEFAULT NULL COMMENT '收藏数',
  `chaptercount` int(11) DEFAULT NULL COMMENT '章节数',
  `wordcount` int(11) DEFAULT NULL COMMENT '字数',
  `sections` varchar(500) DEFAULT NULL COMMENT '分卷，以换行符分隔',
  `lastchapterid` int(11) DEFAULT NULL COMMENT '最后更新章节编号',
  `lastchaptertitle` varchar(100) DEFAULT NULL COMMENT '最后更新章节名',
  `lastchaptertime` int(11) DEFAULT NULL COMMENT '章节最后更新时间',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态：0 待审 1 审核通过 -1 删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- 表的结构 `book_view_stats_by_day`
--

CREATE TABLE IF NOT EXISTS `book_view_stats_by_day` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '小说标题',
  `bookid` int(11) NOT NULL COMMENT '小说编号',
  `cid` int(11) DEFAULT NULL COMMENT '小说栏目',
  `hits` int(11) NOT NULL COMMENT '点击数',
  `day` date NOT NULL COMMENT '日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- 表的结构 `book_view_stats_by_month`
--

CREATE TABLE IF NOT EXISTS `book_view_stats_by_month` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '小说标题',
  `bookid` int(11) NOT NULL COMMENT '小说编号',
  `cid` int(11) DEFAULT NULL COMMENT '小说栏目',
  `hits` int(11) NOT NULL COMMENT '点击数',
  `month` date NOT NULL COMMENT '日期，年月',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- 表的结构 `book_view_stats_by_week`
--

CREATE TABLE IF NOT EXISTS `book_view_stats_by_week` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '小说标题',
  `bookid` int(11) NOT NULL COMMENT '小说编号',
  `cid` int(11) DEFAULT NULL COMMENT '小说栏目',
  `hits` int(11) NOT NULL COMMENT '点击数',
  `year` year(4) NOT NULL COMMENT '当年年份',
  `week` tinyint(4) NOT NULL COMMENT '当年第几周',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `shorttitle` varchar(100) DEFAULT NULL COMMENT '英文、拼音名称',
  `parentid` int(10) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `imgurl` varchar(200) DEFAULT NULL,
  `seotitle` varchar(100) DEFAULT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `description` text,
  `createtime` int(10) NOT NULL COMMENT '创建时间',
  `updatetime` int(10) NOT NULL COMMENT '更新时间',
  `isnav` tinyint(1) DEFAULT '0' COMMENT '是否显示在导航上，0 不显示 1 显示',
  `sort` tinyint(2) DEFAULT '0',
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `realname` varchar(30) DEFAULT NULL,
  `roleid` tinyint(2) DEFAULT NULL,
  `telephone` varchar(32) DEFAULT NULL,
  `qq` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  `lastlogintime` int(10) DEFAULT NULL,
  `loginhits` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- 表的结构 `user_book_favorites`
--

CREATE TABLE IF NOT EXISTS `user_book_favorites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0： 收藏 1：推荐',
  `title` varchar(100) NOT NULL COMMENT '小说名称',
  `bookid` int(10) NOT NULL COMMENT '小说编号',
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
