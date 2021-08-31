-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2016 at 09:57 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdcaportal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `ID` bigint(90) NOT NULL,
  `Name` varchar(90) DEFAULT NULL,
  `Password` varchar(90) DEFAULT NULL,
  `time_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_out` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Super_Admin` varchar(90) DEFAULT NULL,
  `Professor` varchar(90) DEFAULT NULL,
  `Moderator` varchar(90) DEFAULT NULL,
  `First_Name` varchar(90) DEFAULT NULL,
  `Middle_Name` varchar(90) DEFAULT NULL,
  `Last_Name` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`ID`, `Name`, `Password`, `time_in`, `time_out`, `Super_Admin`, `Professor`, `Moderator`, `First_Name`, `Middle_Name`, `Last_Name`) VALUES
(1, 'Admin One', 'admin', '2016-09-26 17:05:02', '2016-09-26 17:05:02', '1', NULL, NULL, NULL, NULL, NULL),
(2, 'Admin Prof', 'professor', '2016-09-05 08:32:57', '2016-09-05 08:32:57', NULL, '1', NULL, NULL, NULL, NULL),
(3, 'Admin Moderator', 'gateway', '2016-09-04 21:16:04', '2016-09-04 21:16:04', NULL, NULL, '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `ID` bigint(90) NOT NULL,
  `Day` varchar(90) DEFAULT NULL,
  `Description` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`ID`, `Day`, `Description`) VALUES
(1, 'M', 'Monday'),
(2, 'T', 'Tuesday'),
(3, 'W', 'Wednesday'),
(4, 'H', 'Thursday'),
(5, 'F', 'Friday'),
(6, 'S', 'Saturday'),
(7, 'A', 'Sunday'),
(8, 'MF', 'Monday and Friday'),
(9, 'MWF', 'Monday,Wednesday and Friday'),
(10, 'MW', 'Monday and Wednesday'),
(11, 'MH', 'Monday and Thursday'),
(12, 'WF', 'Wednesday and Friday'),
(13, 'TH', 'Tuesday and Thursday'),
(14, 'TF', 'Tuesday and Friday'),
(15, 'MT', 'Monday and Tuesday'),
(16, 'TW', 'Tuesday and Wednesday'),
(17, 'WH', 'Wednesday and Thursday'),
(18, 'HF', 'Thursday and Friday'),
(19, 'MTH', 'Monday,Tuesday and Thursday');

-- --------------------------------------------------------

--
-- Table structure for table `enrolledstudent_fees`
--

CREATE TABLE `enrolledstudent_fees` (
  `id` int(90) NOT NULL,
  `Reference_Number` varchar(150) DEFAULT NULL,
  `studentnumber` varchar(150) DEFAULT NULL,
  `course` varchar(150) DEFAULT NULL,
  `semester` varchar(75) DEFAULT NULL,
  `schoolyear` varchar(75) DEFAULT NULL,
  `YearLevel` int(11) DEFAULT NULL,
  `Reservation_Fee` bigint(25) DEFAULT NULL,
  `Scholarship` varchar(270) DEFAULT NULL,
  `fullpayment` int(1) DEFAULT NULL,
  `Total_Misc` decimal(10,2) DEFAULT NULL,
  `Total_Lab` decimal(10,2) DEFAULT NULL,
  `Total_Other` decimal(10,2) DEFAULT NULL,
  `InitialPayment` decimal(12,0) DEFAULT NULL,
  `First_Pay` decimal(12,0) DEFAULT NULL,
  `Second_Pay` decimal(12,0) DEFAULT NULL,
  `Third_Pay` decimal(12,0) DEFAULT NULL,
  `Fourth_Pay` decimal(12,0) DEFAULT NULL,
  `withdraw` int(1) DEFAULT NULL,
  `withdrawalfee` decimal(12,0) DEFAULT NULL,
  `p_withdrawalfee` decimal(12,0) DEFAULT NULL,
  `downpayment` decimal(12,0) DEFAULT NULL,
  `tuition` decimal(12,0) DEFAULT NULL,
  `discount` decimal(12,0) DEFAULT NULL,
  `discountmisc` decimal(12,0) DEFAULT NULL,
  `discountmiscpercent` int(3) DEFAULT NULL,
  `p_tuition` decimal(12,0) DEFAULT NULL,
  `athletic` decimal(12,0) DEFAULT NULL,
  `p_athletic` decimal(12,0) DEFAULT NULL,
  `dathletic` decimal(12,0) DEFAULT NULL,
  `energy` decimal(12,0) DEFAULT NULL,
  `p_energy` decimal(12,0) DEFAULT NULL,
  `denergy` decimal(12,0) DEFAULT NULL,
  `guidance` decimal(12,0) DEFAULT NULL,
  `p_guidance` decimal(12,0) DEFAULT NULL,
  `dguidance` decimal(12,0) DEFAULT NULL,
  `idvalidation` decimal(12,0) DEFAULT NULL,
  `p_idvalidation` decimal(12,0) DEFAULT NULL,
  `didvalidation` decimal(12,0) DEFAULT NULL,
  `insurance` decimal(12,0) DEFAULT NULL,
  `p_insurance` decimal(12,0) DEFAULT NULL,
  `dinsurance` decimal(12,0) DEFAULT NULL,
  `internet` decimal(12,0) DEFAULT NULL,
  `p_internet` decimal(12,0) DEFAULT NULL,
  `dinternet` decimal(12,0) DEFAULT NULL,
  `library` decimal(12,0) DEFAULT NULL,
  `p_library` decimal(12,0) DEFAULT NULL,
  `dlibrary` decimal(12,0) DEFAULT NULL,
  `medical` decimal(12,0) DEFAULT NULL,
  `p_medical` decimal(12,0) DEFAULT NULL,
  `dmedical` decimal(12,0) DEFAULT NULL,
  `publication` decimal(12,0) DEFAULT NULL,
  `p_publication` decimal(12,0) DEFAULT NULL,
  `dpublication` decimal(12,0) DEFAULT NULL,
  `registration` decimal(12,0) DEFAULT NULL,
  `p_registration` decimal(12,0) DEFAULT NULL,
  `dregistration` decimal(12,0) DEFAULT NULL,
  `activities` decimal(12,0) DEFAULT NULL,
  `p_activities` decimal(12,0) DEFAULT NULL,
  `dactivities` decimal(12,0) DEFAULT NULL,
  `council` decimal(12,0) DEFAULT NULL,
  `p_council` decimal(12,0) DEFAULT NULL,
  `dcouncil` decimal(12,0) DEFAULT NULL,
  `development` decimal(12,0) DEFAULT NULL,
  `p_development` decimal(12,0) DEFAULT NULL,
  `ddevelopment` decimal(12,0) DEFAULT NULL,
  `cultural` decimal(12,0) DEFAULT NULL,
  `p_cultural` decimal(12,0) DEFAULT NULL,
  `dcultural` decimal(12,0) DEFAULT NULL,
  `valuesenrichment` decimal(12,0) DEFAULT NULL,
  `p_valuesenrichment` decimal(12,0) DEFAULT NULL,
  `dvaluesenrichment` decimal(12,0) DEFAULT NULL,
  `deposit` decimal(12,0) DEFAULT NULL,
  `p_deposit` decimal(12,0) DEFAULT NULL,
  `p_speechlab` decimal(12,0) DEFAULT NULL,
  `scilab` decimal(12,0) DEFAULT NULL,
  `p_scilab` decimal(12,0) DEFAULT NULL,
  `scilab2` decimal(12,0) DEFAULT NULL,
  `p_scilab2` decimal(12,0) DEFAULT NULL,
  `scilab3` decimal(12,0) DEFAULT NULL,
  `p_scilab3` decimal(12,0) DEFAULT NULL,
  `rle1` decimal(12,0) DEFAULT NULL,
  `p_rle1` decimal(12,0) DEFAULT NULL,
  `rle2` decimal(12,0) DEFAULT NULL,
  `p_rle2` decimal(12,0) DEFAULT NULL,
  `rle3` decimal(12,0) DEFAULT NULL,
  `p_rle3` decimal(12,0) DEFAULT NULL,
  `englishlab` decimal(12,0) DEFAULT NULL,
  `p_englishlab` decimal(12,0) DEFAULT NULL,
  `mathlab` decimal(12,0) DEFAULT NULL,
  `p_mathlab` decimal(12,0) DEFAULT NULL,
  `computerlab` decimal(12,0) DEFAULT NULL,
  `p_computerlab` decimal(12,0) DEFAULT NULL,
  `culinarylab` decimal(12,0) DEFAULT NULL,
  `p_culinarylab` decimal(12,0) DEFAULT NULL,
  `barlab` decimal(12,0) DEFAULT NULL,
  `p_barlab` decimal(12,0) DEFAULT NULL,
  `frontofficelab` decimal(12,0) DEFAULT NULL,
  `p_frontofficelab` decimal(12,0) DEFAULT NULL,
  `basimulationlab` decimal(12,0) DEFAULT NULL,
  `p_basimulationlab` decimal(12,0) DEFAULT NULL,
  `studiolab` decimal(12,0) DEFAULT NULL,
  `p_studiolab` decimal(12,0) DEFAULT NULL,
  `multimedialab` decimal(12,0) DEFAULT NULL,
  `p_multimedialab` decimal(12,0) DEFAULT NULL,
  `suitelab` decimal(12,0) DEFAULT NULL,
  `p_suitelab` decimal(12,0) DEFAULT NULL,
  `laundrylab` decimal(12,0) DEFAULT NULL,
  `p_laundrylab` decimal(12,0) DEFAULT NULL,
  `psychlab` decimal(12,0) DEFAULT NULL,
  `p_psychlab` decimal(12,0) DEFAULT NULL,
  `nvsllab` decimal(12,0) DEFAULT NULL,
  `p_nvsllab` decimal(12,0) DEFAULT NULL,
  `hotkitchenlab` decimal(12,0) DEFAULT NULL,
  `p_hotkitchenlab` decimal(12,0) DEFAULT NULL,
  `kitchen2lab` decimal(12,0) DEFAULT NULL,
  `p_kitchen2lab` decimal(12,0) DEFAULT NULL,
  `kitchen1lab` decimal(12,0) DEFAULT NULL,
  `p_kitchen1lab` decimal(12,0) DEFAULT NULL,
  `microbiolab` decimal(12,0) DEFAULT NULL,
  `p_microbiolab` decimal(12,0) DEFAULT NULL,
  `mlslab` decimal(12,0) DEFAULT NULL,
  `p_mlslab` decimal(12,0) DEFAULT NULL,
  `ptrehablab` decimal(12,0) DEFAULT NULL,
  `p_ptrehablab` decimal(12,0) DEFAULT NULL,
  `physicslab` decimal(12,0) DEFAULT NULL,
  `p_physicslab` decimal(12,0) DEFAULT NULL,
  `chemistrylab` decimal(12,0) DEFAULT NULL,
  `p_chemistrylab` decimal(12,0) DEFAULT NULL,
  `analab` decimal(12,0) DEFAULT NULL,
  `p_analab` decimal(12,0) DEFAULT NULL,
  `pharmacylab` decimal(12,0) DEFAULT NULL,
  `p_pharmacylab` decimal(12,0) DEFAULT NULL,
  `psychtestingfee` decimal(12,0) DEFAULT NULL,
  `p_psychtestingfee` decimal(12,0) DEFAULT NULL,
  `caafee` decimal(12,0) DEFAULT NULL,
  `p_caafee` decimal(12,0) DEFAULT NULL,
  `tutorialfee` decimal(12,0) DEFAULT NULL,
  `p_tutorialfee` decimal(12,0) DEFAULT NULL,
  `fieldstudyfee` decimal(12,0) DEFAULT NULL,
  `p_fieldstudyfee` decimal(12,0) DEFAULT NULL,
  `educatormemfee` decimal(12,0) DEFAULT NULL,
  `p_educatormemfee` decimal(12,0) DEFAULT NULL,
  `sasememfee` decimal(12,0) DEFAULT NULL,
  `p_sasememfee` decimal(12,0) DEFAULT NULL,
  `practiceteachingfee` decimal(12,0) DEFAULT NULL,
  `p_practiceteachingfee` decimal(12,0) DEFAULT NULL,
  `foodbeveragefee` decimal(12,0) DEFAULT NULL,
  `p_foodbeveragefee` decimal(12,0) DEFAULT NULL,
  `vaccinationA` decimal(12,0) DEFAULT NULL,
  `p_vaccinationA` decimal(12,0) DEFAULT NULL,
  `vaccinationB` decimal(12,0) DEFAULT NULL,
  `p_vaccinationB` decimal(12,0) DEFAULT NULL,
  `veteransfee` decimal(12,0) DEFAULT NULL,
  `p_veteransfee` decimal(12,0) DEFAULT NULL,
  `bfcsfee` decimal(12,0) DEFAULT NULL,
  `p_bfcsfee` decimal(12,0) DEFAULT NULL,
  `foreignfee` decimal(12,0) DEFAULT NULL,
  `p_foreignfee` decimal(12,0) DEFAULT NULL,
  `seminarfee` decimal(12,0) DEFAULT NULL,
  `p_seminarfee` decimal(12,0) DEFAULT NULL,
  `nstp` decimal(12,0) DEFAULT NULL,
  `p_nstp` decimal(12,0) DEFAULT NULL,
  `research` decimal(12,0) DEFAULT NULL,
  `p_research` decimal(12,0) DEFAULT NULL,
  `intrams` decimal(12,0) DEFAULT NULL,
  `p_intrams` decimal(12,0) DEFAULT NULL,
  `collegeday` decimal(12,0) DEFAULT NULL,
  `p_collegeday` decimal(12,0) DEFAULT NULL,
  `tour` decimal(12,0) DEFAULT NULL,
  `p_tour` decimal(12,0) DEFAULT NULL,
  `swimming` decimal(12,0) DEFAULT NULL,
  `p_swimming` decimal(12,0) DEFAULT NULL,
  `thesisproposal` decimal(12,0) DEFAULT NULL,
  `p_thesisproposal` decimal(12,0) DEFAULT NULL,
  `thesiswriting` decimal(12,0) DEFAULT NULL,
  `p_thesiswriting` decimal(12,0) DEFAULT NULL,
  `graduationfee` decimal(12,0) DEFAULT NULL,
  `p_graduationfee` decimal(12,0) DEFAULT NULL,
  `transportation` decimal(12,0) DEFAULT NULL,
  `p_transportation` decimal(12,0) DEFAULT NULL,
  `affiliation` decimal(12,0) DEFAULT NULL,
  `p_affiliation` decimal(12,0) DEFAULT NULL,
  `teambuilding` decimal(12,0) DEFAULT NULL,
  `p_teambuilding` decimal(12,0) DEFAULT NULL,
  `TESDA` decimal(12,0) DEFAULT NULL,
  `p_TESDA` decimal(12,0) DEFAULT NULL,
  `clinicalaffiliation` decimal(12,0) DEFAULT NULL,
  `p_clinicalaffiliation` decimal(12,0) DEFAULT NULL,
  `homeroom` decimal(12,0) DEFAULT NULL,
  `p_homeroom` decimal(12,0) DEFAULT NULL,
  `other1` decimal(12,0) DEFAULT NULL,
  `speechlab` decimal(12,0) DEFAULT NULL,
  `p_other1` decimal(12,0) DEFAULT NULL,
  `other2` decimal(12,0) DEFAULT NULL,
  `p_other2` decimal(12,0) DEFAULT NULL,
  `other3` decimal(12,0) DEFAULT NULL,
  `p_other3` decimal(12,0) DEFAULT NULL,
  `other4` decimal(12,0) DEFAULT NULL,
  `p_other4` decimal(12,0) DEFAULT NULL,
  `other5` decimal(12,0) DEFAULT NULL,
  `p_other5` decimal(12,0) DEFAULT NULL,
  `ojt` decimal(12,0) DEFAULT NULL,
  `p_ojt` decimal(12,0) DEFAULT NULL,
  `practicum` decimal(12,0) DEFAULT NULL,
  `p_practicum` decimal(12,0) DEFAULT NULL,
  `philcross` decimal(12,0) DEFAULT NULL,
  `p_philcross` decimal(12,0) DEFAULT NULL,
  `menuplanninglab` decimal(12,0) DEFAULT NULL,
  `p_menuplanninglab` decimal(12,0) DEFAULT NULL,
  `foodproductionlab` decimal(12,0) DEFAULT NULL,
  `p_foodproductionlab` decimal(12,0) DEFAULT NULL,
  `eventmanagementlab` decimal(12,0) DEFAULT NULL,
  `p_eventmanagementlab` decimal(12,0) DEFAULT NULL,
  `rle4` decimal(12,0) DEFAULT NULL,
  `p_rle4` decimal(12,0) DEFAULT NULL,
  `rle5` decimal(12,0) DEFAULT NULL,
  `p_rle5` decimal(12,0) DEFAULT NULL,
  `assessment` decimal(12,0) DEFAULT NULL,
  `p_assessment` decimal(12,0) DEFAULT NULL,
  `housekeepinglab` decimal(12,0) DEFAULT NULL,
  `p_housekeepinglab` decimal(12,0) DEFAULT NULL,
  `saplab` decimal(12,0) DEFAULT NULL,
  `p_saplab` decimal(12,0) DEFAULT NULL,
  `bacteriologylab` decimal(12,0) DEFAULT NULL,
  `p_bacteriologylab` decimal(12,0) DEFAULT NULL,
  `ccncII` decimal(12,0) DEFAULT NULL,
  `p_ccncII` decimal(12,0) DEFAULT NULL,
  `bartendingncII` decimal(12,0) DEFAULT NULL,
  `p_bartendingncII` decimal(12,0) DEFAULT NULL,
  `fbsncII` decimal(12,0) DEFAULT NULL,
  `p_fbsncII` decimal(12,0) DEFAULT NULL,
  `fbsncIII` decimal(12,0) DEFAULT NULL,
  `p_fbsncIII` decimal(12,0) DEFAULT NULL,
  `bpncII` decimal(12,0) DEFAULT NULL,
  `p_bpncII` decimal(12,0) DEFAULT NULL,
  `hkncII` decimal(12,0) DEFAULT NULL,
  `p_hkncII` decimal(12,0) DEFAULT NULL,
  `foncII` decimal(12,0) DEFAULT NULL,
  `p_foncII` decimal(12,0) DEFAULT NULL,
  `chsncII` decimal(12,0) DEFAULT NULL,
  `p_chsncII` decimal(12,0) DEFAULT NULL,
  `caregivingncII` decimal(12,0) DEFAULT NULL,
  `p_caregivingncII` decimal(12,0) DEFAULT NULL,
  `AMHeartAscFee` decimal(12,0) DEFAULT NULL,
  `p_AMHeartAscFee` decimal(12,0) DEFAULT NULL,
  `broadcasting` decimal(12,0) DEFAULT NULL,
  `p_broadcasting` decimal(12,0) DEFAULT NULL,
  `mscertification` decimal(12,0) DEFAULT NULL,
  `p_mscertification` decimal(12,0) DEFAULT NULL,
  `transportation1` decimal(12,0) DEFAULT NULL,
  `p_transportation1` decimal(12,0) DEFAULT NULL,
  `transportation2` decimal(12,0) DEFAULT NULL,
  `p_transportation2` decimal(12,0) DEFAULT NULL,
  `transportation3` decimal(12,0) DEFAULT NULL,
  `p_transportation3` decimal(12,0) DEFAULT NULL,
  `transportation4` decimal(12,0) DEFAULT NULL,
  `p_transportation4` decimal(12,0) DEFAULT NULL,
  `transportation5` decimal(12,0) DEFAULT NULL,
  `p_transportation5` decimal(12,0) DEFAULT NULL,
  `affiliation1` decimal(12,0) DEFAULT NULL,
  `p_affiliation1` decimal(12,0) DEFAULT NULL,
  `affiliation2` decimal(12,0) DEFAULT NULL,
  `p_affiliation2` decimal(12,0) DEFAULT NULL,
  `affiliation3` decimal(12,0) DEFAULT NULL,
  `p_affiliation3` decimal(12,0) DEFAULT NULL,
  `affiliation4` decimal(12,0) DEFAULT NULL,
  `p_affiliation4` decimal(12,0) DEFAULT NULL,
  `affiliation5` decimal(12,0) DEFAULT NULL,
  `p_affiliation5` decimal(12,0) DEFAULT NULL,
  `blssfat` decimal(12,0) DEFAULT NULL,
  `p_blssfat` decimal(12,0) DEFAULT NULL,
  `workskills` decimal(12,0) DEFAULT NULL,
  `p_workskills` decimal(12,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolledstudent_fees`
