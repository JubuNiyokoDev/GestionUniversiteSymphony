<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240916092124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, departement_id INT NOT NULL, niveau VARCHAR(50) NOT NULL, INDEX IDX_8F87BF96CCF9E01E (departement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departements (id INT AUTO_INCREMENT NOT NULL, faculite_id INT NOT NULL, nomd VARCHAR(100) NOT NULL, coded VARCHAR(100) NOT NULL, INDEX IDX_CF7489B296DA8553 (faculite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiants (id INT AUTO_INCREMENT NOT NULL, classe_id INT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, ddn DATE NOT NULL, gerne VARCHAR(10) NOT NULL, noteexeta DOUBLE PRECISION NOT NULL, INDEX IDX_227C02EB8F5EA509 (classe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faculites (id INT AUTO_INCREMENT NOT NULL, nomf VARCHAR(60) NOT NULL, codef VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscriptions (id INT AUTO_INCREMENT NOT NULL, classe_id INT NOT NULL, etudiant_id INT NOT NULL, anneacademique VARCHAR(50) NOT NULL, INDEX IDX_74E0281C8F5EA509 (classe_id), INDEX IDX_74E0281CDDEAB1A3 (etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF96CCF9E01E FOREIGN KEY (departement_id) REFERENCES departements (id)');
        $this->addSql('ALTER TABLE departements ADD CONSTRAINT FK_CF7489B296DA8553 FOREIGN KEY (faculite_id) REFERENCES faculites (id)');
        $this->addSql('ALTER TABLE etudiants ADD CONSTRAINT FK_227C02EB8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE inscriptions ADD CONSTRAINT FK_74E0281C8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE inscriptions ADD CONSTRAINT FK_74E0281CDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiants (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF96CCF9E01E');
        $this->addSql('ALTER TABLE departements DROP FOREIGN KEY FK_CF7489B296DA8553');
        $this->addSql('ALTER TABLE etudiants DROP FOREIGN KEY FK_227C02EB8F5EA509');
        $this->addSql('ALTER TABLE inscriptions DROP FOREIGN KEY FK_74E0281C8F5EA509');
        $this->addSql('ALTER TABLE inscriptions DROP FOREIGN KEY FK_74E0281CDDEAB1A3');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE departements');
        $this->addSql('DROP TABLE etudiants');
        $this->addSql('DROP TABLE faculites');
        $this->addSql('DROP TABLE inscriptions');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
