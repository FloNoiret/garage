<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230709185151 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, carpost_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_D338D583AAD2085D (carpost_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583AAD2085D FOREIGN KEY (carpost_id) REFERENCES car_publication (id)');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7AAD2085D');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('ALTER TABLE car_publication CHANGE year date DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reponse (id INT AUTO_INCREMENT NOT NULL, carpost_id INT DEFAULT NULL, libelle VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_5FB6DEC7AAD2085D (carpost_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7AAD2085D FOREIGN KEY (carpost_id) REFERENCES car_publication (id)');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D583AAD2085D');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('ALTER TABLE car_publication CHANGE date year DATETIME NOT NULL');
    }
}
