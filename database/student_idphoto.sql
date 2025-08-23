-- Table: student_idphoto
-- Stores student ID card photos as LONGBLOB. One row per student.

CREATE TABLE IF NOT EXISTS `student_idphoto` (
  `student_id` varchar(64) NOT NULL,
  `id_photo` longblob,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_id`),
  CONSTRAINT `fk_student_idphoto_student`
    FOREIGN KEY (`student_id`) REFERENCES `student`(`student_id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
