
CREATE DATABASE IF NOT EXISTS CONTROLEMC;

USE CONTROLEMC;

CREATE TABLE IF NOT EXISTS tb_membro (
    id_membro INT AUTO_INCREMENT,
    nm_membro VARCHAR(255) NOT NULL, 
    email     VARCHAR(255) UNIQUE,
    telefone  VARCHAR(255) NOT NULL UNIQUE,
    senha     VARCHAR(255) NOT NULL,
    dt_nasc   DATE,
    ingresso  DATE,
    cidade    VARCHAR(255),
    bairro    VARCHAR(255),
    rua       VARCHAR(255),
    PRIMARY KEY(id_membro)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS tb_usuario (
    id_user  INT AUTO_INCREMENT,
    nm_user  VARCHAR(255) NOT NULL, 
    email    VARCHAR(255) NOT NULL UNIQUE,
    senha    VARCHAR(255) NOT NULL,
    telefone VARCHAR(255) UNIQUE,
    id_membro INT, 
    adm      INT,
    PRIMARY KEY(id_user)
    ADD CONSTRAINT fk_membro_user
        FOREIGN KEY id_membro
        REFERENCES tb_membro(id_membro)
        ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS tb_lider (
    id_lider INT AUTO_INCREMENT,
    id_user INT NOT NULL,
    PRIMARY KEY(id_lider),
    CONSTRAINT fk_user_lider
        FOREIGN KEY (id_user)
        REFERENCES tb_usuario(id_user)
        ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS tb_agenda (
    id_agenda   INT AUTO_INCREMENT,
    nm_ocasion  VARCHAR(255) NOT NULL,
    data_beggin DATETIME NOT NULL,
    data_end    DATETIME NOT NULL, 
    color       VARCHAR(7),
    PRIMARY KEY(id_agenda)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS tb_ocasion (
    id_ocasion  INT AUTO_INCREMENT,
    id_data     INT NOT NULL,
    id_lider    INT NOT NULL,
    PRIMARY KEY(id_ocasion),
    CONSTRAINT fk_data_ocasion
        FOREIGN KEY (id_data)
        REFERENCES tb_agenda(id_agenda)
        ON DELETE CASCADE,
    CONSTRAINT fk_lider_ocasion
        FOREIGN KEY (id_lider)
        REFERENCES tb_lider(id_lider)
        ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS tb_ministerios (
    id_ministerio INT AUTO_INCREMENT,
    nm_ministerio VARCHAR(255) NOT NULL,
    pw_ministerio VARCHAR(255) NOT NULL,
    ft_perfil     VARCHAR(255),
    id_lider      INT NOT NULL,
    PRIMARY KEY(id_ministerio),
    CONSTRAINT fk_lider_ministerio
        FOREIGN KEY (id_lider) 
        REFERENCES tb_lider(id_lider)
        ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS tb_usuario_ministerio (
    id            INT AUTO_INCREMENT,
    nm_user       VARCHAR(255) NOT NULL,
    id_user       INT,
    id_ministerio INT,
    PRIMARY KEY(id),
    CONSTRAINT fk_user_um
        FOREIGN KEY (id_user) 
        REFERENCES tb_usuario(id_user)
        ON DELETE CASCADE,
    CONSTRAINT fk_ministerio_um
        FOREIGN KEY (id_ministerio) 
        REFERENCES tb_ministerios(id_ministerio)
        ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS tb_infantil (
    id          INT AUTO_INCREMENT,
    nm_user     VARCHAR(255) NOT NULL,
    nm_response VARCHAR(255) NOT NULL,
    fone_resp   VARCHAR(255) NOT NULL,
    id_response INT,
    id_lider    INT,
    PRIMARY KEY(id),
    CONSTRAINT fk_user_infantil
        FOREIGN KEY (id_response) 
        REFERENCES tb_usuario(id_user)
        ON DELETE CASCADE, 
    CONSTRAINT fk_lider_infantil
        FOREIGN KEY (id_lider) 
        REFERENCES tb_lider(id_lider)
        ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

