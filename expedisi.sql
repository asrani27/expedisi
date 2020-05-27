/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : expedisi

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 27/05/2020 12:08:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES (5, 'Mobil', '2020-05-21 13:37:10', '2020-05-21 13:37:10');
INSERT INTO `barang` VALUES (7, 'Motor', '2020-05-21 13:37:14', '2020-05-21 13:37:14');

-- ----------------------------
-- Table structure for detail_pengiriman
-- ----------------------------
DROP TABLE IF EXISTS `detail_pengiriman`;
CREATE TABLE `detail_pengiriman`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_barang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `subtotal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pengiriman_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pengiriman_id_foreign_pengiriman`(`pengiriman_id`) USING BTREE,
  CONSTRAINT `pengiriman_id_foreign_pengiriman` FOREIGN KEY (`pengiriman_id`) REFERENCES `pengiriman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_pengiriman
-- ----------------------------
INSERT INTO `detail_pengiriman` VALUES (12, 'Mobil', '250', '5500', '1663750', 17, NULL, NULL);
INSERT INTO `detail_pengiriman` VALUES (13, 'Motor', '100', '5500', '665500', 18, NULL, NULL);
INSERT INTO `detail_pengiriman` VALUES (14, 'Motor', '100', '5500', '665500', 19, NULL, NULL);
INSERT INTO `detail_pengiriman` VALUES (15, 'Motor', '100', '5500', '665500', 20, NULL, NULL);
INSERT INTO `detail_pengiriman` VALUES (16, 'Motor', '100', '5500', '665500', 21, NULL, NULL);
INSERT INTO `detail_pengiriman` VALUES (17, 'Mobil', '100', '5500', '665500', 22, NULL, NULL);

-- ----------------------------
-- Table structure for jabatan
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO `jabatan` VALUES (1, 'CS', NULL, NULL);
INSERT INTO `jabatan` VALUES (2, 'Packing', NULL, NULL);
INSERT INTO `jabatan` VALUES (3, 'Kurir', NULL, NULL);
INSERT INTO `jabatan` VALUES (4, 'Supir', NULL, NULL);

-- ----------------------------
-- Table structure for kantor
-- ----------------------------
DROP TABLE IF EXISTS `kantor`;
CREATE TABLE `kantor`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kantor` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kantor
-- ----------------------------
INSERT INTO `kantor` VALUES (1, 'KC BANJARMASIN', '2018-07-20 12:31:46', '2018-07-20 12:31:46');
INSERT INTO `kantor` VALUES (2, 'KC SURABAYA', '2018-07-20 12:32:00', '2018-07-20 12:32:00');
INSERT INTO `kantor` VALUES (3, 'KC JAKARTA', '2018-07-20 12:32:06', '2018-07-20 12:32:06');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (24, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (25, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (26, '2018_06_05_012307_laratrust_setup_tables', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pengiriman
-- ----------------------------
DROP TABLE IF EXISTS `pengiriman`;
CREATE TABLE `pengiriman`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_pengirim` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat_pengirim` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telp_pengirim` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_penerima` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat_penerima` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telp_penerima` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `asal_kc` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tujuan_id` int(255) NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `total` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `tujuan_id_foregn_tujuan`(`tujuan_id`) USING BTREE,
  CONSTRAINT `tujuan_id_foregn_tujuan` FOREIGN KEY (`tujuan_id`) REFERENCES `kantor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengiriman
-- ----------------------------
INSERT INTO `pengiriman` VALUES (17, '125100004', 'upi', 'jl banjarmasin', '897656768798', 'hapis', 'jl cendrawasih', '0987654323456789', 'KC BANJARMASIN', 2, 'Telah Diterima', 1, '2020-05-21 13:58:13', '2020-05-21 13:58:13');
INSERT INTO `pengiriman` VALUES (18, '125100002', 'upi', 'jl pramuka', '0987656789', 'hapis', 'iiuyft', '908887654', 'KC BANJARMASIN', 2, 'Sudah Sampai', 665, '2020-05-27 10:56:35', '2020-05-27 10:56:35');
INSERT INTO `pengiriman` VALUES (19, '125100003', 'upi', 'jl pramuka', '98765', 'hapid', 'jl pangeran', '6574635241', 'KC BANJARMASIN', 2, 'Dalam Pengiriman', 665, '2020-05-21 14:00:32', '2020-05-21 14:00:32');
INSERT INTO `pengiriman` VALUES (20, '125100004', 'upi', 'jl pramuka', '0987654', 'hapid', 'kjhg', '09987654e', 'KC BANJARMASIN', 2, 'Dalam Pengiriman', 665, '2020-05-21 14:01:04', '2020-05-21 14:01:04');
INSERT INTO `pengiriman` VALUES (21, '125100005', 'upi', 'jl pramuka', '9876545678', 'hapid', 'jl cendrawasih', 'i98765456789', 'KC BANJARMASIN', 3, 'Telah Diterima', 665, '2020-05-21 14:01:58', '2020-05-21 14:01:58');
INSERT INTO `pengiriman` VALUES (22, '125100006', 'sdjkhgj', 'skdjhf', '987654', 'sdjdhfg', 'sdjgfh', '09987654', 'KC SURABAYA', 3, 'Dalam Pengiriman', 665500, '2020-05-27 11:09:12', '2020-05-27 11:09:12');

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `permission_role_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permission_user
-- ----------------------------
DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE `permission_user`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`permission_id`, `user_id`, `user_type`) USING BTREE,
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for petugas
-- ----------------------------
DROP TABLE IF EXISTS `petugas`;
CREATE TABLE `petugas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jkel` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jabatan_id` int(255) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `kantor` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jabatan_id_foreign_petugas`(`jabatan_id`) USING BTREE,
  CONSTRAINT `jabatan_id_foreign_petugas` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of petugas
-- ----------------------------
INSERT INTO `petugas` VALUES (1, 'Ade Hermawan', 'Jl A Yani Km 56', 'laki', '087812716372', 1, '2018-07-25 23:27:04', '2018-07-25 15:27:04', 'KC BANJARMASIN');
INSERT INTO `petugas` VALUES (2, 'Rahmat Jayadi', 'Jl Veteran Lama', 'laki', '0878123676562', 2, '2018-07-20 23:44:07', '2018-07-20 23:44:07', NULL);
INSERT INTO `petugas` VALUES (3, 'Raudatul', 'Jl Pramuka km 6', 'Perempuan', '08526676361', 3, '2018-07-20 23:44:24', '2018-07-20 23:44:24', NULL);

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user`  (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`, `role_id`, `user_type`) USING BTREE,
  INDEX `role_user_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES (1, 1, 'App\\User');
INSERT INTO `role_user` VALUES (2, 2, 'App\\User');
INSERT INTO `role_user` VALUES (5, 2, 'App\\User');
INSERT INTO `role_user` VALUES (3, 3, 'App\\User');
INSERT INTO `role_user` VALUES (4, 4, 'App\\User');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', 'Admin', NULL, '2018-07-17 12:36:03', '2018-07-17 12:36:03');
INSERT INTO `roles` VALUES (2, 'kcbjm', 'KC BANJARMASIN', NULL, '2018-07-17 12:36:03', '2018-07-17 12:36:03');
INSERT INTO `roles` VALUES (3, 'kcsby', 'KC SURABAYA', NULL, '2018-07-17 12:36:03', '2018-07-17 12:36:03');
INSERT INTO `roles` VALUES (4, 'kcjkt', 'KC JAKARTA', NULL, '2018-07-17 12:36:03', '2018-07-17 12:36:03');

-- ----------------------------
-- Table structure for tracking
-- ----------------------------
DROP TABLE IF EXISTS `tracking`;
CREATE TABLE `tracking`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lokasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `pengiriman_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pengiriman_id_foreign_tracking`(`pengiriman_id`) USING BTREE,
  CONSTRAINT `pengiriman_id_foreign_tracking` FOREIGN KEY (`pengiriman_id`) REFERENCES `pengiriman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Administrator', 'admin@gmail.com', '$2y$10$mOPdWGCwzPKZsmxE.WxmD.Waw2xQ4KPJInuQFzgebLzThq46vbA22', 'admin', 'HIxhbDQbJTtGWy20c2ZojL3sdZEx83TVbie2ZSAZNz3pHBqciEatpvYXhsYV', '2018-07-17 12:36:03', '2018-07-17 12:36:03');
INSERT INTO `users` VALUES (2, 'KC BJM', 'siswa@gmail.com', '$2y$10$JQtip3wA.VI3j45XhcqGB.JeXQGpRWeX9xHSKv7owbSagbAJ7MwC2', 'kcbjm', 'Mx9map2LkyHRk6hh1jhd72tyx6WdMt6nHnfspAttbsbSAU4rOIpNooaV0yd1', '2018-07-17 12:36:03', '2018-07-17 12:36:03');
INSERT INTO `users` VALUES (3, 'KC SBY', 'SusantoArdi@gmail.com', '$2y$10$/sGe5iLughzWEmxb0LW2Zuguj9Lo3AgCPGhx7sRB2eeze4fw8kn42', 'kcsby', 'myBnj9np6yVWBUfXTpq5D4Atx81Pf9ewjs0tLjZuTnvQ4zBrzvQhzMFnPXa8', '2018-07-17 12:36:03', '2020-05-21 13:48:04');
INSERT INTO `users` VALUES (4, 'KC JKT', 'WiliaWijaya@gmail.com', '$2y$10$wCX0DEtK5GLnKM.QbPJRzOeD1FXlS86DZBbqVasTr6CdSIZ2TLGj.', 'kcjkt', '8S3hmQR2kS2Ilz92DywV0Dzh93tSihfCzWfz3znjxU8V0QjSWhvObNaod1AQ', '2018-07-17 12:36:03', '2018-07-17 12:36:03');
INSERT INTO `users` VALUES (5, 'Sultan', NULL, '$2y$10$wmPva9sSfYBaj0C/pj9/ueDhrdhtCeuApUz6ENJERtZj8LH1zAIIO', 'asrani', NULL, '2018-07-18 05:57:43', '2018-07-18 11:44:42');

-- ----------------------------
-- View structure for v_pengiriman
-- ----------------------------
DROP VIEW IF EXISTS `v_pengiriman`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_pengiriman` AS SELECT
pengiriman.id,
pengiriman.resi,
pengiriman.nama_pengirim,
pengiriman.alamat_pengirim,
pengiriman.telp_pengirim,
pengiriman.nama_penerima,
pengiriman.alamat_penerima,
pengiriman.telp_penerima,
kantor.nama_kantor,
pengiriman.`status`,
pengiriman.total,
pengiriman.created_at,
pengiriman.asal_kc
FROM
pengiriman
INNER JOIN kantor ON pengiriman.tujuan_id = kantor.id ;

-- ----------------------------
-- View structure for v_petugas
-- ----------------------------
DROP VIEW IF EXISTS `v_petugas`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_petugas` AS SELECT
petugas.nama,
petugas.alamat,
petugas.jkel,
petugas.telp,
jabatan.nama_jabatan,
petugas.id,
petugas.kantor
FROM
petugas
INNER JOIN jabatan ON petugas.jabatan_id = jabatan.id ;

SET FOREIGN_KEY_CHECKS = 1;
