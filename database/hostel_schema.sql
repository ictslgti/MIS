-- Normalized Hostel Management Schema

-- 1) Hostels
CREATE TABLE IF NOT EXISTS `hostels` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `gender` ENUM('Male','Female','Mixed') NOT NULL DEFAULT 'Mixed',
  `address` VARCHAR(255) DEFAULT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_hostel_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2) Hostel Blocks
CREATE TABLE IF NOT EXISTS `hostel_blocks` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `hostel_id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_block` (`hostel_id`, `name`),
  CONSTRAINT `fk_block_hostel` FOREIGN KEY (`hostel_id`) REFERENCES `hostels`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3) Hostel Rooms
CREATE TABLE IF NOT EXISTS `hostel_rooms` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `block_id` INT UNSIGNED NOT NULL,
  `room_no` VARCHAR(30) NOT NULL,
  `capacity` INT UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_room` (`block_id`, `room_no`),
  CONSTRAINT `fk_room_block` FOREIGN KEY (`block_id`) REFERENCES `hostel_blocks`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4) Hostel Allocations (active allocations for students)
CREATE TABLE IF NOT EXISTS `hostel_allocations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` VARCHAR(64) NOT NULL,
  `room_id` INT UNSIGNED NOT NULL,
  `allocated_at` DATE NOT NULL,
  `leaving_at` DATE DEFAULT NULL,
  `status` ENUM('active','left','cancelled') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_active_student` (`student_id`, `status`),
  KEY `idx_room` (`room_id`),
  CONSTRAINT `fk_alloc_student` FOREIGN KEY (`student_id`) REFERENCES `student`(`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_alloc_room` FOREIGN KEY (`room_id`) REFERENCES `hostel_rooms`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 5) Keep existing hostel_requests (already exists). Ensure status values align.
-- See database/hostel_requests.sql

-- Helper view for room availability (optional)
-- CREATE OR REPLACE VIEW v_room_occupancy AS
-- SELECT r.id AS room_id, r.capacity, COUNT(a.id) AS occupied
-- FROM hostel_rooms r
-- LEFT JOIN hostel_allocations a ON a.room_id = r.id AND a.status = 'active'
-- GROUP BY r.id, r.capacity;
