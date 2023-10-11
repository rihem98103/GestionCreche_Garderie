<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210327102050 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE siestes (id INT AUTO_INCREMENT NOT NULL, bebe_id INT NOT NULL, date DATE NOT NULL, heurededebut TIME NOT NULL, heurededormir TIME NOT NULL, qualite VARCHAR(255) NOT NULL, INDEX IDX_C531C3FDAF762365 (bebe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE siestes ADD CONSTRAINT FK_C531C3FDAF762365 FOREIGN KEY (bebe_id) REFERENCES bebe (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE siestes');
    }
}
