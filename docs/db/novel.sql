-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 09 月 29 日 19:07
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `realname`, `roleid`, `telephone`, `qq`, `email`, `address`, `createtime`, `updatetime`, `lastlogintime`, `status`, `loginhits`) VALUES
(1, 'admin', '7fef6171469e80d32c0559f88b377245', '', 1, '', '', '', '', NULL, 1380470985, 1380470985, 1, 1),
(2, 'test', '098f6bcd4621d373cade4e832627b4f6', '', 2, '', '', '', '', 1365759135, NULL, 1365759135, 1, 0),
(3, 'ContentManager', '8cb155c3cf316c1cbabf961cdcac7159', '', 3, '', '', '', '', 1368583009, NULL, 1368583009, 1, 0);

-- --------------------------------------------------------

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title`, `bookid`, `chapter`, `imgurl`, `linkurl`, `content`, `tags`, `seotitle`, `keywords`, `createtime`, `updatetime`, `recommendlevel`, `hits`, `status`) VALUES
(1, '001 轻敌的后果！', 2, 2, NULL, NULL, '<p>　“魔兽大人，这是我们叶家孝敬您的食物，希望您可以网开一面，放了小女！”<br />　　叶如风强忍着头部的剧痛缓缓睁开眼，听到耳边的话，美眸紧拧，魔兽大人？她没死？还有，魔兽是什么东西？<br />　　“带走吧！”<br />　　魔兽发话，叶如风以为是把她带走，再次闭上眼，等待他们带着她离去，因为此刻她真的是好累，有人抱那就最好了，想到这里，心中的恨压下许多，脑海中只有一个念头，没有死就好！<br />　　可是等了很久，叶如风也没有感觉到被人抱，脸上传来湿答答的感觉，好像是……被舔*了，睁开眼，映入眼前的是湿漉漉的舌头，一只庞大的黑乎乎的狼，周围是满地的残肢断臂，血淋淋的一幕让叶如风浑身一颤， 眼眸四射，偌大的一片树林，除了眼前的这只黑狼，就是她，没有人，这是怎么回事？<br />　　耳边传来狼低声的吼叫，叶如风翻身起来，看着眼前的黑狼，低头看着自己的身体，这么矮，骨瘦如柴，浑身鞭伤，鲜血淋漓，这就是是她的新身体？<br />　　“虽然瘦点，但是味道很不错” 黑狼舔*了舔舌头，唇角的血迹让叶如风猛地瞪大眼。<br />　　“食物？”叶如风看着自己血淋淋的身子，冷眼盯着眼前的黑狼，回忆刚刚的谈话，她总算是明白了，刚刚他们谈话中的食物就是她，而那个叶家就是把她送来当食物的罪魁祸首，那她又是谁。<br />　　“想吃我，就凭你！”<br />　　黑狼冷哼一声，“狂妄！”<br />　　魔兽一族是这个世界上最为尊贵的，卑贱的人类总会将没用的人类送来，成为他们的食物，这是很正常的，但是魔兽也会被魔法高的人类契约，那种人类称之为‘召唤师’而召唤师分为七系：光、暗、风、火、水、土、木七系，而一般的人成为单系召唤师还是有可能的，但是双系就少，多系更少，全系就更不用说，从来没有过！<br />　　魔兽也是分属性的，同一类的魔兽属性不一定都相同，一般超过五级魔法师的魔兽才能说人话，不过这样的魔兽也很少，但是却恰巧被叶如风碰见了一只！<br />　　“可是我一点都不想被你吃！”叶如风依旧站在那里，虽然这具身体骨瘦如柴，浑身是伤，但是她好不容易才重生，前世的仇未报，今世的仇又来了，她不甘死，不愿死，所以，想要杀她，那就准备好被她杀死的准备！<br />　　黑狼愣了一下，随即哈哈大笑起来，看着眼前骨瘦如柴的女孩，居然说不想被他吃，真是太可笑了，她也不打听打听，五级魔兽想吃一个废物，废物能逃一死吗？<br />　　叶如风并没有生气，冷静的看着他，眼睛落在一旁的棍子上，前世有过武松打虎，今世，她要棍打*黑狼！<br />　　“我说了，我不想死！”<br />　　叶如风咬着牙，一字一字的开口，眼神迸发出嗜血的 冷意，杀气绽放，周围的空气都冷了下来，黑狼还没有反应过来，一棍狠狠地朝他腹部打去，黑狼只觉得胃中一阵翻滚，痛楚席卷全身，刚想出魔法，就看见一道小小的身影扑过来，双手抱住他的脖子，狠狠地掐住他的脖子，力气大的吓人，狠狠地一拧，脖子传来咔嚓的声音，黑狼倒下，叶如风的棍子在他肚子上狠狠地插了进去，在一挥，取出那颗五级晶石，小小的脸上全是嗜血的冷意！<br />　　“记住，下次别轻敌！”<br />　　可是，黑狼哪有下次，到死也不敢相信，自己一个五级魔兽竟然被一个废物两招给解决了，连反悔的机会都没有，就这样死翘翘了！<br />　　叶如风扬起手，擦干脸上的血迹，将晶石藏好，并没有立刻离开，而是坐在那里，思索着下一步该怎么办！<br />　　【丫丫新文，全新的玄幻女强，喜欢召唤师的读者们都活动起来吧，收藏，推荐，留言，有钱打赏，没钱捧人场！】</p>', NULL, NULL, NULL, 1380121884, 1380372695, 0, NULL, 1),
(2, '释厄（中）', 2, 1, NULL, NULL, '<p>许仙脑海里第一个出现的自然是白娘子，但一看自己面前脸上犹有泪痕的聂小倩。-==梦想文学网==-突然有些茫然，那个人正的适合自己吗？不，那个人温柔的大概能够适合任何男子吧，但自己真的适合她吗？无法单纯的从自己的角度考虑问题，最后只得一声苦笑“我也不清楚呢！好了，别说我了，你呢？你准备同我回杭州，然后呢？”<br /><br /> &nbsp; &nbsp;小倩立刻信誓旦旦道：“小倩生是相公的人，死是相公的鬼。”<br /><br /> &nbsp; &nbsp;许仙看她一脸认真的模样，不由自主的伸出手摸摸她的头，笑道：“别傻了，你是你自己的。”<br /><br /> &nbsp; &nbsp;“啊？”小倩张大了小嘴，从来没人对她说过这样的话。<br /><br /> &nbsp; &nbsp;许仙温和的笑笑道：“如果暂时没有地方可去，没有什么事情可做，那就呆在我身边吧！”他能够看的出小倩那些小心思，但就像一朵小花拼命挥舞自己的刺，仿佛那样就可以保护自己，但其实还是那么柔弱。<br /><br /> &nbsp; &nbsp;许仙说完就向屋里走去。<br /><br /> &nbsp; &nbsp;小倩呐呐道：“那，那我可以叫你相公吗？”<br /><br /> &nbsp; &nbsp;许仙脚步一停，想了想回头道：“随你吧！”<br /><br /> &nbsp; &nbsp;修炼只是为了不受欺负，为了离开兰若，但当这一切都没有时，修炼又是为了什么呢？那一场大火让太多东西去意义。没有爹娘，没有姥姥，有生以来第一次，完全可以由自己选择明天的道路，但路又在哪呢？不由自主的还是想要依赖，几乎是急不可耐的叫出那一声相公，不安的心终于可以得到稍许的平静，自己那飘起的命运似乎再一次安定下来，一条相夫教子的道路摆在面前。<br /><br /> &nbsp; &nbsp;但他却拒绝了，难道是自己还不够美吗？不，自己的不安和彷徨，原来他都明白的。很不好意思，但心却真正的平静下来。<br /><br /> &nbsp; &nbsp;已经快冬至了，气候已冷，许仙和衣而睡，也感到微微的寒意。对聂小倩，不能说是不动心的，但在对方柔弱的时候趁人之危，或许是某些“情圣”对付女人的的致胜法宝，但他却不屑为之。~~梦想文学网~~因为理解，所以怜惜。他不是什么女权主义者，相反还有点大男子主义，但还是希望这样的女子，能找到自己想要的幸福。更何况，他可是一心要替未来妻子守节的。<br /><br /> &nbsp; &nbsp;许仙慢慢闭上眼睛，开始又一次的修炼，兰若寺一战，自己魂魄中那团光芒少了以前的辉煌，却似乎更加凝练了几分。<br /><br /> &nbsp; &nbsp;小倩走进那间闪耀着金色华彩的房间，看着熟睡中那张脸，突然想起刚才他脸红的样子。嘻嘻，相公也不是宁公子那样的正人君子啊！只是如同许仙一样，宁公子虽好，却不是她想要的。<br /><br /> &nbsp; &nbsp;那我要等的人又是谁呢？<br /><br /> &nbsp; &nbsp;第二天一大早，却传来吵闹的声音惊醒了许仙。宁采臣这对模范夫妻竟然也吵架了，原由却是宁采臣想不回书院，在家陪一陪妻子，宁母也是这个意思。但宁夫人却坚决不肯，要宁采臣以功名为重。<br /><br /> &nbsp; &nbsp;但宁采臣下定决心的事情也不是别人能轻易改变的，两个人就此拧上了。宁采臣冲许仙歉意道：“恐怕汉文你只能独个上路了，帮我跟先生告假。拙荆身体如此，家里是实在需要人照顾。”眼上带着黑眼圈，显然昨晚也没睡好。<br /><br /> &nbsp; &nbsp;宁夫人从里屋出来，怒道：“宁采臣，若你还当我是你妻子就赶紧收拾东西上路。”<br /><br /> &nbsp; &nbsp;宁采臣只是淡淡道：“男人的事，不用你管。”<br /><br /> &nbsp; &nbsp;眼看两人又要起争执，许仙连忙道：“宁兄，你知道我懂一些道术，我昨夜想了个办法，或许可以治好嫂子的病。”<br /><br /> &nbsp; &nbsp;宁采臣霍的一声从椅子上坐起来抓住许仙“真的？”脸上那还有半分淡定，狂喜，疑虑，担忧各种复杂的情绪充斥他那张方正的脸庞。<br /><br /> &nbsp; &nbsp;许仙顾不得肩膀的疼痛，肯定道：“该有七八分把握。”<br /><br /> &nbsp; &nbsp;宁采臣顾得不礼数，急着让许仙医治妻子。但宁夫人竟然拒绝道：“我不治。”<br /><br /> &nbsp; &nbsp;许仙也感到有些不可思议，但宁夫人接着道：“除非你答应我，无论结果如何，你都要到书院去。”<br /><br /> &nbsp; &nbsp;宁采臣犹豫了一下果然答应，她才展露笑容，她知道宁采臣极重信诺。但旁观者清，许仙却看出宁采臣不过是在骗自己的妻子。但对这夫妻二人之间的感情，真是唏嘘不已，唯愿小倩的方法能够成功。<br /><br /> &nbsp; &nbsp;能有舍利，必为高僧，兰若寺上百年的光景，不知多少代和尚，可真正的舍利才不足十颗。其中还要算上大殿的佛像中那一颗。虽然只是土木形骸，但佛像每日受无数僧客跪拜，拜则心中必有所求，千千万万的愿力汇聚在一起，形成的舍利更是不同寻常，小倩就是藏下大殿中那颗舍利，不足百年就有了难得的修为。<br /><br /> &nbsp; &nbsp;姥姥也是凭着这些舍利镇压污血续命，小倩那一颗早就用完了。现在只剩下姥姥给的三颗，却还要让许仙用一颗。一则是小倩并不怎么在意修炼，再是有了许仙这个大灯泡在，似乎不用再担心修炼的问题了。<br /><br /> &nbsp; &nbsp;里屋中，由于还要小倩的指导，其他人都被赶出去，只有宁妻在床上昏睡，不用说，自然是小倩的办法。如果大病中再见了活鬼，很难说会不会像原本的许仙一样，直接被吓死，那宁采臣真要找他拼命了。<br /><br /> &nbsp; &nbsp;舍利在许仙手中渐渐焕发出光华，一代高僧数十年的苦修的遗留又岂是寻常。他按着小倩所教授的方法，用自己的力量引导舍利的力量，说起来简单，可现在的许仙又哪里懂得什么引导，只是不停的将自己的力量灌输到舍利中去。<br /><br /> &nbsp; &nbsp;舍利的光彩倒是越来越明亮，但对宁夫人的病却毫无益处，自己灼热的太阳之力反而让宁夫人满脸是汗，屋子里像升起炉子似的。<br /><br /> &nbsp; &nbsp;冬天倒是可以当电炉子用。这个念头在许仙脑海划过，又赶紧收敛心神，小倩的声音在他耳边催促“相公，这样是不行的，不是用你的力量，是舍利的力量。”<br /><br /> &nbsp; &nbsp;许仙咬着牙低声道：“鬼知道怎么用这舍利的力量，要不你来。”<br /><br /> &nbsp; &nbsp;小倩的声音顿时带着哭腔：“小倩也不会啊！只是书上说可以的。”<br /><br /> &nbsp; &nbsp;引导，引导，这个词不停在许仙脑海中回荡，不是简单的注入，而是共鸣与引发，但怎么共鸣？又怎么引发呢？难道，像点星那样吗？许仙试着慢慢收回自己的太阳之力。但一这么做许仙才发现，收回太阳之力比散发太阳之力难的何止十倍。<br /><br /> &nbsp; &nbsp;太阳之力非常狂暴极难控制，若是单纯在兰若寺那样的使劲放光许仙还行的话，但要非常细致的控制，对现在的他来说几乎是不可能的。掌握力量远比得到力量难得多。<br /><br /> &nbsp; &nbsp;而如果太阳之力一旦失控，恐怕他真的陪小倩做一对“只羡鸳鸯不羡仙”的亡命鸳鸯了。谁也没想到，看似简单的事上，竟然隐含着如此凶险。<br /><br /> &nbsp; &nbsp;但越到艰险处，许仙的心意反而越发平静，这不单单是运用力量的时候所带来的那种奇妙的镇定作用，毕竟外力再强，还需作用于内心。他前世今生也不知经历了多少难关，做好人大都是碰到坏事，要面对这种种坏事，要比常人有加倍的勇气和毅力。公交车上看到小偷，转过头去自然容易，但若能吼一声，不同样在磨砺着自己吗？世上聪明人太多，但在他们聪明的逃避困难之时，早有愚者练就另一番胆魄。<br /><br /> &nbsp; &nbsp;许仙额头已经见汗，但还是沉静的将自己发出去的力量一丝丝抽回来，这一发一收间，不知道耗费了多少心力，许仙对力量的掌握更不再是以前那种粗糙的模样。但这还没完，还余下一丝在舍利中，细细如弦，剩下的就是如何拨动这根琴弦的问题。<br /></p>', NULL, NULL, NULL, 1380371905, 1380373327, 0, NULL, 1);

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
  `chaptercount` int(11) DEFAULT NULL COMMENT '章节数',
  `wordcount` int(11) DEFAULT NULL COMMENT '字数',
  `sections` varchar(500) DEFAULT NULL COMMENT '分卷，以换行符分隔',
  `lastchapterid` int(11) DEFAULT NULL COMMENT '最后更新章节编号',
  `lastchaptertitle` varchar(100) DEFAULT NULL COMMENT '最后更新章节名',
  `lastchaptertime` int(11) DEFAULT NULL COMMENT '章节最后更新时间',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态：0 待审 1 审核通过 -1 删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `cid`, `imgurl`, `linkurl`, `summary`, `tags`, `seotitle`, `keywords`, `createtime`, `updatetime`, `recommendlevel`, `hits`, `likenum`, `chaptercount`, `wordcount`, `sections`, `lastchapterid`, `lastchaptertitle`, `lastchaptertime`, `status`) VALUES
(1, '闷骚老大惹不起', '祸水泱泱', 2, '/uploads/book/2013-09/1379692771-5695.jpg', NULL, '<p>为了妹妹的医疗费，她报名参加电视台的选美大赛，希望得到冠军的五十万奖金。但没有后台的她，连最后一名都没有份！ 于是，她傍上了大金主——欧奇胜！ 他是欧氏集团的接班人，亦是黑道“龙焰盟”的老大。 他让她得了冠军，更让她成为炙手可热的大明星。 有人要潜规则她，他当着众人的面，撕开她的衣服，在她身上刺下纹身：“看见没有？这代表她只能是我的女人！” 从此，没人敢算计她。她却成了他的私有物，受他的差遣、听他的使唤、被他凌辱践踏…… 终于，她决定逃离。他好“色”，她就毁了自己这个“色”！ 几年后，圆润丰满的她被人当成礼物送到他面前。 他嘲讽地笑道：“女人无论什么样，关了灯都一样。你以为你逃得出我的掌心？ </p>', '祸水,小说', NULL, '祸水,小说', 1379683699, 1380469595, 1, 20, NULL, NULL, NULL, '', NULL, NULL, NULL, 1),
(2, '闷骚老大惹不起', '祸水泱泱', 2, '/uploads/book/2013-09/1379692771-5695.jpg', NULL, '<p><span style="font-family:courier new;font-size:small;"> &nbsp; &nbsp;有人要潜规则她，他当着众人的面，撕开她的衣服，在她身上刺下纹身：“看见没有？这代表她只能是我的女人！” 从此，没人敢算计她。她却成了他的私有物，受他的差遣、听他的使唤、被他凌辱践踏…… 终于，她决定逃离。他好“色”，她就毁了自己这个“色”！ 几年后，圆润丰满的她被人当成礼物送到他面前。 他嘲讽地笑道：“女人无论什么样，关了灯都一样。你以为你逃得出我的掌心？<img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" /></span></p>', '祸水,小说', NULL, '祸水,小说', 1379685330, 1380469700, 1, 69, NULL, 2, 17506, '阿百川\r\n阿飞的飞<br>阿凡达', NULL, NULL, NULL, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `book_view_stats_by_day`
--

INSERT INTO `book_view_stats_by_day` (`id`, `title`, `bookid`, `cid`, `hits`, `day`) VALUES
(4, '闷骚老大惹不起', 2, 2, 24, '2013-09-29'),
(5, '闷骚老大惹不起', 1, 2, 4, '2013-09-29');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `book_view_stats_by_month`
--

INSERT INTO `book_view_stats_by_month` (`id`, `title`, `bookid`, `cid`, `hits`, `month`) VALUES
(3, '闷骚老大惹不起', 2, 2, 24, '2013-09-01'),
(4, '闷骚老大惹不起', 1, 2, 4, '2013-09-01');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `book_view_stats_by_week`
--

INSERT INTO `book_view_stats_by_week` (`id`, `title`, `bookid`, `cid`, `hits`, `year`, `week`) VALUES
(3, '闷骚老大惹不起', 2, 2, 24, 2013, 39),
(4, '闷骚老大惹不起', 1, 2, 4, 2013, 39);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `title`, `shorttitle`, `parentid`, `type`, `imgurl`, `seotitle`, `keywords`, `description`, `createtime`, `updatetime`, `isnav`, `sort`, `status`) VALUES
(1, '测试栏目', 'ceshilanmu', 0, NULL, NULL, NULL, NULL, NULL, 0, 1380296269, 1, 0, -1),
(2, '仙侠', 'xianxia', 0, NULL, NULL, NULL, NULL, NULL, 0, 1380296265, 1, 0, 1),
(3, '三级目录', NULL, 2, NULL, NULL, NULL, NULL, NULL, 0, 1379684925, 0, 0, -1),
(4, '二级栏目11', NULL, 1, NULL, NULL, NULL, NULL, NULL, 1379695333, 1379695392, 0, 0, -1),
(5, '二级栏目11', NULL, 0, NULL, NULL, NULL, NULL, NULL, 1379695524, 1379695755, 0, 0, -1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
