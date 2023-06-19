<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230619150407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE timetable CHANGE monday_am monday_am TIME NOT NULL, CHANGE monday_pm monday_pm TIME NOT NULL, CHANGE tuesday_am tuesday_am TIME NOT NULL, CHANGE tuesday_pm tuesday_pm TIME NOT NULL, CHANGE wednesday_am wednesday_am TIME NOT NULL, CHANGE wednesday_pm wednesday_pm TIME NOT NULL, CHANGE thursday_am thursday_am TIME NOT NULL, CHANGE thursday_pm thursday_pm TIME NOT NULL, CHANGE friday_am friday_am TIME NOT NULL, CHANGE friday_pm friday_pm TIME NOT NULL, CHANGE saturday_am saturday_am TIME NOT NULL, CHANGE saturday_pm saturday_pm TIME NOT NULL, CHANGE sunday_am sunday_am TIME NOT NULL, CHANGE sunday_pm sunday_pm TIME NOT NULL, CHANGE closemonday_am closemonday_am TIME NOT NULL, CHANGE closemonday_pm closemonday_pm TIME NOT NULL, CHANGE closetuesday_am closetuesday_am TIME NOT NULL, CHANGE closetuesday_pm closetuesday_pm TIME NOT NULL, CHANGE closewednesday_am closewednesday_am TIME NOT NULL, CHANGE closewednesday_pm closewednesday_pm TIME NOT NULL, CHANGE closethursday_am closethursday_am TIME NOT NULL, CHANGE closethursday_pm closethursday_pm TIME NOT NULL, CHANGE closefriday_am closefriday_am TIME NOT NULL, CHANGE closefriday_pm closefriday_pm TIME NOT NULL, CHANGE closesaturday_am closesaturday_am TIME NOT NULL, CHANGE closesaturday_pm closesaturday_pm TIME NOT NULL, CHANGE closesunday_am closesunday_am TIME NOT NULL, CHANGE closesunday_pm closesunday_pm TIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE timetable CHANGE monday_am monday_am DATETIME NOT NULL, CHANGE closemonday_am closemonday_am DATETIME NOT NULL, CHANGE monday_pm monday_pm DATETIME NOT NULL, CHANGE closemonday_pm closemonday_pm DATETIME NOT NULL, CHANGE tuesday_am tuesday_am DATETIME NOT NULL, CHANGE closetuesday_am closetuesday_am DATETIME NOT NULL, CHANGE tuesday_pm tuesday_pm DATETIME NOT NULL, CHANGE closetuesday_pm closetuesday_pm DATETIME NOT NULL, CHANGE wednesday_am wednesday_am DATETIME NOT NULL, CHANGE closewednesday_am closewednesday_am DATETIME NOT NULL, CHANGE wednesday_pm wednesday_pm DATETIME NOT NULL, CHANGE closewednesday_pm closewednesday_pm DATETIME NOT NULL, CHANGE thursday_am thursday_am DATETIME NOT NULL, CHANGE closethursday_am closethursday_am DATETIME NOT NULL, CHANGE thursday_pm thursday_pm DATETIME NOT NULL, CHANGE closethursday_pm closethursday_pm DATETIME NOT NULL, CHANGE friday_am friday_am DATETIME NOT NULL, CHANGE closefriday_am closefriday_am DATETIME NOT NULL, CHANGE friday_pm friday_pm DATETIME NOT NULL, CHANGE closefriday_pm closefriday_pm DATETIME NOT NULL, CHANGE saturday_am saturday_am DATETIME NOT NULL, CHANGE closesaturday_am closesaturday_am DATETIME NOT NULL, CHANGE saturday_pm saturday_pm DATETIME NOT NULL, CHANGE closesaturday_pm closesaturday_pm DATETIME NOT NULL, CHANGE sunday_am sunday_am DATETIME NOT NULL, CHANGE closesunday_am closesunday_am DATETIME NOT NULL, CHANGE sunday_pm sunday_pm DATETIME NOT NULL, CHANGE closesunday_pm closesunday_pm DATETIME NOT NULL');
    }
}
