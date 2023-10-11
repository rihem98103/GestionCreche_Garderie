<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231011185731 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bebe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, datenaissance DATE NOT NULL, age INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hygiene (id INT AUTO_INCREMENT NOT NULL, bebe_id INT NOT NULL, date DATE NOT NULL, heure TIME NOT NULL, libelle VARCHAR(255) NOT NULL, soins VARCHAR(255) NOT NULL, INDEX IDX_EC9E4814AF762365 (bebe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement (id INT AUTO_INCREMENT NOT NULL, nom_id INT NOT NULL, prenom_id INT NOT NULL, cin VARCHAR(255) NOT NULL, date DATE NOT NULL, numerocarte VARCHAR(255) NOT NULL, montant DOUBLE PRECISION NOT NULL, typedepaiement VARCHAR(255) NOT NULL, INDEX IDX_B1DC7A1EC8121CE9 (nom_id), INDEX IDX_B1DC7A1E58819F9E (prenom_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parents (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parents_bebe (parents_id INT NOT NULL, bebe_id INT NOT NULL, INDEX IDX_751E5458B706B6D3 (parents_id), INDEX IDX_751E5458AF762365 (bebe_id), PRIMARY KEY(parents_id, bebe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repas (id INT AUTO_INCREMENT NOT NULL, bebe_id INT NOT NULL, date DATE NOT NULL, jour DATE NOT NULL, quantite INT NOT NULL, heure TIME NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_A8D351B3AF762365 (bebe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sante (id INT AUTO_INCREMENT NOT NULL, bebe_id INT NOT NULL, date DATE NOT NULL, libelle VARCHAR(255) NOT NULL, quantite INT NOT NULL, heure TIME NOT NULL, INDEX IDX_CF08326BAF762365 (bebe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siestes (id INT AUTO_INCREMENT NOT NULL, bebe_id INT NOT NULL, date DATE NOT NULL, heurededebut TIME NOT NULL, heurededormir TIME NOT NULL, qualite VARCHAR(255) NOT NULL, INDEX IDX_C531C3FDAF762365 (bebe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hygiene ADD CONSTRAINT FK_EC9E4814AF762365 FOREIGN KEY (bebe_id) REFERENCES bebe (id)');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1EC8121CE9 FOREIGN KEY (nom_id) REFERENCES parents (id)');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1E58819F9E FOREIGN KEY (prenom_id) REFERENCES parents (id)');
        $this->addSql('ALTER TABLE parents_bebe ADD CONSTRAINT FK_751E5458B706B6D3 FOREIGN KEY (parents_id) REFERENCES parents (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parents_bebe ADD CONSTRAINT FK_751E5458AF762365 FOREIGN KEY (bebe_id) REFERENCES bebe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE repas ADD CONSTRAINT FK_A8D351B3AF762365 FOREIGN KEY (bebe_id) REFERENCES bebe (id)');
        $this->addSql('ALTER TABLE sante ADD CONSTRAINT FK_CF08326BAF762365 FOREIGN KEY (bebe_id) REFERENCES bebe (id)');
        $this->addSql('ALTER TABLE siestes ADD CONSTRAINT FK_C531C3FDAF762365 FOREIGN KEY (bebe_id) REFERENCES bebe (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hygiene DROP FOREIGN KEY FK_EC9E4814AF762365');
        $this->addSql('ALTER TABLE parents_bebe DROP FOREIGN KEY FK_751E5458AF762365');
        $this->addSql('ALTER TABLE repas DROP FOREIGN KEY FK_A8D351B3AF762365');
        $this->addSql('ALTER TABLE sante DROP FOREIGN KEY FK_CF08326BAF762365');
        $this->addSql('ALTER TABLE siestes DROP FOREIGN KEY FK_C531C3FDAF762365');
        $this->addSql('ALTER TABLE paiement DROP FOREIGN KEY FK_B1DC7A1EC8121CE9');
        $this->addSql('ALTER TABLE paiement DROP FOREIGN KEY FK_B1DC7A1E58819F9E');
        $this->addSql('ALTER TABLE parents_bebe DROP FOREIGN KEY FK_751E5458B706B6D3');
        $this->addSql('DROP TABLE bebe');
        $this->addSql('DROP TABLE hygiene');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE parents');
        $this->addSql('DROP TABLE parents_bebe');
        $this->addSql('DROP TABLE repas');
        $this->addSql('DROP TABLE sante');
        $this->addSql('DROP TABLE siestes');
        $this->addSql('DROP TABLE users');
    }
}
