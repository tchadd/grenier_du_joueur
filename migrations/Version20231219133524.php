<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231219133524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jeu DROP FOREIGN KEY FK_82E48DB596FF3DF6');
        $this->addSql('DROP INDEX IDX_82E48DB596FF3DF6 ON jeu');
        $this->addSql('ALTER TABLE jeu CHANGE id_editeur_id fk_editeur_id INT NOT NULL');
        $this->addSql('ALTER TABLE jeu ADD CONSTRAINT FK_82E48DB5C31B77B2 FOREIGN KEY (fk_editeur_id) REFERENCES editeur (id)');
        $this->addSql('CREATE INDEX IDX_82E48DB5C31B77B2 ON jeu (fk_editeur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jeu DROP FOREIGN KEY FK_82E48DB5C31B77B2');
        $this->addSql('DROP INDEX IDX_82E48DB5C31B77B2 ON jeu');
        $this->addSql('ALTER TABLE jeu CHANGE fk_editeur_id id_editeur_id INT NOT NULL');
        $this->addSql('ALTER TABLE jeu ADD CONSTRAINT FK_82E48DB596FF3DF6 FOREIGN KEY (id_editeur_id) REFERENCES editeur (id)');
        $this->addSql('CREATE INDEX IDX_82E48DB596FF3DF6 ON jeu (id_editeur_id)');
    }
}
