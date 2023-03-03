<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230303100742 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE doctors (id INT AUTO_INCREMENT NOT NULL, speciality_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, last_name VARCHAR(50) NOT NULL, firstname VARCHAR(50) NOT NULL, adress VARCHAR(255) NOT NULL, postal_code VARCHAR(5) NOT NULL, phone_number VARCHAR(13) NOT NULL, UNIQUE INDEX UNIQ_B67687BEE7927C74 (email), INDEX IDX_B67687BE3B5A08D7 (speciality_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doctors_expertises (doctors_id INT NOT NULL, expertises_id INT NOT NULL, INDEX IDX_9809DD866425CC19 (doctors_id), INDEX IDX_9809DD86238DAC0F (expertises_id), PRIMARY KEY(doctors_id, expertises_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE doctors ADD CONSTRAINT FK_B67687BE3B5A08D7 FOREIGN KEY (speciality_id) REFERENCES specialities (id)');
        $this->addSql('ALTER TABLE doctors_expertises ADD CONSTRAINT FK_9809DD866425CC19 FOREIGN KEY (doctors_id) REFERENCES doctors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doctors_expertises ADD CONSTRAINT FK_9809DD86238DAC0F FOREIGN KEY (expertises_id) REFERENCES expertises (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE doctors DROP FOREIGN KEY FK_B67687BE3B5A08D7');
        $this->addSql('ALTER TABLE doctors_expertises DROP FOREIGN KEY FK_9809DD866425CC19');
        $this->addSql('ALTER TABLE doctors_expertises DROP FOREIGN KEY FK_9809DD86238DAC0F');
        $this->addSql('DROP TABLE doctors');
        $this->addSql('DROP TABLE doctors_expertises');
    }
}
