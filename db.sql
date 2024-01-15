CREATE DATABASE ukk_fajar_xiirpl2;

USE ukk_fajar_xiirpl2;

CREATE TABLE petugas (
  id_petugas INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(25) NOT NULL UNIQUE,
  password VARCHAR(32) NOT NULL,
  nama_petugas VARCHAR(35) NOT NULL,
  level ENUM('admin', 'petugas')
);

CREATE TABLE kelas (
  id_kelas INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nama_kelas VARCHAR(10) NOT NULL,
  kompetensi_keahlian VARCHAR(50)
);

CREATE TABLE spp (
  id_spp INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  tahun YEAR NOT NULL,
  nominal INTEGER
);