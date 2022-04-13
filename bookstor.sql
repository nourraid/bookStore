-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 04:55 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(4, 'nour', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `BD` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `BD`, `Address`, `email`) VALUES
(7, 'عائض القرني', '1959-01-01', 'Saudi Arabia', 'alqarneoffice@gmail.com'),
(9, 'محمد حسان', '1962-04-08', 'Dakahlia Governorate, Egypt', 'noEmail@hassan.com'),
(10, 'أيمن العتوم', '1972-03-02', 'Souf, Jordan', 'noEmail@AymanOtoom.com'),
(11, 'عمرو عبد الحميد', '1987-06-15', 'Egypt', 'moEmail@amro.com'),
(13, 'علي المقري', '1966-08-30', 'Taizz, Yemen', 'noEmail@ali.com'),
(15, 'فهد عامر الأحمدي', '1991-04-07', ' Medina, Saudi Arabia', 'noEmail@fahd.com'),
(17, 'كامل كيلاني', '1959-12-06', 'Cairo, Egypt', 'noEmail@kamel.com'),
(18, 'محمود درويش', '1941-03-13', ' Al-Birwa', 'noEmail@mahmoud.com'),
(19, 'نزار قباني', '1923-03-21', 'Damascus, Syria', 'noEmail@nizar.com'),
(20, 'د. إياد قنيبي', '1975-10-22', 'الأردن', 'noEmail@ead.com');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `edition` int(11) NOT NULL,
  `language` varchar(255) NOT NULL,
  `page_number` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `imageName` varchar(255) NOT NULL,
  `bookPDF` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `author_id`, `publisher`, `edition`, `language`, `page_number`, `available`, `price`, `category_id`, `imageName`, `bookPDF`) VALUES
