<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240813124654 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, title VARCHAR(255) NOT NULL, first_paragraph LONGTEXT NOT NULL, first_image VARCHAR(255) NOT NULL, second_title VARCHAR(255) NOT NULL, second_paragraph LONGTEXT NOT NULL, third_title VARCHAR(255) DEFAULT NULL, third_paragraph LONGTEXT DEFAULT NULL, second_image VARCHAR(255) DEFAULT NULL, third_image VARCHAR(255) DEFAULT NULL, fourth_title VARCHAR(255) DEFAULT NULL, fourth_paragraph LONGTEXT DEFAULT NULL, publication_date DATETIME NOT NULL, INDEX IDX_23A0E6612469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bo_format (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, number_of_maps INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE map (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matches (id INT AUTO_INCREMENT NOT NULL, bo_format_id INT NOT NULL, tournament_id INT DEFAULT NULL, team_a VARCHAR(255) NOT NULL, team_b VARCHAR(255) NOT NULL, score_team_a INT NOT NULL, score_team_b INT NOT NULL, match_date DATETIME DEFAULT NULL, INDEX IDX_62615BA4AF6968 (bo_format_id), INDEX IDX_62615BA33D1A3E7 (tournament_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roster (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, name VARCHAR(255) NOT NULL, is_substitute TINYINT(1) NOT NULL, profile_picture VARCHAR(255) NOT NULL, INDEX IDX_60B9ADF9D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rounds (id INT AUTO_INCREMENT NOT NULL, game_id INT NOT NULL, map_id INT NOT NULL, round_number INT NOT NULL, score_team_a INT NOT NULL, score_team_b INT NOT NULL, INDEX IDX_3A7FD554E48FD905 (game_id), INDEX IDX_3A7FD55453C55F64 (map_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sponsor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, orders INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournament (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, organizer VARCHAR(255) DEFAULT NULL, number_of_teams INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6612469DE2 FOREIGN KEY (category_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE matches ADD CONSTRAINT FK_62615BA4AF6968 FOREIGN KEY (bo_format_id) REFERENCES bo_format (id)');
        $this->addSql('ALTER TABLE matches ADD CONSTRAINT FK_62615BA33D1A3E7 FOREIGN KEY (tournament_id) REFERENCES tournament (id)');
        $this->addSql('ALTER TABLE roster ADD CONSTRAINT FK_60B9ADF9D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE rounds ADD CONSTRAINT FK_3A7FD554E48FD905 FOREIGN KEY (game_id) REFERENCES matches (id)');
        $this->addSql('ALTER TABLE rounds ADD CONSTRAINT FK_3A7FD55453C55F64 FOREIGN KEY (map_id) REFERENCES map (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6612469DE2');
        $this->addSql('ALTER TABLE matches DROP FOREIGN KEY FK_62615BA4AF6968');
        $this->addSql('ALTER TABLE matches DROP FOREIGN KEY FK_62615BA33D1A3E7');
        $this->addSql('ALTER TABLE roster DROP FOREIGN KEY FK_60B9ADF9D60322AC');
        $this->addSql('ALTER TABLE rounds DROP FOREIGN KEY FK_3A7FD554E48FD905');
        $this->addSql('ALTER TABLE rounds DROP FOREIGN KEY FK_3A7FD55453C55F64');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE bo_format');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE map');
        $this->addSql('DROP TABLE matches');
        $this->addSql('DROP TABLE newsletter');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE roster');
        $this->addSql('DROP TABLE rounds');
        $this->addSql('DROP TABLE sponsor');
        $this->addSql('DROP TABLE tournament');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
