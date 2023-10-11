<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210327223435 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hygiene (id INT AUTO_INCREMENT NOT NULL, bebe_id INT NOT NULL, date DATE NOT NULL, heure TIME NOT NULL, libelle VARCHAR(255) NOT NULL, soins VARCHAR(255) NOT NULL, INDEX IDX_EC9E4814AF762365 (bebe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hygiene ADD CONSTRAINT FK_EC9E4814AF762365 FOREIGN KEY (bebe_id) REFERENCES bebe (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE hygiene');
    }
}
