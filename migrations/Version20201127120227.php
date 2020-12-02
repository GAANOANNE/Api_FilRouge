<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201127120227 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE group_tag (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE group_tag_tag (group_tag_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_8457798D6954BBC1 (group_tag_id), INDEX IDX_8457798DBAD26311 (tag_id), PRIMARY KEY(group_tag_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_competence (id INT AUTO_INCREMENT NOT NULL, competence_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_2C3959A315761DAB (competence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_de_sortie (id INT AUTO_INCREMENT NOT NULL, apprenant_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_8F96B7F6C5697D6D (apprenant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE group_tag_tag ADD CONSTRAINT FK_8457798D6954BBC1 FOREIGN KEY (group_tag_id) REFERENCES group_tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE group_tag_tag ADD CONSTRAINT FK_8457798DBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_competence ADD CONSTRAINT FK_2C3959A315761DAB FOREIGN KEY (competence_id) REFERENCES competence (id)');
        $this->addSql('ALTER TABLE profil_de_sortie ADD CONSTRAINT FK_8F96B7F6C5697D6D FOREIGN KEY (apprenant_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groupe_competence DROP FOREIGN KEY FK_2C3959A315761DAB');
        $this->addSql('ALTER TABLE group_tag_tag DROP FOREIGN KEY FK_8457798D6954BBC1');
        $this->addSql('ALTER TABLE group_tag_tag DROP FOREIGN KEY FK_8457798DBAD26311');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE group_tag');
        $this->addSql('DROP TABLE group_tag_tag');
        $this->addSql('DROP TABLE groupe_competence');
        $this->addSql('DROP TABLE profil_de_sortie');
        $this->addSql('DROP TABLE tag');
    }
}
