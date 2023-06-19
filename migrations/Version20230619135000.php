<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230619135000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE timetable (id INT AUTO_INCREMENT NOT NULL, monday_am TIME NOT NULL, monday_pm TIME NOT NULL, tuesday_am TIME NOT NULL, tuesday_pm TIME NOT NULL, wednesday_am TIME NOT NULL, wednesday_pm TIME NOT NULL, thursday_am TIME NOT NULL, thursday_pm TIME NOT NULL, friday_am TIME NOT NULL, friday_pm TIME NOT NULL, saturday_am TIME NOT NULL, saturday_pm TIME NOT NULL, sunday_am TIME NOT NULL, sunday_pm TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE timetable');
    }
}
