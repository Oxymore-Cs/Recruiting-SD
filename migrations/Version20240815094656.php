<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240815094656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE roster_roles (roster_id INT NOT NULL, role_id INT NOT NULL, INDEX IDX_AE811B9D75404483 (roster_id), INDEX IDX_AE811B9DD60322AC (role_id), PRIMARY KEY(roster_id, role_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE roster_roles ADD CONSTRAINT FK_AE811B9D75404483 FOREIGN KEY (roster_id) REFERENCES roster (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE roster_roles ADD CONSTRAINT FK_AE811B9DD60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE roster DROP FOREIGN KEY FK_60B9ADF9D60322AC');
        $this->addSql('DROP INDEX IDX_60B9ADF9D60322AC ON roster');
        $this->addSql('ALTER TABLE roster DROP role_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE roster_roles DROP FOREIGN KEY FK_AE811B9D75404483');
        $this->addSql('ALTER TABLE roster_roles DROP FOREIGN KEY FK_AE811B9DD60322AC');
        $this->addSql('DROP TABLE roster_roles');
        $this->addSql('ALTER TABLE roster ADD role_id INT NOT NULL');
        $this->addSql('ALTER TABLE roster ADD CONSTRAINT FK_60B9ADF9D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_60B9ADF9D60322AC ON roster (role_id)');
    }
}
