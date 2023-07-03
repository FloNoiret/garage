<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230703123910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE characteristic (id INT AUTO_INCREMENT NOT NULL, characteristics_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, info VARCHAR(255) NOT NULL, INDEX IDX_522FA9504B13ADB4 (characteristics_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE characteristic ADD CONSTRAINT FK_522FA9504B13ADB4 FOREIGN KEY (characteristics_id) REFERENCES car_publication (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE characteristic DROP FOREIGN KEY FK_522FA9504B13ADB4');
        $this->addSql('DROP TABLE characteristic');
    }
}
