<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230314103701 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appointment_professionnals (appointment_id INT NOT NULL, professionnals_id INT NOT NULL, INDEX IDX_BABF50CFE5B533F9 (appointment_id), INDEX IDX_BABF50CF7FDC54F3 (professionnals_id), PRIMARY KEY(appointment_id, professionnals_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appointment_professionnals ADD CONSTRAINT FK_BABF50CFE5B533F9 FOREIGN KEY (appointment_id) REFERENCES appointment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE appointment_professionnals ADD CONSTRAINT FK_BABF50CF7FDC54F3 FOREIGN KEY (professionnals_id) REFERENCES professionnals (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appointment_professionnals DROP FOREIGN KEY FK_BABF50CFE5B533F9');
        $this->addSql('ALTER TABLE appointment_professionnals DROP FOREIGN KEY FK_BABF50CF7FDC54F3');
        $this->addSql('DROP TABLE appointment_professionnals');
    }
}
