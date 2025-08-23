-- Table: hostel_requests
-- Stores initial hostel requests capturing only distance. Allocation happens after payment confirmation.

CREATE TABLE IF NOT EXISTS `hostel_requests` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `student_id` varchar(64) NOT NULL,
  `distance_km` decimal(6,2) NOT NULL,
  `status` enum('pending_payment','paid','allocated','rejected') NOT NULL DEFAULT 'pending_payment',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_student` (`student_id`),
  CONSTRAINT `fk_hostel_requests_student`
    FOREIGN KEY (`student_id`) REFERENCES `student`(`student_id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
