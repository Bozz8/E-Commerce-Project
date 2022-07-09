-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Feb 02, 2017 alle 14:34
-- Versione del server: 10.1.19-MariaDB
-- Versione PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `UData`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `AdminData`
--

CREATE TABLE `AdminData` (
  `ID` int(11) NOT NULL,
  `AdminUsername` text COLLATE utf8_bin NOT NULL,
  `AdminPassword` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `AdminData`
--

INSERT INTO `AdminData` (`ID`, `AdminUsername`, `AdminPassword`) VALUES
(1, 'EstoreAdmin', 'EstorePass'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struttura della tabella `Articles`
--

CREATE TABLE `Articles` (
  `ID` int(11) NOT NULL,
  `PN` text COLLATE utf8_bin NOT NULL,
  `Manufacturer` text COLLATE utf8_bin NOT NULL,
  `Seller` text COLLATE utf8_bin NOT NULL,
  `Availability` int(11) NOT NULL,
  `N_Left` int(11) NOT NULL,
  `Description` text COLLATE utf8_bin NOT NULL,
  `IMG` text COLLATE utf8_bin NOT NULL,
  `Price` float NOT NULL,
  `Category` text COLLATE utf8_bin NOT NULL,
  `HL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `Articles`
--

INSERT INTO `Articles` (`ID`, `PN`, `Manufacturer`, `Seller`, `Availability`, `N_Left`, `Description`, `IMG`, `Price`, `Category`, `HL`) VALUES
(1, 'GTX 970 ', 'Nvidia', 'Amazon', 1, 291, 'Motore grafico: NVIDIA Geforce GTX 970\r\nTecnologia NVIDIA Super Resolution\r\nTecnologia NVIDIA GameWorks\r\nNVIDIA G-Sync - pronto\r\nNVIDIA GPU Boost 2.0\r\nTecnologia NVIDIA CUDA', '1485532786248.png', 200, 'Schede Video', 0),
(2, 'Nexus 4', 'Google', 'Estore', 1, 192, 'Lg nexus 4', '1485534020687.png', 99, 'Smartphone', 1),
(3, 'LG G4', 'LG', 'Estore', 1, 48, '\r\n LG G4 H815 Leather Black Gold\r\nLG G4 H815 Leather Black Gold\r\nâ‚¬ 319,00\r\nAccedi per essere avvisato quando il prodotto torna in magazzino.\r\nLG G4 H815 Leather Black Gold\r\nNON DISPONIBILE\r\n 11 Recensione(i)\r\n LG G4 H815 Leather Black Gold\r\nZoom\r\n\r\n\r\n\r\n\r\nSPEDIZIONE GRATUITA\r\nâ‚¬ 319,00\r\nAccedi per essere avvisato quando il prodotto torna in magazzino.\r\nManuale disponibile per il download\r\nDistribuzione\r\n\r\nOperatore\r\n\r\nSistema Operativo\r\n\r\nMegapixel\r\n\r\n16\r\nMemoria Interna\r\n\r\n32 GB\r\nTop\r\nDettagli\r\nProdotti Correlati\r\nUlteriori Informazioni\r\nMedia\r\nRecensioni utenti\r\nManuali\r\nDETTAGLI\r\n\r\nLG G4 H815 Leather Black Gold: perfetto mix fra stile e tecnologia, LG G4 cattura le tue emozioni per riviverle alla grande quando vuoi ovunque tu sia. Il suo elegante design curvo con una cover posteriore in pelle Ã© pensato per offrirti la massima comoditÃ¡ d''uso. Grazie al display IPS Quantum potrai godere immagini con un contrasto elevato, colori brillanti e realistici. La tecnologia In-cell Touch aumenta la reattivitÃ  al tocco e la visibilitÃ  sotto la luce del sole. Scatta foto nitide alla massima velocitÃ  grazie all''esclusiva tecnologia di messa a fuoco al laser e allo stabilizzatore ottico dell''immagine, che compensa il movimento della mano per evitare l''effetto mosso. Il sensore dello spettro di colore usa la tecnologia a infrarossi per analizzare e misurare tutta la luce visibile nella scena prima di effettuare lo scatto. In questo modo ti assicura fotografie con colori naturali e realistici anche con scarsa illuminazione. Grazie alla modalitÃ  manuale di G4, puoi impostare la fotocamera principale da 16MP per realizzare scatti artistici, catturando ad esempio i fasci di luce in movimento. Trasforma ogni momento in un''opera d''arte regolando le impostazioni della fotocamera in maniera professionale. Puoi agire sugli aspetti principali dello scatto per aumentare o ridurre la luminositÃ , effettuare scatti rapidissimi oppure impostarla per foto ottimali al buio. Ideale per scattare selfie perfetti, la fotocamera frontale da 8 MP ti offre non solo una qualitÃ  elevata, ma anche funzioni utili e divertenti per scattarti selfie singoli o multipli con un gesto della mano. Naviga, gioca o lavora piÃ¹ a lungo grazie alla batteria a lunga durata da 3000 mAh rimovibile e alla possibilitÃ  di espandere la memoria per aggiungere tutto lo spazio che vuoi per i tuoi contenuti preferiti. Pieno supporto alle reti 4G+ Plus!', '1485534130436.png', 289.99, 'Smartphone', 0),
(4, 'Sony PS4 ', 'SONY', 'Estore', 1, 48, 'La nuova PS4, piÃ¹ sottile\r\nScopri colori vividi e brillanti con immagini HDR mozzafiato.\r\nPiÃ¹ sottile del 30\\% e piÃ¹ leggera del 16\\% rispetto al modello di PS4 originale.\r\nMemorizza giochi, app e istantanee, scegliendo fra i modelli da 500 GB e quelli da 1 TB.\r\nI migliori programmi TV, film e altro, dalle tue app di intrattenimento preferite.', '1485534232451.png', 299.99, 'Console', 0),
(5, 'XBOX ONE', 'Microsoft', 'Estore', 1, 250, 'Xbox One, la nuova console da gioco sviluppata da Microsoft, Ã¨ arrivata sul mercato. Si presenta come un set-top-box per il controllo della tv e si candida ad occupare il centro del salotto per gestire, anche tramite Kinect, l''intero intrattenimento veicolato tramite lo schermo televisivo: dai film ai giochi, dalle videochiamate alle applicazioni. \r\nCon l''arrivo di Windows 10 cambiano interfaccia e gestione software, mentre a partire dal 2016 Ã¨ sul mercato la versione "One S" con dimensioni ridotte e performance migliorate per il supporto di immagini e video 4K.', '1485534290267.png', 450, 'Console', 1),
(6, 'SSD 850 EVO SATA III 2.5pollici', 'Samsung', 'Estore', 1, 42, '-Tecnologia V-NAND Samsung\r\n-Lettura sequenziale fino a 540MB/s e scrittura520MB/s\r\n-5 anni di garanzia limitata\r\n', '1485703770232.png', 79.9, 'SSD', 0),
(7, 'SanDisk Ultra Imaging MicroSDHC da 32 GB, con Adattatore SD, Fino a 80 MB/S, UHS-I Classe 10', 'SanDisk', 'Estore', 1, 99, 'Classe 10 per video Full HD\r\nImpermeabili, resistenti ai raggi X e alle temperature, e antiurto\r\nAdattatore SD incluso nella confezione per garantire la compatibilitÃ  con le fotocamere digitali\r\nDimensioni: 14,99 mm x 10,92 mm x 1,02 mm', '1485703992375.png', 15, 'Memorie esterne', 0),
(8, 'DOOGEE X5 Pro, Unlocked 4G Smartphone - 5.0'''' IPS Screen - 2GB RAM+16GB ROM - Dual SIM Mobile with Dual Camera - Long Standby SIM Free - Android Cell Phone - White', 'Doogee', 'Estore', 1, 49, 'RETE sbloccato: Dual SIM, supporto Wi-Fi 2G rete: GSM 850/900/1800 / 1900MHz, rete 3G: reti WCDMA 850/1900 / 2100MHz, rete 4G: FDD-LTE 800/900/1800/2100 / 2600MHz (Band 1 / 3/7/8/20), progettato esclusivamente per i paesi europei, una migliore esperienza di viaggio, sostenere la maggior parte del gestore di telefonia mobile, nessuna chiamata e messaggio saranno perse con segnale stabile\r\n2GB di RAM e 16GB ROM MEMORIA: la versione avanzata di Doogee X5, stoccaggio piÃ¹ grande, massiccia multimediali possono essere conservati fino, 1.0GHz MT6735, processore Cortex A53 quad-core rendono runing piÃ¹ veloce\r\n5.0inch HD IPS SCHERMO: con risoluzione 1280 * 720, flash LED, macchine fotografiche doppie, sostenere intelligente gesto per l''accesso macchina fotografica, scattare foto piÃ¹ chiare, piÃ¹ facile, gesto scia: supporto, doppio rubinetto, la luce dello schermo, avviare l''applicazione\r\nXender FUNZIONE: DG Xender 2.0 rende piÃ¹ facile condividere. Non Ã¨ richiesta alcuna connessione Wifi o Carta SIM, di trasferimento dati diversi dispositivi veloci con un solo lato, dieci volte piÃ¹ veloce di Bluetooth. (solo per tutti i telefoni Doogee)\r\nGARANZIA DI STORE UFFICIALE: Un anno di garanzia per il telefono e 6 mesi per la batteria e il caricabatterie; servizio clienti piÃ¹ professionale fornito on-line e un centro di assistenza in linea in Spagna sempre per il vostro servizio e la migliore esperienza\r\n', '1485704181794.png', 99.99, 'Smartphone', 0),
(9, 'LG 360 CAM Videocamera Sferica Compatta con Doppia Fotocamera da 13 MP, Memoria Interna 4 GB, Colore Argento', 'LG', 'Estore', 1, 150, 'Risoluzione massima foto 5660 x 2830 pixel, scatto sferico (360Â°) o semisferico (180Â°)\r\nRisoluzione massima video 2560 x 1280 pixel, registrazione MP4 codec AVC High\r\nControllo remoto tramite smartphone\r\nVideocamera 360 CAM, coperchio protettivo, cavo dati USB tipo C', '1485704301898.png', 159.99, 'Videocamere', 0),
(10, 'Sandisk Micro SDXC Extreme Action per Fotocamere da Azione, Scheda di Memoria 64 GB, con Adattatore, Classe UHS 1, C10, U3, Rosso/Oro', 'SanDisk', 'Estore', 1, 200, 'Riprendete video in 4K ultra HD oggi stesso\r\nTutta la memoria di cui avete bisogno\r\nAdattatore per una maggiore versalita\r\nRealizzate per funzionare in condizioni estreme', '1485704401493.png', 39.99, 'Memorie esterne', 0),
(11, 'Corsair CMK16GX4M2B3000C15 Vengeance LPX Kit di Memoria RAM da 16 GB, 2x8 GB, DDR4, 3000 MHz, CL15, Nero', 'Corsair', 'Estore', 1, 50, 'Supporto XMP 2.0 per overclocking automatico senza problemi\r\nProgettati per un overclocking di elevate prestazioni\r\nIl design dal profilo piatto si adatta agli spazi piÃ¹ ridotti\r\nCompatibilitÃ  testata cu schede madri 100 Series per prestazioni veloci ed affidabili\r\nDisponibile in diversi colori per abbinarsi alla scheda madre o al sistema', '1485704582636.png', 119.99, 'RAM', 0),
(12, 'Intel BX80662I76700K Box Core I7-6700K Processore, Argento', 'Intel', 'Estore', 1, 48, 'Smart Cache Intel da 8 MB\r\nVelocitÃ  di clock: 4,00 GHz\r\nTurbo: 4,20 GHz\r\nIntel HD Graphics 530\r\nSocket 1151, DDR4 SDRAM/ DDR3 SDRAM', '1485704661753.png', 329.99, 'Processori', 0),
(13, 'Asus Z170 Pro Gaming Intel Scheda Madre, 4 DIMM DDR4 3400 MHz, LGA1151, Nero', 'Asus', 'Estore', 1, 150, 'Socket LGA1151 per CPU Desktop Intel Core\r\n4 DIMM DDR4 3400 MHz (OC)\r\nIntel Gigabit Ethernet, LANGuard e GameFirst III\r\nSupremeFX e Sonic Radar II\r\nTecnologia PRO Clock', '1485704744631.png', 149.99, 'Schede Madri', 0),
(15, 'AMD FX-8350 Box Processore 4GHz, Socket AM3 +, 16MB di cache, 125 Watt', 'AMD', 'EStore', 1, 200, 'AMD FX 8350 Black Edition, vishera, 8 core\r\nAM3 +, Clock 4.0 GHz, Turbo 4.2 GHz, 8 MB L3 cache\r\n125 W, CPU, retail\r\nDescrizione del prodotto: AMD FD8350FRHKBOX\r\nTipo di prodotto: processore\r\nTipo di CPU: AMD FX 8-Core, Black Edition\r\nTipo di socket: AM3\r\nDimensioni: 14 x 7 x 12,7 cm, peso: 454 g', '1485800270750.png', 133, 'Processori', 1),
(16, 'Intel Celeron G1840 Dual Core CPU (2.80GHz, 2MB Cache, 53W, Graphics, Virtualization Technology, Socket 1150)', 'Intel', 'PAVAN S.R.L.', 1, 25, 'Intel Celeron Dual-Core, socket 1150/H3/LGA1150\r\nFrequenza: 2,8 GHz\r\nNumero di core: 2\r\nMicroarchitettura: Haswell\r\nDimensioni della cache L1: 2 x 32 K', '1485800391548.png', 38.12, 'Processori', 0),
(17, 'Asus H81M-K Scheda Madre, Nero/Giallo', 'Asus', 'EStore', 1, 55, 'sus H81M-K\r\nTipi di memoria supportati: DDR3-SDRAM\r\nTipo slot di memoria: DIMM\r\nCanali di memoria: Dual\r\nFamiglia processore: Intel', '1485800511293.png', 54, 'Schede Madri', 1),
(18, 'ASRock AM3+ 970M Pro3 Scheda Madre AMD, M-ATX, 4xD3, USB 3, SATA 3, Nero', 'ASRock', 'EStore', 1, 80, 'Supporta for Socket AM3+ / AM3 Processors, Supporta la DDR3 2400+(OC) a doppio canale\r\nProgettazione solida dei condensatori\r\n2 x PCIe 2.0 x16, 1 x PCIe 2.0 x1, 1 x PCI, 6 x SATA3, 4 x USB 3.0 (2 frontali, 2 posteriori), 10 x USB 2.0 (4 frontali, 6 posteriori)\r\nAudio HD a 7.1 canali (Realtek ALC892 Audio Codec), Condensatori audio ELNA, 1 x collettore TPM, 1x collettore modulo infrarossi\r\nSupporta la protezione ASRock Full Spike, X-Boost, APP Shop, Circuito in vetro ad alta densitÃ \r\nNumero massimo di processori: 1\r\nTipo prodotto: Scheda madre - micro ATX', '1485800616672.png', 75, 'Schede Madri', 0),
(19, 'Zalman R1 - Case mid tower con finestra, colore: Nero', 'Zalman', 'EStore', 1, 42, 'Fino a 5 spazi per installare ventole\r\nVentola inferiore esclusivamente per l''alimentatore\r\nFiltri antipolvere davanti e dietro\r\nTelaio interno verniciato in nero\r\nFori per raffreddamento ad acqua pronti', '1485800718627.png', 49.99, 'Case', 0),
(20, 'SilverStone GD09B Grandia 09 Case PC Desktop ATX, Nero', 'Silverstone', 'VendoComproComponenti.it', 1, 20, 'Progettato per un eccellente raffreddamento\r\nSupporta schede di espansione fino a 12,2 pollici\r\nSchede madri supportate: ATX\r\nSilenzioso e costruito in modo tale da proteggere i tuoi componenti dalla polvere', '1485800846177.png', 89.99, 'Case', 0),
(21, 'Cooler Master MasterBox 5 Nero', 'CoolerMaster', 'VendoComproComponenti.it', 1, 45, 'NUOVO COOLER MASTER MCX-B5S1-KWNN11 MASTERBOX 5 BLACK MASTERBOX 5 BLACK WITH MESHFLOW FRONT PANEL', '1485800937371.png', 75.36, 'Case', 0),
(22, 'Sapphire 11260 - 07 - 20 G AMD RX 480 Nitro + 8 GB di memoria GDDR5 PCI-E scheda grafica, colore: nero', 'AMD', 'Sapphire S.P.A.', 1, 20, 'scheda video da 8 GB\r\nPCI-Express 3.0\r\n256 bit Memory Bus, GDDR5 Memory Type\r\nDisplay : 4 Outputs', '1485801123290.png', 240.42, 'Schede Video', 0),
(23, 'ZOTAC GeForce GTX 750 Ti 2GB ZT-70601-10M ', 'NVidia', 'ComproVendoComponenti.it', 1, 10, 'Scheda Grafica GTX 750 Ti (ZT-70601-10M) with GeForce Experience\r\nMemoria: 2 GB DDR5 (5400 Mhz)\r\nClock GPU Base: 1033 Mhz, Clock GPU con boost 1111 Mhz\r\nDual DVI + mini-HDMI\r\nDissipatori custom con tecnologie: ICESTORM , EXOARMOR, FREEZE TECH', '1485801228062.png', 99.99, 'Schede Video', 0),
(24, 'Logitech Mouse M100 Dark ver. Versione Italiana', 'Logitech', 'EStore', 1, 450, 'Mouse ottico\r\nPer l''ufficio e per uso personale\r\nMarca Logitech\r\nTracciamento ottico ad alta definizione (1000 dpi) per una risposta reattiva e fluida del cursore\r\nImpugnatura ambidestra', '1485983512848.png', 7.99, 'Mouse', 1),
(25, 'Trust Classicline Tastiera a Prova di Schizzi, Layout Italiano, Nero', 'Trust', 'VendoComproComponenti.it', 1, 300, 'Digitazione confortevole e silenziosa\r\nPulsanti speciali alimentazione, autospegnimento, riaccensione\r\nresistente al versamento di liquidi\r\nCavo da 1,8 m\r\nTastiera con layout italiano', '1485983624796.png', 11, 'Tastiere', 0),
(26, 'Benq GW2270H Monitor VA, Display da 21,5" Full-HD, 2 Porte HDMI, Nero', 'BENQ', 'EStore', 1, 67, 'Display da 21,5" Full-HD\r\nVA Panel angolo di visualizzazione 178Â°/178Â°\r\n1 porta VGA + 2 Porte HDMI\r\nTCO 6.0\r\nCavo alimentazione, cavo VGA', '1485983770955.png', 101.36, 'Schermi', 0),
(27, 'WD WD10EZEX Blu Hard Disk Desktop da 1 TB, 7200 RPM, SATA 6 GB/s, 64 MB Cache, 3.5 "', 'Western Digital', 'EStore', 1, 78, 'Data LifeGuard: monitoraggio continuo dell''unitÃ  tramite algoritmi avanzati per garantire un funzionamento ottimale\r\nTecnologia del picco di carico NoTouch: posizionamento sicuro della testina di registrazione distante dalla superficie del disco per proteggere i dati\r\nIntelliSeek: calcola le velocitÃ  di ricerca ottimali per ridurre vibrazioni, rumorositÃ  e consumi', '1485983926150.png', 45.99, 'HDD', 0),
(28, 'CSL - Scheda di rete PCIe (PCI-E / PCI Express) gigabit | 10/100/1000 Mbit/s / 2000 Mbit (Full-Duplex) | Lan / Fast Ethernet', 'CSL-Computer', 'VendoComproComponenti.it', 1, 44, 'tipologia di modello: scheda di rete gigabit / interfaccia: PCI-Express / collegamenti: 1 collegamento RJ45 (LAN)\r\nvelocitÃ  di trasmissione dati: 10 / 100 / 1000 Mbit (Half-Duplex) / 20 / 200 / 2000 Mbit (Full-Duplex)\r\nstandard: IEEE 802.3 10Base-T Ethernet / IEEE 802.3u 100Base-TX Fast Ethernet / IEEE 802.3ab 1000Base-T Gigabit Ethernet / IEEE 802.3x Flow Control\r\ncaratteristiche: selezione automatica della velocitÃ  / indicata per tutti gli ambienti e le funzioni di rete esistenti / connessione da PC a PC con uno switch gigabit o mediante cavo Crossover\r\ncompatibilitÃ : Microsoft Windows 98SE /Windows 2000 / Windows XP / Windows Vista / Windows 7 / Windows 8 / Windows 8.1 / Windows 10', '1485984109954.png', 19.99, 'Schede di rete', 1),
(29, 'MSI Gaming GP72 6QE(Leopard Pro)-254XFR 2.6GHz i7-6700HQ 17.3" 1920 x 1080Pixels Nero', 'MSI Gaming', 'EStore', 1, 3, 'Nota: Questo prodotto Ã¨ provvisto di un sistema operativo.\r\nCaratteristiche: hard disk da 1000GB, RAM da 8GB\r\nSchermo da 17 pollici - 1920 x 1080\r\nProcessore Intel Core i7 2.6 Ghz 6700HQ\r\nScheda grafica: NVIDIA GeForce GTX 950M da 2 GB', '1485984228800.png', 1234.56, 'Portatili', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `Basket`
--

CREATE TABLE `Basket` (
  `ID` int(11) NOT NULL,
  `AID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `Basket`
--

INSERT INTO `Basket` (`ID`, `AID`, `UID`, `Quantity`) VALUES
(2, 5, 2, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `Indirizzo_Fatturazione`
--

CREATE TABLE `Indirizzo_Fatturazione` (
  `IDBilling` int(11) NOT NULL,
  `IDUtente` int(11) NOT NULL,
  `Name_Surname` text COLLATE utf8_bin NOT NULL,
  `Address_1` text COLLATE utf8_bin NOT NULL,
  `Address_2` text COLLATE utf8_bin NOT NULL,
  `City` text COLLATE utf8_bin NOT NULL,
  `Province` text COLLATE utf8_bin NOT NULL,
  `CAP` text COLLATE utf8_bin NOT NULL,
  `Paese` text COLLATE utf8_bin NOT NULL,
  `PartitaIVA` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `Indirizzo_Fatturazione`
--

INSERT INTO `Indirizzo_Fatturazione` (`IDBilling`, `IDUtente`, `Name_Surname`, `Address_1`, `Address_2`, `City`, `Province`, `CAP`, `Paese`, `PartitaIVA`) VALUES
(1, 2, 'fwhwfoi', 'fwehfwep', '', 'Palermo', 'PA', '90100', 'ITA', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `Indirizzo_Spedizione`
--

CREATE TABLE `Indirizzo_Spedizione` (
  `IDShipment` int(11) NOT NULL,
  `IDUtente` int(11) NOT NULL,
  `Name_Surname` text COLLATE utf8_bin NOT NULL,
  `Address_1` text COLLATE utf8_bin NOT NULL,
  `Address_2` text COLLATE utf8_bin NOT NULL,
  `City` text COLLATE utf8_bin NOT NULL,
  `Province` text COLLATE utf8_bin NOT NULL,
  `CAP` text COLLATE utf8_bin NOT NULL,
  `Paese` text COLLATE utf8_bin NOT NULL,
  `Phone` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `Indirizzo_Spedizione`
--

INSERT INTO `Indirizzo_Spedizione` (`IDShipment`, `IDUtente`, `Name_Surname`, `Address_1`, `Address_2`, `City`, `Province`, `CAP`, `Paese`, `Phone`) VALUES
(1, 2, 'fwhwfoi', 'fwehfwep', '', 'Palermo', 'PA', '90100', 'ITA', '+555598465');

-- --------------------------------------------------------

--
-- Struttura della tabella `RegisterData`
--

CREATE TABLE `RegisterData` (
  `ID` int(11) NOT NULL,
  `Username` text COLLATE utf8_bin NOT NULL,
  `Name` text COLLATE utf8_bin NOT NULL,
  `Surname` text COLLATE utf8_bin NOT NULL,
  `Birth_Date` date NOT NULL,
  `Email` text COLLATE utf8_bin NOT NULL,
  `Password` text COLLATE utf8_bin NOT NULL,
  `Gender` tinyint(1) NOT NULL,
  `Reg_Date` datetime NOT NULL,
  `SALT` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `RegisterData`
--

INSERT INTO `RegisterData` (`ID`, `Username`, `Name`, `Surname`, `Birth_Date`, `Email`, `Password`, `Gender`, `Reg_Date`, `SALT`) VALUES
(1, 'utenteprova', 'Utente', 'Prova', '1993-06-16', 'utente@prova.it', '6fdc809da56bf0e04ee55cf83a0fab096e6ef3ca', 1, '2017-02-01 14:49:02', '75b0fd9c5f9a1838ccfc9c47b570dcd7a687b2475fe09a06e9491e5ec7653ef1a5d407cdc48ec815d2d9c82791f01294532b3446eeddbdf52ce32fd3d9684dc438262b850e529b21581d68d74b247fa0c52d4af637003c0f5c73e31b00524c556f41b02a03182fd25f77ca41e90f3624ae5c676440bd95ec50689ef2997d3fb9'),
(2, 'oraziogambino', 'Orazio', 'Gambino', '1970-01-01', 'oraziogambino@gmail.com', '2b205840b041841d3cc1e7cc34d95d6bf8238d59', 1, '2017-02-02 10:22:06', '5e82759807b46d466885b5ff0018ce187b0d38d11801cb05d1ce5509dace9b742366c7c98a55a4d6596c2e192e279ff8db3caa76bdbaefe2672b6cfc7c91aecf8fdafd9c277f9148143fee0bb3b90dc0e9054abd9d3d6b925f8361a5a8906035ff3d3db22919c05e3362d257714e4fad4c8d7d64485b0395abd7eb597c78728b');

-- --------------------------------------------------------

--
-- Struttura della tabella `Ricevuta`
--

CREATE TABLE `Ricevuta` (
  `IDOrdine` int(11) NOT NULL,
  `IDUtente` int(11) DEFAULT NULL,
  `PDF` text COLLATE utf8_bin NOT NULL,
  `NomeProdotto` text COLLATE utf8_bin NOT NULL,
  `Prezzo` float NOT NULL,
  `Data_Ordine` datetime NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `Ricevuta`
--

INSERT INTO `Ricevuta` (`IDOrdine`, `IDUtente`, `PDF`, `NomeProdotto`, `Prezzo`, `Data_Ordine`, `email`) VALUES
(1, 2, '1486027453507.pdf', '1 x DOOGEE X5 Pro, Unlocked 4G Smartphone - 5.0'''' IPS Screen - 2GB RAM+16GB ROM - Dual SIM Mobile with Dual Camera - Long Standby SIM Free - Android Cell Phone - White\n', 59.99, '2017-02-02 10:24:13', 'oraziogambino@gmail.com');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `AdminData`
--
ALTER TABLE `AdminData`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indici per le tabelle `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `ID_2` (`ID`);

--
-- Indici per le tabelle `Basket`
--
ALTER TABLE `Basket`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`AID`),
  ADD KEY `UID` (`UID`);

--
-- Indici per le tabelle `Indirizzo_Fatturazione`
--
ALTER TABLE `Indirizzo_Fatturazione`
  ADD PRIMARY KEY (`IDBilling`),
  ADD KEY `IDUTENTE_FATTURE` (`IDUtente`);

--
-- Indici per le tabelle `Indirizzo_Spedizione`
--
ALTER TABLE `Indirizzo_Spedizione`
  ADD PRIMARY KEY (`IDShipment`),
  ADD KEY `IDUTENTE_SPEDIZIONE` (`IDUtente`);

--
-- Indici per le tabelle `RegisterData`
--
ALTER TABLE `RegisterData`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `ID_2` (`ID`);

--
-- Indici per le tabelle `Ricevuta`
--
ALTER TABLE `Ricevuta`
  ADD PRIMARY KEY (`IDOrdine`),
  ADD KEY `IDUtente` (`IDUtente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `AdminData`
--
ALTER TABLE `AdminData`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `Articles`
--
ALTER TABLE `Articles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT per la tabella `Basket`
--
ALTER TABLE `Basket`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `Indirizzo_Fatturazione`
--
ALTER TABLE `Indirizzo_Fatturazione`
  MODIFY `IDBilling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `Indirizzo_Spedizione`
--
ALTER TABLE `Indirizzo_Spedizione`
  MODIFY `IDShipment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `RegisterData`
--
ALTER TABLE `RegisterData`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `Ricevuta`
--
ALTER TABLE `Ricevuta`
  MODIFY `IDOrdine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Basket`
--
ALTER TABLE `Basket`
  ADD CONSTRAINT `Basket_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `RegisterData` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Basket_ibfk_2` FOREIGN KEY (`AID`) REFERENCES `Articles` (`ID`) ON DELETE CASCADE;

--
-- Limiti per la tabella `Indirizzo_Fatturazione`
--
ALTER TABLE `Indirizzo_Fatturazione`
  ADD CONSTRAINT `Indirizzo_Fatturazione_ibfk_1` FOREIGN KEY (`IDUtente`) REFERENCES `RegisterData` (`ID`) ON DELETE CASCADE;

--
-- Limiti per la tabella `Indirizzo_Spedizione`
--
ALTER TABLE `Indirizzo_Spedizione`
  ADD CONSTRAINT `Indirizzo_Spedizione_ibfk_1` FOREIGN KEY (`IDUtente`) REFERENCES `RegisterData` (`ID`) ON DELETE CASCADE;

--
-- Limiti per la tabella `Ricevuta`
--
ALTER TABLE `Ricevuta`
  ADD CONSTRAINT `Ricevuta_ibfk_1` FOREIGN KEY (`IDUtente`) REFERENCES `RegisterData` (`ID`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
