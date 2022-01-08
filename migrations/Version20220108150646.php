<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220108150646 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, department VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, age INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_entity (user_id INT NOT NULL, entity_id INT NOT NULL, INDEX IDX_6B7A5F55A76ED395 (user_id), INDEX IDX_6B7A5F5581257D5D (entity_id), PRIMARY KEY(user_id, entity_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_entity ADD CONSTRAINT FK_6B7A5F55A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_entity ADD CONSTRAINT FK_6B7A5F5581257D5D FOREIGN KEY (entity_id) REFERENCES entity (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_entity DROP FOREIGN KEY FK_6B7A5F5581257D5D');
        $this->addSql('ALTER TABLE user_entity DROP FOREIGN KEY FK_6B7A5F55A76ED395');
        $this->addSql('DROP TABLE entity');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE user_entity');
    }
}
