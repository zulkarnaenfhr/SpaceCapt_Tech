CREATE TABLE `spacecapt_tech`.`administrasi` ( 
    `Username` VARCHAR(25) NOT NULL , 
    `Password` VARCHAR(250) NOT NULL , 
    PRIMARY KEY (`Username`)) ENGINE = InnoDB;

CREATE TABLE `spacecapt_tech`.`pegawai` ( `Id_Pegawai` BIGINT(11) NOT NULL , `Id_Jabatan` INT(3) NOT NULL , `Nama_Pegawai` VARCHAR(50) NOT NULL , `Kota_Asal_Pegawai` VARCHAR(35) NOT NULL , PRIMARY KEY (`Id_Pegawai`)) ENGINE = InnoDB;

CREATE TABLE `spacecapt_tech`.`jabatan` ( `id_Jabatan` INT(3) NOT NULL , `Nama_Jabatan` VARCHAR(40) NOT NULL , PRIMARY KEY (`id_Jabatan`)) ENGINE = InnoDB;

INSERT INTO `jabatan` (`id_Jabatan`, `Nama_Jabatan`) VALUES ('111', 'chief executive officer')
INSERT INTO `jabatan` (`id_Jabatan`, `Nama_Jabatan`) VALUES ('112', 'chief technology officer')
INSERT INTO `jabatan` (`id_Jabatan`, `Nama_Jabatan`) VALUES ('113', 'chief operating officer')

ALTER TABLE `pegawai` ADD CONSTRAINT `Jabatan_Pegawai` FOREIGN KEY (`Id_Jabatan`) REFERENCES `jabatan`(`id_Jabatan`) ON DELETE RESTRICT ON UPDATE RESTRICT;