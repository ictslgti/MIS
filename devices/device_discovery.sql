-- Device Discovery Module Tables
-- Add this to your existing database

CREATE TABLE IF NOT EXISTS `network_devices` (
  `device_id` int(11) NOT NULL AUTO_INCREMENT,
  `device_type` varchar(50) NOT NULL,
  `device_name` varchar(100) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `port` int(5) DEFAULT 8000,
  `mac_address` varchar(17) DEFAULT NULL,
  `status` enum('Active','Inactive','Unknown') DEFAULT 'Unknown',
  `software_version` varchar(50) DEFAULT NULL,
  `device_serial` varchar(100) DEFAULT NULL,
  `enhanced_sdk_version` varchar(50) DEFAULT NULL,
  `ipv6_address` varchar(45) DEFAULT NULL,
  `ipv6_gateway` varchar(45) DEFAULT NULL,
  `ipv4_gateway` varchar(15) DEFAULT NULL,
  `subnet_mask` varchar(15) DEFAULT NULL,
  `http_port` int(5) DEFAULT 80,
  `last_discovered` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`device_id`),
  UNIQUE KEY `unique_ip_port` (`ip_address`, `port`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert some sample data similar to your SADP screenshot
INSERT INTO `network_devices` (`device_type`, `device_name`, `ip_address`, `port`, `status`, `software_version`, `device_serial`, `enhanced_sdk_version`, `subnet_mask`, `ipv4_gateway`) VALUES
('DS-7604NI-Q1', NULL, '172.16.0.34', 8000, 'Active', 'V4.31.100-build 210129', NULL, '172.16.0.1', '255.255.255.0', '172.16.0.1'),
('DS-7604NI-Q1', NULL, '172.16.0.35', 8000, 'Active', 'V4.31.100-build 210129', NULL, '172.16.0.1', '255.255.255.0', '172.16.0.1'),
('DS-7104NI-Q1/M', NULL, '172.16.0.38', 8000, 'Active', 'V4.25.000-build 201129', NULL, '172.16.0.1', '255.255.255.0', '172.16.0.1'),
('DS-K1T320MFW-M', NULL, '172.16.0.230', 8000, 'Active', 'V3.5.20-build 240701', NULL, '172.16.0.1', '255.255.255.0', '172.16.0.1'),
('DS-K1T320MFW-M', NULL, '172.16.0.30', 8000, 'Active', 'V3.5.20-build 240701', NULL, '172.16.0.1', '255.255.255.0', '172.16.0.1'),
('DS-7608NI-K2/8P', NULL, '172.16.0.251', 8000, 'Active', 'V4.81.000-build 241029', NULL, '172.16.0.1', '255.255.255.0', '172.16.0.1'),
('DS-2CD1107G2H-LIUF-SL', NULL, '172.16.0.213', 8000, 'Active', 'V5.8.10-build 241029', NULL, '172.16.0.1', '255.255.255.0', '172.16.0.1'),
('DS-2CD1107G2H-LIUF-SL', NULL, '172.16.0.211', 8000, 'Active', 'V5.8.10-build 241029', NULL, '172.16.0.1', '255.255.255.0', '172.16.0.1'),
('DS-2CD1T2G0-I', NULL, '172.16.0.33', 8000, 'Active', 'V5.5.80-build 191010', NULL, '172.16.0.1', '255.255.255.0', '172.16.0.1'),
('DS-2CD1T2G0-I', NULL, '172.16.0.31', 8000, 'Active', 'V5.5.80-build 191010', NULL, '172.16.0.1', '255.255.255.0', '172.16.0.1'),
('DS-2CD1107G2H-LIUF-SL', NULL, '172.16.0.219', 8000, 'Active', 'V5.8.10-build 241029', NULL, '172.16.0.1', '255.255.255.0', '172.16.0.1');
