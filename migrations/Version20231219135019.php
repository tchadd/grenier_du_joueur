<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231219135019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE jeu_console (jeu_id INT NOT NULL, console_id INT NOT NULL, INDEX IDX_736FC75C8C9E392E (jeu_id), INDEX IDX_736FC75C72F9DD9F (console_id), PRIMARY KEY(jeu_id, console_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jeu_console ADD CONSTRAINT FK_736FC75C8C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeu_console ADD CONSTRAINT FK_736FC75C72F9DD9F FOREIGN KEY (console_id) REFERENCES console (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE console ADD fk_etat_id INT NOT NULL, ADD fk_marque_id INT NOT NULL');
        $this->addSql('ALTER TABLE console ADD CONSTRAINT FK_3603CFB6FD71BBD3 FOREIGN KEY (fk_etat_id) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE console ADD CONSTRAINT FK_3603CFB6297E6E22 FOREIGN KEY (fk_marque_id) REFERENCES marque (id)');
        $this->addSql('CREATE INDEX IDX_3603CFB6FD71BBD3 ON console (fk_etat_id)');
        $this->addSql('CREATE INDEX IDX_3603CFB6297E6E22 ON console (fk_marque_id)');
        $this->addSql('ALTER TABLE jeu ADD fk_etat_id INT NOT NULL');
        $this->addSql('ALTER TABLE jeu ADD CONSTRAINT FK_82E48DB5FD71BBD3 FOREIGN KEY (fk_etat_id) REFERENCES etat (id)');
        $this->addSql('CREATE INDEX IDX_82E48DB5FD71BBD3 ON jeu (fk_etat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jeu_console DROP FOREIGN KEY FK_736FC75C8C9E392E');
        $this->addSql('ALTER TABLE jeu_console DROP FOREIGN KEY FK_736FC75C72F9DD9F');
        $this->addSql('DROP TABLE jeu_console');
        $this->addSql('ALTER TABLE console DROP FOREIGN KEY FK_3603CFB6FD71BBD3');
        $this->addSql('ALTER TABLE console DROP FOREIGN KEY FK_3603CFB6297E6E22');
        $this->addSql('DROP INDEX IDX_3603CFB6FD71BBD3 ON console');
        $this->addSql('DROP INDEX IDX_3603CFB6297E6E22 ON console');
        $this->addSql('ALTER TABLE console DROP fk_etat_id, DROP fk_marque_id');
        $this->addSql('ALTER TABLE jeu DROP FOREIGN KEY FK_82E48DB5FD71BBD3');
        $this->addSql('DROP INDEX IDX_82E48DB5FD71BBD3 ON jeu');
        $this->addSql('ALTER TABLE jeu DROP fk_etat_id');
    }
}
