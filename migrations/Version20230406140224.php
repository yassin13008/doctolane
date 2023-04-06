<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230406140224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appointment (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(50) DEFAULT NULL, start DATETIME NOT NULL, end DATETIME NOT NULL, is_dispo TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE appointment_patients (appointment_id INT NOT NULL, patients_id INT NOT NULL, INDEX IDX_19E8A5E4E5B533F9 (appointment_id), INDEX IDX_19E8A5E4CEC3FD2F (patients_id), PRIMARY KEY(appointment_id, patients_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE appointment_professionnals (appointment_id INT NOT NULL, professionnals_id INT NOT NULL, INDEX IDX_BABF50CFE5B533F9 (appointment_id), INDEX IDX_BABF50CF7FDC54F3 (professionnals_id), PRIMARY KEY(appointment_id, professionnals_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aviability (id INT AUTO_INCREMENT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, duration_date INT NOT NULL, gap_date INT NOT NULL, start_time TIME NOT NULL, end_time TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patients (id INT AUTO_INCREMENT NOT NULL, user_name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, phone_number VARCHAR(13) NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, postal_code VARCHAR(5) NOT NULL, reset_token VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_2CCC2E2CE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professionnals (id INT AUTO_INCREMENT NOT NULL, speciality_id INT NOT NULL, aviability_id INT DEFAULT NULL, roles JSON NOT NULL, username VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, phone_number VARCHAR(13) NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, expertises LONGTEXT NOT NULL, postal_code VARCHAR(5) NOT NULL, reset_token VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8CC25287E7927C74 (email), INDEX IDX_8CC252873B5A08D7 (speciality_id), INDEX IDX_8CC252875F637934 (aviability_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialities (id INT AUTO_INCREMENT NOT NULL, speciality_label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appointment_patients ADD CONSTRAINT FK_19E8A5E4E5B533F9 FOREIGN KEY (appointment_id) REFERENCES appointment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE appointment_patients ADD CONSTRAINT FK_19E8A5E4CEC3FD2F FOREIGN KEY (patients_id) REFERENCES patients (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE appointment_professionnals ADD CONSTRAINT FK_BABF50CFE5B533F9 FOREIGN KEY (appointment_id) REFERENCES appointment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE appointment_professionnals ADD CONSTRAINT FK_BABF50CF7FDC54F3 FOREIGN KEY (professionnals_id) REFERENCES professionnals (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE professionnals ADD CONSTRAINT FK_8CC252873B5A08D7 FOREIGN KEY (speciality_id) REFERENCES specialities (id)');
        $this->addSql('ALTER TABLE professionnals ADD CONSTRAINT FK_8CC252875F637934 FOREIGN KEY (aviability_id) REFERENCES aviability (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appointment_patients DROP FOREIGN KEY FK_19E8A5E4E5B533F9');
        $this->addSql('ALTER TABLE appointment_patients DROP FOREIGN KEY FK_19E8A5E4CEC3FD2F');
        $this->addSql('ALTER TABLE appointment_professionnals DROP FOREIGN KEY FK_BABF50CFE5B533F9');
        $this->addSql('ALTER TABLE appointment_professionnals DROP FOREIGN KEY FK_BABF50CF7FDC54F3');
        $this->addSql('ALTER TABLE professionnals DROP FOREIGN KEY FK_8CC252873B5A08D7');
        $this->addSql('ALTER TABLE professionnals DROP FOREIGN KEY FK_8CC252875F637934');
        $this->addSql('DROP TABLE appointment');
        $this->addSql('DROP TABLE appointment_patients');
        $this->addSql('DROP TABLE appointment_professionnals');
        $this->addSql('DROP TABLE aviability');
        $this->addSql('DROP TABLE patients');
        $this->addSql('DROP TABLE professionnals');
        $this->addSql('DROP TABLE specialities');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
