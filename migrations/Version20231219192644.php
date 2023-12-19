<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231219192644 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE console (id INT AUTO_INCREMENT NOT NULL, fk_etat_id INT NOT NULL, fk_marque_id INT NOT NULL, nom VARCHAR(255) NOT NULL, annee_sortie DATE NOT NULL, prix_revente DOUBLE PRECISION NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_3603CFB6FD71BBD3 (fk_etat_id), INDEX IDX_3603CFB6297E6E22 (fk_marque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editeur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeu (id INT AUTO_INCREMENT NOT NULL, fk_editeur_id INT NOT NULL, fk_etat_id INT NOT NULL, nom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, annee_sortie DATE NOT NULL, prix_revente DOUBLE PRECISION NOT NULL, INDEX IDX_82E48DB5C31B77B2 (fk_editeur_id), INDEX IDX_82E48DB5FD71BBD3 (fk_etat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeu_console (jeu_id INT NOT NULL, console_id INT NOT NULL, INDEX IDX_736FC75C8C9E392E (jeu_id), INDEX IDX_736FC75C72F9DD9F (console_id), PRIMARY KEY(jeu_id, console_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE console ADD CONSTRAINT FK_3603CFB6FD71BBD3 FOREIGN KEY (fk_etat_id) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE console ADD CONSTRAINT FK_3603CFB6297E6E22 FOREIGN KEY (fk_marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE jeu ADD CONSTRAINT FK_82E48DB5C31B77B2 FOREIGN KEY (fk_editeur_id) REFERENCES editeur (id)');
        $this->addSql('ALTER TABLE jeu ADD CONSTRAINT FK_82E48DB5FD71BBD3 FOREIGN KEY (fk_etat_id) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE jeu_console ADD CONSTRAINT FK_736FC75C8C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeu_console ADD CONSTRAINT FK_736FC75C72F9DD9F FOREIGN KEY (console_id) REFERENCES console (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE console DROP FOREIGN KEY FK_3603CFB6FD71BBD3');
        $this->addSql('ALTER TABLE console DROP FOREIGN KEY FK_3603CFB6297E6E22');
        $this->addSql('ALTER TABLE jeu DROP FOREIGN KEY FK_82E48DB5C31B77B2');
        $this->addSql('ALTER TABLE jeu DROP FOREIGN KEY FK_82E48DB5FD71BBD3');
        $this->addSql('ALTER TABLE jeu_console DROP FOREIGN KEY FK_736FC75C8C9E392E');
        $this->addSql('ALTER TABLE jeu_console DROP FOREIGN KEY FK_736FC75C72F9DD9F');
        $this->addSql('DROP TABLE console');
        $this->addSql('DROP TABLE editeur');
        $this->addSql('DROP TABLE etat');
        $this->addSql('DROP TABLE jeu');
        $this->addSql('DROP TABLE jeu_console');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE `user`');
    }
}
