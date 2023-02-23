/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.30 : Database - todo2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`todo3` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `todo3`;

/*Table structure for table `tb_chamados` */

DROP TABLE IF EXISTS `tb_chamados`;

CREATE TABLE `tb_chamados` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `envolvido` INT DEFAULT NULL,
  `resumo` VARCHAR(45) DEFAULT NULL,
  `tipo_chamado` INT DEFAULT NULL,
  `cadastrado_em` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `STATUS` INT DEFAULT NULL,
  `responsavel` INT DEFAULT NULL,
  `urgencia` INT DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Table structure for table `tb_cliente` */

DROP TABLE IF EXISTS `tb_cliente`;

CREATE TABLE `tb_cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

/*Data for the table `tb_cliente` */

/*Table structure for table `tb_comentario` */

DROP TABLE IF EXISTS `tb_comentario`;

CREATE TABLE `tb_comentario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comentario` TEXT,
  `responsavel` INT DEFAULT NULL,
  `referencia` TEXT,
  `cadastrado_em` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

/*Table structure for table `tb_envolvido` */

DROP TABLE IF EXISTS `tb_envolvido`;

CREATE TABLE `tb_envolvido` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) DEFAULT NULL,
  `email` VARCHAR(45) DEFAULT NULL,
  `telefone` VARCHAR(11) DEFAULT NULL,
  `cliente` INT DEFAULT NULL,
  PRIMARY KEY (`id`)
);

/*Table structure for table `tb_listagem` */

DROP TABLE IF EXISTS `tb_listagem`;

CREATE TABLE `tb_listagem` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) DEFAULT NULL,
  `responsavel` BIGINT NOT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `tb_status`;

CREATE TABLE `tb_status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tb_status` */

INSERT  INTO `tb_status`(`id`,`descricao`) VALUES 
(1,'EM ANÁLISE'),
(2,'EM TRATATIVA'),
(3,'FINALIZADO');

/*Table structure for table `tb_tipo_chamado` */

DROP TABLE IF EXISTS `tb_tipo_chamado`;

CREATE TABLE `tb_tipo_chamado` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) DEFAULT NULL,
  `prazo` INT DEFAULT NULL,
  `color` VARCHAR(45) DEFAULT NULL,
  `urgencia` VARCHAR(45) DEFAULT NULL,
  `prioridade` TEXT,
  `indicador_prioridade` TEXT,
  PRIMARY KEY (`id`)
);

/*Data for the table `tb_tipo_chamado` */

INSERT  INTO `tb_tipo_chamado`(`id`,`nome`,`prazo`,`color`,`urgencia`,`prioridade`,`indicador_prioridade`) VALUES 
(1,'ERRO',4,'bg-dark text-white','URGENTE','<span class=\"badge badge-dark\">URGENTE</span>','fa fa-file-o pull-left'),
(2,'SOLICITAÇÃO DE RELATÓRIO',24,'bg-warning text-dark','MEDIA','<span class=\"badge badge-warning\">MÉDIA</span>','fa-regular fa-clipboard'),
(3,'ALTERAÇÃO DE DATAS',12,'bg-warning text-dark','ALTA','<span class=\"badge badge-warning\">ALTA</span>','fa fa-file-o pull-left'),
(4,'ALTERAÇÃO DE VALORES',4,'bg-danger text-white','ALTA','<span class=\"badge badge-danger\">ALTA</span>','fa-regular fa-clipboard'),
(5,'DÚVIDAS',24,'bg-info text-white','BAIXA','<span class=\"badge badge-info\">BAIXA</span>','fa-regular fa-clipboard'),
(6,'CONSULTORIA',24,'bg-warning text-dark','MEDIA','<span class=\"badge badge-warning\">ALTA</span>','fa-regular fa-clipboard');

/*Table structure for table `tb_urgencia` */

DROP TABLE IF EXISTS `tb_urgencia`;

CREATE TABLE `tb_urgencia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) DEFAULT NULL,
  `status` INT DEFAULT NULL,
  `prazo` VARCHAR(45) DEFAULT NULL,
  `color` TEXT,
  `prioridade` TEXT,
  PRIMARY KEY (`id`)
);

/*Data for the table `tb_urgencia` */

INSERT  INTO `tb_urgencia`(`id`,`descricao`,`status`,`prazo`,`color`,`prioridade`) VALUES 
(1,'URGENTE',1,'4','bg-dark text-white','<span class=\"badge badge-dark\">URGENTE</span>'),
(2,'MUITO ALTA',1,'8','bg-danger text-white','<span class=\"badge badge-danger\">ALTA</span>'),
(3,'ALTA',1,'24','bg-warning text-dark','<span class=\"badge badge-warning\">ALTA</span>'),
(4,'MEDIA',1,'48','bg-warning text-dark','<span class=\"badge badge-warning\">MÉDIA</span>'),
(5,'BAIXA',1,'72','bg-info text-white','<span class=\"badge badge-info\">BAIXA</span>'),
(6,'MUITO BAIXA',1,'120','bg-info text-white','<span class=\"badge badge-info\">MUITO BAIXA</span>');

/*Table structure for table `tb_usuario` */

DROP TABLE IF EXISTS `tb_usuario`;

CREATE TABLE `tb_usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) DEFAULT NULL,
  `email` VARCHAR(45) DEFAULT NULL,
  `senha` VARCHAR(100) DEFAULT NULL,
  `url_foto` TEXT,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tb_usuario` */

INSERT  INTO `tb_usuario`(`id`,`nome`,`email`,`senha`,`url_foto`) VALUES 
(1,'ARTUR LIMA','arturfernandes206@gmail.com','339a18def9898dd60a634b2ad8fbbd58','assets\\arquivos\\1645833592299.jpeg'),
(2,'USUARIO TESTE','teste@gmail.com','339a18def9898dd60a634b2ad8fbbd58','assets\\arquivos\\perfil.png');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
