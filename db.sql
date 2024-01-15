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

CREATE TABLE siswa (
  nisn CHAR(10) NOT NULL PRIMARY KEY,
  nis CHAR(8) NOT NULL,
  nama VARCHAR(35) NOT NULL,
  id_kelas INTEGER NOT NULL,
  alamat TEXT NOT NULL,
  no_telp VARCHAR(13) NOT NULL,
  id_spp INTEGER NOT NULL,
  FOREIGN KEY (id_kelas) REFERENCES kelas(id_kelas),
  FOREIGN KEY (id_spp) REFERENCES spp(id_spp)
);

INSERT INTO petugas (username, password, nama_petugas, level) VALUES
('admin', 'admin', 'Admiin', 'admin'),
('fajar', 'rahasia', 'Fajar Ilham Alfarizi', 'petugas');

INSERT INTO kelas (nama_kelas, kompetensi_keahlian) VALUES
('XII RPL 2', 'REKAYASA PERANGKAT LUNAK'),
('XII OTKP 4', 'OTOMATISASI DAN TATA KELOLA PERKANTORAN');

INSERT INTO spp (tahun, nominal) VALUES
(2023, 10000), (2024, 20000);

INSERT INTO siswa VALUES
('10292938', '10216663', 'Fajar Ilham', 1, 'KP BURUJUL', '0882254858', 1);