-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `live_robin`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `screensys_designs`
--

CREATE TABLE `screensys_designs` (
`id` int(11) NOT NULL,
  `design_name` text NOT NULL,
  `design_typ` text NOT NULL,
  `design_code` text NOT NULL,
  `design_notes` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `screensys_designs`
--

INSERT INTO `screensys_designs` (`id`, `design_name`, `design_typ`, `design_code`, `design_notes`) VALUES
(1, 'idealab', 'screen', '<body id="screenbody">	<div id="top-bar"></div>	<img id="il_logo" src="img/screen_mat/idealab/idealab2013.png">	<img id="whu_logo" src="img/screen_mat/whu.png">	<div id="middle-window" style="">	</div>	<div id="foot-bar">		<div id="upcoming-next"><il style="font-variant:small-caps;">Coming up:</il> <div id="upcoming-next-entry"></div></div>	</div></body>', '< il > färbt etwas in das Idealab-<b><il>grün</il></b>.<br/>< purp > färbt etwas in das Idealab-<b><purp>lila</prup></b>.'),
(2, 'idealab', 'beamer', '<body id="screenbody">	<img id="il_logo" src="img/screen_mat/idealab/idealab2013.png">	<img id="whu_logo" src="img/screen_mat/whu.png">	<img id="arrow_right" src="img/screen_mat/idealab/arrow_right.png">	<img id="arrow_left" src="img/screen_mat/idealab/arrow_left.png">	<div id="middle-window" style="">	</div>/body>', ''),
(3, 'nyc', 'screen', '<body id="screenbody">\n	<div id="top-bar"></div>\n	<img id="nyc_logo" src="img/screen_mat/nyc/nyc2014.png">\n	<img id="whu_logo" src="img/screen_mat/whu.png">\n	<div id="middle-window" style="">\n\n	</div>\n	<div id="foot-bar">\n		<div id="upcoming-next"><nyc style="font-variant:small-caps;">Coming up:</nyc> <div id="upcoming-next-entry"></div></div>\n	</div>\n</body>', '< nyc > färbt etwas in das NYC-<b><nyc>blau</nyc></b>.<br/>< dark > färbt etwas in das Idealab-<b><dark>lila</dark></b>.'),
(4, 'nyc', 'beamer', '<body id="screenbody">\n	<img id="nyc_logo" src="img/screen_mat/nyc/nyc2014.png">\n	<img id="whu_logo" src="img/screen_mat/whu.png">\n	<img id="arrow_right" src="img/screen_mat/idealab/arrow_right.png">\n	<img id="arrow_left" src="img/screen_mat/idealab/arrow_left.png">\n	<div id="middle-window" style="">\n\n	</div>\n</body>', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `screensys_screens`
--

CREATE TABLE `screensys_screens` (
`screen_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `typ` text NOT NULL,
  `temp_id` int(11) NOT NULL,
  `lst_call` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Daten für Tabelle `screensys_screens`
--

INSERT INTO `screensys_screens` (`screen_id`, `name`, `typ`, `temp_id`, `lst_call`) VALUES
(14, 'Beamer H Foyer', 'beamer', 68, '1388693706'),
(19, 'Foyer 2 (rechts)', 'bildschirm', 88, '0'),
(20, 'K 1. Etage', 'bildschirm', 88, '0'),
(21, 'K StdRo 2. Et', 'bildschirm', 88, '0'),
(23, 'H v H001', 'bildschirm', 88, '0'),
(24, 'G v StdRoom', 'bildschirm', 88, '0'),
(25, 'C Glaskasten', 'bildschirm', 88, '1412724128'),
(26, 'D 1. Etage', 'bildschirm', 88, '0'),
(27, 'Master Erdgeschoss', 'bildschirm', 88, '0'),
(28, 'Master 1. Etage', 'bildschirm', 88, '0'),
(29, 'F v StdRooms', 'bildschirm', 88, '0'),
(30, 'Glaskasten in Lounge', 'bildschirm', 88, '0'),
(31, 'Checkin Screen', 'bildschirm', 88, '0'),
(32, 'Zelt Screen', 'bildschirm', 88, '0'),
(33, 'Visionary Room', 'bildschirm', 88, '0'),
(34, 'Test-Screen', 'bildschirm', 88, '0'),
(35, 'Test Beamer', 'beamer', 68, '1381600977');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `screensys_settings`
--

CREATE TABLE `screensys_settings` (
`id` int(11) NOT NULL,
  `setting` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `screensys_settings`
--

INSERT INTO `screensys_settings` (`id`, `setting`, `value`) VALUES
(1, 'screen-design', 'idealab'),
(2, 'system-available', 'y'),
(3, 'beamer-design', 'idealab');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `screensys_temps`
--

CREATE TABLE `screensys_temps` (
`temp_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `typ` text NOT NULL,
  `inhalt` text NOT NULL,
  `ucnext` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Daten für Tabelle `screensys_temps`
--

INSERT INTO `screensys_temps` (`temp_id`, `name`, `typ`, `inhalt`, `ucnext`) VALUES
(12, 'Leere Anzeige', 'bildschirm', '', ''),
(13, 'Leere Anzeige', 'beamer', '', ''),
(88, '01_01_Welcome_Note', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td><img src="http://campus-for-finance.com/conf/img/speakers/nyc/2014/RudolfMarkus.jpg"></td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>Prof. Markus Rudolf</nyc></div><br><div class="Firma"><i><purp>Welcome Note</purp>', 'Panel Talk Example 1'),
(89, '01_02_Ulrich_Grillo', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td>	<img src="http://campus-for-finance.com/conf/img/speakers/nyc/2014/GrilloUlrich.jpg"></td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>	Ulrich Grillo</nyc></div><br><div class="Firma"><i>	President of the Federation of German Industries', 'Upcoming Next'),
(90, '01_03_Panel', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;">\r\n	<span class="icon fontawesome-edit"></span><br/>\r\n	<span class="icon-title"><nyc>Panel</nyc></span><br/>\r\n	<span class="Firma">\r\n		<img src="http://www.robinweishaupt.de/screensys/img/clock.png" style="height:25px;"> \r\n		10:00 | Großer Saal\r\n	</span>\r\n</td></tr></table>', 'Upcoming Next'),
(91, '01_04_Georg_Fahrenschon', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td>\r\n	<img src="http://campus-for-finance.com/conf/img/speakers/nyc/2014/FahrenschonGeorg.jpg">\r\n</td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>\r\n	Georg Fahrenschon\r\n</nyc></div><br><div class="Firma"><i>\r\n	President of the German Saving Banks Association\r\n</i></div><br/><div class="Titel"><purp>\r\n</purp></div><br/><div class="RaumUhr"><img src="http://www.robinweishaupt.de/screensys/img/clock.png" style="height:19px;"> \r\n	11:30 | Großer Saal\r\n</div></td></tr></table></div></td></tr></table>', 'Upcoming Next'),
(92, '01_05_Alexander_Doll', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td>\r\n	<img src="http://campus-for-finance.com/conf/img/speakers/nyc/2014/DollAlexander.jpg">\r\n</td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>\r\n	Alexander Doll\r\n</nyc></div><br><div class="Firma"><i>\r\n	MD, Co-CEO Germany, Co-Head IBD, Barclays\r\n</i></div><br/><div class="Titel"><purp>\r\n</purp></div><br/><div class="RaumUhr"><img src="http://www.robinweishaupt.de/screensys/img/clock.png" style="height:19px;"> \r\n	11:30 | Tageszentrum 1-3\r\n</div></td></tr></table></div></td></tr></table>', 'Upcoming Next'),
(93, '01_06_Klaus_Entenmann', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td>\r\n	<img src="http://campus-for-finance.com/conf/img/speakers/nyc/2014/EntenmannKlaus.jpg">\r\n</td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>\r\n	Klaus Entenmann\r\n</nyc></div><br><div class="Firma"><i>\r\n	Chairman of the Board of Management (CEO), Daimler Financial Services AG\r\n</i></div><br/><div class="Titel"><purp>\r\n</purp></div><br/><div class="RaumUhr"><img src="http://www.robinweishaupt.de/screensys/img/clock.png" style="height:19px;"> \r\n	11:30 | Tageszentrum 4-6\r\n</div></td></tr></table></div></td></tr></table>', 'Upcoming Next'),
(95, '01_07_Werner_Baumann', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td>\r\n	<img src="http://campus-for-finance.com/conf/img/speakers/nyc/2014/BaumannWerner.jpg">\r\n</td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>\r\n	Werner Baumann\r\n</nyc></div><br><div class="Firma"><i>\r\n	Bayer AG\r\n</i></div><br/><div class="Titel"><purp>\r\n</purp></div><br/><div class="RaumUhr"><img src="http://www.robinweishaupt.de/screensys/img/clock.png" style="height:19px;"> \r\n	12:45 | Großer Saal\r\n</div></td></tr></table></div></td></tr></table>', 'Upcoming Next'),
(96, '01_08_Adam_Farkas', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td>\r\n	<img src="http://campus-for-finance.com/conf/img/speakers/nyc/2014/FarkasAdam.jpg">\r\n</td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>\r\n	Adam Farkas\r\n</nyc></div><br><div class="Firma"><i>\r\n	Executive Director, European Banking Authority\r\n</i></div><br/><div class="Titel"><purp>\r\n</purp></div><br/><div class="RaumUhr"><img src="http://www.robinweishaupt.de/screensys/img/clock.png" style="height:19px;"> \r\n	12:30 | Tageszentrum 1-3\r\n</div></td></tr></table></div></td></tr></table>', 'Upcoming Next'),
(97, '02_01_Reinhard_Selten', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td>\r\n	<img src="">\r\n</td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>\r\n	Prof. Reinhard Selten\r\n</nyc></div><br><div class="Firma"><i>\r\n	Bonn University\r\n</i></div><br/><div class="Titel"><purp>\r\n</purp></div><br/><div class="RaumUhr"><img src="http://www.robinweishaupt.de/screensys/img/clock.png" style="height:19px;"> \r\n	09:00 | Großer Saal\r\n</div></td></tr></table></div></td></tr></table>', 'Upcoming Next'),
(98, '02_03_Rüdiger_Filbry', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td>\r\n	<img src="">\r\n</td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>\r\n	Rüdiger Filbry\r\n</nyc></div><br><div class="Firma"><i>\r\n	Praxisgrupenleiter FIG, BCG\r\n</i></div><br/><div class="Titel"><purp>\r\n</purp></div><br/><div class="RaumUhr"><img src="http://www.robinweishaupt.de/screensys/img/clock.png" style="height:19px;"> \r\n	14:00 | Großer Saal\r\n</div></td></tr></table></div></td></tr></table>', 'Upcoming Next'),
(99, '02_04_Burkhart_Varnholt', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td>\r\n	<img src="http://www.campus-for-finance.com/conf/img/speakers/nyc/2014/VarnholtBurkhard.jpg">\r\n</td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>\r\n	Burkhart Varnholt\r\n</nyc></div><br><div class="Firma"><i>\r\n	Global Strategist Investor, Bank J. Safra Sarasin Ltd\r\n</i></div><br/><div class="Titel"><purp>\r\n</purp></div><br/><div class="RaumUhr"><img src="http://www.robinweishaupt.de/screensys/img/clock.png" style="height:19px;"> \r\n	14:00 | Tageszentrum 1-3\r\n</div></td></tr></table></div></td></tr></table>', 'Upcoming Next'),
(100, '02_05_Holger_Bross', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td>\r\n	<img src="">\r\n</td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>\r\n	Holger Bross\r\n</nyc></div><br><div class="Firma"><i>\r\n	Country Executive/ Head of Corporate and Investmentbanking Germany, Bank of America Merrill Lynch\r\n</i></div><br/><div class="Titel"><purp>\r\n</purp></div><br/><div class="RaumUhr"><img src="http://www.robinweishaupt.de/screensys/img/clock.png" style="height:19px;"> \r\n	15:00 | Großer Saal\r\n</div></td></tr></table></div></td></tr></table>', 'Upcoming Next'),
(101, '02_06_Karl_Georg_Altenburg', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td>\r\n	<img src="http://campus-for-finance.com/conf/img/speakers/nyc/2014/AltenburgKarl.jpg">\r\n</td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>\r\n	Karl-Georg Altenburg\r\n</nyc></div><br><div class="Firma"><i>\r\n	CEO DE/AT/CH, J.P. Morgan\r\n</i></div><br/><div class="Titel"><purp>\r\n</purp></div><br/><div class="RaumUhr"><img src="http://www.robinweishaupt.de/screensys/img/clock.png" style="height:19px;"> \r\n	15:00 | Tageszentrum 1-3\r\n</div></td></tr></table></div></td></tr></table>', 'Upcoming Next'),
(102, '02_07_Michael_Rüdiger', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td>\r\n	<img src="">\r\n</td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>\r\n	Michael Rüdiger\r\n</nyc></div><br><div class="Firma"><i>\r\n	CEO, DEKA Bank\r\n</i></div><br/><div class="Titel"><purp>\r\n</purp></div><br/><div class="RaumUhr"><img src="http://www.robinweishaupt.de/screensys/img/clock.png" style="height:19px;"> \r\n	15:00 | Tageszentrum 4-6\r\n</div></td></tr></table></div></td></tr></table>', 'Upcoming Next'),
(103, '02_08_Wolfgang_Langhoff', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td>\r\n	<img src="">\r\n</td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>\r\n	Wolfgang Langhoff\r\n</nyc></div><br><div class="Firma"><i>\r\n	CFO, BP Europa SE\r\n</i></div><br/><div class="Titel"><purp>\r\n</purp></div><br/><div class="RaumUhr"><img src="http://www.robinweishaupt.de/screensys/img/clock.png" style="height:19px;"> \r\n	16:15 | Großer Saal\r\n</div></td></tr></table></div></td></tr></table>', 'Upcoming Next'),
(104, '02_09_Davide_Taliente', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td>\r\n	<img src="http://campus-for-finance.com/conf/img/speakers/nyc/2014/TalienteDavide.jpg">\r\n</td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>\r\n	Davide Taliente\r\n</nyc></div><br><div class="Firma"><i>\r\n	Partner and Head of Public Policy Practice EMEA, Oliver Wyman\r\n</i></div><br/><div class="Titel"><purp>\r\n</purp></div><br/><div class="RaumUhr"><img src="http://www.robinweishaupt.de/screensys/img/clock.png" style="height:19px;"> \r\n	16:15 | Tageszentrum 1-3\r\n</div></td></tr></table></div></td></tr></table>', 'Upcoming Next'),
(105, '02_10_Stephen_Price ', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td>\r\n	<img src="">\r\n</td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>\r\n	Stephen Price\r\n</nyc></div><br><div class="Firma"><i>\r\n	Bereichsvorstand Corporate Banking, HSBC\r\n</i></div><br/><div class="Titel"><purp>\r\n</purp></div><br/><div class="RaumUhr"><img src="http://www.robinweishaupt.de/screensys/img/clock.png" style="height:19px;"> \r\n	17:15 | Großer Saal\r\n</div></td></tr></table></div></td></tr></table>', 'Upcoming Next'),
(106, '02_11_Michael_Fuchs', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td>\r\n	<img src="http://campus-for-finance.com/conf/img/speakers/nyc/2014/FuchsMichael.jpg">\r\n</td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>\r\n	Michael Fuchs\r\n</nyc></div><br><div class="Firma"><i>\r\n	MP, Vice Chairman of Parliamentary Group, Christian Democratic Union (CDU)\r\n</i></div><br/><div class="Titel"><purp>\r\n</purp></div><br/><div class="RaumUhr"><img src="http://www.robinweishaupt.de/screensys/img/clock.png" style="height:19px;"> \r\n	17:15 | Tageszentrum 1-3\r\n</div></td></tr></table></div></td></tr></table>', 'Upcoming Next'),
(107, '02_12_Klaus_Regling', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td>\r\n	<img src="http://campus-for-finance.com/conf/img/speakers/nyc/2014/ReglingKlaus.jpg">\r\n</td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>\r\n	Klaus Regling\r\n</nyc></div><br><div class="Firma"><i>\r\n	CEO/ Man. Director, ESFS/ESM\r\n</i></div><br/><div class="Titel"><purp>\r\n</purp></div><br/><div class="RaumUhr"><img src="http://www.robinweishaupt.de/screensys/img/clock.png" style="height:19px;"> \r\n	17:15 | Tageszentrum 4-6\r\n</div></td></tr></table></div></td></tr></table>', 'Upcoming Next'),
(108, '02_13_Paul_Achleitner', 'bildschirm', '<table style="width:100%; height:100%;"><tr><td style="width:100%; height:100%; vertical-align:middle; text-align:center;"><div style="display:inline-block; margin-left:auto; margin-right:auto;"><table><tr><td>\r\n	<img src="http://campus-for-finance.com/conf/img/speakers/nyc/2014/AchleitnerPaul.jpg">\r\n</td><td style="text-align:left;  padding-left:30px; max-width:600px;"><div class="Redner"><nyc>\r\n	Paul Achleitner\r\n</nyc></div><br><div class="Firma"><i>\r\n	Head of the Supervisory Board, Deutsche Bank\r\n</i></div><br/><div class="Titel"><purp>\r\n</purp></div><br/><div class="RaumUhr"><img src="http://www.robinweishaupt.de/screensys/img/clock.png" style="height:19px;"> \r\n	18:15 | Großer Saal\r\n</div></td></tr></table></div></td></tr></table>', 'Upcoming Next');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `screensys_designs`
--
ALTER TABLE `screensys_designs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `screensys_screens`
--
ALTER TABLE `screensys_screens`
 ADD PRIMARY KEY (`screen_id`), ADD UNIQUE KEY `screen_id` (`screen_id`);

--
-- Indexes for table `screensys_settings`
--
ALTER TABLE `screensys_settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `screensys_temps`
--
ALTER TABLE `screensys_temps`
 ADD PRIMARY KEY (`temp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `screensys_designs`
--
ALTER TABLE `screensys_designs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `screensys_screens`
--
ALTER TABLE `screensys_screens`
MODIFY `screen_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `screensys_settings`
--
ALTER TABLE `screensys_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `screensys_temps`
--
ALTER TABLE `screensys_temps`
MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;
