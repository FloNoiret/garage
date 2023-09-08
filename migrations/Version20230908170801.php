<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230908170801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE car_publication_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE characteristic_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE comment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE contact_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE equipment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE image_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE picture_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE service_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE timetable_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE car_publication (id INT NOT NULL, image_id INT DEFAULT NULL, title VARCHAR(60) NOT NULL, content TEXT NOT NULL, price INT NOT NULL, kilometer INT NOT NULL, date INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C5BE98053DA5256D ON car_publication (image_id)');
        $this->addSql('CREATE TABLE characteristic (id INT NOT NULL, characteristics_id INT DEFAULT NULL, libelle VARCHAR(20) NOT NULL, info VARCHAR(20) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_522FA9504B13ADB4 ON characteristic (characteristics_id)');
        $this->addSql('CREATE TABLE comment (id INT NOT NULL, title VARCHAR(60) NOT NULL, content TEXT NOT NULL, author VARCHAR(60) NOT NULL, grade INT NOT NULL, approved BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE contact (id INT NOT NULL, full_name VARCHAR(50) DEFAULT NULL, email VARCHAR(180) NOT NULL, subject VARCHAR(100) DEFAULT NULL, message TEXT NOT NULL, number VARCHAR(255) NOT NULL, processed BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN contact.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE equipment (id INT NOT NULL, carpost_id INT DEFAULT NULL, libelle VARCHAR(40) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D338D583AAD2085D ON equipment (carpost_id)');
        $this->addSql('CREATE TABLE image (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE picture (id INT NOT NULL, carpost_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_16DB4F89AAD2085D ON picture (carpost_id)');
        $this->addSql('CREATE TABLE service (id INT NOT NULL, title VARCHAR(60) NOT NULL, content TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE timetable (id INT NOT NULL, monday_am TIME(0) WITHOUT TIME ZONE NOT NULL, closemonday_am TIME(0) WITHOUT TIME ZONE NOT NULL, monday_pm TIME(0) WITHOUT TIME ZONE NOT NULL, closemonday_pm TIME(0) WITHOUT TIME ZONE NOT NULL, tuesday_am TIME(0) WITHOUT TIME ZONE NOT NULL, closetuesday_am TIME(0) WITHOUT TIME ZONE NOT NULL, tuesday_pm TIME(0) WITHOUT TIME ZONE NOT NULL, closetuesday_pm TIME(0) WITHOUT TIME ZONE NOT NULL, wednesday_am TIME(0) WITHOUT TIME ZONE NOT NULL, closewednesday_am TIME(0) WITHOUT TIME ZONE NOT NULL, wednesday_pm TIME(0) WITHOUT TIME ZONE NOT NULL, closewednesday_pm TIME(0) WITHOUT TIME ZONE NOT NULL, thursday_am TIME(0) WITHOUT TIME ZONE NOT NULL, closethursday_am TIME(0) WITHOUT TIME ZONE NOT NULL, thursday_pm TIME(0) WITHOUT TIME ZONE NOT NULL, closethursday_pm TIME(0) WITHOUT TIME ZONE NOT NULL, friday_am TIME(0) WITHOUT TIME ZONE NOT NULL, closefriday_am TIME(0) WITHOUT TIME ZONE NOT NULL, friday_pm TIME(0) WITHOUT TIME ZONE NOT NULL, closefriday_pm TIME(0) WITHOUT TIME ZONE NOT NULL, saturday_am TIME(0) WITHOUT TIME ZONE NOT NULL, closesaturday_am TIME(0) WITHOUT TIME ZONE NOT NULL, saturday_pm TIME(0) WITHOUT TIME ZONE NOT NULL, closesaturday_pm TIME(0) WITHOUT TIME ZONE NOT NULL, sunday_am TIME(0) WITHOUT TIME ZONE NOT NULL, closesunday_am TIME(0) WITHOUT TIME ZONE NOT NULL, sunday_pm TIME(0) WITHOUT TIME ZONE NOT NULL, closesunday_pm TIME(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON "user" (username)');
        $this->addSql('ALTER TABLE car_publication ADD CONSTRAINT FK_C5BE98053DA5256D FOREIGN KEY (image_id) REFERENCES image (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE characteristic ADD CONSTRAINT FK_522FA9504B13ADB4 FOREIGN KEY (characteristics_id) REFERENCES car_publication (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583AAD2085D FOREIGN KEY (carpost_id) REFERENCES car_publication (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89AAD2085D FOREIGN KEY (carpost_id) REFERENCES car_publication (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SCHEMA heroku_ext');
        $this->addSql('DROP SEQUENCE car_publication_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE characteristic_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE comment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE contact_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE equipment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE image_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE picture_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE service_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE timetable_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('ALTER TABLE car_publication DROP CONSTRAINT FK_C5BE98053DA5256D');
        $this->addSql('ALTER TABLE characteristic DROP CONSTRAINT FK_522FA9504B13ADB4');
        $this->addSql('ALTER TABLE equipment DROP CONSTRAINT FK_D338D583AAD2085D');
        $this->addSql('ALTER TABLE picture DROP CONSTRAINT FK_16DB4F89AAD2085D');
        $this->addSql('DROP TABLE car_publication');
        $this->addSql('DROP TABLE characteristic');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE timetable');
        $this->addSql('DROP TABLE "user"');
    }
}
