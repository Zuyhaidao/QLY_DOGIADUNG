-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2024 lúc 05:53 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `do_gia_dung`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_donhang`
--

CREATE TABLE `chitiet_donhang` (
  `ID` int(11) NOT NULL,
  `id_donhang` int(11) NOT NULL,
  `id_sanpham` int(4) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_donhang`
--

INSERT INTO `chitiet_donhang` (`ID`, `id_donhang`, `id_sanpham`, `so_luong`, `gia`) VALUES
(1, 1, 3, 2, 2450000),
(2, 1, 4, 1, 24000000),
(3, 1, 5, 1, 2940000),
(4, 1, 7, 1, 1690000),
(5, 2, 12, 4, 1653000),
(6, 3, 11, 1, 2960000),
(7, 3, 4, 1, 24000000),
(8, 3, 5, 1, 2940000),
(9, 3, 7, 1, 1690000),
(10, 3, 2, 1, 320000),
(11, 4, 4, 1, 24000000),
(12, 4, 8, 1, 230000),
(13, 4, 2, 1, 320000),
(14, 4, 3, 1, 2450000),
(15, 5, 4, 1, 24000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `ID` int(11) NOT NULL,
  `id_user` int(2) NOT NULL,
  `ngay_dat` datetime NOT NULL,
  `tong_tien` bigint(20) NOT NULL,
  `trang_thai` varchar(20) NOT NULL DEFAULT 'Đang xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`ID`, `id_user`, `ngay_dat`, `tong_tien`, `trang_thai`) VALUES
(1, 1, '2024-10-29 23:17:09', 0, 'Đang xử lý'),
(2, 1, '2024-10-29 23:22:13', 0, 'Đang xử lý'),
(3, 1, '2024-10-29 23:32:36', 31910000, 'Đã thanh toán'),
(4, 3, '2024-10-30 00:21:03', 27000000, 'Đã thanh toán'),
(5, 3, '2024-10-30 00:23:19', 24000000, 'Đã thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `error_reports`
--

CREATE TABLE `error_reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `error_reports`
--

INSERT INTO `error_reports` (`id`, `user_id`, `message`, `created_at`) VALUES
(1, 3, 'abcd', '2024-10-30 00:37:08'),
(2, 3, 'lỗi không mua được', '2024-10-30 00:37:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanloai`
--

CREATE TABLE `phanloai` (
  `ID` int(2) NOT NULL,
  `Ten` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phanloai`
--

INSERT INTO `phanloai` (`ID`, `Ten`) VALUES
(1, 'Gia dụng phòng bếp'),
(2, 'Gia dụng phòng khách'),
(3, 'Gia dụng phòng tắm'),
(4, 'Gia dụng phòng ngủ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID` int(4) NOT NULL,
  `Ten` varchar(30) NOT NULL,
  `Gia` bigint(20) NOT NULL,
  `HinhAnh` varchar(100) NOT NULL,
  `HSX` varchar(30) NOT NULL,
  `Mota` text NOT NULL,
  `idphanloai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID`, `Ten`, `Gia`, `HinhAnh`, `HSX`, `Mota`, `idphanloai`) VALUES
(2, 'Bình đun nước siêu tốc Kangaro', 320000, 'binhsieutoc.jpg', 'Kangaroo', 'Không cần phải có bình thủy trữ nước nóng để phục vụ nhu cầu nước nóng hàng ngày cho gia đình. Với bình đun siêu tốc Kang-aroo KG341, nhu cầu nước nóng sử dụng của gia đình bạn có thể được đáp ứng mọi lúc, mọi nơi', 1),
(3, 'Bộ dao thớt Spelier', 2450000, 'bodaothotspelier.jpg', 'Spelier', 'Cam kết chất lượng, giá rẻ nhất, Hàng chính hãng, bảo hành toàn quốc, Cam kết bảo trì 6 tháng 1 lần', 1),
(4, 'MÁY RỬA BÁT KAFF KF-BISW12 PLU', 24000000, 'maykaff.jpg', 'KAFF', 'Từ khi ra mắt trên thị trường máy này đã nhanh chóng nhận được rất nhiều phản hồi tích cực. Liệu rằng đằng sau vẻ đẹp sang trọng vốn có đó, máy rửa bát Kaff KF-BISW12 PLUS có điểm gì ưu việt đáng để lựa chọn và tin dùng. Hãy cùng hsn.vn tìm hiểu kỹ hơn về sản phẩm này', 1),
(5, 'Bàn uống trà', 2940000, 'bantra.jpg', 'NHÀ ĐỈNH', 'Mang vẻ đẹp tự nhiên, sang trọng và bền bỉ, thích hợp cho không gian phòng khách hoặc ngoài trời.                    ', 1),
(6, 'Bàn trang điểm', 2365000, 'bantrangdiem.jpg', 'IGA', 'Mang thiết kế hiện đại không kém phần tinh tế với nhiều chức năng khác nhau được tích hợp vào sản phẩm, giúp bạn giải quyết được mọi vấn đề về không gian ở lẫn nội thất trong nhà một cách nhanh chóng.', 4),
(7, 'Bình hoa', 1690000, 'binhhoa.jpg', 'Bát Tràng', 'Bình hoa sứ với thiết kế tinh tế, làm từ chất liệu sứ cao cấp, mang lại vẻ đẹp trang nhã, thích hợp để trang trí phòng khách, bàn ăn hoặc văn phòng, tạo điểm nhấn sang trọng cho không gian sống.', 2),
(8, 'Bình xịt thơm nhà vệ sinh', 230000, 'binhxit.jpg', 'Hàng nhập khẩu', 'Sản phẩm bình xịt thơm đem lại không gian sống trong lành với mùi hương tự nhiên dễ chịu.', 3),
(9, 'Bồn tắm Sewo DT-2058', 24500000, 'bontam.jpg', 'Sewo', 'Được thiết kế và sản xuất theo nhượng quyền của Đức. Đây là mã bồn có kích thức nhỏ phù hợp với phòng tắm nhỏ. Bồn tắm được sản xuất theo công nghệ mới, hút nguyên tấm Acrylic cao cấp hai bề mặt trong và ngoài như nhau luôn sáng bóng.', 3),
(10, 'Chăn lông siêu ấm Raschel Comf', 8500000, 'Chan-dong-cao-cap-Han-Quoc.jpg', 'Raschel Comforter', 'Chăn lông siêu ấm Với kết cấu như một máy sưởi cao cấp bao bọc quanh cơ thể bằng các sợi vi sinh Raschel ấm áp – là vật liệu sợi nhỏ, mảnh cao cấp, sợi lông dài 10mm được dệt mật độ cao.', 4),
(11, 'Chậu Rửa Lavabo BELLO BB', 2960000, 'chauruamat.jpg', 'BELLO BB ', '                    với thiết kế hiện đại, tinh tế cùng chất liệu cao cấp, mang đến sự tiện nghi và đẳng cấp cho không gian phòng tắm.                    ', 1),
(12, 'Acrylic Đèn Trần Khách Sạn Phò', 1653000, 'denchum.jpg', 'Acrylic ', 'Đèn trần acrylic phong cách châu Âu với thiết kế đơn giản và siêu mỏng, phù hợp cho phòng khách, phòng ngủ gia đình, và khách sạn. Đèn nghệ thuật sáng tạo này không chỉ cung cấp ánh sáng ấm áp mà còn tạo điểm nhấn thẩm mỹ hiện đại và sang trọng cho không gian.', 2),
(13, 'Đèn bàn trang trí', 1390000, 'denngu.jpg', 'GoldMoon', 'Cảm hứng đến từ sự tối giản, tinh tế trong thiết kế tạo nên điểm nhấn nổi bật cho không gian căn phòng. Không chỉ đơn thuần mang đến nguồn sáng trang trí, khi được đặt tại bất kỳ không gian nào nó cũng thể hiện hết nét đẹp tuyệt hảo và làm tăng giá trị thẩm mỹ cho tổng thể.', 4),
(14, 'Giường Ngủ Gỗ Tràm', 5990000, 'giuong.jpg', 'MOHO VLINE ', 'Giường ngủ gỗ tràm mang đến cảm hứng tối giản và tinh tế trong thiết kế, tạo điểm nhấn nổi bật cho không gian phòng ngủ. Không chỉ đơn thuần là nơi nghỉ ngơi, giường còn thể hiện vẻ đẹp hoàn hảo và làm tăng giá trị thẩm mỹ cho tổng thể căn phòng. Với chất liệu gỗ tràm bền bỉ và tự nhiên, sản phẩm không chỉ đẹp mắt mà còn đảm bảo sự chắc chắn và thoải mái cho người sử dụng.', 4),
(15, 'Gối lông vũ cao cấp', 3500000, 'goi-long-vu.jpg', 'HANVICO', 'là loại gối có ruột được nhồi bằng lông của các loại thủy cầm như thiên nga, ngỗng, ngan, vịt. Từ rất xa xưa, con người đã nhận ra rằng các loại thủy cầm đã biết cách giữ ấm cho cơ thể của chúng bằng các lớp lông trên cơ thể. Vì thế, việc tận dụng lông của chúng để làm gối, chăn và trang phục để giữ ấm cơ thể đã được con nười sử dụng từ rất lâu rồi. Đặc biệt là những khu vực như Châu Âu & Châu Á, nơi con người có những thói quen dùng thịt gia cầm làm thực phẩm và lông dùng cho ngành may mặc.', 4),
(16, 'Gương tròn led', 2400000, 'guong.jpg', 'Enic', 'Gương tròn led trước ENIC sang trọng, gọn gàng, tiện nghi, nâng tầm không gian ', 3),
(17, 'Kệ để đồ', 2450000, 'kededo.jpg', 'Togismart', 'Khung dày dănh, chắc chắn, sơn tĩnh điện tốt,lắp ráp dễ dàng,sang trọng và tiện nghi ', 4),
(18, 'Tủ đựng đồ treo tường', 1490000, 'kegiatreo.jpg', 'Togismart', 'Khung dày dănh, chắc chắn, sơn tĩnh điện tốt,lắp ráp dễ dàng,sang trọng và tiện nghi ', 3),
(19, 'Kệ giá sách đẹp', 1980000, 'kesach.jpg', 'Nội Thất Hải Anh', 'Kệ sách gỗ đứng TS20 được thiết kế với chân kệ có nút nhựa, giúp chống trầy xước sàn nhà. Kích thước rộng 1.1m, sâu 30cm, cao 1.8m, mang đến không gian lưu trữ rộng rãi, đồng thời đảm bảo thẩm mỹ cho không gian sống. ', 2),
(20, 'Kệ để tivi', 2800000, 'ketivi.jpg', 'KTVG28', 'Kệ ti vi gỗ KTV28 được làm từ gỗ công nghiệp phủ Melamine chống trầy, thiết kế 3 tầng với 4 ngăn kéo, 3 ngăn hộc và 1 kệ ti vi. Kích thước: dài 2m, sâu 30cm, cao 40cm.', 2),
(21, 'Khăn Tắm ', 275000, 'khantam.jpg', 'SAGATEX', 'Khăn làm từ 100% cotton cao cấp mang lại cảm giác mềm mại và êm ái khi sử dụng, đồng thời có khả năng thấm hút nước tốt giúp khô ráo nhanh chóng. Nhờ kỹ thuật dệt tiên tiến, khăn có độ bền cao và không bị xù lông sau nhiều lần giặt. Chất liệu cotton tự nhiên an toàn cho da và sức khỏe, không chứa hóa chất độc hại.', 3),
(22, 'Lò vi sóng có nướng Sharp', 2280000, 'lovisong.jpg', 'Sharp ', 'Lò vi sóng có nướng Sharp R-G251TV-BK 25 lít là sản phẩm đến từ thương hiệu Sharp – Nhật Bản, được sản xuất tại Thái Lan nên đảm bảo chất lượng.', 1),
(23, 'Máy Xay Công nghiệp Philiger ', 650000, 'MayPhiliger.jpg', 'Philiger', 'Máy xay công nghiệp Philiger PLG-6088 với công suất 4500W, lưỡi dao thép không gỉ, có 15 cấp độ xay, tích hợp quạt tản nhiệt, và các chức năng xay đá, hạt, ngũ cốc, thịt, hoa quả. Thiết kế bền bỉ, dễ sử dụng, an toàn và tiện ích, giúp xay nhuyễn các nguyên liệu nhanh chóng.', 1),
(24, 'Nệm Cao Su Ép Tổng Hợp Kim Cươ', 1661000, 'nem-cao-su-tong-hop.jpg', 'Satin Lụa', 'Nệm Cao Su Ép Tổng Hợp Kim Cương Vải Satin Lụa Là sự hòa quyện hoàn hảo giữa chất liệu foam êm mềm và vải satin lụa mượt mà, nệm ép tổng hợp Kim Cương không chỉ mang lại cho bạn giấc ngủ sâu yên bình mà còn đem đến sự đảm bảo toàn diện cho sức khỏe.', 4),
(25, 'BỘ NỒI TỪ KAINER KA-1866', 2200000, 'noichao.jpg', 'KAINER', 'Được thiết kế rất tinh tế, màu bạch kim trang nhã sang trọng. Nồi inox kainer  giúp khả năng truyền và hấp thụ nhiệt cực nhanh,Chỉ cần sở hữu một Bộ nồi  KAINER KA-1866, 5 món là đã có đầy đủ bộ đun nấu gồm có 4 nồi nấu, 1 chảo chống dính cao cấp, đa năng vô cùng tiện dụng.', 1),
(26, 'Nồi cơm điện Cuckoo', 3740000, 'noicuckoo.jpg', 'MRC-IH01E', 'Kệ ti vi gỗ KTV28 được làm từ gỗ công nghiệp phủ Melamine chống trầy, thiết kế 3 tầng với 4 ngăn kéo, 3 ngăn hộc và 1 kệ ti vi. Kích thước: dài 2m, sâu 30cm, cao 40cm.', 1),
(27, 'Rèm Vải', 800000, 'remcua.jpg', 'Rèm Phương Anh', 'Rèm vải được biết đến là một trong những loại rèm cửa đa dạng bậc nhất trong các mẫu mã, thiết kế, màu sắc. Đặc biệt là sự vượt trội về số lượng màu sắc của rèm cửa khiến cho khách hàng thoải mái lựa chọn. Trong đó, rèm vải màu nâu được biết đến là một trong những màu rèm được nhiều khách hàng yêu thích nhất.', 2),
(28, 'Nồi cơm điện Cuckoo', 3740000, 'noicuckoo.jpg', 'MRC-IH01E', 'Kệ ti vi gỗ KTV28 được làm từ gỗ công nghiệp phủ Melamine chống trầy, thiết kế 3 tầng với 4 ngăn kéo, 3 ngăn hộc và 1 kệ ti vi. Kích thước: dài 2m, sâu 30cm, cao 40cm.', 1),
(29, 'SOFA DA THẬT ARTIS', 328320000, 'sofa.jpg', 'Chateau d.Ax', 'Trải nghiệm được dạo quanh thành phố Matera giữa những ngôi nhà đá là nguồn cảm hứng khiến các nhà thiết kế của Studio Red tạo ra sofa Artis.', 2),
(30, 'Thảm trải sàn Mine', 5490000, 'thamchongtron.jpg', 'BLANC', 'Thảm trải sàn Mine dệt 3D khổ tùy chọn với kỹ thuật dệt từ đáy (công nghệ 3D layers) sắc nét giúp không gian có thêm chiều sâu, tạo hiệu ứng thị giác bắt trọn tầm nhìn. Bên cạnh đó, độ bền đế thảm trải sàn lên đến 7-8 năm sử dụng, gấp 2 lần so với thảm lông mềm.', 3),
(31, 'Thảm trải sàn Alonso dệt 3D', 328320000, 'thamtraisan.jpg', 'Alonso', 'Thảm trải sàn Alonso dệt 3D với kỹ thuật dệt từ đáy (công nghệ 3D layers) sắc nét giúp không gian có thêm chiều sâu, tạo hiệu ứng thị giác bắt trọn tầm nhìn. Bên cạnh đó, độ bền đế thảm trải sàn lên đến 7-8 năm sử dụng, gấp 2 lần so với thảm lông mềm.', 2),
(32, 'Smart Tivi Samsung 4K 55 inch ', 7600000, 'tivi.jpg', 'Samsung ', 'Được thiết kế 3 cạnh không viền vô cùng ấn tượng mở rộng không gian màn hình hiển thị cho phép người dùng trải nghiệm những hình ảnh sống động, sắc nét hơn, nâng tầm không gian sống hiện đại cho ngôi nhà của bạn.  ', 2),
(33, 'Tủ lạnh Samsung Inverter', 15750000, 'tulanhInverter.jpg', 'Samsung', 'Tủ lạnh Samsung Inverter 488 lít RF48A4010B4/SV được trang bị 2 dàn lạnh độc lập ở ngăn đông và ngăn lạnh, có thể điều chỉnh linh hoạt nhiệt của 2 ngăn riêng biệt, duy trì độ ẩm phù hợp cho thực phẩm. Đồng thời, không bị lẫn mùi giữa các ngăn, giữ trọn vẹn hương vị ban đầu của thực phẩm.', 1),
(34, 'Tủ phụ lưu trữ ', 2290000, 'tuluutru.jpg', 'AMI', 'Tiện nghi sang trọng và gọn gàng là những gì mà chúng tôi có ở sản phẩm này. ', 3),
(35, 'Tủ quần áo cánh mở hiện đại ', 5400000, 'tuquanao.jpg', 'AUDER', 'Đây là dòng tủ quần áo có sự kết hợp giữa cánh gỗ và cánh kính mang lại cho bạn 1 phong cách độc đáo và hiện đại . Sản phẩm có thể sử dụng 2-3 cánh kính đi cùng 2 cánh gỗ và 2 ngăn kéo mang tới khả năng lưu trữ tốt nhất cho không gian sử dụng .', 4),
(36, 'Sen cây nóng lạnh', 5280000, 'voisen.jpg', 'Caesar', 'Sen cây nóng lạnh Caesar S688CB là sản phẩm cao cấp với chức năng điều chỉnh nhiệt độ, thiết kế sang trọng và chất liệu bền bỉ, phù hợp cho không gian phòng tắm hiện đại.', 1),
(37, 'Chảo Điện Đa Năng Dung Tích 3L', 268000, 'chaodanang.jpg', 'GWELL', 'Chảo điện đa năng chống dính ẩm thực mới, khám phá hương vị cuộc sống! Nắp thủy tinh thấy món ngon trong tầm nhìn, vỏ thủy tinh dày trong suốt chịu nhiệt độ cao ', 1),
(38, 'Máy hút bụi Electrolux Z1231', 1800000, 'hutbui.jpg', 'Electrolux', 'Máy hút bụi công suất mạnh mẽ, thiết kế nhỏ gọn, dễ dàng làm sạch mọi ngóc ngách trong nhà.', 2),
(39, 'Quạt điều hòa Sunhouse SHD7727', 5200000, 'quatdieuhoa.jpg', 'Sunhouse', 'Công nghệ làm mát nhanh với hơi nước, tiết kiệm điện, phù hợp với mọi không gian sống.', 2),
(40, 'Bàn ủi hơi nước Philips GC5039', 3290000, 'banuihoi.jpg', 'Philips', 'Thiết kế nhỏ gọn, dễ sử dụng, loại bỏ nếp nhăn nhanh chóng với công nghệ hơi nước hiện đại.', 2),
(41, 'Máy ép chậm Bluestone JEB-6519', 2450000, 'mayep.jpg', 'Bluestone', 'Công nghệ ép chậm giữ nguyên hương vị và dinh dưỡng, thiết kế dễ vệ sinh và bảo quản.', 1),
(42, 'Bếp nướng điện Kangaroo KG198', 720000, 'bepnuongdien.jpg', 'Kangaroo', 'Thiết kế nhỏ gọn, dễ sử dụng, giúp nướng thực phẩm nhanh chóng và đều nhiệt.', 1),
(43, 'Máy lọc không khí Xiaomi Mi Ai', 3300000, 'maylockhongkhi.jpg', 'Xiaomi', 'Lọc sạch không khí, loại bỏ bụi mịn và vi khuẩn, phù hợp cho phòng diện tích nhỏ và vừa.', 2),
(44, 'Máy sấy tóc Panasonic EH-ND21', 520000, 'maysaytoc.jpg', 'Panasonic', 'Máy sấy tóc công suất 1200W, 3 mức điều chỉnh nhiệt độ và tốc độ, bảo vệ tóc khỏi hư tổn.', 4),
(45, 'Máy giặt LG Inverter 10kg FV14', 6990000, 'maygiat.jpg', 'LG', 'Máy giặt cửa trên, công nghệ Inverter tiết kiệm điện, chế độ giặt Turbo Drum mạnh mẽ.', 3),
(46, 'Nồi chiên không dầu Lock&Lock ', 3390000, 'noichienkhonggiau.jpg', 'Lock&Lock', 'Dung tích lớn, chế độ chiên nướng không cần dầu, giảm thiểu chất béo, tốt cho sức khỏe.', 1),
(47, 'Máy hút mùi Canzy CZ-0370', 3990000, 'mayhutmui.jpg', 'Canzy', 'Thiết kế hiện đại, công suất hút mạnh, giảm tiếng ồn, mang lại không gian bếp trong lành.', 1),
(48, 'Máy pha cà phê DeLonghi EC685.', 6890000, 'mayphacaphe.jpg', 'DeLonghi', 'Thiết kế nhỏ gọn, pha chế nhanh chóng, phù hợp cho gia đình và văn phòng.', 1),
(49, 'Máy xay sinh tố cầm tay Bosch ', 1350000, 'mayxaycamtay.jpg', 'Bosch', 'Máy xay cầm tay tiện lợi, công suất mạnh, lưỡi dao sắc bén giúp xay nhuyễn mọi loại thực phẩm.', 1),
(50, 'Robot hút bụi lau nhà Ecovacs ', 13900000, 'robothutbui.jpg', 'Ecovacs', 'Robot hút bụi kết hợp lau nhà với hệ thống điều hướng laser, công nghệ tránh vật cản và điều khiển qua app.', 2),
(51, 'Quạt không cánh Dyson AM07', 10900000, 'quatkhongcanh.jpg', 'Dyson', 'Quạt không cánh thiết kế độc đáo, luồng gió mạnh và yên tĩnh, tiết kiệm năng lượng.', 2),
(52, 'Lò nướng âm tủ Miele H2265B', 32900000, 'lonuongam.jpg', 'Miele', 'Lò nướng âm tủ với 7 chức năng nướng và hệ thống tự làm sạch Pyrolytic.', 1),
(53, 'Máy sấy quần áo Bosch WTX87M90', 25900000, 'maysayquanao.jpg', 'Bosch', 'Máy sấy quần áo với công nghệ Heat Pump tiết kiệm năng lượng và hệ thống sấy nhanh.', 4),
(54, 'Máy lọc nước Kangen Leveluk SD', 8900000, 'maylocnuoc.jpg', 'Kangen', '                    Máy lọc nước điện giải với 7 tấm điện cực Titan, giúp tạo ra nước kiềm giàu khoáng chất.                    ', 1),
(55, 'Máy rửa mặt Foreo Luna 3', 4690000, 'mayruamat.jpg', 'Foreo', 'Máy rửa mặt công nghệ sóng âm T-Sonic với 16 chế độ rung, giúp làm sạch sâu và chăm sóc da.', 3),
(56, 'Tủ rượu Malloca MWC-60BG', 19900000, 'turuou.jpg', 'Malloca', 'Tủ rượu âm tủ có thể chứa 24 chai, điều chỉnh nhiệt độ linh hoạt từ 5-18°C.', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `diachi` varchar(30) NOT NULL,
  `sdt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `email`, `diachi`, `sdt`) VALUES
(1, 'dhai', '123', 'Đào Duy Hải', 'dhai06@gmail.com', 'Bắc Ninh', 917212312),
(2, 'mrfat1605', 'tfat1605', 'Lê Đức Trung', 'leductrung16052003@g', 'Nghệ An', 915791161),
(3, 'nmt', '1', 'Nguyễn Minh Thuận', 'nmt1508@gmail.com', 'Vĩnh Phúc', 869646876);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_donhang` (`id_donhang`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_user to user` (`id_user`);

--
-- Chỉ mục cho bảng `error_reports`
--
ALTER TABLE `error_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `phanloai`
--
ALTER TABLE `phanloai`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idphanloai` (`idphanloai`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `error_reports`
--
ALTER TABLE `error_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phanloai`
--
ALTER TABLE `phanloai`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD CONSTRAINT `chitiet_donhang_ibfk_1` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitiet_donhang_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `id_user to user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `error_reports`
--
ALTER TABLE `error_reports`
  ADD CONSTRAINT `error_reports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `id_phanloai ` FOREIGN KEY (`idphanloai`) REFERENCES `phanloai` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
