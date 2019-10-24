-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.35-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for outdoor_shop
CREATE DATABASE IF NOT EXISTS `outdoor_shop` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `outdoor_shop`;

-- Dumping structure for table outdoor_shop.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id_user` int(11) DEFAULT NULL,
  `id_products` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  KEY `FK_cart_products` (`id_products`),
  KEY `FK_cart_users` (`id_user`),
  CONSTRAINT `FK_cart_products` FOREIGN KEY (`id_products`) REFERENCES `products` (`id_products`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cart_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table outdoor_shop.cart: ~3 rows (approximately)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` (`id_user`, `id_products`, `qty`) VALUES
	(4, 2, 3),
	(3, 2, 1),
	(11, 2, 1);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dumping structure for table outdoor_shop.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categories` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_categories`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table outdoor_shop.categories: ~4 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id_categories`, `name`) VALUES
	(1, 'Backpack'),
	(3, 'Tent'),
	(4, 'Shoes'),
	(5, 'Jackets');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table outdoor_shop.products
CREATE TABLE IF NOT EXISTS `products` (
  `id_products` int(11) NOT NULL AUTO_INCREMENT,
  `id_categories` int(11) DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_products`),
  KEY `FK_products_categories` (`id_categories`),
  CONSTRAINT `FK_products_categories` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id_categories`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Dumping data for table outdoor_shop.products: ~33 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id_products`, `id_categories`, `name`, `price`, `stock`, `description`, `img`) VALUES
	(1, 1, 'Consina Centurion 50', 650000, 7, 'Tas larang', 'centurion50-BL2X-800x800.jpg'),
	(2, 1, 'Osprey Aether Pro 70L - Grey M', 3000000, 53, 'Tas larang njir.', 'aether_pro_70_grey_01.jpg'),
	(3, 1, 'Bodypack Prodiger Suspense Laptop Backpack - Green', 350000, 79, 'Tas apik rodok murah', '2872bitn_1.jpg'),
	(4, 4, 'Caterpillar Men Induction Waterproof Composite Toe Work Boot ', 650000, 29, 'Sepatu', 'CATM-P90923-030519-S18-032.jpg'),
	(5, 3, 'Consina Tent Kingdom 8', 3000000, 20, 'Tenda gede', 'tenda-kingdom-800x800.jpg'),
	(6, 5, 'Consina Jacket Maverick', 185000, 16, 'Jaket apik', 'maverick-DGY3-800x800.jpg'),
	(7, 1, 'Consina Trivia Lightblue', 175000, 24, 'Tas biru muda', 'trivia-BL6-800x800.jpg'),
	(8, 3, 'Eiger Baluran 2P Tent - Orange', 17500000, 4, 'Tenda larang tapi apik, tapi larang', '910004588002_4.jpg'),
	(9, 5, 'Eiger Triple Jacket - Navy', 600000, 76, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing el', 'j53410ln_1.jpg'),
	(11, 5, 'Jaket Pink', 1600000, 25, 'Memiliki ciri khas karet di pergelangan tangannya, memiliki hoodie dan kerah sehingga cocok bagi yang sering menghabiskan waktu di daerah yang berhawa dingin atau para pengendara motor. Jacket ini didesain secara khusus sehingga mampu menjaga suhu tubuh tetap normal dan merasa hangat meskipun kondisi cuaca sedang tidak bersahabat atau kondisi cuaca yang ekstrim seperti angin besar hingga suhu yang dingin.', '9fix.jpg'),
	(12, 5, 'PATAGONIA HIKING JACKET WOMEN-Orchid', 1250000, 6, 'Memiliki ciri khas karet di pergelangan tangannya, memiliki hoodie dan kerah sehingga cocok bagi yang sering menghabiskan waktu di daerah yang berhawa dingin atau para pengendara motor. Jacket ini didesain secara khusus sehingga mampu menjaga suhu tubuh tetap normal dan merasa hangat meskipun kondisi cuaca sedang tidak bersahabat atau kondisi cuaca yang ekstrim seperti angin besar hingga suhu yang dingin.', 'PATAGONIA JACKET HIKING WOMEN (ORCHID).jpg'),
	(13, 5, 'PATAGONIA HIKING JACKET WOMEN-Pink', 1600000, 10, 'Memiliki ciri khas karet di pergelangan tangannya, memiliki hoodie dan kerah sehingga cocok bagi yang sering menghabiskan waktu di daerah yang berhawa dingin atau para pengendara motor. Jacket ini didesain secara khusus sehingga mampu menjaga suhu tubuh tetap normal dan merasa hangat meskipun kondisi cuaca sedang tidak bersahabat atau kondisi cuaca yang ekstrim seperti angin besar hingga suhu yang dingin.', 'PATAGONIA JACKET HIKING WOMEN (PINK).jpg'),
	(14, 5, 'PATAGONIA HIKING JACKET WOMEN-Tosca', 1700000, 9, 'Memiliki ciri khas karet di pergelangan tangannya, memiliki hoodie dan kerah sehingga cocok bagi yang sering menghabiskan waktu di daerah yang berhawa dingin atau para pengendara motor. Jacket ini didesain secara khusus sehingga mampu menjaga suhu tubuh tetap normal dan merasa hangat meskipun kondisi cuaca sedang tidak bersahabat atau kondisi cuaca yang ekstrim seperti angin besar hingga suhu yang dingin.', 'PATAGONIA JACKET HIKING WOMEN (TOSCA).jpg'),
	(16, 1, 'EXTRATERRESIAL BACK-Blue', 1870000, 87, 'memiliki reputasi baik sebagai carrier yang tahan lama dan memiliki kualitas back system yang baik. Back system carrier ini dibuat menggunakan teknologi Wind Tunnel yang mengurangi kontak antara punggung Anda dengan bagian belakang carrier sehingga tidak terasa panas saat digunakan.\r\n\r\nCarrier ini juga memiliki fungsi hydration compatible, yaitu kantong di bagian atas carrier yang bisa digunakan untuk menyimpan air minum dan memudahkan Anda saat ingin meminum air. Oleh karena itulah carrier ini ', 'EXTRATERRESSIAL BLUE.jpg'),
	(17, 1, 'JACK WOLFSKIN TREKKING BACK-Black', 2500000, 4, 'Dirancang untuk membawa beban berat bahkan hingga 20 kg, untuk perjalanan mendaki gunung yang panjang. Back system-nya menggunakan X-Transition yang tidak bisa disetel, berupa rangka batang aluminium berbentuk X yang sangat nyaman saat digunakan. Carrier ini memiliki dua kompartemen besar yang terpisah dan 9 kantong tambahan yang membuat Anda memiliki banyak pilihan saat sedang packing. Cocok untuk Anda bawa berkemah di hutan selama 3-7 hari karena selain sebagai carrier, bagian head carrier-nya', 'JACK WOLFSKIN TREKKING BACK (BLACK).jpg'),
	(18, 1, 'OSPREY AETHER PRO-Tosca', 1200000, 11, 'Selain sangat ringan dan nyaman saat digunakan, backpack ini juga memiliki 8 kantong fungsional, termasuk kantong pada hip belt yang dapat digunakan untuk menyimpan kamera atau energy bar. Carrier ini juga memiliki kantong khusus sleeping bag dengan bukaan terpisah sehingga lebih praktis dan mudah digunakan. Sistem harness OPTIFIT miliknya akan membuat semakin pas dengan bentuk tubuh Anda dan membuatnya nyaman digunakan untuk waktu lama, cocok untuk pendaki gunung profesional!', 'OSPREY AETHER PRO (TOSCA).jpg'),
	(19, 1, 'WOMEN BACKPACK-Pink Purple', 800000, 84, 'Backpack ini merupakan solusi bagi Anda yang mengutamakan kenyamanan meskipun sedang mendaki dengan beban yang berat. Carrier ini dilengkapi sistem Anti-Gravity di bagian punggung, berbahan mesh dengan breathability baik, dan memiliki rangka berbahan metal yang kokoh. Dengan fitur-fitur tersebut, beban berat yang Anda bawa akan terasa berkurang hingga setengahnya sehingga Anda tetap nyaman. Apalagi, tali bahu dan hip belt-nya terbuat dari bahan yang sangat empuk. Carrier ini juga dilengkapi bany', 'WOMEN BACKPACK (PINK-PURPLE).jpg'),
	(20, 1, 'WOLFSKIN BACK FIT PERFECT-Tosca', 3000000, 12, 'Produk selanjutnya pilihan kami ini memiliki kompartemen utama yang besar, memungkinkan Anda untuk memuat banyak barang di dalamnya. Ditujukan untuk para pengguna wanita, carrier ini memiliki VariFit-Slide back system yang dapat disesuaikan dengan panjang torso Anda. Kemudian, adanya sistem Aircontact membuat carrier bisa berdekatan dengan tubuh pengguna sehingga lebih nyaman digunakan. Di bagian depan carrier pun terdapat ritsleting untuk memudahkan Anda mengambil benda di dasar carrier dari ko', 'WOLFSKIN BACK PERFECT (TOSCA).jpg'),
	(21, 4, 'HIKING SHOES-Sandy Brown', 2200000, 12, 'Hiking Shoes ini sudah terkenal di dunia hiking sebagai produsen sepatu yang tahan lama dan nyaman di kaki. Salah satunya  yang menggunakan teknologi MDT rubber outsole di bagian bawahnya sehingga mampu menyeimbangkan cengkraman di medan yang sulit sekalipun dan menjaga kestabilan kaki dengan baik. Material mesh juga membuat sepatu ini semakin nyaman Anda gunakan. Bahan suede-nya tidak hanya memberi sirkulasi udara yang baik, tetapi juga membuat sepatu ini pas di kaki. Dipadukan dengan ghillie l', 'HIKING SHOES (SANDY BROWN).jpg'),
	(22, 4, 'TRAIL RUNNING SHOES WOMEN-Pink Floral White', 2300000, 12, 'Merupakan sepatu light trekking low cut dengan desain yang sporty, bahannya sintetis, dan baik dalam menjaga sirkulasi udara. Produsen juga memberikan teknologi Traxion pada sol yang dapat memberikan daya cengkram mumpuni di berbagai macam trek outdoor. Bobotnya yang ringan sangat membantu untuk Anda bermanuver ketika melakukan perjalanan. Di bagian jari-jari depannya pun terdapat pelindung untuk benturan atau menahan pijakan ketika berjinjit. Bila Anda mencari sepatu trekking yang tidak hanya t', 'TRAIL RUNNING SHOES WOMEN (PINK-FLORAL WHITE).jpg'),
	(23, 4, 'MID WEIGHT BOOT-Dark Brown', 5000000, 47, 'Mid Weight Boot ini mengakomodasi Anda untuk dapat berjalan di medan apa pun. Termasuk kategori trekking mid cut, sepatu ini tahan terhadap air dan memiliki sirkulasi udara yang baik dengan adanya teknologi Texapore O2+ sehingga Anda tidak perlu takut kaki gerah. Ini adalah sepatu trekking yang cukup ringan, tetapi siap bertarung di medan yang keras. Sepatu ini cocok Anda gunakan saat ingin trekking dalam jangka waktu lama karena selain bisa menempuh medan apa pun, busa di bagian insole-nya juga', 'MID WEIGHT BOOT (BROWN).jpg'),
	(24, 4, 'HIKING SHOES WOMEN-Pink Grey', 3400000, 34, 'Dibuat untuk Anda yang menggemari trekking khususnya olahraga rock climbing atau ingin kaki Anda tetap kuat dan bertenaga saat menjelajah. Bahan vibram pada outsole-nya pun akan membuat kaki Anda terlindungi dengan baik sehingga tidak mudah lelah. Tidak hanya itu, grip di outsole-nya memungkinkan sepatu ini mencengkram permukaan dengan baik. Desain sepatu ini pun stylish dan bisa digunakan berbagai kalangan, mulai dari remaja hingga orang tua sekalipun. Produk ini tergolong tahan lama dan cukup ', 'HIKING SHOES WOMEN (PINK-GREY).jpg'),
	(25, 4, 'HIKING SHOES-Black Grey', 2800000, 5, 'Masuk dalam kategori mid cut trekking shoes, sepatu ini cocok digunakan untuk medan yang berat, tidak rata atau bebatuan, dan kurang cocok untuk jalanan beraspal. Dari segi harga, Consina Ascend sangat ekonomis. Solnya pun terbilang keras dan solid sehingga bisa Anda andalkan untuk perjalanan jarak jauh. Bagian luarnya yang keras akan tahan terhadap benturan dan melindungi kaki Anda. Untuk penampilan, sepatu ini juga terbilang keren dan juga menyediakan warna-warna bervariasi untuk sepatu ini. S', 'HIKING SHOES (BLUE-GREY).jpg'),
	(26, 3, 'DOME FIT-Orange Red', 6000000, 9, 'Sebagai salah satu jenis tenda yang paling banyak digunakan oleh para petualang, tenda kubah atau dome adalah salah satu jenis tenda yang paling populer. Memiliki ciri khas pada bentuk melengkung pada tiang-tiang penyangganya, tenda jenis ini cocok sekali untuk lo bawa ke spot petualangan yang tidak memiliki cuaca ekstrim. Keunggulan dari tenda ini adalah mudah mendirikannya, bentuk depan yang bagus, jumlah penyangga yang lebih dari tiga, dan juga memiliki harga yang paling murah dari yang palin', 'DOME FIT (ORANGE RED).jpg'),
	(27, 3, 'DOME PRO-White Brown', 4500000, 10, 'Sebagai salah satu jenis tenda yang paling banyak digunakan oleh para petualang, tenda kubah atau dome adalah salah satu jenis tenda yang paling populer. Memiliki ciri khas pada bentuk melengkung pada tiang-tiang penyangganya, tenda jenis ini cocok sekali untuk lo bawa ke spot petualangan yang tidak memiliki cuaca ekstrim.\r\n\r\nKeunggulan dari tenda ini adalah mudah mendirikannya, bentuk depan yang bagus, jumlah penyangga yang lebih dari tiga, dan juga memiliki harga yang paling murah dari yang pa', 'DOME PRO (WHITE-BROWN).jpg'),
	(28, 3, 'PERFECT DOME PRO-Sandy Brown', 6000000, 27, 'Sebagai salah satu jenis tenda yang paling banyak digunakan oleh para petualang, tenda kubah atau dome yang lebih komples ini adalah salah satu jenis tenda yang paling populer. Memiliki ciri khas pada bentuk melengkung pada tiang-tiang penyangganya, tenda jenis ini cocok sekali untuk lo bawa ke spot petualangan yang tidak memiliki cuaca ekstrim. Keunggulan dari tenda ini adalah mudah mendirikannya, bentuk depan yang bagus, jumlah penyangga yang lebih dari tiga, dan juga memiliki harga yang palin', 'PERFECT DOME PRO (SANDY BROWN).jpg'),
	(29, 3, 'SLIDING DOME PRO-Black Range', 7000000, 7, 'Sebagai salah satu jenis tenda yang paling banyak digunakan oleh para petualang, tenda kubah atau dome adalah salah satu jenis tenda yang paling populer. Memiliki ciri khas pada bentuk melengkung pada tiang-tiang penyangganya, tenda jenis ini cocok sekali untuk lo bawa ke spot petualangan yang tidak memiliki cuaca ekstrim. Keunggulan dari tenda ini adalah mudah mendirikannya, bentuk depan yang bagus dengan posisi sisi depan berbentuk sliding secara horizontal, jumlah penyangga yang lebih dari ti', 'SLIDING DOME PRO (BLACK-RANGE).jpg'),
	(30, 3, 'COMPLEX DOME-Blue Grey', 10000000, 2, 'Sebagai salah satu jenis tenda yang paling banyak digunakan oleh para petualang, tenda kubah atau dome adalah salah satu jenis tenda yang paling populer yang memiliki luas tenda sangat besar sehingga dapat memuat lebih banyak orang. Memiliki ciri khas pada bentuk melengkung pada tiang-tiang penyangganya, tenda jenis ini cocok sekali untuk lo bawa ke spot petualangan yang tidak memiliki cuaca ekstrim. Keunggulan dari tenda ini adalah mudah mendirikannya, bentuk depan yang bagus, jumlah penyangga ', 'COMPLEX DOME (BLUE-GREY).jpg'),
	(31, 5, 'PATAGONIA HIKING JACKET-Black Yellow', 1500000, 15, 'Memiliki ciri khas karet di pergelangan tangannya, memiliki hoodie dan kerah sehingga cocok bagi yang sering menghabiskan waktu di daerah yang berhawa dingin atau para pengendara motor. Jacket ini didesain secara khusus sehingga mampu menjaga suhu tubuh tetap normal dan merasa hangat meskipun kondisi cuaca sedang tidak bersahabat atau kondisi cuaca yang ekstrim seperti angin besar hingga suhu yang dingin.', 'PATAGONIA HIKING JACKET (BLACK-YELLOW).jpg'),
	(32, 5, 'PATAGONIA HIKING JACKET-Black Grey', 1000000, 90, 'Memiliki ciri khas karet di pergelangan tangannya, memiliki hoodie dan kerah sehingga cocok bagi yang sering menghabiskan waktu di daerah yang berhawa dingin atau para pengendara motor. Jacket ini didesain secara khusus sehingga mampu menjaga suhu tubuh tetap normal dan merasa hangat meskipun kondisi cuaca sedang tidak bersahabat atau kondisi cuaca yang ekstrim seperti angin besar hingga suhu yang dingin.', 'PATAGONIA HIKING JACKET (BLACK-GREY).jpg'),
	(33, 5, 'DOWN HIKING JACKET-Olive Green', 900000, 10, 'Jaket yang berisi bulu halus dari angsa atau bebek. Bulu-bulu halus yang biasanya berasal dari bagian dada dan sayap ini, disebut down, memiliki sifat unik. Kelembutannya, dalam jumlah besar, membentuk kantong-kantong udara yang bisa menyimpan panas udara dan menahannya di dalam kantong-kantong tersebut. Ini akan membuat pemakai down jacket tetap hangat. Jaket down ini memiliki fill power  yang baik digunakan untuk kegiatan outdoor.', 'DOWN HIKING JACKET (OLIVE GREEN).jpg'),
	(34, 5, 'DOWN HIKING JACKET-Black', 800000, 14, 'Jaket yang berisi bulu halus dari angsa atau bebek. Bulu-bulu halus yang biasanya berasal dari bagian dada dan sayap ini, disebut down, memiliki sifat unik. Kelembutannya, dalam jumlah besar, membentuk kantong-kantong udara yang bisa menyimpan panas udara dan menahannya di dalam kantong-kantong tersebut. Ini akan membuat pemakai down jacket tetap hangat. ', 'DOWN HIKING JACKET (BLACK).jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table outdoor_shop.shipment
CREATE TABLE IF NOT EXISTS `shipment` (
  `id_shipment` int(11) NOT NULL AUTO_INCREMENT,
  `id_trans` int(11) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_shipment`),
  KEY `FK_shipment_transactions` (`id_trans`),
  CONSTRAINT `FK_shipment_transactions` FOREIGN KEY (`id_trans`) REFERENCES `transactions` (`id_trans`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Dumping data for table outdoor_shop.shipment: ~8 rows (approximately)
/*!40000 ALTER TABLE `shipment` DISABLE KEYS */;
INSERT INTO `shipment` (`id_shipment`, `id_trans`, `fullname`, `address`, `phone`) VALUES
	(12, 34, 'Fernanda Dwi Iswidianggi', 'Jl. Mentaraman, Talok, Kec. Turen\r\nMalang\r\nJawa Timur 65175 ', '082257229842'),
	(15, 35, 'Tokiwa Sougo', '51 East Ave. East Haven, CT 06512, USA', '089123456765'),
	(16, 36, 'Tokiwa Sougo', '51 East Ave.\r\nEast Haven, CT 06512 USA', '082257229842'),
	(17, 37, 'Tokiwa Sougo', '51 East Ave.\r\nEast Haven, CT 06512 USA', '089123456765'),
	(18, 38, 'Tri Ardiansyah', 'akjsa', '080'),
	(19, 39, 'sheva', 'xxxx', '099887778'),
	(20, 40, 'Tokiwa Sougo', 'ajahsjash', '089998776554'),
	(21, 41, 'Tokiwa Sougo', 'hjfgfghfgfd', '16756'),
	(24, 43, 'fdhdfhfdh', 'dfdfhdfhfdh', '134324'),
	(25, 93, 'Wigambreng Kusuma', 'Bojonegoro', '9031740913'),
	(26, 112, 'Wigambreng Kusuma', 'Adoh', '21838937'),
	(27, 113, 'breng', 'bojo', '098765'),
	(28, 115, 'Hiden Aruto', 'Sana', '08765432121');
/*!40000 ALTER TABLE `shipment` ENABLE KEYS */;

-- Dumping structure for table outdoor_shop.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id_trans` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) DEFAULT NULL,
  `grandtotal` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `receipt` text,
  PRIMARY KEY (`id_trans`),
  KEY `FK_transactions_users` (`id_user`),
  CONSTRAINT `FK_transactions_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

-- Dumping data for table outdoor_shop.transactions: ~16 rows (approximately)
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` (`id_trans`, `date`, `id_user`, `grandtotal`, `status`, `receipt`) VALUES
	(34, '2019-05-18 13:39:26', 4, 1350000, 0, '589461_620.jpg'),
	(35, '2019-05-18 15:32:50', 11, 9320000, 0, 'tepung.jpg'),
	(36, '2019-05-18 15:36:30', 11, 1250000, 0, 'tepung.jpg'),
	(37, '2019-05-18 15:38:35', 11, 185000, 0, 'tepung.jpg'),
	(38, '2019-05-20 11:01:18', 4, 350000, 0, 'tepung.jpg'),
	(39, '2019-05-20 13:48:42', 11, 8400000, 0, 'forvita_forvita-margarine--200-g--kemasan-sachet-_full02.jpg'),
	(40, '2019-05-21 09:41:35', 2, 650000, 0, '589461_620.jpg'),
	(41, '2019-05-21 14:21:22', 4, 175000, 0, 'roti-moka-maksindo-300x203.jpg'),
	(43, '2019-10-09 14:56:39', 11, 350000, 0, 'Back.jpeg'),
	(69, '2019-10-16 17:24:04', 1, 5645000, 1, ''),
	(70, '2019-10-16 18:45:20', 21, 4200000, 1, ''),
	(93, '2019-10-17 17:45:10', 12, 2200000, 0, 'Back5.jpeg'),
	(111, '2019-10-18 14:59:20', 1, 6000000, 1, NULL),
	(112, '2019-10-18 15:04:02', 1, 3650000, 0, 'Back6.jpeg'),
	(113, '2019-10-18 16:23:26', 22, 306000000, 0, 'Back7.jpeg'),
	(114, '2019-10-18 16:45:19', 2, 44175000, 1, NULL),
	(115, '2019-10-18 19:42:11', 25, 1600000, 2, 'photo6289411076332300419.jpg');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;

-- Dumping structure for table outdoor_shop.transactions_detail
CREATE TABLE IF NOT EXISTS `transactions_detail` (
  `id_trans` int(11) DEFAULT NULL,
  `id_products` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  KEY `FK_transactions_detail_transactions` (`id_trans`),
  KEY `FK_transactions_detail_products` (`id_products`),
  CONSTRAINT `FK_transactions_detail_products` FOREIGN KEY (`id_products`) REFERENCES `products` (`id_products`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_transactions_detail_transactions` FOREIGN KEY (`id_trans`) REFERENCES `transactions` (`id_trans`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table outdoor_shop.transactions_detail: ~42 rows (approximately)
/*!40000 ALTER TABLE `transactions_detail` DISABLE KEYS */;
INSERT INTO `transactions_detail` (`id_trans`, `id_products`, `price`, `qty`, `subtotal`) VALUES
	(34, 3, 350000, 1, 350000),
	(34, 32, 1000000, 1, 1000000),
	(35, 1, 650000, 1, 650000),
	(35, 34, 800000, 1, 800000),
	(36, 12, 1250000, 1, 1250000),
	(37, 6, 185000, 1, 185000),
	(38, 3, 350000, 1, 350000),
	(39, 25, 2800000, 3, 8400000),
	(40, 1, 650000, 1, 650000),
	(41, 7, 175000, 1, 175000),
	(43, 3, 350000, 1, 350000),
	(69, 7, 175000, 1, 175000),
	(69, 32, 1000000, 1, 1000000),
	(70, 7, 175000, 13, 2275000),
	(70, 7, 175000, 11, 1925000),
	(35, 2, 3000000, 1, 3000000),
	(35, 2, 3000000, 1, 3000000),
	(35, 16, 1870000, 1, 1870000),
	(35, 2, 3000000, 1, 3000000),
	(35, 2, 3000000, 1, 3000000),
	(35, 2, 3000000, 1, 3000000),
	(35, 2, 3000000, 1, 3000000),
	(40, 9, 600000, 1, 600000),
	(40, 9, 600000, 1, 600000),
	(40, 9, 600000, 1, 600000),
	(40, 9, 600000, 1, 600000),
	(40, 5, 3000000, 1, 3000000),
	(40, 5, 3000000, 2, 6000000),
	(40, 23, 5000000, 7, 35000000),
	(93, 21, 2200000, 1, 2200000),
	(69, 1, 650000, 1, 650000),
	(69, 16, 1870000, 1, 1870000),
	(69, 19, 800000, 1, 800000),
	(69, 19, 800000, 1, 800000),
	(69, 3, 350000, 1, 350000),
	(69, 19, 800000, 1, 800000),
	(111, 26, 6000000, 1, 6000000),
	(112, 1, 650000, 1, 650000),
	(112, 2, 3000000, 1, 3000000),
	(113, 28, 6000000, 51, 306000000),
	(114, 5, 3000000, 3, 9000000),
	(114, 23, 5000000, 7, 35000000),
	(114, 7, 175000, 1, 175000),
	(115, 11, 1600000, 1, 1600000);
/*!40000 ALTER TABLE `transactions_detail` ENABLE KEYS */;

-- Dumping structure for table outdoor_shop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(70) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `status` enum('active','inactive') DEFAULT 'inactive',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Dumping data for table outdoor_shop.users: ~13 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_user`, `fullname`, `email`, `username`, `password`, `role`, `status`) VALUES
	(1, 'Aprilia Putri A', 'april@here.com', 'april', '9e3895cedfa93fc7d6f63cb00ad91d1b', 'admin', 'active'),
	(2, 'M. Yuki Miftakhurrizqi', 'myukim@here.com', 'yuki', '202cb962ac59075b964b07152d234b70', 'user', 'active'),
	(3, 'Tri Ardiansyah', 'triard@here.com', 'triard', '202cb962ac59075b964b07152d234b70', 'user', 'active'),
	(4, 'Fernanda Dwi Iswidianggi', 'fern@here.com', 'fer', '202cb962ac59075b964b07152d234b70', 'user', 'active'),
	(11, 'Tokiwa Sougo', 'zio@here.com', 'wagamaou', '202cb962ac59075b964b07152d234b70', 'user', 'active'),
	(12, 'Kazuraba Kouta', 'dewabuah@here.com', 'gaimdancer', '9e3895cedfa93fc7d6f63cb00ad91d1b', 'user', 'active'),
	(14, 'Denny Nur Ramadhan', 'denny.dand@outlook.com', 'ddand', '9e3895cedfa93fc7d6f63cb00ad91d1b', 'admin', 'active'),
	(20, 'Halo', 'halo@sekai.com', 'halo', '202cb962ac59075b964b07152d234b70', 'user', 'active'),
	(21, 'Winandri Kusuma', 'winandrikusuma@gmail.com', 'breng', '345ace72da935df76f3cfa3bd7b64956', 'user', 'active'),
	(22, 'adi', 'adi@gmail.com', 'adi', 'c46335eb267e2e1cde5b017acb4cd799', 'user', 'active'),
	(23, 'ade', 'ade@gmail.com', 'ade', 'a562cfa07c2b1213b3a5c99b756fc206', 'user', 'active'),
	(24, 'Saya', 'a@a.com', 'saya', '202cb962ac59075b964b07152d234b70', 'user', 'inactive'),
	(25, 'Hiden Aruto', 'aruto@hiden.com', 'zeroone', '9e3895cedfa93fc7d6f63cb00ad91d1b', 'user', 'active'),
	(26, 'Koizumi Hanayo', 'hanayo@muse.com', 'hanayo', '202cb962ac59075b964b07152d234b70', 'user', 'inactive'),
	(27, 'Muhammad Aqib Alvaaiziin', 'aqib@here.com', 'aqib', '202cb962ac59075b964b07152d234b70', 'user', 'inactive'),
	(28, 'Wigambreng Kusuma', 'breng@here.com', 'breng123', '202cb962ac59075b964b07152d234b70', 'user', 'active');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