(17, 'لا تحزن', 'عيدُ على خيرِ حالٍ عدْتَ يا عيدُ\r\nفنحنُ في مسمعِ الدنيا أناشيدُ\r\nعلى شفاهِ فمِ العلياءِ بسمتُنا\r\nومن غمامِ سمانا يُورقُ العُودُ\r\nمن ليلةِ الغارِ فارقْنا مآتِـمَنا\r\nمنْ وقعِ «لا تحزنْ» انسابتْ تغاريدُ\r\nوكيفَ نحزنُ والكونُ انتشى طرباً\r\nمن هدي (اقرأ) توحيدٌ ', 7, 'العبيكان للنشر', 27, 'العربية', 928, 120, 0, 12, '../images/book/لا تحزن.png', '../bookPDF/لا تحزن.pdf'),
(18, 'لا تغضب', ' كتاب لا تغضب عبارة عن نصائح وقصص تتكلم عن الغضب واهمية ضبط النفس مدعوم بقصص عن الصحابة و العلماء والانبياء و بأدلة من القرآن الكريم و السنة النبوية', 7, ' دار الحضارة للنشر والتوزيع', 1, 'العربية', 264, 120, 20, 12, '../images/book/لا تغضب.jpg', '../bookPDF/لا تغضب.pdf'),
(21, 'السبع الموبقات', 'السبع الموبقات نسخة مصورة لفضيلة الشيخ محمد حسان :\r\nعن ابي هريرة رضي الله عنه قال : قال رسول الله (ص) اجتنبوا السبع الموبقات قالوا يا رسول الله وما هن قال الشرك بالله والسحر وقتل النفس التي حرم الله الا بالحق وأكل الربا وأكل مال اليتيم والتَّوليِّ يوم الز', 9, 'دار ابن رجب', 1, 'العربية', 147, 120, 0, 12, '../images/book/السبع الموبقات.webp', '../bookPDF/السبع الموبقات.pdf'),
(22, 'نصرة للشريعة', 'تفريغ سلسلة نصرة للشريعة\r\n', 20, 'قسم التحايا', 1, 'العربية', 164, 110, 0, 12, '../images/book/نصرة للشريعة.webp', '../bookPDF/نصرة للشريعة.pdf'),
(23, 'حسن الظن بالله', 'كيف يمكنك _أنت_ أن تَقلب المحنة إلى مِنحة؟ .\r\nكيف تستمتعُ بنعمة البلاء؟ .\r\nكيف يمكنك أن تعيش بسعادة مهما كانت الظروف؟ .\r\nكيف يمكنك التعامل مع الأمور _أيّاً كانت_ بإيجابية وتفاؤل؟.\r\nكيف تعلق قلبك بالله _عز وجل_ فلا تخاف سواه ولا ترجو سواه؟.\r\nكيف تمتلك عزيم', 20, 'دار بداية للنشر والتوزيع', 1, 'العربية', 202, 120, 0, 12, '../images/book/حسن الظن بالله.webp', '../bookPDF/حسن الظن بالله.pdf'),
(24, 'يسمعون حسيسها', 'أيمن العتوم يكتب في هذه الرواية قصة حياة سجين سوري طبيب قضى ما يقارب 17 سنة في سجن تدمر والتهمة بقيت مجهولة؟ وسبب الافراج عنه أيضا كان مجهولا بالمقارنة بالويلات التي لاقاها وزملاءه المساجين هناك... \" العفو الرئاسي\" ، هل العفو الرئاسي سبب وجيه لخروج سجين م', 10, 'المؤسسة العربية للدراسات والنشر', 2, 'العربية', 185, 150, 0, 11, '../images/book/يسمعون حسيسها.webp', '../bookPDF/يسمعون حسيسها.pdf'),
(25, 'كلمة الله', '\"اقتديت إلى ما يبدو أنّه سيكون مثواها الأخير. عبر بها عمّها شكوي الطريق الزراعية بسيارته الفارهة قاصداً الكاتدرائية. \"ماذا سيكون الأمر يا ترى؟!\" سألت نفسها. وأجابت مباشرةً: \"أعرف، يريدون أن يعرضوا هذه المجنونة على الطيب القابع خلف مكتبه الوثير في الكنيسة ', 10, 'المؤسسة العربية للدراسات والنشر', 2, 'العربية', 124, 200, 0, 11, '../images/book/كلمة الله.webp', '../bookPDF/كلمة الله.pdf'),
(26, 'أرض زيكولا', '\"اقتديت إلى ما يبدو أنّه سيكون مثواها الأخير. عبر بها عمّها شكوي الطريق الزراعية بسيارته الفارهة قاصداً الكاتدرائية. \"ماذا سيكون الأمر يا ترى؟!\" سألت نفسها. وأجابت مباشرةً: \"أعرف، يريدون أن يعرضوا هذه المجنونة على الطيب القابع خلف مكتبه الوثير في الكنيسة ', 11, ' عصير الكتب للنشر والتوزيع', 2, 'العربية', 124, 60, 0, 11, '../images/book/أرض زيكولا.webp', '../bookPDF/أرض زيكولا.pdf'),
(28, 'اليهودي الحالي', 'تقع الفتاة المسلمة فاطمة في غرام سالم، الشاب اليهودي، في بيئة مختلطة يهودية إسلامية. كانت تقرأ عليه بعض آيات القرآن وتعلّمه اللغة العربية، ويعلّمها هو اللغة العبرية. ولم يلبث العاشقان أن مضيا غير مكترثين بالأصوات المعترضة، وعاشا سويّة في صنعاء حيث تبدأ رح', 13, 'دار الساقي', 2, 'العربية', 80, 200, 0, 13, '../images/book/اليهودي الحالي.png', '../bookPDF/اليهودي الحالي.pdf'),
(29, 'نظرية الفستق', 'نبذة عن كتاب نظرية الفستق\r\nكتاب نظرية الفستق هو أحد كتب التنمية البشرية وتطوير الذات، مؤلف الكتاب هو فهد عامر الأحمدي، يتكون الكتاب من جزئيين الجزء الأول يحتوي على 338 صفحة، والذي يتضمن عدد كبير من المقالات التي تتحدث كيفية تطوير الذات وتحسين طرق التفكير ', 15, 'دار الحضارة للنشر والتوزيع', 1, 'العربية', 338, 22, 0, 17, '../images/book/نظرية الفستق.webp', '../bookPDF/نظرية الفستق.pdf'),
(30, 'عجيبة وعجيبة', 'قصة عجيبة و عجيبة تأليف كامل كيلانى تحكي القصة حياة «عجيبة» بنت الملك «نادر»، التي توفي أبوها الملك وهي بعد في الرابعة، فكان من المفترض أن تخلُفه، ولكنها لصغر عمرها لم تتول الحكم، حيث عُين عليها وصيًا، إلى أن تكبر وتصبح قادرة على تولي زمام الحكم بنفسها. ف', 17, 'مؤسسة هنداوي للتعليم والثقافة', 1, 'العربية', 40, 120, 0, 18, '../images/book/عجيبة وعجيبة.webp', '../bookPDF/عجيبة وعجيبة.pdf'),
(31, 'بساط الريح', 'عاش في قديم الزمان، سلطَان عظيم القدر والشأن، اسمه السلطَان «محمود». كان السلطان «محمود» معروفا — بين سلاطين الهند وملوكها — بالذكَاء ونفاذ الرأي وبُعْد النظَر ورجاحة التفكير، وبراعة التدبير. وكان — إلى جانب هذه الخصال الْحميدة — مفتونا باقتناء التحف النا', 17, ' هنداوي للطباعة والتوزيع', 1, 'العربية', 91, 66, 0, 18, '../images/book/بساط الريح.webp', '../bookPDF/بساط الريح.pdf'),
(32, 'أرنب فى القمر', 'هي أحدى الأساطير الهندية التي تحكي قصة الأرنب الوفي والمخلص «أبو نبهان»، وكيف أنه كوفىء خيرًا لحرصه على مساعدة المساكين والمعوزين، بتخليد ذكراه وجعله رمزًا للصدق والوفاء.', 17, 'مؤسسة هنداوي للتعليم والثقافة', 1, 'العربية', 14, 97, 0, 18, '../images/book/أرنب فى القمر.webp', '../bookPDF/أرنب فى القمر.pdf'),
(33, 'قصائد', 'في قصائده يبحث نزار عن امرأة ليست ككل النساء امرأة يتوه بعينيها ويسكر بقبلة من شفتيها، ويسرح معها في عالم ليس كعالم البشر، وإنما بعالم هو أقرب إلى الخيال، ملىء بالحب والغرام والزواج عن القانون البشري في الحب.', 19, 'منشورات نزار قباني', 1, 'العربية', 54, 70, 0, 19, '../images/book/قصائد.webp', '../bookPDF/قصائد.pdf'),
(34, 'في حضرة الغياب', 'لن يقوى أحد على إخفاء الوجع عنك، فهو مرئي ، ملموس، مسموع كإنكسار المكان المدّوي. وتسأل : ما معنى لاجىء؟ سيقولون: هو من إقتلع من أرض الوطن وتسأل : ما معنى كلمة وطن؟ سيقولون: هو البيت وشجرة التوت وقن الدجاج وقفير النحل ورائحة الخبز والسماء الأولى وتسأل: هل ', 18, ' الأهلية للنشر والتوزيع', 1, 'العربية', 170, 20, 0, 19, '../images/book/في حضرة الغياب.webp', '../bookPDF/في حضرة الغياب.pdf'),
(35, 'ذاكرة للنسيان', 'وفي هذه اللحظة المحددة، حيث تحرث الطائرات أجسادنا، يطالب المثقفون المتحلقون حول جسد غائب بقصيدة تعادل قوة الغارة أو تقلب موازين القوى على الأقل. إذا لم تولد القصيدة «الآن» فمتى تولد ؟ وإذا ولدت فيما بعد، فما هي قيمتها «الآن». سؤال بسيط ومعقد يحتاج إلى جوا', 18, ' دار توبقال للنشر', 1, 'العربية', 235, 50, 0, 19, '../images/book/ذاكرة للنسيان.png', '../bookPDF/ذاكرة للنسيان.pdf'),
(36, 'ثلاثية أطفال الحجارة', 'بهروا الدنيا وما في يدهم إلا الحجارة... وأضاؤوا كالقناديل، وجاؤوا كالبشارة، قاوموا... وانفجروا، واستشهدوا... وبقينا دبباً قطبية، صفحت أجسادها ضد الحرارة. قاتلوا عنا... إلى أن قتلوا. وبقينا في مقاهينا، كبصّاق المحارة... واحد يبحث منا عن تجارة، واحد... يطلب', 19, 'منشورات نزار قباني', 1, 'العربية', 60, 20, 0, 19, '../images/book/ثلاثية الحجارة.webp', '../bookPDF/ثلاثية الحجارة.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `imageName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `imageName`) VALUES
(11, 'روايات', '../images/category/روايات.jpg'),
(12, 'إسلامية', '../images/category/إسلامية.jpg'),
(13, 'تاريخية', '../images/category/تاريخية.jpg'),
(14, 'سياسية', '../images/category/سياسية.jpg'),
(15, 'علمية', '../images/category/علمية.jpg'),
(16, 'المال والأعمال', '../images/category/المال والأعمال.jpeg'),
(17, 'علم النفس وتطوير الذات', '../images/category/علم النفس وتطوير الذات.jpg'),
(18, 'أطفال', '../images/category/أطفال.jpg'),
(19, 'شعرية', '../images/category/شعرية.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`id`, `book_id`, `user_id`) VALUES
(7, 25, 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `Address`, `password`, `phoneNumber`, `email`, `userImage`) VALUES
(14, 'nada', 'palestin , gaza', '202cb962ac59075b964b07152d234b70', '0592212481', 'nrayd633@gmail.com', 'images/users/nada.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
