<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230629213451 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car_publication (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, title VARCHAR(60) NOT NULL, content TEXT NOT NULL, price INT NOT NULL, kilometer INT NOT NULL, year DATETIME NOT NULL, UNIQUE INDEX UNIQ_C5BE98053DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(60) NOT NULL, content TEXT NOT NULL, author VARCHAR(60) NOT NULL, grade INT NOT NULL, approved VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(50) DEFAULT NULL, email VARCHAR(180) NOT NULL, subject VARCHAR(100) DEFAULT NULL, message LONGTEXT NOT NULL, number VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(60) NOT NULL, content TEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE timetable (id INT AUTO_INCREMENT NOT NULL, monday_am TIME NOT NULL, closemonday_am TIME NOT NULL, monday_pm TIME NOT NULL, closemonday_pm TIME NOT NULL, tuesday_am TIME NOT NULL, closetuesday_am TIME NOT NULL, tuesday_pm TIME NOT NULL, closetuesday_pm TIME NOT NULL, wednesday_am TIME NOT NULL, closewednesday_am TIME NOT NULL, wednesday_pm TIME NOT NULL, closewednesday_pm TIME NOT NULL, thursday_am TIME NOT NULL, closethursday_am TIME NOT NULL, thursday_pm TIME NOT NULL, closethursday_pm TIME NOT NULL, friday_am TIME NOT NULL, closefriday_am TIME NOT NULL, friday_pm TIME NOT NULL, closefriday_pm TIME NOT NULL, saturday_am TIME NOT NULL, closesaturday_am TIME NOT NULL, saturday_pm TIME NOT NULL, closesaturday_pm TIME NOT NULL, sunday_am TIME NOT NULL, closesunday_am TIME NOT NULL, sunday_pm TIME NOT NULL, closesunday_pm TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car_publication ADD CONSTRAINT FK_C5BE98053DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_publication DROP FOREIGN KEY FK_C5BE98053DA5256D');
        $this->addSql('DROP TABLE car_publication');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE timetable');
        $this->addSql('DROP TABLE user');
    }
}
