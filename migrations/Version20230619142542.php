<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230619142542 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE timetable ADD closemonday_am TIME NOT NULL, ADD closemonday_pm TIME NOT NULL, ADD closetuesday_am TIME NOT NULL, ADD closetuesday_pm TIME NOT NULL, ADD closewednesday_am TIME NOT NULL, ADD closewednesday_pm TIME NOT NULL, ADD closethursday_am TIME NOT NULL, ADD closethursday_pm TIME NOT NULL, ADD closefriday_am TIME NOT NULL, ADD closefriday_pm TIME NOT NULL, ADD closesaturday_am TIME NOT NULL, ADD closesaturday_pm TIME NOT NULL, ADD closesunday_am TIME NOT NULL, ADD closesunday_pm TIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE timetable DROP closemonday_am, DROP closemonday_pm, DROP closetuesday_am, DROP closetuesday_pm, DROP closewednesday_am, DROP closewednesday_pm, DROP closethursday_am, DROP closethursday_pm, DROP closefriday_am, DROP closefriday_pm, DROP closesaturday_am, DROP closesaturday_pm, DROP closesunday_am, DROP closesunday_pm');
    }
}
