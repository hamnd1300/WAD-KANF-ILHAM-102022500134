CREATE DATABASE IF NOT EXISTS laundry_db;
USE laundry_db;

CREATE TABLE IF NOT EXISTS pesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    whatsapp VARCHAR(20),
    layanan VARCHAR(50),
    berat INT
);

INSERT INTO pesanan (nama, whatsapp, layanan, berat) VALUES
('Dadang', '08775001211', 'Reguler', 6),
('Paijo', '089716728631', 'Kilat', 12 );