--

INSERT INTO `enrolledstudent_fees` (`id`, `Reference_Number`, `studentnumber`, `course`, `semester`, `schoolyear`, `YearLevel`, `Reservation_Fee`, `Scholarship`, `fullpayment`, `Total_Misc`, `Total_Lab`, `Total_Other`, `InitialPayment`, `First_Pay`, `Second_Pay`, `Third_Pay`, `Fourth_Pay`, `withdraw`, `withdrawalfee`, `p_withdrawalfee`, `downpayment`, `tuition`, `discount`, `discountmisc`, `discountmiscpercent`, `p_tuition`, `athletic`, `p_athletic`, `dathletic`, `energy`, `p_energy`, `denergy`, `guidance`, `p_guidance`, `dguidance`, `idvalidation`, `p_idvalidation`, `didvalidation`, `insurance`, `p_insurance`, `dinsurance`, `internet`, `p_internet`, `dinternet`, `library`, `p_library`, `dlibrary`, `medical`, `p_medical`, `dmedical`, `publication`, `p_publication`, `dpublication`, `registration`, `p_registration`, `dregistration`, `activities`, `p_activities`, `dactivities`, `council`, `p_council`, `dcouncil`, `development`, `p_development`, `ddevelopment`, `cultural`, `p_cultural`, `dcultural`, `valuesenrichment`, `p_valuesenrichment`, `dvaluesenrichment`, `deposit`, `p_deposit`, `p_speechlab`, `scilab`, `p_scilab`, `scilab2`, `p_scilab2`, `scilab3`, `p_scilab3`, `rle1`, `p_rle1`, `rle2`, `p_rle2`, `rle3`, `p_rle3`, `englishlab`, `p_englishlab`, `mathlab`, `p_mathlab`, `computerlab`, `p_computerlab`, `culinarylab`, `p_culinarylab`, `barlab`, `p_barlab`, `frontofficelab`, `p_frontofficelab`, `basimulationlab`, `p_basimulationlab`, `studiolab`, `p_studiolab`, `multimedialab`, `p_multimedialab`, `suitelab`, `p_suitelab`, `laundrylab`, `p_laundrylab`, `psychlab`, `p_psychlab`, `nvsllab`, `p_nvsllab`, `hotkitchenlab`, `p_hotkitchenlab`, `kitchen2lab`, `p_kitchen2lab`, `kitchen1lab`, `p_kitchen1lab`, `microbiolab`, `p_microbiolab`, `mlslab`, `p_mlslab`, `ptrehablab`, `p_ptrehablab`, `physicslab`, `p_physicslab`, `chemistrylab`, `p_chemistrylab`, `analab`, `p_analab`, `pharmacylab`, `p_pharmacylab`, `psychtestingfee`, `p_psychtestingfee`, `caafee`, `p_caafee`, `tutorialfee`, `p_tutorialfee`, `fieldstudyfee`, `p_fieldstudyfee`, `educatormemfee`, `p_educatormemfee`, `sasememfee`, `p_sasememfee`, `practiceteachingfee`, `p_practiceteachingfee`, `foodbeveragefee`, `p_foodbeveragefee`, `vaccinationA`, `p_vaccinationA`, `vaccinationB`, `p_vaccinationB`, `veteransfee`, `p_veteransfee`, `bfcsfee`, `p_bfcsfee`, `foreignfee`, `p_foreignfee`, `seminarfee`, `p_seminarfee`, `nstp`, `p_nstp`, `research`, `p_research`, `intrams`, `p_intrams`, `collegeday`, `p_collegeday`, `tour`, `p_tour`, `swimming`, `p_swimming`, `thesisproposal`, `p_thesisproposal`, `thesiswriting`, `p_thesiswriting`, `graduationfee`, `p_graduationfee`, `transportation`, `p_transportation`, `affiliation`, `p_affiliation`, `teambuilding`, `p_teambuilding`, `TESDA`, `p_TESDA`, `clinicalaffiliation`, `p_clinicalaffiliation`, `homeroom`, `p_homeroom`, `other1`, `speechlab`, `p_other1`, `other2`, `p_other2`, `other3`, `p_other3`, `other4`, `p_other4`, `other5`, `p_other5`, `ojt`, `p_ojt`, `practicum`, `p_practicum`, `philcross`, `p_philcross`, `menuplanninglab`, `p_menuplanninglab`, `foodproductionlab`, `p_foodproductionlab`, `eventmanagementlab`, `p_eventmanagementlab`, `rle4`, `p_rle4`, `rle5`, `p_rle5`, `assessment`, `p_assessment`, `housekeepinglab`, `p_housekeepinglab`, `saplab`, `p_saplab`, `bacteriologylab`, `p_bacteriologylab`, `ccncII`, `p_ccncII`, `bartendingncII`, `p_bartendingncII`, `fbsncII`, `p_fbsncII`, `fbsncIII`, `p_fbsncIII`, `bpncII`, `p_bpncII`, `hkncII`, `p_hkncII`, `foncII`, `p_foncII`, `chsncII`, `p_chsncII`, `caregivingncII`, `p_caregivingncII`, `AMHeartAscFee`, `p_AMHeartAscFee`, `broadcasting`, `p_broadcasting`, `mscertification`, `p_mscertification`, `transportation1`, `p_transportation1`, `transportation2`, `p_transportation2`, `transportation3`, `p_transportation3`, `transportation4`, `p_transportation4`, `transportation5`, `p_transportation5`, `affiliation1`, `p_affiliation1`, `affiliation2`, `p_affiliation2`, `affiliation3`, `p_affiliation3`, `affiliation4`, `p_affiliation4`, `affiliation5`, `p_affiliation5`, `blssfat`, `p_blssfat`, `workskills`, `p_workskills`) VALUES
(1, '1', '20130150', 'BSIT', 'First', '2016-2017', 4, NULL, NULL, NULL, '7959.00', '0.00', '11274.19', '14500', '5000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8609', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '1', '20122411', 'BSIT', 'First', '2016-2017', 4, NULL, NULL, NULL, '7959.00', '0.00', '11274.19', '14500', '5000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8610', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enrolledstudent_payments_throughput`
--

CREATE TABLE `enrolledstudent_payments_throughput` (
  `id` int(11) NOT NULL,
  `Reference_Number` varchar(90) NOT NULL,
  `Student_Number` varchar(90) NOT NULL,
  `AmountofPayment` decimal(10,2) NOT NULL,
  `OR_Number` varchar(90) NOT NULL,
  `itemPaid` varchar(45) NOT NULL,
  `Transaction_Item` varchar(90) DEFAULT NULL,
  `transDate` timestamp NULL DEFAULT NULL,
  `Transaction_Type` varchar(90) DEFAULT NULL,
  `description` varchar(90) DEFAULT NULL,
  `Semester` varchar(45) DEFAULT NULL,
  `SchoolYear` varchar(90) DEFAULT NULL,
  `cashier` varchar(90) DEFAULT NULL,
  `valid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolledstudent_payments_throughput`
--

INSERT INTO `enrolledstudent_payments_throughput` (`id`, `Reference_Number`, `Student_Number`, `AmountofPayment`, `OR_Number`, `itemPaid`, `Transaction_Item`, `transDate`, `Transaction_Type`, `description`, `Semester`, `SchoolYear`, `cashier`, `valid`) VALUES
(1, '1', '20130150', '5000.00', '', 'Prelim', '', '2016-08-27 07:00:00', '', '', 'First', '2016', 'Leonor', 0),
(2, '1', '20122411', '5000.00', '', 'Tuition', '', '2016-08-27 07:00:00', '', '', 'First', '2016', 'Leonor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `enrolledstudent_subjects`
--

CREATE TABLE `enrolledstudent_subjects` (
  `ID` bigint(90) NOT NULL,
  `Reference_Number` bigint(90) DEFAULT NULL,
  `Student_Number` varchar(90) DEFAULT NULL,
  `Sched_Code` varchar(90) DEFAULT NULL,
  `Semester` varchar(90) DEFAULT NULL,
  `School_Year` varchar(90) DEFAULT NULL,
  `Scheduler` varchar(90) DEFAULT NULL,
  `Sdate` varchar(90) DEFAULT NULL,
  `Status` varchar(90) DEFAULT NULL,
  `Program` varchar(90) DEFAULT NULL,
  `Major` varchar(90) DEFAULT NULL,
  `Year_Level` varchar(90) DEFAULT NULL,
  `Payment_Plan` varchar(90) DEFAULT NULL,
  `Section` varchar(90) DEFAULT NULL,
  `Dropped` int(1) DEFAULT NULL,
  `Cancelled` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolledstudent_subjects`
--

INSERT INTO `enrolledstudent_subjects` (`ID`, `Reference_Number`, `Student_Number`, `Sched_Code`, `Semester`, `School_Year`, `Scheduler`, `Sdate`, `Status`, `Program`, `Major`, `Year_Level`, `Payment_Plan`, `Section`, `Dropped`, `Cancelled`) VALUES
(1, 1, '20130150', '201520365', 'Second', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(2, 2, '20122411', '201520365', 'Second', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(3, 3, '20130150', '201520359', 'Second', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(4, 4, '20122411', '201520359', 'Second', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(5, 5, '20122411', '201520360', 'Second', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(6, 6, '20130150', '201520360', 'Second', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(7, 7, '20130150', '201310189', 'First', '2013-2014', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(8, 8, '20122411', '201310189', 'First', '2013-2014', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(9, 9, '20122411', '201320283', 'First', '2013-2014', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(10, 10, '20130150', '201320283', 'First', '2013-2014', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(11, 11, '20130150', '201310283', 'Second', '2013-2014', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(12, 12, '20122411', '201310283', 'Second', '2013-2014', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(13, 13, '20122411', '201310286', 'Second', '2013-2014', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(14, 14, '20130150', '201310286', 'Second', '2013-2014', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(15, 15, '20130150', '201610291', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(16, 16, '20122411', '201610291', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(17, 17, '20130150', '201610295', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(18, 18, '20122411', '201610295', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(19, 19, '20130150', '201610293', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(20, 20, '20122411', '201610293', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(21, 21, '20110150', '201610293', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(22, 22, '20130805', '201610293', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(23, 23, '20130112', '201610293', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(24, 24, '20140495', '201520361', 'Second', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '3', 'Installment', 'A', 0, 0),
(25, 25, '20130658', '201520359', 'Second', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '3', 'Installment', 'A', 0, 0),
(26, 26, '20130441', '201320286', 'Second', '2013-2014', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(27, 27, '20123116', '201320286', 'Second', '2013-2014', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(28, 28, '20140116', '201310283', 'Second', '2013-2014', '', '', '', 'Bachelor Of Science in Pharmacy', '', '3', 'Installment', 'A', 0, 0),
(29, 29, '20121439', '201610291', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Business Administration', '', '4', 'Installment', 'A', 0, 0),
(30, 30, '20141099', '201610291', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Business Administration', '', '4', 'Installment', 'A', 0, 0),
(31, 31, '20130688', '201610291', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Information technology', '', '3', 'Installment', 'A', 0, 0),
(32, 32, '20150530', '201610293', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '4', 'Installment', 'A', 0, 0),
(33, 33, '20150525', '201610295', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '2', 'Installment', 'A', 0, 0),
(34, 34, '20150545', '201610291', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '2', 'Installment', 'A', 0, 0),
(35, 35, '20150537', '201610293', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '2', 'Installment', 'A', 0, 0),
(36, 36, '20150542', '201610295', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '2', 'Installment', 'A', 0, 0),
(37, 37, '20130114', '201520365', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Tourism Management', '', '4', 'Installment', 'A', 0, 0),
(38, 38, '20130359', '201310189', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Computer Science', '', '4', 'Installment', 'A', 0, 0),
(39, 39, '20150622', '201310283', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '2', 'Installment', 'A', 0, 0),
(40, 40, '20131366', '201320283', 'Second', '2013-2014', '', '', '', 'Bachelor Of Science in Information Technology', '', '3', 'Installment', 'A', 0, 0),
(41, 41, '20150356', '201310189', 'Second', '2013-2014', '', '', '', 'Bachelor Of Science in Information Technology', '', '2', 'Installment', 'A', 0, 0),
(42, 42, '20123193', '201320283', 'Second', '2015-2016', '', '', '', 'Bachelor Of Science in Computer Science', '', '4', 'Installment', 'A', 0, 0),
(43, 43, '20151047', '201310283', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Hospitality Management', '', '1', 'Installment', 'B', 0, 0),
(44, 44, '20140033', '201310189', 'Second', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '3', 'Installment', 'A', 0, 0),
(45, 45, '20122526', '201610295', 'First', '2015-2016', '', '', '', 'Bachelor Of Medical Laboratory \r\nScience', '', '4', 'Installment', 'A', 0, 0),
(46, 46, '20122824', '201610295', 'First', '2015-2016', '', '', '', 'Bachelor Of Medical Laboratory \r\nScience', '', '4', 'Installment', 'A', 0, 0),
(47, 47, '20130451', '201610295', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Business Administration', 'Financial Management', '4', 'Installment', 'A', 0, 0),
(48, 48, '20150116', '201610295', 'First', '2015-2016', '', '', '', 'Bachelor Of Arts in Multimedia Arts', '', '2', 'Installment', 'A', 0, 0),
(49, 49, '20140467', '201610295', 'First', '2014-2015', '', '', '', 'Bachelor Of Science in Information Technology', '', '3', 'Installment', 'A', 0, 0),
(50, 50, '20150688', '201610295', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Psychology', '', '2', 'Installment', 'A', 0, 0),
(51, 51, '20130082', '201610295', 'First', '2015-2016', '', '', '', 'Bachelor Of Science in Computer Science', '', '4', 'Installment', 'A', 0, 0),
(52, 52, '20141547', '201610295', 'First', '2015-2016', '', '', '', 'Bachelor Of Arts in Multimedia Arts', '', '4', 'Installment', 'A', 0, 0),
(53, 53, '20150340', '201310189', 'Second', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '2', 'Installment', 'A', 0, 0),
(54, 54, '20150355', '201310189', 'Second', '2015-2016', '', '', '', 'Bachelor Of Science in Information Technology', '', '2', 'Installment', 'A', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_calendar`
--

CREATE TABLE `event_calendar` (
  `Event_ID` int(90) NOT NULL,
  `Event_Name` varchar(90) DEFAULT NULL,
  `Date` timestamp NULL DEFAULT NULL,
  `Location` varchar(90) DEFAULT NULL,
  `Department` varchar(90) DEFAULT NULL,
  `Course` varchar(90) DEFAULT NULL,
  `ID` bigint(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_calendar`
--

INSERT INTO `event_calendar` (`Event_ID`, `Event_Name`, `Date`, `Location`, `Department`, `Course`, `ID`) VALUES
(1, 'ISAA', '2016-09-05 16:00:00', 'Moa Arena', 'All', 'All', 0),
(2, 'TEST', '2016-09-13 16:00:00', 'TEST', 'TEST', 'TEST', 0),
(3, 'TEST2', '2016-09-13 16:00:00', 'TEST2', 'TEST2', 'TEST2', 0),
(4, 'Test', '2015-05-09 16:00:00', 'test', 'test', 'test', 0),
(5, 'Defense', '2015-05-04 16:00:00', '132sad', 'dasdsdsads', 'asd', 0),
(6, 'asd', '0000-00-00 00:00:00', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gradecompletion`
--

CREATE TABLE `gradecompletion` (
  `ID` int(90) NOT NULL,
  `Course_Code` varchar(90) DEFAULT NULL,
  `Schedcode` varchar(90) DEFAULT NULL,
  `Student_Number` varchar(90) DEFAULT NULL,
  `REF_Semester` varchar(90) DEFAULT NULL,
  `REF_SchoolYear` varchar(90) DEFAULT NULL,
  `COMP_Semester` varchar(90) DEFAULT NULL,
  `COMP_SchoolYear` varchar(90) DEFAULT NULL,
  `Final_Grade` decimal(65,2) DEFAULT NULL,
  `Remarks` varchar(90) DEFAULT NULL,
  `DateUpdated` datetime DEFAULT NULL,
  `username` varchar(90) DEFAULT NULL,
  `OldSysID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gradecompletion`
--

INSERT INTO `gradecompletion` (`ID`, `Course_Code`, `Schedcode`, `Student_Number`, `REF_Semester`, `REF_SchoolYear`, `COMP_Semester`, `COMP_SchoolYear`, `Final_Grade`, `Remarks`, `DateUpdated`, `username`, `OldSysID`) VALUES
(1, '', '', '20130150', '', '2013', 'First', '2013', '90.00', 'Passed', '0000-00-00 00:00:00', '', 0),
(2, '', '', '20122411', '', '', '', '', '0.00', 'Passed', '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `grading`
--

CREATE TABLE `grading` (
  `ID` bigint(90) NOT NULL,
  `Student_Number` bigint(90) DEFAULT NULL,
  `Subject_Code` varchar(250) DEFAULT NULL,
  `Sched_Code` int(90) NOT NULL,
  `Semester` varchar(90) DEFAULT NULL,
  `SchoolYear` varchar(90) DEFAULT NULL,
  `Prelim` decimal(65,2) DEFAULT NULL,
  `Midterm` decimal(65,2) DEFAULT NULL,
  `Finals` decimal(65,2) DEFAULT NULL,
  `RLEGrade` decimal(65,2) DEFAULT NULL,
  `Final_Grade` decimal(65,2) DEFAULT NULL,
  `Remarks_ID` int(90) NOT NULL,
  `Completed` int(1) NOT NULL,
  `OldSysID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grading`
--

INSERT INTO `grading` (`ID`, `Student_Number`, `Subject_Code`, `Sched_Code`, `Semester`, `SchoolYear`, `Prelim`, `Midterm`, `Finals`, `RLEGrade`, `Final_Grade`, `Remarks_ID`, `Completed`, `OldSysID`) VALUES
(1, 20130150, 'ITP325', 201520365, 'Second', '2015-2016', '89.00', '89.00', '89.00', '0.00', '89.00', 0, 0, 123),
(2, 20130150, 'EU321', 201520359, 'Second', '2015-2016', '91.00', '92.00', '92.00', '0.00', '92.00', 0, 0, 0),
(3, 20130150, 'ITE322', 201520360, 'Second', '2015-2016', '93.60', '92.50', '91.00', '0.00', '92.00', 0, 0, 0),
(4, 20122411, 'ITE322', 201520360, 'Second', '2015-2016', '92.00', '92.00', '92.00', '0.00', '92.00', 0, 0, 0),
(5, 20122411, 'EU321', 201520359, 'Second', '2014-2015', '91.00', '92.00', '92.00', '0.00', '92.00', 0, 0, 0),
(6, 20122411, 'ITP325', 201520365, 'Second', '2015-2016', '89.00', '89.00', '89.00', '0.00', '89.00', 0, 0, 123),
(7, 20130150, 'IT111', 201310189, 'First', '2013-2014', '87.00', '88.00', '89.00', '0.00', '88.00', 0, 0, 123),
(8, 20122411, 'IT111', 201310189, 'First', '2013-2014', '90.00', '89.00', '92.00', '0.00', '90.00', 0, 0, 123),
(9, 20122411, 'ITC111', 201320283, 'First', '2013-2014', '87.00', '89.00', '91.00', '0.00', '89.00', 0, 0, 123),
(10, 20130150, 'ITC111', 201320283, 'First', '2013-2014', '88.00', '88.00', '89.00', '0.00', '88.00', 0, 0, 123),
(11, 20130150, 'EU121', 201310283, 'Second', '2013-2014', '88.00', '88.00', '89.00', '0.00', '88.00', 0, 0, 123),
(12, 20122411, 'EU121', 201310283, 'Second', '2013-2014', '88.00', '88.00', '89.00', '0.00', '88.00', 0, 0, 123),
(13, 20122411, 'ITC112', 201310286, 'Second', '2013-2014', '88.00', '88.00', '89.00', '0.00', '88.00', 0, 0, 123),
(14, 20130150, 'ITC112', 201310286, 'Second', '2013-2014', '85.00', '88.00', '85.00', '0.00', '86.00', 0, 0, 123),
(15, 20130150, 'ITF311', 201610291, 'First', '2015-2016', '85.00', '85.00', '85.00', '0.00', '85.00', 0, 0, 123),
(16, 20122411, 'ITF311', 201610291, 'First', '2015-2016', '90.00', '90.00', '85.00', '0.00', '88.00', 0, 0, 123),
(17, 20130150, 'LIT121', 201610295, 'First', '2015-2016', '85.00', '85.00', '85.00', '0.00', '85.00', 0, 0, 123),
(18, 20122411, 'LIT121', 201610295, 'First', '2015-2016', '90.00', '90.00', '85.00', '0.00', '88.00', 0, 0, 123),
(19, 20122411, 'ITP312', 201610293, 'First', '2015-2016', '87.00', '90.00', '85.00', '0.00', '87.00', 0, 0, 123),
(20, 20130150, 'ITP312', 201610293, 'First', '2015-2016', '87.00', '90.00', '85.00', '0.00', '87.00', 0, 0, 123),
(21, 20110150, 'ITP312', 201610293, 'First', '2015-2016', '85.00', '86.00', '87.50', '0.00', '86.17', 0, 0, 123),
(22, 20130805, 'ITP312', 201610293, 'First', '2015-2016', '84.00', '83.80', '87.50', '0.00', '85.10', 0, 0, 123),
(23, 20130112, 'ITP312', 201610293, 'First', '2015-2016', '84.00', '83.80', '87.50', '0.00', '85.10', 0, 0, 123),
(24, 20140495, 'ITE322', 201520361, 'Second', '2015-2016', '80.00', '89.53', '91.36', '0.00', '86.96', 0, 0, 123),
(25, 20130658, 'EU321', 201520359, 'Second', '2014-2015', '90.00', '91.00', '92.87', '0.00', '91.29', 0, 0, 123),
(26, 20130441, 'ITC112', 201320286, 'Second', '2013-2014', '80.00', '85.00', '82.00', '0.00', '82.30', 0, 0, 123),
(27, 20123116, 'ITC112', 201320286, 'Second', '2013-2014', '87.00', '85.00', '82.00', '0.00', '84.67', 0, 0, 123),
(28, 20140116, 'EU121', 201310283, 'Second', '2013-2014', '97.00', '80.00', '81.00', '0.00', '84.00', 0, 0, 123),
(29, 20121439, 'ITF311', 201610291, 'First', '2015-2016', '87.00', '92.54', '92.37', '0.00', '90.63', 0, 0, 123),
(30, 20141099, 'ITF311', 201610291, 'First', '2015-2016', '77.00', '92.54', '93.00', '0.00', '87.51', 0, 0, 123),
(31, 20130688, 'ITF311', 201610291, 'First', '2015-2016', '81.00', '78.96', '95.51', '0.00', '85.16', 0, 0, 123),
(32, 20150530, 'ITF311', 201610293, 'First', '2015-2016', '81.00', '78.96', '95.51', '0.00', '85.16', 0, 0, 123),
(33, 20150525, 'LIT121', 201610295, 'First', '2015-2016', '81.94', '88.13', '89.64', '0.00', '86.57', 0, 0, 123),
(34, 20150545, 'ITF311', 201610291, 'First', '2015-2016', '82.94', '85.64', '91.74', '0.00', '86.77', 0, 0, 123),
(35, 20150537, 'ITP312', 201610293, 'First', '2015-2016', '87.94', '85.74', '91.00', '0.00', '88.23', 0, 0, 123),
(36, 20150542, 'ITP312', 201610295, 'First', '2015-2016', '82.58', '91.88', '79.30', '0.00', '84.59', 0, 0, 123),
(37, 20130114, 'ITP325', 201520365, 'Second', '2015-2016', '87.50', '90.25', '80.30', '0.00', '86.02', 0, 0, 123),
(38, 20130359, 'IT111', 201310189, 'First', '2013-2014', '85.63', '93.30', '90.25', '0.00', '89.73', 0, 0, 123),
(39, 20150622, 'EU121', 201310283, 'Second', '2013-2014', '94.63', '92.36', '79.21', '0.00', '88.73', 0, 0, 123),
(40, 20131366, 'ITC111', 201320283, 'Second', '2013-2014', '86.21', '84.65', '84.10', '0.00', '84.00', 0, 0, 123),
(41, 20150356, 'IT111', 201310189, 'First', '2013-2014', '80.00', '86.21', '85.41', '0.00', '83.87', 0, 0, 123),
(42, 20123193, 'IT111', 201320283, 'Second', '2015-2016', '90.52', '91.63', '90.48', '0.00', '90.88', 0, 0, 123),
(43, 20151047, 'EU121', 201310283, 'First', '2015-2016', '90.52', '89.54', '88.96', '0.00', '89.67', 0, 0, 123),
(44, 20140033, 'IT111', 201310189, 'First', '2013-2014', '89.52', '85.34', '91.84', '0.00', '88.90', 0, 0, 123),
(45, 20122526, 'LIT121', 201610295, 'First', '2015-2016', '90.21', '87.65', '91.24', '0.00', '89.70', 0, 0, 123),
(46, 20122824, 'LIT121', 201610295, 'First', '2015-2016', '87.89', '92.64', '91.20', '0.00', '90.58', 0, 0, 123),
(47, 20130451, 'LIT121', 201610295, 'First', '2015-2016', '87.89', '92.64', '91.20', '0.00', '90.58', 0, 0, 123),
(48, 20150116, 'LIT121', 201610295, 'First', '2015-2016', '87.89', '92.64', '91.20', '0.00', '90.58', 0, 0, 123),
(49, 20140467, 'LIT121', 201610295, 'First', '2015-2016', '87.89', '92.64', '91.20', '0.00', '90.58', 0, 0, 123),
(50, 20150688, 'LIT121', 201610295, 'First', '2015-2016', '87.89', '92.64', '91.20', '0.00', '90.58', 0, 0, 123),
(51, 20130082, 'LIT121', 201610295, 'First', '2015-2016', '87.89', '92.64', '91.20', '0.00', '90.58', 0, 0, 123),
(52, 20141547, 'LIT121', 201610295, 'First', '2015-2016', '87.89', '92.64', '91.20', '0.00', '90.58', 0, 0, 123),
(53, 20150340, 'IT111', 201310189, 'Second', '2015-2016', '87.89', '92.64', '91.20', '0.00', '90.58', 0, 0, 123),
(54, 20150355, 'IT111', 201310189, 'Second', '2015-2016', '87.89', '92.64', '91.20', '0.00', '90.58', 0, 0, 123);

-- --------------------------------------------------------

--
-- Table structure for table `highered_accounts`
--

CREATE TABLE `highered_accounts` (
  `Student_Number` bigint(90) DEFAULT NULL,
  `Password` varchar(90) DEFAULT NULL,
  `Time_In` timestamp NULL DEFAULT NULL,
  `Time_Out` timestamp NULL DEFAULT NULL,
  `Email` varchar(90) DEFAULT NULL,
  `Reference_Number` bigint(90) NOT NULL,
  `Active` int(1) DEFAULT NULL,
  `Account_picture` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `highered_accounts`
--

INSERT INTO `highered_accounts` (`Student_Number`, `Password`, `Time_In`, `Time_Out`, `Email`, `Reference_Number`, `Active`, `Account_picture`) VALUES
(20130150, 'Shaira', '2016-10-01 20:43:53', '2016-10-01 20:44:23', 'smvrelos@sdca.edu.ph', 1, 1, '20130150.jpg'),
(20122411, '12345', '2016-10-03 15:13:33', '2016-10-03 15:14:01', 'gpdilla@sdca.edu.ph', 2, 1, '20122411.gif'),
(20110150, '12345', '2016-09-16 13:23:55', '2016-09-16 13:24:11', 'rpsalvador@sdca.edu.ph', 3, 1, NULL),
(20130805, 'jelay16', '2016-10-03 14:51:50', '2016-10-03 15:12:38', 'jcagarcia@sdca.edu.ph', 4, 1, '20130805.jpg'),
(20130112, 'nathalie', '2016-10-03 15:15:47', '2016-10-03 15:17:32', 'nsmacatol@sdca.edu.ph', 5, 1, '20130112.jpg'),
(20140495, 'winchester', '2016-10-03 15:17:51', '2016-10-03 15:19:07', 'drbayron@sdca.edu.ph', 6, 1, '20140495.jpg'),
(20130658, 'lubeng', '2016-10-03 15:19:21', '2016-10-03 15:20:25', 'ldmcebu@sdca.edu.ph', 7, 1, '20130658.jpg'),
(20130441, 'kekeke', '2016-10-03 15:20:42', '2016-10-03 15:22:05', 'pjranola@gmail.com', 8, 1, '20130441.jpg'),
(20123116, 'balot', '2016-10-03 15:22:20', '2016-10-03 15:23:43', 'louiebalot1@gmail.com', 9, 1, '20123116.jpg'),
(20140116, 'sdca0116', '2016-10-03 15:24:02', '2016-10-03 15:26:37', 'jelai.sugatan@gmail.com', 10, 1, '20140116.jpg'),
(20121439, 'kerikeri17', '2016-09-30 07:00:00', NULL, 'rieembradura@gmail.com', 11, 1, NULL),
(20141099, 'justineganda', '2016-09-30 07:00:00', NULL, 'tenjoychan@gmail.com', 12, 1, NULL),
(20130688, 'asdfghj', '2016-10-03 15:26:56', '2016-10-03 15:27:55', 'louie31mandanas@gmail.com', 13, 1, '20130688.jpg'),
(20150530, 'sircastro', '2016-10-03 15:28:14', '2016-10-03 15:29:11', 'VinProd23@gmail.com', 14, 1, '20150530.jpg'),
(20150525, 'hashds', '2016-10-03 15:29:28', '2016-10-03 15:33:58', 'shennajoyastorga@yahoo.com', 15, 1, '20150525.jpg'),
(20150545, 'macs', '2016-09-30 07:00:00', NULL, 'thesmacof99@gmail.com', 16, 1, NULL),
(20150537, 'manhunt150', '2016-10-03 15:34:21', '2016-10-03 15:35:57', 'manhunt_150@yahoo.com', 17, 1, '20150537.jpg'),
(20150542, 'Arcanghelrex', '2016-10-03 15:58:41', '2016-10-03 16:00:01', 'engelbert.edralin@gmail.com', 18, 1, '20150542.jpg'),
(20130114, 'dianchelsie', '2016-10-03 16:00:20', '2016-10-03 16:01:54', 'palerdianchelsie@gmail.com', 19, 1, '20130114.jpg'),
(20130359, 'ranelrenajr', '2016-10-03 16:04:15', '2016-10-03 16:04:17', 'ranelrenajr@gmail.com', 20, 1, '20130359.jpg'),
(20150622, '20150622', '2016-10-03 16:04:30', '2016-10-03 16:05:50', 'jccastaneda@sdca.edu.ph', 21, 1, '20150622.jpg'),
(20131366, 'nmbj122897', '2016-10-03 16:06:37', '2016-10-03 16:07:54', 'nmbjimenez@sdca.edu.ph', 22, 1, '20131366.jpg'),
(20150356, '20150356', '2016-10-03 16:08:44', '2016-10-03 16:10:00', 'Moraleskarlo05@gmail.com', 23, 1, '20150356.jpg'),
(20123193, '20123193', '2016-10-03 16:10:15', '2016-10-03 16:11:12', 'jurisohsixeleven@gmail.com', 24, 1, '20123193.jpg'),
(20151047, 'nhojisoka', '2016-10-03 16:11:34', '2016-10-03 16:12:59', 'jpaulozaplan@gmail.com', 25, 1, '20151047.jpg'),
(20140033, 'pimplepuyat625201', '2016-10-03 16:13:19', '2016-10-03 16:14:52', 'pimplepuyat@gmail.com', 26, 1, '20140033.jpg'),
(20122526, 'Pottie15', '2016-10-03 16:15:11', '2016-10-03 16:16:29', 'chavez.nerizza@yahoo.com', 27, 1, '20122526.jpg'),
(20122824, 'happyjudgement', '2016-10-03 16:16:47', '2016-10-03 16:18:52', 'chandlerbagorio98@gmail.com', 28, 1, '20122824.jpg'),
(20130451, '20130451', '2016-10-03 19:36:43', '2016-10-03 19:39:30', 'jakiekarinacandelaria@yahoo.com', 29, 1, '20130451.jpg'),
(20150116, '123456', '2016-10-03 19:40:14', '2016-10-03 19:41:28', 'bernardocza@yahoo.com', 30, 1, ''),
(20140467, 'micamica', '2016-10-03 19:42:28', '2016-10-03 19:44:12', 'sbstian.nbela@yahoo.com', 31, 1, '20140467.jpg'),
(20150688, '20150688', '2016-10-03 19:45:24', '2016-10-03 19:46:19', 'garyllmae@icloud.com', 32, 1, '20150688.jpg'),
(20130082, 'sandro20130082', '2016-10-03 19:46:48', '2016-10-03 19:47:48', 'sandrosia270522@gmail.com', 33, 1, '20130082.jpg'),
(20141547, 'Jer82397', '2016-10-03 19:48:08', '2016-10-03 19:49:24', 'jprabanzo@sdca.edu.ph', 34, 1, '20141547.jpg'),
(20150340, 'franzallen17', '2016-10-03 19:49:43', '2016-10-03 19:51:07', 'anascafranzallen@gmail.com', 35, 1, '20150340.jpg'),
(20150355, '20150355', '2016-10-03 19:51:36', '2016-10-03 19:53:11', 'angelmanalo1@gmail.com', 36, 1, '20150355.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `legend`
--

CREATE TABLE `legend` (
  `Semester` varchar(90) DEFAULT NULL,
  `Grading_Semester` varchar(90) DEFAULT NULL,
  `School_Year` varchar(90) DEFAULT NULL,
  `Grading_School_Year` varchar(90) DEFAULT NULL,
  `Term` varchar(90) DEFAULT NULL,
  `First_SchoolYear` varchar(90) DEFAULT NULL,
  `Maximun_Units` varchar(90) DEFAULT NULL,
  `Starting_Student_Number` varchar(90) DEFAULT NULL,
  `Prelim` decimal(10,2) DEFAULT NULL,
  `Midterm` decimal(10,2) DEFAULT NULL,
  `Finals` decimal(10,2) DEFAULT NULL,
  `Current_Registrar` varchar(90) DEFAULT NULL,
  `Current_Actg_Officer` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `legend`
--

INSERT INTO `legend` (`Semester`, `Grading_Semester`, `School_Year`, `Grading_School_Year`, `Term`, `First_SchoolYear`, `Maximun_Units`, `Starting_Student_Number`, `Prelim`, `Midterm`, `Finals`, `Current_Registrar`, `Current_Actg_Officer`) VALUES
('First', '', '2015-2016', '', '', '2013', '21', '20130150', '0.00', '0.00', '0.00', '', ''),
('Second', NULL, '2015-2016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `Program_ID` bigint(90) NOT NULL,
  `School_ID` varchar(90) DEFAULT NULL,
  `Program_Duration` varchar(90) DEFAULT NULL,
  `Program_Name` varchar(90) DEFAULT NULL,
  `Program_Major` varchar(90) DEFAULT NULL,
  `Program_Code` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`Program_ID`, `School_ID`, `Program_Duration`, `Program_Name`, `Program_Major`, `Program_Code`) VALUES
(0, '', '', 'BSIT', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `program_majors`
--

CREATE TABLE `program_majors` (
  `ID` bigint(70) NOT NULL,
  `Program_Code` varchar(90) DEFAULT NULL,
  `Program_Major` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_majors`
--

INSERT INTO `program_majors` (`ID`, `Program_Code`, `Program_Major`) VALUES
(1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `ID` int(90) NOT NULL,
  `Room` varchar(90) DEFAULT NULL,
  `Floor` varchar(90) DEFAULT NULL,
  `Building` varchar(90) DEFAULT NULL,
  `Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`ID`, `Room`, `Floor`, `Building`, `Active`) VALUES
(1, 'Com Lab 2', '5th', 'SDCA', 1),
(2, 'MAC Lab', '5th', 'SDCA', 1),
(3, 'MMA Lab', '5th', 'SDCA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sched`
--

CREATE TABLE `sched` (
  `Sched_Code` int(90) NOT NULL,
  `Course_Code` varchar(90) DEFAULT NULL,
  `Start_Time` int(90) DEFAULT NULL,
  `End_Time` int(90) DEFAULT NULL,
  `DayID` int(90) DEFAULT NULL,
  `RoomID` int(90) DEFAULT NULL,
  `Total_Slot` int(90) DEFAULT NULL,
  `Section_ID` varchar(90) DEFAULT NULL,
  `SchoolYear` varchar(90) DEFAULT NULL,
  `Semester` varchar(90) DEFAULT NULL,
  `Lecture_Unit` varchar(90) DEFAULT NULL,
  `Lab_Unit` varchar(90) DEFAULT NULL,
  `Tuition_Fee` int(1) DEFAULT NULL,
  `Swimming` int(1) DEFAULT NULL,
  `Tutorial` int(1) DEFAULT NULL,
  `Research` int(1) DEFAULT NULL,
  `Practicum` int(1) DEFAULT NULL,
  `Graded` int(1) DEFAULT NULL,
  `Instructor_ID` int(90) DEFAULT NULL,
  `Curriculum_ID` int(90) DEFAULT NULL,
  `Start_Time2` int(90) DEFAULT NULL,
  `End_Time2` int(90) DEFAULT NULL,
  `DayID2` int(9) DEFAULT NULL,
  `RoomID2` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sched`
--

INSERT INTO `sched` (`Sched_Code`, `Course_Code`, `Start_Time`, `End_Time`, `DayID`, `RoomID`, `Total_Slot`, `Section_ID`, `SchoolYear`, `Semester`, `Lecture_Unit`, `Lab_Unit`, `Tuition_Fee`, `Swimming`, `Tutorial`, `Research`, `Practicum`, `Graded`, `Instructor_ID`, `Curriculum_ID`, `Start_Time2`, `End_Time2`, `DayID2`, `RoomID2`) VALUES
(201310189, 'IT111', 800, 1100, 1, 0, 0, '', '2015-2016', 'Second Sem', '3', '0', 41699, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(201310283, 'EU121', 1000, 1100, 6, 0, 0, '', '2013-2014', 'Second Sem', '1', '0', 41699, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(201320283, 'ITC111', 1130, 1430, 2, 0, 0, '', '2015-2016', 'Second Sem', '3', '0', 41699, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(201320286, 'ITC112', 14, 1700, 1, 0, 0, '', '2013-2014', 'Second Sem', '2', '1', 41699, 0, 0, 0, 0, 0, 0, 0, 1730, 1830, 3, 0),
(201520359, 'EU321', 700, 800, 0, 0, 0, '', '2015-2016', 'Second Sem', '1', '0', 41699, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(201520361, 'ITE322', 700, 1200, 0, 0, 0, '', '2015-2016', 'Second Sem', '3', '0', 41699, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(201520365, 'ITP325', 700, 1200, 0, 0, 0, '', '2015-2016', 'Second Sem', '3', '0', 41699, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(201610291, 'ITF311', 1530, 1730, 2, 0, 0, '', '2015-2016', 'First Sem', '2', '1', 41699, 0, 0, 0, 0, 0, 0, 0, 900, 1000, 4, 0),
(201610293, 'ITP312', 1700, 1900, 1, 0, 0, '', '2015-2016', 'First Sem', '2', '1', 41699, 0, 0, 0, 0, 0, 0, 0, 1300, 1600, 3, 0),
(201610295, 'LIT121', 700, 830, 5, 0, 0, '', '2015-2016', 'First Sem', '2', '1', 41699, 0, 0, 0, 0, 0, 0, 0, 700, 830, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `school_info`
--

CREATE TABLE `school_info` (
  `School_ID` bigint(90) NOT NULL,
  `School_Name` varchar(90) DEFAULT NULL,
  `School_Code` varchar(90) DEFAULT NULL,
  `School_Dean` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_info`
--

INSERT INTO `school_info` (`School_ID`, `School_Name`, `School_Code`, `School_Dean`) VALUES
(0, 'St. Dominic College of Asia', '', 'Noel Sergio');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `Section_ID` bigint(90) NOT NULL,
  `Section_Name` varchar(90) DEFAULT NULL,
  `Year_Level` varchar(90) DEFAULT NULL,
  `Program_ID` bigint(90) DEFAULT NULL,
  `Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`Section_ID`, `Section_Name`, `Year_Level`, `Program_ID`, `Active`) VALUES
(1, 'BSIT', '1', 0, 1),
(2, 'BSIT', '2', 0, 1),
(3, 'BSIT', '3', 0, 1),
(4, 'BSIT', '4', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `Semester` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`Semester`) VALUES
('First'),
('Second');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `Reference_Number` bigint(90) NOT NULL,
  `Student_Number` bigint(90) DEFAULT NULL,
  `First_Name` varchar(90) DEFAULT NULL,
  `Middle_Name` varchar(90) DEFAULT NULL,
  `Last_Name` varchar(90) DEFAULT NULL,
  `Course` varchar(90) DEFAULT NULL,
  `Major` varchar(90) DEFAULT NULL,
  `AdmittedSY` varchar(90) DEFAULT NULL,
  `AdmittedSEM` varchar(90) DEFAULT NULL,
  `CurrentStatus` varchar(90) DEFAULT NULL,
  `YearLevel` varchar(90) DEFAULT NULL,
  `Gender` varchar(90) DEFAULT NULL,
  `Age` varchar(90) DEFAULT NULL,
  `Address_No` varchar(90) DEFAULT NULL,
  `Address_Street` varchar(90) DEFAULT NULL,
  `Address_Subdivision` varchar(90) DEFAULT NULL,
  `Address_Barangay` varchar(90) DEFAULT NULL,
  `Address_City` varchar(90) DEFAULT NULL,
  `Address_Province` varchar(90) DEFAULT NULL,
  `Address_Zip` varchar(90) DEFAULT NULL,
  `Birth_Date` date DEFAULT NULL,
  `Birth_Place` varchar(90) DEFAULT NULL,
  `Tel_No` bigint(30) DEFAULT NULL,
  `CP_No` bigint(30) DEFAULT NULL,
  `Nationality` varchar(90) DEFAULT NULL,
  `Email` varchar(90) DEFAULT NULL,
  `Parents_Status` varchar(90) DEFAULT NULL,
  `Father_Name` varchar(90) DEFAULT NULL,
  `Father_Occupation` varchar(90) DEFAULT NULL,
  `Father_Address` varchar(300) DEFAULT NULL,
  `Father_Contact` varchar(90) DEFAULT NULL,
  `Mother_Name` varchar(90) DEFAULT NULL,
  `Mother_Occupation` varchar(90) DEFAULT NULL,
  `Mother_Address` varchar(300) DEFAULT NULL,
  `Mother_Contact` varchar(90) DEFAULT NULL,
  `Guardian_Name` varchar(90) DEFAULT NULL,
  `Guardian_Relationship` varchar(90) DEFAULT NULL,
  `Guardian_Address` varchar(300) DEFAULT NULL,
  `Guardian_Contact` varchar(90) DEFAULT NULL,
  `Secondary_School_Name` varchar(90) DEFAULT NULL,
  `Secondary_School_Grad` varchar(90) DEFAULT NULL,
  `Secondary_School_Address` varchar(90) DEFAULT NULL,
  `Grade_School_Name` varchar(90) DEFAULT NULL,
  `Grade_School_Grad` varchar(90) DEFAULT NULL,
  `Grade_School_Address` varchar(90) DEFAULT NULL,
  `Transferee_Name` varchar(90) DEFAULT NULL,
  `Transferee_Attend` varchar(90) DEFAULT NULL,
  `Transferee_Address` varchar(90) DEFAULT NULL,
  `Transferee_Course` varchar(90) DEFAULT NULL,
  `Others_Know_SDCA` varchar(90) DEFAULT NULL,
  `Others_Relative_Stats` varchar(90) DEFAULT NULL,
  `Others_Relative_Name` varchar(90) DEFAULT NULL,
  `Others_Relative_Department` varchar(90) DEFAULT NULL,
  `Others_Relative_Relationship` varchar(90) DEFAULT NULL,
  `Others_Relative_Contact` varchar(90) DEFAULT NULL,
  `Course_1st` varchar(90) DEFAULT NULL,
  `Course_Major_1st` varchar(90) DEFAULT NULL,
  `Course_2nd` varchar(90) DEFAULT NULL,
  `Course_Major_2nd` varchar(90) DEFAULT NULL,
  `Course_3rd` varchar(90) DEFAULT NULL,
  `Course_Major_3rd` varchar(90) DEFAULT NULL,
  `Guidance_Approval` int(1) DEFAULT NULL,
  `Return_Semester` varchar(90) DEFAULT NULL,
  `Return_SchoolYear` varchar(90) DEFAULT NULL,
  `Curriculum` varchar(90) DEFAULT NULL,
  `Reserve` int(1) DEFAULT NULL,
  `Enroll` int(1) DEFAULT NULL,
  `Exam` int(1) DEFAULT NULL,
  `Exam_Date` date DEFAULT NULL,
  `Priority` int(1) DEFAULT NULL,
  `Inquiry_ID` varchar(90) DEFAULT NULL,
  `Entrance_SchoolYear` varchar(90) DEFAULT NULL,
  `Entrance_Semester` varchar(90) DEFAULT NULL,
  `Applied_Status` varchar(90) DEFAULT NULL,
  `Password` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`Reference_Number`, `Student_Number`, `First_Name`, `Middle_Name`, `Last_Name`, `Course`, `Major`, `AdmittedSY`, `AdmittedSEM`, `CurrentStatus`, `YearLevel`, `Gender`, `Age`, `Address_No`, `Address_Street`, `Address_Subdivision`, `Address_Barangay`, `Address_City`, `Address_Province`, `Address_Zip`, `Birth_Date`, `Birth_Place`, `Tel_No`, `CP_No`, `Nationality`, `Email`, `Parents_Status`, `Father_Name`, `Father_Occupation`, `Father_Address`, `Father_Contact`, `Mother_Name`, `Mother_Occupation`, `Mother_Address`, `Mother_Contact`, `Guardian_Name`, `Guardian_Relationship`, `Guardian_Address`, `Guardian_Contact`, `Secondary_School_Name`, `Secondary_School_Grad`, `Secondary_School_Address`, `Grade_School_Name`, `Grade_School_Grad`, `Grade_School_Address`, `Transferee_Name`, `Transferee_Attend`, `Transferee_Address`, `Transferee_Course`, `Others_Know_SDCA`, `Others_Relative_Stats`, `Others_Relative_Name`, `Others_Relative_Department`, `Others_Relative_Relationship`, `Others_Relative_Contact`, `Course_1st`, `Course_Major_1st`, `Course_2nd`, `Course_Major_2nd`, `Course_3rd`, `Course_Major_3rd`, `Guidance_Approval`, `Return_Semester`, `Return_SchoolYear`, `Curriculum`, `Reserve`, `Enroll`, `Exam`, `Exam_Date`, `Priority`, `Inquiry_ID`, `Entrance_SchoolYear`, `Entrance_Semester`, `Applied_Status`, `Password`) VALUES
(1, 20130150, 'Shaira Mari', 'Villar', 'Relos', 'Bachelor of Science in Information Technology', '', '2013', 'First', 'Single', '4', 'Female', '20', 'Blk18 Lot12', 'Guijo St', 'Casimiro Townhomes', 'Habay 1', 'Bacoor City', 'Cavite', '4102', '1996-07-29', 'Manila', 4725174, 9365905648, 'Filipino', 'smvrelos@gmail.com', 'Married', 'Rolex Relos', 'Security Guard', 'Manila', 'N/A', 'Iluminada Relos', 'Retired Government Employee', 'Occidental Mindoro', '09496554477', 'Sheila Sales', 'Cousin', 'Bacoor Cavite', '09397478358', 'Looc National School Of Fisheries', '2013', 'Agkawayan Looc Occidental Mindoro', 'Agkawayan Elementary School', '2009', 'Agkawayan Looc Occidental Mindoro', '', '', '', '', '', 'Student', 'Danica Villaluna', 'SBCS', 'Cousin', '09475793170', 'Bachelor Of Science in Tourism Management', 'Major in Travel Management', 'Bachelor Of Arts in Communication', 'Major in Broadcasting', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', '', 'Shaira'),
(2, 20122411, 'Gerhard', 'Palencia', 'Dilla', 'Bachelor of Science in Information Technology', '', '2012', 'First', 'Single', '4', 'Male', '21', '', 'Peso St', 'Casimiro Westbay', 'Habay 1', 'Bacoor City', 'Cavite', '4102', '1995-06-04', '', 5198354, 9156624423, 'Filipino', 'gerarddilla@gmail.com', 'Married', '', '', '', '', 'Grace Dilla', '', 'Bacoor City, Cavite', '', '', '', '', '', 'Christian Values School', '2012', 'Bacoor City, Cavite', '', '2008', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2012-2013', 'First', '', '12345'),
(3, 20110150, 'Reginald', 'P', 'Salvador', 'Bachelor of Science in Information Technology', '', '2011', 'First', 'Single', '4', 'Male', '20', '', '', '', '', 'Imus City', 'Cavite', '4103', '1996-02-28', '', 4725174, 9102797959, 'Filipino', 'rpsalvador@sdca.edu.ph', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2011', 'Bacoor City, Cavite', '', '2007', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2011-2012', 'First', '', 'salvador'),
(4, 20130805, 'Jenela Ciara', 'A', 'Garcia', 'Bachelor of Science in Information Technology', '', '2013', 'First', 'Single', '4', 'Female', '19', 'Blk 18 Lot 12', 'Phase 1', 'Maryhomes Subd.', 'Molino', 'Bacoor City', 'Cavite', '4102', '1996-01-16', '', 4725174, 9067857548, 'Filipino', 'jcagarcia@sdca.edu.ph', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', '', 'jelay16'),
(5, 20130112, 'Nathalie', 'Sayre', 'Macatol', 'Bachelor of Science in Information Technology', '', '2013', 'First', 'Single', '4', 'Female', '19', 'Blk 10 Lot 7', '', 'Palo Alto', 'Habay 1', 'Bacoor City', 'Cavite', '4102', '1996-01-16', '', 4725174, 9264605993, 'Filipino', 'nsmacatol@sdca.edu.ph', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', '', 'nathalie'),
(6, 20140495, 'Daniel', 'R', 'Bayron', 'Bachelor of Science in Information Technology', '', '2014', 'First', 'Single', '3', 'Male', '20', '', '', '', '', 'Imus City', 'Cavite', '4103', '1996-02-28', '', 4725174, 9102797959, 'Filipino', 'drbayron@sdca.edu.ph', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2011', 'Bacoor City, Cavite', '', '2007', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2014-2015', 'First', '', 'winchester'),
(7, 20130658, 'Lovie Dianne', 'M', 'Cebu', 'Bachelor of Science in Information Technology', '', '2013', 'Second', 'Single', '4', 'Female', '21', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4725174, 9354334293, 'Filipino', 'ldmcebu@sdca.edu.ph', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2012', 'Bacoor City, Cavite', '', '2008', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'Second', '', 'lubeng'),
(8, 20130441, 'Jayson', 'Perez', 'Rañola', 'Bachelor of Science in Information Technology', '', '2013', 'First', 'Single', '4', 'Male', '20', '', '', 'Westbay Homes', 'Habay 1', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4458573, 9276172382, 'Filipino', 'pjranola@gmail.com', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2012', 'Bacoor City, Cavite', '', '2008', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', '', 'kekeke'),
(9, 20123116, 'Louie Lance', 'Ramos', 'Bundoc', 'Bachelor of Science in Information Technology', '', '2013', 'First', 'Single', '4', 'Male', '20', '', '', '', 'Binakayan', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4340016, 9275737166, 'Filipino', 'louiebalot1@gmail.com\r\n', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2012', 'Bacoor City, Cavite', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', '', 'balot'),
(10, 20140116, 'Joise Pamela', 'Estacion', 'Sugatan', 'Bachelor of Science in Pharmacy', '', '2014', 'First', 'Single', '3', 'Female', '18', '', '', '', 'Tanza', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4382456, 9276802875, 'Filipino', 'jelai.sugatan@gmail.com', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2010', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Pharmacy', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2014-2015', 'First', '', 'sdca0116'),
(11, 20121439, 'Rio Mae', 'Kalinga', 'Embradura', 'Bachelor of Science in business Administration', '', '2012', 'First', 'Single', '4', 'Female', '20', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 5711217, 9712172015, 'Filipino', 'rieembradura@gmail.com\r\n', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2008', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Business Administration', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2012-2013', 'First', '', 'kerikeri17'),
(12, 20141099, 'Justine Joy\r\n', 'Austria', 'Orina', 'Bachelor of Science in Business Administration', '', '2012', 'First', 'Single', '3', 'Female', '20', '', '', '', '', 'Imus City', 'Cavite', '4103', '1995-09-28', '', 4243145, 9061234567, 'Filipino', 'tenjoychan@gmail.com', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2008', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Business Administration', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2012-2013', 'First', '', 'justineganda\r\n'),
(13, 20130688, 'Louie Jay', 'Guiao', 'Mandanas', 'Bachelor of Science in Information Technology', '', '2013', 'First', 'Single', '3', 'Male', '20', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4256839, 9873698833, 'Filipino', 'louie31mandanas@gmail.com', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2008', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', '', 'asdfghj'),
(14, 20150530, 'Alvin', 'Balmeo', 'Caberto', 'Bachelor of Science in Information Technology', '', '2013', 'First', 'Single', '4', 'Male', '20', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4526122, 9153569920, 'Filipino', 'VinProd23@Gmail.com', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2008 ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', '', 'sircastro'),
(15, 20150525, 'Shenna joy', 'Macalinao\r\n', 'Astorga\r\n', 'Bachelor of Science in Information Technology', '', '2013', 'First', 'Single', '2', 'Female', '20', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4579878, 9355502313, 'Filipino', 'shennajoyastorga@yahoo.com', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2015', 'Bacoor City, Cavite', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2015-2016', 'First', '', 'hashds'),
(16, 20150545, 'Maurine Anne', 'Cruz\r\n', 'Sabile\r\n', 'Bachelor of Science in Information Technology', '', '2015', 'First', 'Single', '2', 'Female', '17', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4555678, 97541800842, 'Filipino', 'thesmacof99@gmail.com\r\n', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2015', 'Bacoor City, Cavite', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2015-2016', 'First', '', 'macs\r\n'),
(17, 20150537, 'Jeffrey\r\n', 'Ellaga\r\n', 'Pagmanoja\r\n', 'Bachelor of Science in Information Technology', '', '2015', 'First', 'Single', '2', 'Male', '17', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4723512, 93652147853, 'Filipino', 'manhunter_150@yahoo.com\r\n', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2015', 'Bacoor City, Cavite', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2015-2016', 'First', '', 'manhunt150\r\n'),
(18, 20150542, 'Engelbert\r\n', 'Edralin\r\n', 'Reyes\r\n', 'Bachelor of Science in Information Technology', '', '2015', 'First', 'Single', '2', 'Male', '17', '', '', '', '', 'Imus City', 'Cavite', '4103', '1995-09-28', '', 4728753, 93682637462, 'Filipino', 'engelbert.edralin@gmail.com\r\n', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2015', 'Bacoor City, Cavite', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2015-2016', 'First', '', 'Arcanghelrex\r\n'),
(19, 20130114, 'Dian Chelsie\r\n', 'Luzon\r\n', 'Paler\r\n', 'Bachelor of Science in Tourism Management', '', '2013', 'First', 'Single', '4', 'Female', '20', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4179333, 9262894309, 'Filipino', 'palerdianchelsie@gmail.com', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Tourism Management', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', '', 'dianchelsie\r\n'),
(20, 20130359, 'Ranel\r\n', 'Guanez\r\n', 'Rena\r\n', 'Bachelor of Science in Computer Science', '', '2013', 'First', 'Single', '4', 'Male', '20', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4728753, 9168450705, 'Filipino', 'ranelrenajr@gmail.com\r\n', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Computer Science', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', '', 'ranelrenajr\r\n'),
(21, 20150622, 'Joselle', 'C', 'Castañeda\r\n', 'Bachelor of Science in Information Technology', '', '2015', 'First', 'Single', '2', 'Female', '18', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4641297, 9504927037, 'Filipino', 'jccastaneda@sdca.com.ph', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2015', 'Bacoor City, Cavite', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', '', '20150622'),
(22, 20131366, 'Nympha Mae', 'B', 'Jimenez\r\n', 'Bachelor of Science in Information Technology', '', '2013', 'Second', 'Single', '4', 'Female', '18', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4641297, 9504927037, 'Filipino', 'nmbjimenez@sdca.edu.ph', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'Second', '', 'nmbj122897'),
(23, 20150356, 'Karlo', 'B', 'Morales\r\n', 'Bachelor of Science in Information Technology', '', '2015', 'First', 'Single', '2', 'Male', '18', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4641297, 9504927037, 'Filipino', 'Moraleskarlo05@gmail.comm', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2015', 'Bacoor City, Cavite', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2015-2016', 'First', '', '20150356'),
(24, 20123193, 'Jhoanne Khryss', 'P', 'Dela Cruz', 'Bachelor of Science in Computer Science', '', '2013', 'First', 'Single', '4', 'Female', '19', '#24', 'Lilac St.', 'Woodestate Village 2', 'Molino 3', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4728753, 9168450705, 'Filipino', 'jurisohsixeleven@gmail.com\r\n', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Computer Science', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', '', '20123193\r\n'),
(25, 20151047, 'John Paulo', 'T', 'Zaplan', 'Bachelor of Science in Hospitality Management', '', '2016', 'First', 'Single', '1', 'Male', '18', '', '', 'Cita Italia', '', 'Imus City', 'Cavite', '4103', '1995-09-28', '', 4728753, 9168450705, 'Filipino', 'jpaulozaplangmail.com\r\n', 'Married', '', '', '', '', '', '', 'Imus City, Cavite', '', '', '', '', '', '', '2015', 'Agkawayan, Looc, Occidental Mindoro', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Hospitality Management', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2015-2016', 'First', '', 'nhojisoka'),
(26, 20140033, 'Karen Frances', 'S', 'Cajigal', 'Bachelor of Science in Information Technology', '', '2014', 'First', 'Single', '3', 'Female', '19', '', '', '', 'Molino 2', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4641297, 9504927037, 'Filipino', 'pimplepuyat@gmail.com', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2014', 'Bacoor City, Cavite', '', '2010', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2014-2015', 'First', '', 'pimplepuyat625201'),
(27, 20122526, 'Nerizza', 'O', 'Chavez', 'Bachelor of Medical Laboratory Science', '', '2013', 'First', 'Single', '4', 'Female', '20', '95', '', ' Rosevale Subdivision', 'Potol', 'Kawit', 'Cavite', '4104', '1995-09-28', '', 4641297, 9504927037, 'Filipino', 'chavez.nerizza@yahoo.com', 'Married', '', '', '', '', '', '', 'Kawit, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Medical Laboratory Science', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', '', 'Pottie15'),
(28, 20122824, 'Ivan Chandler', 'C', 'Bagorio', 'Bachelor of Medical LaboratoryScience', '', '2013', 'First', 'Single', '4', 'Male', '20', 'Blk18 Lot12', 'Guijo St', '', 'Bacao II', 'General Trias', 'Cavite', '4107', '1996-06-25', 'Cavite', 4725174, 9067286020, 'Filipino', 'chandlerbagorio98@gmail.com', 'Married', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2013', '', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', '', 'happyjudgement'),
(29, 20130451, 'Jakie Carina', '', 'Candelaria', 'Bachelor of Business Administration', 'Financial Management', '2013', 'First', 'Single', '4', 'Female', '20', '', '', '', '', 'Bacoor', 'Cavite', '4102', '1996-10-03', 'Cavite', 4725174, 9067286020, 'Filipino', 'jakiekarinacandelaria@yahoo.com', 'Married', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2013', '', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', '', '20130451'),
(30, 20150116, 'Czarina Lynne', 'Q', 'Bernardo', 'Bachelor of Arts in Multimedia Arts', '', '2015', 'First', 'Single', '4', 'Female', '18', '', '', 'Katherine Homes', 'Molino', 'Bacoor', 'Cavite', '4102', '1996-06-25', 'Cavite', 4725174, 9067286020, 'Filipino', 'bernardocza@yahoo.com', 'Married', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2015', '', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', '', '123456'),
(31, 20140467, 'Sebastian', 'C', 'Nobela', 'Bachelor of Science in Information Technology', '', '2014', 'First', 'Single', '3', 'Male', '19', '', '', 'Brgy. Gawaran', 'Molino 7', 'Bacoor', 'Cavite', '4102', '1996-06-25', 'Cavite', 4725174, 9067286020, 'Filipino', 'sbstian.nbela@yahoo.com', 'Married', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2014', '', '', '2010', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2014-2015', 'First', '', 'micamica'),
(32, 20150688, 'Garyll Mae', 'L', 'Buenaventura', 'Bachelor of Science in Psychology', '', '2015', 'First', 'Single', '2', 'Female', '18', '', '', 'Moonwalk Village', '', '', 'Las Piñas City', '1747', '1996-06-25', 'Las Piñas', 4725174, 9067286020, 'Filipino', 'garyllmae@icloud.com', 'Married', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2015', '', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2015-2016', 'First', '', '20150688'),
(33, 20130082, 'Alexandro', 'R', 'Cheng', 'Bachelor of Science in Computer Science', '', '2013', 'First', 'Single', '4', 'Male', '20', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1996-06-25', 'Cavite', 4725174, 9067286020, 'Filipino', 'sandrosia270522@gmail.com', 'Married', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2013', '', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', '', 'sandro20130082'),
(34, 20141547, 'Jerwin', 'P', 'Rabanzo', 'Bachelor of Arts in Multimedia Arts', '', '2014', 'First', 'Single', '4', 'Male', '20', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1996-06-25', 'Cavite', 4725174, 9067286020, 'Filipino', 'jprabanzo@sdca.edu.ph', 'Married', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2012', '', '', '2005', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2014-2015', 'First', '', 'Jer82397'),
(35, 20150340, 'Franz Allen Moises', '', 'Añasca', 'Bachelor of Science in Information Technology', '', '2015', 'First', 'Single', '2', 'Male', '17', '', '', '', 'Niog 2', 'Bacoor City', 'Cavite', '4102', '1996-06-25', 'Cavite', 4725174, 9067286020, 'Filipino', 'anascafranzallen@gmail.com', 'Married', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2015', '', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2015-2016', 'First', '', 'franzallen17'),
(36, 20150355, 'Angel', 'M', 'Manalo', 'Bachelor of Science in Information Technology', '', '2015', 'First', 'Single', '2', 'Female', '17', '', '', 'Parkdale 2', 'Perpetual 7', 'Bacoor City', 'Cavite', '4102', '1996-06-25', 'Cavite', 4725174, 9067286020, 'Filipino', 'angelmanalo1@gmail.com', 'Married', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2015', '', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2015-2016', 'First', '', '20150355');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `ID` bigint(90) NOT NULL,
  `Course_Code` varchar(90) DEFAULT NULL,
  `Course_Title` varchar(90) DEFAULT NULL,
  `Course_Lec_Unit` varchar(90) DEFAULT NULL,
  `Course_Lab_Unit` varchar(90) DEFAULT NULL,
  `Course_Type_ID` varchar(90) DEFAULT NULL,
  `Course_Pre_Requisite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`ID`, `Course_Code`, `Course_Title`, `Course_Lec_Unit`, `Course_Lab_Unit`, `Course_Type_ID`, `Course_Pre_Requisite`) VALUES
(1, 'ITP325', 'Capstone Project 1', '0', '3', '', 0),
(2, 'EU321', 'Community Leadership', '1', '0', '', 0),
(3, 'ITE322', 'IT Elective 2', '2', '1', '', 0),
(4, 'IT111', 'Computer Concepts and Fundamentals', '2', '1', '', 0),
(5, 'ITC111', 'Fundamentals of Problem Solving and Programming', '2', '1', '', 0),
(6, 'EU121', 'Self and the School', '1', '0', '', 0),
(7, 'ITC112', 'Fundamentals of Problem Solving and Programming', '2', '1', '', 0),
(8, 'ITF311', 'Free Elective 1', '2', '1', '', 0),
(9, 'LIT121', 'World Literature', '3', '0', '', 0),
(10, 'ITP312', 'System Analysis and Design', '2', '1', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `enrolledstudent_fees`
--
ALTER TABLE `enrolledstudent_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolledstudent_payments_throughput`
--
ALTER TABLE `enrolledstudent_payments_throughput`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolledstudent_subjects`
--
ALTER TABLE `enrolledstudent_subjects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `event_calendar`
--
ALTER TABLE `event_calendar`
  ADD PRIMARY KEY (`Event_ID`);

--
-- Indexes for table `gradecompletion`
--
ALTER TABLE `gradecompletion`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `grading`
--
ALTER TABLE `grading`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Semester` (`Semester`);

--
-- Indexes for table `highered_accounts`
--
ALTER TABLE `highered_accounts`
  ADD PRIMARY KEY (`Reference_Number`),
  ADD UNIQUE KEY `Student_Number` (`Student_Number`);

--
-- Indexes for table `program_majors`
--
ALTER TABLE `program_majors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sched`
--
ALTER TABLE `sched`
  ADD PRIMARY KEY (`Sched_Code`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`Section_ID`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`Semester`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`Reference_Number`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrolledstudent_fees`
--
ALTER TABLE `enrolledstudent_fees`
  MODIFY `id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `event_calendar`
--
ALTER TABLE `event_calendar`
  MODIFY `Event_ID` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `highered_accounts`
--
ALTER TABLE `highered_accounts`
  MODIFY `Reference_Number` bigint(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `grading`
--
ALTER TABLE `grading`
  ADD CONSTRAINT `grading_ibfk_1` FOREIGN KEY (`Semester`) REFERENCES `semesters` (`Semester`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
