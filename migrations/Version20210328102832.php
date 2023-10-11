<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210328102832 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE paiement (id INT AUTO_INCREMENT NOT NULL, nom_id INT NOT NULL, prenom_id INT NOT NULL, cin VARCHAR(255) NOT NULL, date DATE NOT NULL, numerocarte VARCHAR(255) NOT NULL, montant DOUBLE PRECISION NOT NULL, typedepaiement VARCHAR(255) NOT NULL, INDEX IDX_B1DC7A1EC8121CE9 (nom_id), INDEX IDX_B1DC7A1E58819F9E (prenom_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1EC8121CE9 FOREIGN KEY (nom_id) REFERENCES parents (id)');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1E58819F9E FOREIGN KEY (prenom_id) REFERENCES parents (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE paiement');
    }
}
