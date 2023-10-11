<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210401130740 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE parents_bebe (parents_id INT NOT NULL, bebe_id INT NOT NULL, INDEX IDX_751E5458B706B6D3 (parents_id), INDEX IDX_751E5458AF762365 (bebe_id), PRIMARY KEY(parents_id, bebe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE parents_bebe ADD CONSTRAINT FK_751E5458B706B6D3 FOREIGN KEY (parents_id) REFERENCES parents (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parents_bebe ADD CONSTRAINT FK_751E5458AF762365 FOREIGN KEY (bebe_id) REFERENCES bebe (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE parents_bebe');
    }
}
