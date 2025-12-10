-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 dec 2025 om 13:02
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utrechtarchief`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `hotspots`
--

CREATE TABLE `hotspots` (
  `id` int(11) NOT NULL,
  `beschrijving` text DEFAULT NULL,
  `naam` varchar(255) NOT NULL,
  `x_coord` float NOT NULL,
  `y_coord` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `hotspots`
--

INSERT INTO `hotspots` (`id`, `beschrijving`, `naam`, `x_coord`, `y_coord`) VALUES
(1, 'Afbeelding van de titelpagina van het Panorama van Utrecht, op de lithostenen getekend door J. Bos, gedrukt bij P.W. van de Weijer en in juli 1859 uitgegeven door de Wed. Herfkens en zoon. Informatie: Het Panorama van Utrecht bestaat uit vier aaneengeplakte, zigzag gevouwen bladen met een totale lengte van 5,82 meter. Het panorama is een meterslange tekening van een rondwandeling om het centrum van Utrecht, met steeds wisselend uitzicht vanaf de singels. Het geeft een heel precies beeld van hoe de stad in 1859 er uitzag en het leuke is dat je ook het verloop van de seizoenen in de tekening terugziet.', 'Pagina 1', 600, 300),
(2, 'Gezicht over de Wittevrouwenbrug in de Wittevrouwenstraat te Utrecht met het douanekantoor (de latere politiepost Wittevrouwen) en de Willemskazerne.', 'Pagina 2', 1500, 320),
(3, 'Gezicht op de gevangenis aan het Wolvenplein te Utrecht op het vroegere bolwerk Wolvenburg, met rechts een huis op de afgegraven stadswal bij de Wolvenstraat.', 'Pagina 3', 2500, 300),
(4, 'Gezicht op de uitmonding van de Plompetorengracht te Utrecht in de stadsbuitengracht, in het midden de bomen langs de Noorderkade en rechts een gedeelte van het Begijnebolwerk. Rechts wordt een overhaalschuitje voortgetrokken. Afbeelding: Afbeelding van het overhaalschuitje over de Stadsbuitengracht ter hoogte van de Lange Smeestraat te Utrecht. Deze veerbootjes, die voetgangers van en naar de binnenstad vervoerden, werden in de loop van de 19e eeuw vervangen door vaste bruggen.', 'Pagina 4', 3500, 250),
(5, 'Gezicht op het Begijnebolwerk te Utrecht.', 'Pagina 5', 5000, 320),
(6, 'Gezicht op een gedeelte van het Begijnebolwerk (links) en de Van Asch van Wijckskade te Utrecht.', 'Pagina 6', 6000, 300),
(7, 'Gezicht op de Van Asch van Wijckskade te Utrecht, de Weerdbarrière en de Weerdbrug en rechts de Noorderkade met de stadswaag en stadskraan. Info: Met behulp van de stadskraan konden zware goederen, zoals wijntonnen, in en uit schepen geladen worden. Het water is van oudsher een belangrijke transportroute in Utrecht.', 'Pagina 7', 7300, 250),
(8, 'Gezicht op de Noorderkade te Utrecht, de Koninklijke Fabriek van Landbouwkundige Werktuigen, bierbrouwerij De Krans en het Paardenveld met de molen De Rijn en Zon. Extra info: Gezicht op de stoombierbrouwerij De Krans (Nieuwekade 30). Vanaf de middeleeuwen werd er in Utrecht volop bier gebrouwen, vaak met grachtenwater. In de 20e eeuw verdwenen de brouwerijen door concurrentie uit Amsterdam.', 'Pagina 8', 8600, 320),
(9, 'Gezicht op het Paardenveld te Utrecht met de molen De Meiboom en rechts een was- en badhuis. Info: Badhuizen werden sinds eind 19e eeuw gebouwd door toenemende aandacht voor hygiëne en gezondheid.', 'Pagina 9', 9900, 300),
(10, 'Gezicht over de Catharijnebrug te Utrecht op een groot appartementengebouw, het douanekantoortje (de Catharijnebarrière), een herenhuis (later Bierhuis De Hoop) en de gasfabriek van W.H. de Heus. Extra afbeeldingen/informatie: Diverse beelden van de Catharijnebrug, het commiezenhuisje, de gasfabriek van W.H. de Heus en het bastion Vredenburg, omstreeks 1859.', 'Pagina 10', 11200, 250),
(11, 'Gezicht op de koperpletterij van W.H. de Heus met het zuidwestelijke bastion van het vroegere kasteel Vredenburg en rechts de Rijnkade. Extra info: Plattegrond van het gebouwencomplex van koperpletterij en gasfabriek.', 'Pagina 11', 12400, 320),
(12, 'Gezicht over de Willemsbrug op de Rijnkade te Utrecht, met de douanekantoortjes en rechts het begin van het in Engelse landschapsstijl aangelegde singelplantsoen. Extra beelden: Gezicht over de stadsbuitengracht met de Willemsbrug en herenhuizen.', 'Pagina 12', 13000, 300),
(13, 'Gezicht op het singelplantsoen met het theehuis van de oud-rooms-katholieke aartsbisschop en rechts het hospitaal van het Duitse Huis. Extra info: Gezicht op de Mariaplaats uit het westen met waterpomp uit 1844.', 'Pagina 13', 14200, 250),
(14, 'Gezicht op het singelplantsoen ter hoogte van de Zeven Steegjes. Zocher camoufleerde minder aantrekkelijke delen van de stad met plantsoenen. Extra info: Plattegrond van Utrecht met alle Zocherplantsoenen, rond 1858.', 'Pagina 14', 15400, 320),
(15, 'Gezicht op het singelplantsoen met het Bartholomeusgasthuis.', 'Pagina 15', 16600, 300),
(16, 'Gezicht op het singelplantsoen met links de Geertekerk en in de stadsbuitengracht een houtvlot. Info: Houtvlotten bestonden uit gebonden boomstammen en dreven dagenlang naar o.a. Amsterdam.', 'Pagina 16', 17800, 250),
(17, 'Gezicht op het singelplantsoen met het Diakonessenhuis, het bastion Sterrenburg, de molen op de Bijlhouwerstoren en een houtvlot.', 'Pagina 17', 19000, 320),
(18, 'Gezicht op het singelplantsoen met het dubbele woonhuis boven de kazematten van bastion Sterrenburg en de molen op de Bijlhouwerstoren.', 'Pagina 18', 20200, 300),
(19, 'Gezicht over de Tolsteegbrug op de hekpalen van de Tolsteegbarrière bij het Ledig Erf, met de uitmonding van de Oudegracht en het bastion Manenburg.', 'Pagina 19', 21400, 250),
(20, 'Gezicht op het singelplantsoen met de zuidwestelijke toren van de Nicolaikerk, de cavaleriestallen en een gebouw van het voormalige St.-Agnietenklooster.', 'Pagina 20', 22300, 320),
(21, 'Gezicht op het singelplantsoen met de Fundatie van de Vrijvrouwe van Renswoude en de kameren van Maria van Pallaes.', 'Pagina 21', 23600, 300),
(22, 'Gezicht op het singelplantsoen met de regentenkamer van Maria van Pallaes, de Nieuwegracht Onder de Linden, de uitmonding in de stadsbuitengracht en gebouwen van de St.-Servaasabdij.', 'Pagina 22', 24000, 250),
(23, 'Gezicht op het singelplantsoen rond bastion Zonnenburg met de St.-Servaasabdij, het Meteorologisch Instituut en de Sterrenwacht. Extra info: Afbeeldingen van Meteorologisch Instituut en Sterrenwacht, ca. 1859.', 'Pagina 23', 25100, 320),
(24, 'Gezicht op het singelplantsoen bij het Servaasbolwerk met een gedeelte van het St.-Magdalenaklooster. Extra info: Plattegrond van Zocher ontwerp voor bastion Lepelenburg.', 'Pagina 24', 26200, 300),
(25, 'Gezicht op het singelplantsoen met het voormalige Leeuwenberchgasthuis (chemisch laboratorium) en de bisschoppelijke stallen.', 'Pagina 25', 27300, 250),
(26, 'Gezicht over de Maliebrug met douanekantoortje (Maliebarrière), het singelplantsoen, de Bruntenhof en bolwerk Lepelenburg. Extra beeld: Gezicht op de Maliebrug uit het noordoosten.', 'Pagina 26', 28400, 320),
(27, 'Gezicht op het voormalige bolwerk Lepelenburg met huis Lievendaal en particuliere tuinhuizen.', 'Pagina 27', 29500, 300),
(28, 'Gezicht op bolwerk Lepelenburg met tuinen en tuinhuizen.', 'Pagina 28', 30600, 250),
(29, 'Gezicht op het singelplantsoen ten noorden van bolwerk Lepelenburg, met het witte huis, de huizen aan het begin van de Herenstraat en de kameren van Jan van der Meer.', 'Pagina 29', 32200, 320),
(30, 'Gezicht op het singelplantsoen nabij de bocht van de Kromme Nieuwegracht, met huizen aan het Hieronymusplantsoen, de St.-Hieronymuskapel en restanten van de oude stadsmuur.', 'Pagina 30', 33300, 300),
(31, 'Gezicht op het singelplantsoen met de Zonstraat (later Nobelstraat) en het Lucasbolwerk met het Suikerhuis. Extra info: De Lucasbrug werd ook wel knuppelbrug genoemd.', 'Pagina 31', 34400, 250),
(32, 'Gezicht op het singelplantsoen met de noordpunt van het Lucasbolwerk en de directeurswoning van het Suikerhuis. Extra info: Gezicht op het Suikerhuis vóór de afbraak (uit het noorden).', 'Pagina 32', 35500, 320),
(33, 'Gezicht op het singelplantsoen ten noorden van het Lucasbolwerk. Helemaal rechts sluit het plantsoen aan bij de Wittevrouwenbrug waar het panorama begint.', 'Pagina 33', 36500, 400);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `hotspots`
--
ALTER TABLE `hotspots`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `hotspots`
--
ALTER TABLE `hotspots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
