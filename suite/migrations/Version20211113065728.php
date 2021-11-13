<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211113065728 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE teacher (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, national_id_number VARCHAR(255) DEFAULT NULL, graduation VARCHAR(255) DEFAULT NULL, degree VARCHAR(255) DEFAULT NULL, birth_date VARCHAR(255) DEFAULT NULL, mobile_number VARCHAR(255) DEFAULT NULL, whatsapp VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, street_address VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL, nationality VARCHAR(255) DEFAULT NULL, job_description LONGTEXT DEFAULT NULL, bio_graphy LONGTEXT DEFAULT NULL, zoom_link LONGTEXT DEFAULT NULL, timezone VARCHAR(255) NOT NULL, available_times LONGTEXT DEFAULT NULL, available_hours VARCHAR(255) DEFAULT NULL, id_photo_copy LONGTEXT DEFAULT NULL, certificates_photo_copy LONGTEXT DEFAULT NULL, profile_picture LONGTEXT DEFAULT NULL, resume LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE teacher');
    }
}
